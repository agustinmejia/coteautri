<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\IndexImage;
use App\Models\IndexPdf;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function guia()
    {
        return view('guia.view');
    }

    public function file($file, $id, $type)
    {
        $newFileName = $id.'@'.Str::random(20).time().'.'.$file->getClientOriginalExtension();
                            
        $dir = $type.'/'.date('F').date('Y');
                            
        Storage::makeDirectory($dir);

        Storage::disk('public')->put($dir.'/'.$newFileName, file_get_contents($file));                    
                    $video = $dir.'/'.$newFileName;
                    // $ok->update(['video' => $video]);
        return $video;
    }

    public function indexImage(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            $file = $request->file('file');
            if($file)
            {      
                $image = $this->file($file,Auth::user()->id, "index/image");
                // indexImage::where('status', 1)->update(['status'=>0]);
                IndexImage::create([
                    'image'=>$image,
                    'resgisterUser_id'=>Auth::user()->id
                ]);
                DB::commit();
                return redirect()->route('voyager.dashboard')->with(['message' => 'Agregado exitosamente.', 'alert-type' => 'success']);
            }
            else
            {
                DB::rollBack();
                return redirect()->route('voyager.dashboard')->with(['message' => 'Error....', 'alert-type' => 'error']);
            }
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('voyager.dashboard')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }      
    }

    public function indexpdf(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $file = $request->file('file');
            if($file)
            {      
                // return 1;

                $pdf = $this->file($file,Auth::user()->id, "index/pdf");
                IndexPdf::create([
                    'file' => $pdf,
                    'registerUser_id' => Auth::user()->id,
                    'name' => $request->name,
                    'cover' => $this->store_image($request->file('cover'), 'covers'),
                    'url' => $request->url
                ]);
                DB::commit();
                return redirect()->route('guia.index')->with(['message' => 'Agregado exitosamente.', 'alert-type' => 'success']);
            }
            else
            {
                DB::rollBack();
                return redirect()->route('guia.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
            }
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('guia.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }    
    }
    public function deletepdf($id)
    {
        // return $id;
        IndexPdf::where('id', $id)->update(['status' => 0]);
        return redirect()->route('guia.index')->with(['message' => 'Eliminado exitosamente.', 'alert-type' => 'success']);
    }

    public function deleteImage($id)
    {
        // return $id;
        IndexImage::where('id', $id)->update(['status'=>0]);
        return redirect()->route('voyager.dashboard')->with(['message' => 'Eliminado exitosamente.', 'alert-type' => 'success']);
    }


    // =======================================

    public function store_image($file, $folder, $size = 512){
        try {
            Storage::makeDirectory($folder.'/'.date('F').date('Y'));
            $base_name = Str::random(20);

            // imagen normal
            $filename = $base_name.'.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path =  $folder.'/'.date('F').date('Y').'/'.$filename;
            $image_resize->save(public_path('../storage/app/public/'.$path));

            // imagen cuadrada
            $filename_small = $base_name.'-cropped.'.$file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath())->orientate();
            $image_resize->resize(null, 256, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->resizeCanvas(256, 256);
            $path_small = "$folder/".date('F').date('Y').'/'.$filename_small;
            $image_resize->save(public_path('../storage/app/public/'.$path_small));

            return $path;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
