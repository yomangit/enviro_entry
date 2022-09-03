<table>
    <thead>
        <tr>

            <th>Quality Standard</th>
            <th> Engine </th>
            <th> Fuel Type </th>
            <th> Capacity </th>
            <th> Ambient Temperature </th>
            <th> Stack Temperature </th>
            <th> Meter Temperature </th>
            <th> Moisture Content </th>
            <th> Actual Volume Sample </th>
            <th> Standard Volume sample </th>
            <th> Actual Oxygen, O2 </th>
            <th> Velocity Linear </th>
            <th> Dry Molecular Weight </th>
            <th> Actual Stack Flowrate </th>
            <th> Percent of Isokinetic </th>
            <th> Total Particulate (isokinetic) </th>
            <th> Sulfur Dioxide (SO2) </th>
            <th> Nitrogen Dioxide (NO2)</th>
            <th> Nitrogen Oxide (NOX) as Nitrogen Dioxide (NO2) </th>
            <th> Carbon Monoxide (CO) </th>
            <th> Carbon Dioxide (CO2) </th>
            <th> Opacity </th>
            <th> Total Particulate (isokinetic) </th>
            <th> Sulfur Dioxide (SO2) </th>
            <th> Nitrogen Dioxide (NO2) </th>
            <th> Nitrogen Oxide (NOX) as Nitrogen Dioxide (NO2) </th>
            <th> Carbon Monoxide (CO) </th>

        </tr>
    </thead>
    <tbody>

        @foreach ($QualityStandard as $standard)
        <tr>
            <td>{{$standard->nama}}</td>
            <td>{{$standard->engine}}</td>
            <td>{{$standard->fuel_type}}</td>
            <td>{{$standard->capacity}}</td>
            <td>{{$standard->ambient_temperature}}</td>
            <td>{{$standard->stack_temperature}}</td>
            <td>{{$standard->meter_temperature}}</td>
            <td>{{$standard->moisture_content}}</td>
            <td>{{$standard->actual_volume_sample}}</td>
            <td>{{$standard->standard_volume_sample}}</td>
            <td>{{$standard->actual_oxygen_o2}}</td>
            <td>{{$standard->velocity_linear}}</td>
            <td>{{$standard->dry_molecular_weight}}</td>
            <td>{{$standard->actual_stack_flowrate}}</td>
            <td>{{$standard->percent_of_isokinetic}}</td>
            <td>{{$standard->total_particulate_isokinetic_actual}}</td>
            <td>{{$standard->sulfur_dioxide_so2_actual}}</td>
            <td>{{$standard->nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual}}</td>
            <td>{{$standard->nitrogen_oxide_nox_actual}}</td>
            <td>{{$standard->carbon_monoxide_co_actual}}</td>
            <td>{{$standard->carbon_dioxide_co}}</td>
            <td>{{$standard->opacity}}</td>
            <td>{{$standard->total_particulate_isokinetic}}</td>
            <td>{{$standard->sulfur_dioxide_so2}}</td>
            <td>{{$standard->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
            <td>{{$standard->nitrogen_oxide_nox}}</td>
            <td>{{$standard->carbon_monoxide_co}}</td>
        </tr>
        @endforeach

    </tbody>

</table>