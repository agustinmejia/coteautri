@extends('voyager::master')

@section('page_title', 'Viendo Telefonia')

@if (auth()->user()->hasPermission('browse_debtors'))


@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body" style="padding: 0px">
                        <div class="col-md-8" style="padding: 0px">
                            <h1 class="page-title">
                                <i class="fa-solid fa-file"></i> Consultas de Deudas
                            </h1>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('voyager.debtors.create') }}" class="btn btn-success btn-add-new">
                                    <i class="voyager-plus"></i> <span>Crear</span>
                                </a>
                            @endif
                        </div>
                        
                        @if(auth()->user()->hasRole('admin'))
                            <form name="form_search" id="form-search" action="{{ route('debtor.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4 text-right" style="margin-top: 10px">
                                    <input type="file" name="file" class=form-control required>
                                    <button type="submit" class="btn btn-success">Importar</button>

                                </div>                        
                            </form>
                        @endif
                        @if(auth()->user()->hasRole('admin'))
                            <form name="form_search" id="form-search" action="{{ route('debtor.export') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4 text-right" style="margin-top: 10px">
                                   
                                    <button type="submit" class="btn btn-primary">Exportar</button>

                                </div>                        
                            </form>
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @php
                            $months = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');    
                        @endphp
                        @if(!auth()->user()->hasRole('admin') && auth()->user()->hasRole('user'))
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 id="h4" class="panel-title">CI</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        <small>{{$user->ci}}</small>
                                    </div>
                                    <hr style="margin:0;">
                                </div>
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 id="h4" class="panel-title">Nombre Completo</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        <small>{{$user->first_name}} {{$user->last_name}}</small>
                                    </div>
                                    <hr style="margin:0;">
                                </div>    
                                <div class="col-md-4">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 id="h4" class="panel-title">Codigo Cliente</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        @if ($user->code)
                                            <small>{{$user->code}}</small>
                                        @else
                                            <label class="label label-danger">Porfavor solicite su codigo de cliente en las oficinas de Coteautri </label>                                                                        
                                        @endif
                                    </div>
                                    <hr style="margin:0;">
                                </div>                          
                            </div>      
                                <div class="table-responsive">
                                    {{-- <table id="dataStyle" class="table-hover">
                                        <thead>
                                            <tr>   
                                                <th width="4%" rowspan="2" style="text-align: center">Año</th>
                                                <th colspan="12" style="text-align: center">Meses</th>
                                            </tr>
                                            <tr>
                                                @foreach ($months as $item)
                                                    <th width="8%" style="text-align: center">{{$item}}
                                                        
                                                    </th> 
                                                @endforeach
                                            </tr>                                           
                                        </thead>
                                        <tbody>
                                            @if (count($debt)>0)
                                                @foreach ($year as $y)
                                                    <tr>
                                                        <th style="text-align: center">{{$y->year}}</th>
                                                        @for ($i = 1; $i <= count($months); $i++)
                                                            @php
                                                                $ok=true;
                                                            @endphp
                                                            @foreach ($mes as $m)                                                            
                                                                @if ($y->year == $m->year && $i==$m->month)
                                                                    @php
                                                                        $ok=false;
                                                                    @endphp
                                                                    <td style="text-align: center">Bs. {{$m->monto}}
                                                                        <br>
                                                                        <a title="Detalle del mes {{$months[$i-1]}}" class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#show-modal"
                                                                            data-mes="{{$months[$i-1]}}"
                                                                            data-mes_id="{{$m->month}}"
                                                                            data-ano="{{$y->year}}"
                                                                        >
                                                                            <i class="fa-solid fa-eye"></i><span class="hidden-xs hidden-sm"> Ver</span>
                                                                        </a>
                                                                    </td>                                                                    
                                                                @endif
                                                            @endforeach      
                                                            @if ($ok)
                                                                <td style="text-align: center"></td>      
                                                            @endif                                                      
                                                        @endfor        
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr style="text-align: center">
                                                    <td colspan="13">No se encontraron registros.</td>
                                                </tr>
                                            @endif
                                                                                                                   
                                        </tbody>
                                    </table> --}}
                                    <table id="dataStyle" style="margin-left:auto;margin-right:auto;" class="table-hover">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">Mes</th>    
                                                <th style="text-align: center">Año</th>       
                                                <th style="text-align: center">Deuda</th>       
                                                <th width="10px" style="text-align: center">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @forelse ($mes as $item)
                                                @php
                                                    $debt =\DB::table('debtors')->where('code',$user->code)->where('month', $item->month)->where('year', $item->year)->where('deleted_at', null)
                                                        ->where('status', 0)->select('amount')->sum('amount');
                                                        // dd($debt);
                                                @endphp
                                                <tr>
                                                    <td style="text-align: center">{{$months[$item->month-1]}}</td>
                                                    <td style="text-align: center">{{ $item->year}}</td>
                                                    <td style="text-align: right"><small>Bs. {{ $debt}}</small></td>
                                                    <td style="text-align: center">
                                                        <a title="Detalle del mes {{$months[$item->month-1]}}" class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#show-modal"
                                                                            data-mes="{{$months[$item->month-1]}}"
                                                                            data-mes_id="{{$item->month}}"
                                                                            data-ano="{{$item->year}}"
                                                        >
                                                            <i class="fa-solid fa-eye"></i><span class="hidden-xs hidden-sm"> Ver</span>
                                                        </a>
                                                    </td>                        
                                                </tr>
                                            @empty
                                                <tr style="text-align: center">
                                                    <td colspan="3" class="dataTables_empty">No hay datos disponibles en la tabla</td>
                                                </tr>
                                            @endforelse                                                                             
                                        </tbody>
                                    </table>
                                </div>
                        @endif
                        @if(auth()->user()->hasRole('admin'))
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="dataTables_length" id="dataTable_length">
                                        <label>Mostrar <select id="select-paginate" class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> registros</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" id="input-search" class="form-control">
                                </div>
                            </div>
                            <div class="row" id="div-results" style="min-height: 120px"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(!auth()->user()->hasRole('admin') && auth()->user()->hasRole('user'))

        <div class="modal modal-info fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="show-modal" role="dialog">
            <div class="modal-dialog modal-lg modal-dark">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa-solid fa-list"></i> Detalles</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6" style="margin-bottom:0;">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Mes</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-mes">Value</p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            <div class="col-md-6" style="margin-bottom:0;">
                                <div class="panel-heading" style="border-bottom:0;">
                                    <h3 class="panel-title">Año</h3>
                                </div>
                                <div class="panel-body" style="padding-top:0;">
                                    <p id="label-ano">Value</p>
                                </div>
                                <hr style="margin:0;">
                            </div>
                            
                            <div class="col-md-12">
                                <table id="dataStyle1" class="table table-bordered table-hover detalle">
                                    <thead>
                                        <tr>
                                            <th width="5px" >N&deg;</th>
                                            <th style="text-align: center">DETALLE</th>
                                            <th width="150px" style="text-align: center">ESTADO</th>
                                            <th width="150px" style="text-align: center">MONTO</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form name="form_search" id="form-search" action="{{ route('debtor.delete') }}" method="post" >
        @csrf
        <div class="modal modal-danger fade" tabindex="-1" id="myModalEliminar" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> Eliminar?</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">

                        <div class="text-center" style="text-transform:uppercase">
                            <i class="voyager-trash" style="color: red; font-size: 5em;"></i>
                            <br>
                            
                            <p><b>Desea eliminar el siguiente registro?</b></p>
                        </div>
                    </div>                
                    <div class="modal-footer">
                        
                            <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                        
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
  



 
@stop

