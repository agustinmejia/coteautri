@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">

            <a title="Aprobar prestamo" class="btn btn-sm btn-dark" onclick="download_log()" data-toggle="modal" data-target="#success-modal">
                <i class="fa-solid fa-money-check-dollar"></i><span class="hidden-xs hidden-sm"> Aprobar Prestamos</span>
            </a>

            <a onclick="download()" title="Abonar Pago"  class="btn btn-sm btn-success">
                <i class="voyager-dollar"></i><span class="hidden-xs hidden-sm"> hola</span>
            </a>

            <a href="#" title="Abonar Pago"  class="btn btn-sm btn-success">
                <i class="voyager-dollar"></i><span class="hidden-xs hidden-sm"> hola</span>
            </a>

            <a href="#" title="Abonar Pago"  class="btn btn-sm btn-success">
                <i class="voyager-dollar"></i><span class="hidden-xs hidden-sm"> hola</span>
            </a>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            // alert(12)
        });

        function download_log()
        {
            alert(1)
        }
    </script>
    

@stop
