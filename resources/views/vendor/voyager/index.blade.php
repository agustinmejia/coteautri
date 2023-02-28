@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">
            <div class="row" style="text-align: center">
                <div class="col-md-4" >
                    <a href="{{ asset('pdf/GUIA.pdf') }}" target="_blank" title="Descargar Guia" class="btn" onclick="download_log('Guia Telefonica')" style="margin-top: 1em; border-radius: 20px; height:300px; width: 250px; background-color: #08acf2; color:#ffffff; font-size: 30px" data-toggle="modal" >
                        <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 4em;"></i><span class="hidden-xs hidden-sm"><br> Gia <br> Telefonica</span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ asset('pdf/GUIA.pdf') }}" target="_blank" title="Descargar Guia" class="btn" onclick="download_log('Guia Telefonica')" style="margin-top: 1em; border-radius: 20px; height:300px; width: 250px; background-color: #08acf2; color:#ffffff; font-size: 30px" data-toggle="modal" >
                        <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 4em;"></i><span class="hidden-xs hidden-sm"><br> Gia <br> Telefonica</span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ asset('pdf/GUIA.pdf') }}" target="_blank" title="Descargar Guia" class="btn" onclick="download_log('Guia Telefonica')" style="margin-top: 1em; border-radius: 20px; height:300px; width: 250px; background-color: #08acf2; color:#ffffff; font-size: 30px" data-toggle="modal" >
                        <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 4em;"></i><span class="hidden-xs hidden-sm"><br> Gia <br> Telefonica</span>
                    </a>
                </div>

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
    

@stop
