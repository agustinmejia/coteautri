
<div class="col-md-12 text-right">

    {{-- <button type="button" onclick="report_excel()" class="btn btn-success"><i class="fa-solid fa-file-excel"></i> Excel</button> --}}
    <button type="button" onclick="report_print()" class="btn btn-dark"><i class="glyphicon glyphicon-print"></i> Imprimir</button>

</div>
<div class="col-md-12">
<div class="panel panel-bordered">
    <div class="panel-body">
        <div class="table-responsive">
            <table id="dataStyle" style="width:100%"  class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th style="width:5px">N&deg;</th>
                        <th style="text-align: center">CI</th>
                        <th style="text-align: center">USUARIO</th>
                        <th style="text-align: center">EMAIL</th>
                        <th style="text-align: center">IP</th>
                        <th style="text-align: center">AGENTE</th>
                        <th style="text-align: center">FECHA</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        $total = 0;
                    @endphp
                    @forelse ($data as $item)
                            @php
                                    $aux =  \App\Models\People::with(['user'])->where('user_id',$item->authenticatable_id)->first();
                                    // dump($aux);
                            @endphp
                        <tr>
                            <td>{{ $count }}</td>
                            
                            <td style="text-align: left">{{ $aux?$aux->ci:''}}</td>
                            <td style="text-align: left">{{ $aux?$aux->first_name.' '.$aux->last_name:''}}</td>
                            <td style="text-align: left">{{ \App\Models\User::where('id', $item->authenticatable_id)->first()->email}}</td>
                            <td style="text-align: left">{{ $item->ip_address}}</td>
                            <td style="text-align: left">{{ $item->user_agent}}</td>
                            <td style="text-align: center">{{date('d/m/Y H:m:s', strtotime($item->login_at))}}</td>
                                                                                  
                            
                        </tr>
                        @php
                            $count++;                           
                        @endphp
                        
                    @empty
                        <tr style="text-align: center">
                            <td colspan="7">No se encontraron registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){

})
</script>