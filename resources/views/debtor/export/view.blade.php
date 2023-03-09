<div style="margin-top: 20px">
    <table>
        <thead>
            
            <tr>
                <th style="text-align: center">Codigo</th>
                <th style="text-align: center">Servicio ID</th>    
                <th style="text-align: center">Detalle</th>    
                <th style="text-align: center">Monto</th>    
                <th style="text-align: center">Mes</th>    
                <th style="text-align: center">Año</th>      
                <th style="text-align: center">Estado</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->code }}</td>
            <td style="text-align: center">{{ $item->service_id}}</td>
            <td>{{ $item->details}}</td>
            <td style="text-align: right">{{ $item->amount}}</td>
            <td style="text-align: center">{{ $item->month}}</td>
            <td style="text-align: center">{{ $item->year}}</td>
            <td style="text-align: center">{{$item->status}}
            </td>
        </tr>
        @empty
            <tr style="text-align: center">
                <td colspan="7">No se encontraron registros.</td>
            </tr>
        @endforelse
        </tbody>
    
    </table>
</div>
