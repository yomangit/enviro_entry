
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Point Id</th>
            <th>Rainfall</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Rainfall as $code)
            
       
        <tr>
            <td>{{ date('d-m-Y', strtotime( $code->date)) }}</td>
            <td>{{ $code->PointId->nama }}</td>
            <td>{{ floatval($code->rainfall) }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4">Total Rain Fall /Month</th>
            <th>{{$avg_rainfall}}</th>
        </tr>
        <tr>
            <th colspan="4">Year to Date</th>
            <th>{{$avg_year}}</th>
        </tr>
        <tr>
            <th colspan="4">Max. Daily Rainfall</th>
            <th>{{$max_rainfall}}</th>
        </tr>
        <tr>
            <th colspan="4">Total Rain days</th>
            <th>{{$rainday}}</th>
        </tr>
        <tr>
            <th colspan="4">Total Wet days</th>
            <th>{{$wetday}}</th>
        </tr>
    </tbody>
</table>