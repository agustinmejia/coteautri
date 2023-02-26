<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataStyle" class="table table-bordered table-hover">
            <thead>
                <tr>
                    {{-- <th>N°</th> --}}
                    <th>Telefono</th>
                    <th>Nombre completo</th>    
                    <th style="text-align: center">Estado</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i =1;
                @endphp
                @forelse ($data as $item)
                    <tr>
                        {{-- <td>{{ $i }}</td> --}}
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->full_name}}</td>
                        <td style="text-align: center">
                            @if ($item->status==1)
                                <label class="label label-success">Activo</label>
                            @endif
                            @if ($item->status==0)
                                <label class="label label-warning">Inactivo</label>
                            @endif                        
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @empty
                    <tr style="text-align: center">
                        <td colspan="3" class="dataTables_empty">No hay datos disponibles en la tabla</td>
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