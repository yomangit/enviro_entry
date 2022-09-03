<table>
    <thead>
        <tr>
            <th>Point ID</th>
            <th>Date</th>
            <th> Sulphur Dioxide (SO2) </th>
            <th> Nitrogen Dioxide (NO2) </th>
            <th> Carbon Monoxide </th>
            <th> Ozone </th>
            <th> Total Suspended Particulate (24 hours) </th>
            <th> Particulate Matter 10 </th>
            <th> Particulate Matter 2.5 </th>
            <th> Temperature (Ambient) </th>
            <th> Humidity </th>
            <th> Wind Speed </th>
            <th> Wind Direction </th>
            <th> Weather </th>
            <th> Barometric Pressure </th>
            <th> Lead (Pb) </th>
            <th> Hydrocarbon </th>
        </tr>
    </thead>
    <tbody>
        @foreach($Ambien as $item)
        <tr>
            <td>{{ $item->PointId->nama }}</td>
            <td>{{ date('d-M-Y',strtotime($item->date))  }}</td>
            <td>{{ $item->  sulphur_dioxide_so2 }}</td>
            <td>{{ $item->  nitrogen_dioxide_no2    }}</td>
            <td>{{ $item->  carbon_monoxide }}</td>
            <td>{{ $item->  ozone   }}</td>
            <td>{{ $item->  total_suspended_particulate_24_hours    }}</td>
            <td>{{ $item->  particulate_matter_10   }}</td>
            <td>{{ $item->  particulate_matter_2_5  }}</td>
            <td>{{ $item->  temperature_ambient }}</td>
            <td>{{ $item->  humidity    }}</td>
            <td>{{ $item->  wind_speed  }}</td>
            <td>{{ $item->  wind_direction  }}</td>
            <td>{{ $item->  weather }}</td>
            <td>{{ $item->  barometric_pressure }}</td>
            <td>{{ $item->  lead_pb }}</td>
            <td>{{ $item->  hydrocarbon }}</td>
        </tr>
        @endforeach
    </tbody>
</table>