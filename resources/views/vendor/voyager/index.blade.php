@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">

            <a href="{{ asset('pdf/GUIA.pdf') }}" target="_blank" title="Aprobar prestamo" class="btn btn-info" onclick="download_log('Guia Telefonica')" data-toggle="modal" >
                <i class="fa-solid fa-file-pdf"></i><span class="hidden-xs hidden-sm"><br> Gia Telefonica</span>
            </a>
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
