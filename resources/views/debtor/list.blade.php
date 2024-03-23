<div class="col-md-12">
    <div class="table-responsive">
        @php
            $months = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');    
        @endphp
        <table id="dataStyle" class="table table-bordered table-hover">
            <thead>
                <tr>
                    {{-- <th>N°</th> --}}
                    <th style="text-align: center">Codigo</th>
                    <th style="text-align: center">Servicio ID</th>    
                    <th style="text-align: center">Detalle</th>    
                    <th style="text-align: center">Monto</th>    
                    <th style="text-align: center">Mes</th>    
                    <th style="text-align: center">Año</th>      
                    <th style="text-align: center">Estado</th>
                    <th style="text-align: center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i =1;
                @endphp
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td style="text-align: center">{{ $item->service_id}}</td>
                        <td>{{ $item->details}}</td>
                        <td style="text-align: right">{{ $item->amount}}</td>
                        <td style="text-align: center">{{ $months[$item->month-1]}}</td>
                        <td style="text-align: center">{{ $item->year}}</td>
                        <td style="text-align: center">
                            @if ($item->status == 1)
                                <label class="label label-success">Pagado</label>
                            @else
                                <label class="label label-danger">No pagado</label>
                            @endif
                        </td>

                        <td style="text-align: right">
                            <div class="no-sort no-click bread-actions text-right">   
                                <a href="{{route('voyager.debtors.show',['id'=>$item->id])}}" title="Ver" class="btn btn-sm btn-warning">
                                    <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                </a>  
                                <a href="{{route('voyager.debtors.edit',['id'=>$item->id])}}" title="Editar" class="btn btn-sm btn-primary">
                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                                </a>                             
                                <button title="Anular" class="btn btn-sm btn-danger delete" data-toggle="modal" data-id="{{$item->id}}" data-target="#myModalEliminar">
                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Anular</span>
                                </button>                                
                            </div>
                        </td>  
                    </tr>
                    @php
                        $i++;
                    @endphp
                @empty
                    <tr style="text-align: center">
                        <td colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4" style="overflow-x:auto">
        @if(count($data)>0)
            <p class="text-muted">Mostrando del {{$data->firstItem()}} al {{$data->lastItem()}} de {{$data->total()}} registros.</p>
        @endif
    </div>
    <div class="col-md-8" style="overflow-x:auto">
        <nav class="text-right">
            {{ $data->links() }}
        </nav>
    </div>
</div>

<script>
   
   var page = "{{ request('page') }}";
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                list(page);
            }
        });
    });
</script>