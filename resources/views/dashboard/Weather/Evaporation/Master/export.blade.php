<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Point Id</th>
            <th>Time Observation</th>
            <th>Day Rainfall (X) mm</th>
            <th>Initial Water Elevation(Po)</th>
            <th>Final Water Elevation (P1)</th>
            <th>Evaporasi (Eo)=(Po-P1)+X mm</th>
            <th>Evaporation</th>
            <th>Volume water added</th>
            <th>Initial Volume (V1)</th>
            <th>Final Volume (V2)</th>
            <th>V1-V2</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;

        $evaporation=0;$volume=0;$initial_v1=0;$final_v2=0;
        @endphp
        @foreach ($Evaporation as $code)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ date('d-m-Y', strtotime( $code->date)) }}</td>
            <td>{{ $code->PointId->nama }}</td>
            <td>{{ $code->time_observation }}</td>
            <td>{{ $code->day_rainfall }}</td>
            <td>{{ $code->initial_water_elevation }}</td>
            <td>{{ $code->final_water_elevation }}</td>
            <td>{{$evaporation= $code->initial_water_elevation - $code->final_water_elevation + $code->day_rainfall}}</td>
            @php
            if ($evaporation>0) {
            $evaporation;
            }
            elseif ($evaporation<0) { $evaporation=0; } @endphp 
            <td>{{$evaporation}}</td>
            <td>{{ $code->initial_water_elevation - $code->final_water_elevation }}</td>
            <td>{{ number_format($initial_v1= 3.14*60*60* doubleval($code->initial_water_elevation)) }}</td>
            <td>{{number_format($final_v2= 3.14*60*60* doubleval($code->final_water_elevation)) }}</td>
            <td>{{ number_format(abs($final_v2 - $initial_v1))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>