@section('css')

@if (!auth()->user()->hasRole('admin') && auth()->user()->hasRole('user'))
    <style>
        #dataStyle {
            width: 50% !important;
        }
    </style>
@endif
<style>    
    small{font-size: 12px;
        color: rgb(12, 12, 12);
        font-weight: bold;
    }

    /* LOADER 3 */
    
    #loader-3:before, #loader-3:after{
      content: "";
      width: 20px;
      height: 20px;
      position: absolute;
      top: 0;
      left: calc(50% - 10px);
      background-color: #5eaf4a;
      animation: squaremove 1s ease-in-out infinite;
    }
    
    #loader-3:after{
      bottom: 0;
      animation-delay: 0.5s;
    }
    
    @keyframes squaremove{
      0%, 100%{
        -webkit-transform: translate(0,0) rotate(0);
        -ms-transform: translate(0,0) rotate(0);
        -o-transform: translate(0,0) rotate(0);
        transform: translate(0,0) rotate(0);
      }
    
      25%{
        -webkit-transform: translate(40px,40px) rotate(45deg);
        -ms-transform: translate(40px,40px) rotate(45deg);
        -o-transform: translate(40px,40px) rotate(45deg);
        transform: translate(40px,40px) rotate(45deg);
      }
    
      50%{
        -webkit-transform: translate(0px,80px) rotate(0deg);
        -ms-transform: translate(0px,80px) rotate(0deg);
        -o-transform: translate(0px,80px) rotate(0deg);
        transform: translate(0px,80px) rotate(0deg);
      }
    
      75%{
        -webkit-transform: translate(-40px,40px) rotate(45deg);
        -ms-transform: translate(-40px,40px) rotate(45deg);
        -o-transform: translate(-40px,40px) rotate(45deg);
        transform: translate(-40px,40px) rotate(45deg);
      }
    }
    
    
    </style>
