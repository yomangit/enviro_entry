<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lokasi</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($PointID as $item)
        <tr> 
            <td>{{ $item->  nama }}</td>
            <td>{{ $item->  lokasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>