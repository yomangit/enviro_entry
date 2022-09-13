<table>
    <thead>
        <tr>
            <th>Code Sample</th>
            <th>
                <div style="width: 65px"> Date</div>
            </th>
            <th>Start Time</th>
            <th>Stop Time</th>
            <th>TSS Standard</th>
            <th>TSS (mg/L)</th>
            <th>PH Standard Max.</th>
            <th>PH Standard Min.</th>
            <th>PH</th>
            <th>DO Standard</th>
            <th>DO</th>
            <th>Redox Standard</th>
            <th>Redox(mEV)</th>
            <th>Conductivity Standard</th>
            <th>Conductivity (uS/cm)</th>
            <th>TDS Standard</th>
            <th>TDS (mg/L)</th>
            <th>Temperatur Standard</th>
            <th>Temperatur </th>
            <th>Salinity (ppt)</th>
            <th>Turbidity (NTU)</th>
            <th>Cyanide</th>
            <th>Level GB(m)</th>
            <th>Level Loger (m)</th>
            <th>Debit (m<sup>3</sup>/<sub>s</sub>)</th>
            <th>Debit (m<sup>3</sup>/<sub>day</sub>)</th>
            <th>Water Condition</th>
            <th>
                <div style="width: 65px">water Color</div>
            </th>
            <th>Odor</th>
            <th>Rain Before Sampling</th>
            <th>Rain During Sampling</th>
            <th>Oil Layer</th>
            <th>
                <div style="width:90px"></div>Sorce of Pollution

            </th>
            <th>
                <div style="width: 100px"> Sampler</div>
            </th>
            <th>
                <div style="width: 100px"> Remarks</div>
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Input as $data)
        <tr>
            <td>{{ $data->CodeSample->nama }}</td>
            <td>{{ date('d-M-Y', strtotime( $data->date)) }}</td>
            <td>{{$data->start_time}}</td>         
            <td>{{$data->stop_time}}</td>         
            <td>{{ $data->standard->tss }}</td>
            <td>{{$data->tss}}</td>
            <td>{{ $data->standard->ph_max }}</td>
            <td>{{ $data->standard->ph_min }}</td>
            <td>{{$data->ph}}</td>
            <td>{{ $data->standard->do }}</td>
            <td>{{$data->do}}</td>
            <td>{{ $data->standard->redox }}</td>
            <td>{{$data->orp}}</td>
            <td>{{ $data->standard->conductivity }}</td>
            <td>{{$data->conductivity}}</td>
            <td>{{ $data->standard->tds }}</td>
            <td>{{$data->tds}}</td>
            <td>{{ $data->standard->temperatur }}</td>
            <td>{{ $data->temperatur }}<sup>0</sup>C</td>
            <td>{{ $data->salinity }}</td>
            <td>{{ $data->turbidity }}</td>
            <td>{{ $data->cyanide }}</td>
            <td>{{ $data->level }}</td>
            <td>{{ $data->lvl_lgr }}</td>
            <td>{{ $data->debit_s }}</td>
            <td>{{ $data->debit_d }}</td>
            <td>{{ $data->water_condition }}</td>
            <td>{{ $data->water_color }}</td>
            <td>{{ $data->odor }}</td>
            <td>{{ $data->rain }}</td>
            <td>{{ $data->rain_during_sampling }}</td>
            <td>{{ $data->oil_layer }}</td>
            <td>{{ $data->source_pollution }}</td>
            <td>{{ $data->sampler }}</td>
            <td>{{ $data->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>