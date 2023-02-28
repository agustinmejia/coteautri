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
                    
                            <div class="form-group col-md-6">
                                <small>Pdf</small>
                                <input type="file" accept="application/pdf" name="file" id="file" class="form-control text imageLengthpdf">
                            </div>
                            <div class="form-group col-md-6">
                                <small>Nombre</small>
                                <input type="text" name="name" class="form-control">
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
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
                    <div class="col-md-4" >
                        <a href="{{asset('storage/'.$item->file)}}" target="_blank" title="Descargar Guia" class="btn" onclick="download_log('Guia Telefonica')" style="margin-top: 1em; border-radius: 20px; height:300px; width: 250px; background-color: #08acf2; color:#ffffff; font-size: 30px" data-toggle="modal" >
                            <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 4em;"></i><span class="hidden-xs hidden-sm"><br> {{$item->name}}</span>
                        </a>
                    </div>
                @endforeach
                

            </div>
                @if (auth()->user()->hasRole('admin'))
                    <form name="form_search" id="form-search" action="{{ route('index.image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 text-right" style="margin-top: 10px">
                            {{-- <input type="file" name="file" class="form-control imageLength" required> --}}
                            <input type="file" accept="image/jpeg,image/jpg,image/png" name="file" id="file" class="form-control text imageLength">

                            <button type="submit" class="btn btn-success">Cambiar</button>    
                        </div>
                    </form>
                    <form name="form_search" id="form-search" action="{{ route('index.image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 text-right" style="margin-top: 10px">
                           
                            <button type="submit" class="btn btn-success">Borrar</button>    
                        </div>
                    </form>
                @endif
            
            <div class="row" style="text-align: center">
                
                @php
                    $aux =  \App\Models\IndexImage::where('status',1)->first();
                @endphp

                @if ($aux)
                    <img src="{{asset('storage/'.$aux->image)}}" alt="" style="width: 100%; height: 300px">                    
                @endif
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
            $.get('{{route('download.log')}}/'+cad, function (data) {
                    // alert(data);
            });
        }
    </script>

<script>
    $(document).on('change','.imageLength',function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

            if(fileSize > 10000000){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El archivo no debe superar los 10 MB!'
                })
                this.value = '';
                this.files[0].name = '';
            }
            var ext = fileName.split('.').pop();
            ext = ext.toLowerCase();
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                case 'png': break;
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
    

    $(document).on('change','.imageLengthpdf',function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

            if(fileSize > 10000000){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El archivo no debe superar los 10 MB!'
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
