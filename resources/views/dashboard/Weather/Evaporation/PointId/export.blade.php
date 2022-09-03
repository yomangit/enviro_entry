<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Codes as $code)
        <tr>
            <td>{{ $code->nama }}</td>
            <td>{{ $code->lokasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>