@stop

@section('javascript')
    {{-- <script src="{{ url('js/main.js') }}"></script> --}}
        
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    @if (!auth()->user()->hasRole('admin') && auth()->user()->hasRole('user'))
        <script>
            $('#show-modal').on('show.bs.modal', function (event)
            {
                var code = {{$user->code}};
                var button = $(event.relatedTarget);

                var mes = button.data('mes');
                var mes_id = button.data('mes_id');
                var ano = button.data('ano');

                var modal = $(this);

                modal.find('.modal-body #label-mes').text(mes);
                modal.find('.modal-body #label-ano').text(ano);

                $('.detalle tbody').empty();
                // alert(code)
                $.get('{{url('admin/debtor/ajax/detalle')}}/'+code+'/'+mes_id+'/'+ano, function(data){
                    // alert(data)
                    var total =0;
                    for (var i=0; i<data.length; i++) {

                        $('.detalle tbody').append(`
                            <tr>
                                <td><small>${i+1}</small></td>
                                <td><small>${data[i].details}</small></td>
                                <td class="text-center"><label class="label ${data[i].status==1?'label-success':'label-danger'}">${data[i].status==1?'Pagado':'No pagado'}</label></td>  
                                <td class="text-right"><small>Bs. ${data[i].amount}</small></td>                              
                            </tr>
                        `);
                        total=parseFloat(total)+parseFloat(data[i].amount);
                    }
                    if(data == '')
                    {
                        $('.detalle tbody').append(`
                            <tr style="text-align: center">
                                <td colspan="4">No se encontraron articulos.</td>
                            </tr>
                        `);
                    }
                    else
                    {
                        $('.detalle tbody').append(`
                            <tr>
                                <td colspan="3"><small>Total</small></td>
                                <td class="text-right"><small>Bs. ${total}</small></td>                              
                            </tr>
                        `);
                    }
                });

                      
            })
        </script>
    @endif
    <script>
        var countPage = 10, order = 'id', typeOrder = 'desc';
        $(document).ready(() => {
            list();
            
            $('#input-search').on('keyup', function(e){
                if(e.keyCode == 13) {
                    list();
                }
            });

            $('#select-paginate').change(function(){
                countPage = $(this).val();
               
                list();
            });
        });

        function list(page = 1){
            // $('#div-results').loading({message: 'Cargando...'});
            var loader = '<div class="col-md-12 bg"><div class="loader" id="loader-3"></div></div>'
            $('#div-results').html(loader);

            let url = '{{ url("admin/debtor/ajax/list") }}';
            let search = $('#input-search').val() ? $('#input-search').val() : '';

            $.ajax({
                url: `${url}/${search}?paginate=${countPage}&page=${page}`,
                type: 'get',
                
                success: function(result){
                    $("#div-results").html(result);
                }
            });

        }

        $('#myModalEliminar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) //captura valor del data-empresa=""

            var id = button.data('id')

            var modal = $(this)
            modal.find('.modal-body #id').val(id)                    
        });


       
    </script>
@stop

@else
    @section('content')
        {{-- @include('errors.403') --}}
        <h1>403</h1>
    @stop
@endif