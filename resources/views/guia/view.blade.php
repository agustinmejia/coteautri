@extends('voyager::master')

@section('content')
    <div class="page-content">
        {{-- @include('voyager::alerts')
        @include('voyager::dimmers') --}}
        
        <div class="analytics-container">
            @if (auth()->user()->hasRole('admin'))
                <div class="row">
                    <form name="form_search" id="form-search" action="{{ route('index.pdf') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                            <div class="form-group col-md-3">
                                <b>Pdf</b>
                                <input type="file" accept="application/pdf" name="file" id="file" class="form-control text imageLengthpdf" required>
                            </div>
                            <div class="form-group col-md-4">
                                <b>Nombre</b>
                                <input type="text" name="name" placeholder="Ingrese el nombre del archivo" maxlength="50" class="form-control" required>
                            </div>
                            <div class="form-group col-md-5">
                                <b>URL</b>
                                <input type="text" name="url" placeholder="Ingrese su url para ver el contenido" class="form-control">
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                     
                </form>

                </div>

            @endif

        
            <div class="row" style="text-align: center">
                @php
                    $pdf =  \App\Models\IndexPdf::where('status',1)->get();
                @endphp
                @foreach ($pdf as $item)
                    <div class="col-md-4" style="text-align: center">
                        {{-- <a  target="_blank" title="Descargar" class="btn" onclick="download_log('{{$item->name}}')" style=" margin-top: 1em; border-radius: 20px; height:200px; width: 250px; background-color: #08acf2; color:#ffffff; " data-toggle="modal" >
                            <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 6em;"></i> <br>
                            <p style="font-size: 20px">{{$item->name}}</p>
                        </a> --}}
                        <div class="col-md-2"></div>
                        <div @if(auth()->user()->hasRole('admin')) class="col-md-8" @else class="col-md-8" @endif style="background-color: #08acf2; margin-top: 1em; border-radius: 20px; height:350px">
                            <br>
                            <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 6em;"></i>
                            <p style="font-size: 22px; color: #ffffff;">{{$item->name}}</p>
                            
                            <a href="{{asset('storage/'.$item->file)}}" download="{{$item->name}}.pdf"  title="Descargar" onclick="download_log('{{$item->name}}')" class="btn btn-success">
                                <i class="fa-solid fa-download"></i><span class="hidden-xs hidden-sm">Descargar</span>
                            </a>

                            @if ($item->url)
                                <a href="{{$item->url}}" target="_blank" class="btn btn-dark" data-toggle="modal">
                                    <i class="fa-solid fa-eye"></i><span class="hidden-xs hidden-sm"> Ver</span>
                                </a>
                            @endif

                        </div>
                        <div class="col-md-2">
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{route('delete.pdf', ['id'=>$item->id])}}" class="btn btn-danger" data-toggle="modal" style="width: 50px; height:40px">
                                    <i class="fa-solid fa-trash"></i><span class="hidden-xs hidden-sm"><br></span>
                                </a>
                            @endif
                        </div>

                        
                    </div>
                @endforeach
                

            </div>
            
            
            
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            // alert(12)
        });

        function download_log(cad)
        {
            // alert(cad)
            console.log('{{route('download.log')}}/'+cad)
            $.get('{{route('download.log')}}/'+cad, function (data) {
                    // alert(data);
            });
        }
    </script>

<script>   

    $(document).on('change','.imageLengthpdf',function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

            if(fileSize > 100000000){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El archivo no debe superar los 100 MB!'
                })
                this.value = '';
                this.files[0].name = '';
            }
            var ext = fileName.split('.').pop();
            ext = ext.toLowerCase();
            switch (ext) {
                case 'pdf': break;
                default:
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El archivo no tiene la extensión adecuada!'
                    })
                    this.value = ''; // reset del valor
                    this.files[0].name = '';
            }
    });
</script>
    

@stop
