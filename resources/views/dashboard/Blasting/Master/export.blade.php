<table>
    <thead>
        <tr>
           
            <th>Point ID</th>
            <th>Frequency Standard</th>
            <th>PPV Standard</th>
            <th>Noise Level Standard</th>
            <th>
                <div style="width: 50px">Date</div>
            </th>
            <th>
                <div style="width: 50px">Time</div>
            </th>
            <th>Transversal Freq</th>
            <th>Vertical Freq</th>
            <th>Longitudinal Freq</th>
            <th>Transversal PPV</th>
            <th>Vertical PPV</th>
            <th>Longitudinal PPV</th>
            <th>Peak Vektor</th>
            <th>Noise Level</th>
            <th>Blast Location</th>
            <th>Weather</th>
            <th>Sampler</th>
            <th>Remarks</th>

        </tr>
    </thead>
    <tbody>
        @foreach($Blasting as $blast)
        <tr>
            <td>{{ $blast->PointID->nama }}</td>
            <td>{{$blast->StandardID->frequency}}</td>
            <td>{{$blast->StandardID->ppv}}</td>
            <td>{{$blast->StandardID->noise_level}}</td>
            <td>{{ date('d-M-Y',strtotime($blast->date)) }}
            </td>
            <td>{{ $blast->time }}</td>
            <td>{{ $blast->transversal_freq }}</td>
            <td>{{ $blast->vertical_freq }}</td>
            <td>{{ $blast->longitudinal_freq }}</td>
            <td>{{ $blast->transversal_ppv }}</td>
            <td>{{ $blast->vertical_ppv }}</td>
            <td>{{ $blast->longitudinal_ppv }}</td>
            <td>{{ $blast->peak_vektor }}</td>
            <td>{{ $blast->noise_level }}</td>
            <td>{{ $blast->blast_location }}</td>
            <td>{{ $blast->weather }}</td>
            <td>{{ $blast->sampler }}</td>
            <td>{{ $blast->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>