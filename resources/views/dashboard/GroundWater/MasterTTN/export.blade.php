<table>
    <thead>
        <tr>
            <th>Code Sample</th>
            <th>
                <div style="width: 65px">Date</div>
            </th>
            <th>Start Time Sampling</th>
            <th>Finish Time Sampling</th>
            <th>Well</th>
            <th>Well Water</th>

            <th>H</th>
            <th>Diameter of the pipe (m)
            </th>
            <th>TT</th>
            <th>r<sup>2</sup></th>
            <th>Water Volumes (L)</th>
            <th>Temperatur</th>
            <th>pH</th>
            <th>Conductivity (Us/cm)</th>
            <th>TDS</th>
            <th>Redox</th>
            <th>Dissolved Oxigen (DO)</th>
            <th>Salinity</th>
            <th>Turbidity</th>
            <th>water Color</th>
            <th>Odor</th>
            <th>Rain Before Sampling</th>
            <th>Rain During Sampling</th>
            <th>Oil Layer</th>
            <th>Sorce of Pollution</th>
            <th>Sampler</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Groundwater as $item)
        <td>{{ $data->CodeSampleTTN->nama }}</td>
        <td>{{ date('d-m-Y',strtotime($data->date)) }}</td>
        <td>{{ $data->start_time }}</td>
        <td>{{ $data->stop_time }}</td>
        <td>{{ $data->well }}</td>
        <td>{{ $data->well_water }}</td>
        <td>{{ $data->h }}</td>
        <td>{{ $data->tablestandard->d_pipe }}</td>
        <td>{{ $data->tablestandard->tt }}</td>
        <td>{{ $data->tablestandard->r }}</td>
        <td>{{ $data->water_volume }}</td>
        <td>{{ $data->temperatur }}</td>
        <td>{{ $data->ph }}</td>
        <td>{{ $data->conductivity }}</td>
        <td>{{ $data->tds }}</td>
        <td>{{ $data->redox }}</td>
        <td>{{ $data->do }}</td>
        <td>{{ $data->salinity }}</td>
        <td>{{ $data->turbidity }}</td>
        <td>{{ $data->water_color }}</td>
        <td>{{ $data->odor }}</td>
        <td>{{ $data->rain }}</td>
        <td>{{ $data->rain_during_sampling }}</td>
        <td>{{ $data->oil_layer }}</td>
        <td>{{ $data->source_pollution }}</td>
        <td>{{ $data->sampler }}</td>
        @endforeach
    </tbody>
</table>