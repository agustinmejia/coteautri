@extends('voyager::master')

@section('content')
    <div class="page-content">
        {{-- @include('voyager::alerts')
        @include('voyager::dimmers') --}}
        
        <div class="analytics-container">
            
            @if (auth()->user()->hasRole('admin'))
                <div class="row">
                    <hr>
                    <form name="form_search" id="form-search" action="{{ route('index.image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 text-right" style="margin-top: 10px">
                            {{-- <input type="file" name="file" class="form-control imageLength" required> --}}
                            <input type="file" accept="image/jpeg,image/jpg,image/png" name="file" id="file" class="form-control text imageLength">

                            <button type="submit" class="btn btn-success">Agregar</button>    
                        </div>
                    </form>

                </div>
                <br>
            @endif
            <br><br>

        
            <div class="row" style="text-align: center">
                @php
                    $aux =  \App\Models\IndexImage::where('status',1)->get();
                @endphp
                @foreach ($aux as $item)
                    <div class="col-md-6" >
                        <img src="{{asset('storage/'.$item->image)}}" alt="" style="height:350px; width: 400px">                    

                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{route('delete.image', ['id'=>$item->id])}}" class="btn btn-danger" data-toggle="modal" style="width: 50px; height:40px">
                                <i class="fa-solid fa-trash"></i><span class="hidden-xs hidden-sm"><br></span>
                            </a>
                        @endif
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
