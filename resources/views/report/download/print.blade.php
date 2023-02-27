@extends('layouts.template-print-alt')

@section('page_title', 'Reporte')

@section('content')
    @php
        $months = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');    
    @endphp

    <table width="100%">
        <tr>
            <td style="width: 20%"><img src="{{ asset('img/icon.png') }}" alt="CAPRESI" width="70px"></td>
            <td style="text-align: center;  width:50%">
                <h3 style="margin-bottom: 0px; margin-top: 5px">
                    COTEAUTRI<br>
                </h3>
                <h4 style="margin-bottom: 0px; margin-top: 5px">
                    REPORTE DETALLADO DE DESCARGAR
                    {{-- Stock Disponible {{date('d/m/Y', strtotime($start))}} Hasta {{date('d/m/Y', strtotime($finish))}} --}}
                </h4>
                <small style="margin-bottom: 0px; margin-top: 5px; font-size: 10px">
                        {{ date('d', strtotime($start)) }} DE {{ strtoupper($months[intval(date('m', strtotime($start)))] )}} DE {{ date('Y', strtotime($start)) }} AL
                        {{ date('d', strtotime($finish)) }} DE {{ strtoupper($months[intval(date('m', strtotime($finish)))] )}} DE {{ date('Y', strtotime($finish)) }}
                </small>
               
            </td>
            <td style="text-align: right; width:30%">
                <h3 style="margin-bottom: 0px; margin-top: 5px">
                    
                    <small style="font-size: 15px; font-weight: 100">Impreso por: {{ Auth::user()->name }} {{ date('d/M/Y H:i:s') }}</small>
                </h3>
            </td>
        </tr>
    </table>
    <table style="width: 100%; font-size: 8px" border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th style="width:5px">N&deg;</th>
                <th style="text-align: center">TIPO</th>
                <th style="text-align: center">USUARIO</th>
                <th style="text-align: center">EMAIL</th>
                <th style="text-align: center">ROLE</th>
                <th style="text-align: center">IP</th>
                <th style="text-align: center">AGENTE</th>
                <th style="text-align: center">URL</th>
                <th style="text-align: center">FECHA</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @forelse ($data as $item)
                <tr>
                    <td>{{ $count }}</td>
                    <td style="text-align: right">{{ $item->type}}</td>
                    <td style="text-align: right">{{ $item->user}}</td>
                    <td style="text-align: right">{{ $item->email}}</td>
                    <td style="text-align: right">{{ $item->role}}</td>
                    <td style="text-align: right">{{ $item->ip_address}}</td>
                    <td style="text-align: right">{{ $item->user_agent}}</td>
                    <td style="text-align: right">{{ $item->url}}</td>
                    <td style="text-align: center">{{date('d/m/Y H:m:s', strtotime($item->created_at))}}</td>
                </tr>
                    
                @php
                    $count++;                               
                @endphp
            @empty
                <tr style="text-align: center">
                    <td colspan="9">No se encontraron registros.</td>
                </tr>
            @endforelse
        </tbody>       
       

    </table>

    <br>
    <br>
    {{-- <table width="100%" style="font-size: 9px">
        <tr>
            <td style="text-align: center">
                ______________________
                <br>
                <b>Entregado Por</b><br>
                <b>{{ Auth::user()->name }}</b><br>
                <b>CI: {{ Auth::user()->ci }}</b>
            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
                ______________________
                <br>
                <b>Recibido Por</b><br>
                <b>................................................</b><br>
                <b>CI: ........................</b>
            </td>
        </tr>
    </table> --}}
    <script>

    </script>

@endsection
@section('css')
    <style>
        table, th, td {
            border-collapse: collapse;
        }
          
    </style>
@stop
