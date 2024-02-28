<div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
    <div style="background-color: white; padding: 30px 20px; border-radius: 5px">
        <div class="table-responsive">
            <table id="dataStyle" class="table table-bordered table-hover">
                @if ($op==1)
                    <thead>
                        <tr>
                            <th style="text-align: center">TELEFONO</th>
                            <th style="text-align: center">NOMBRE COMPLETO</th>    
                            <th style="text-align: center">ESTADO</th>    
                        </tr>
                    </thead>
                    <tbody style='background-color:#f1efef;'>
                        @php
                            $i =1;
                        @endphp
                        @forelse ($data as $item)
                            <tr>
                                {{-- <td>{{ $i }}</td> --}}
                                <td style="text-align: center">{{ $item->phone }}</td>
                                <td>{{ $item->full_name}}</td>
                                <td style="text-align: center">{{ $item->status}}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr style="text-align: center">
                                <td colspan="3" class="dataTables_empty">No hay datos disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                @else
                    <thead>
                        <tr>
                            <th style="text-align: center">NOMBRE COMPLETO</th>    
                            <th style="text-align: center">TELEFONO</th>
                            <th style="text-align: center">ESTADO</th>    
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
    
                                <td style="text-align: center">{{ $item->phone }}</td>
                                <td style="text-align: center">{{ $item->status}}</td>
    
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr style="text-align: center">
                                <td colspan="3" class="dataTables_empty">No hay datos disponibles</td>
                            </tr>
                        @endforelse
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</div>

<div class="col-md-12">
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