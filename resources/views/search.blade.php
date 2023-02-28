<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataStyle" class="table table-bordered table-hover">
            @if ($op==1)
                <thead>
                    <tr>
                        <th>Telefono</th>
                        <th>Nombre completo</th>    
                    </tr>
                </thead>
                <tbody style='background-color:#f1efef;'>
                    @php
                        $i =1;
                    @endphp
                    @forelse ($data as $item)
                        <tr>
                            {{-- <td>{{ $i }}</td> --}}
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->full_name}}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @empty
                        <tr style="text-align: center">
                            <td colspan="2" class="dataTables_empty">No hay datos disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            @else
                <thead>
                    <tr>
                        <th>Nombre completo</th>    

                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody style='background-color:#f1efef;'>
                    @php
                        $i =1;
                    @endphp
                    @forelse ($data as $item)
                        <tr>
                            {{-- <td>{{ $i }}</td> --}}
                            <td>{{ $item->full_name}}</td>

                            <td>{{ $item->phone }}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @empty
                        <tr style="text-align: center">
                            <td colspan="2" class="dataTables_empty">No hay datos disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            @endif
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