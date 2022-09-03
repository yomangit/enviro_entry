<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Point ID</th>
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
            <th> Nitrogen Oxide (NOX) </th>
            <th> Carbon Monoxide (CO) </th>
            <th> Carbon Dioxide (CO2) </th>
            <th> Opacity </th>
            <th> Total Particulate (isokinetic) </th>
            <th> Sulfur Dioxide (SO2) </th>
            <th> Nitrogen Dioxide (NO2) </th>
            <th> Nitrogen Oxide (NOX) </th>
            <th> Carbon Monoxide (CO) </th>
        </tr>
    </thead>
    <tbody>
        @foreach($Emission as $item)
            
        
        <tr>
            <td>{{date('d-m-Y',strtotime($item->date))}}</td>
            <td>{{$item->PointId->nama}}</td>
            <td>{{$item->engine}}</td>
            <td>{{$item->fuel_type}}</td>
            <td>{{$item->capacity}}</td>
            <td>{{$item->ambient_temperature}}</td>
            <td>{{$item->stack_temperature}}</td>
            <td>{{$item->meter_temperature}}</td>
            <td>{{$item->moisture_content}}</td>
            <td>{{$item->actual_volume_sample}}</td>
            <td>{{$item->standard_volume_sample}}</td>
            <td>{{$item->actual_oxygen_o2}}</td>
            <td>{{$item->velocity_linear}}</td>
            <td>{{$item->dry_molecular_weight}}</td>
            <td>{{$item->actual_stack_flowrate}}</td>
            <td>{{$item->percent_of_isokinetic}}</td>
            <td>{{$item->total_particulate_isokinetic_actual}}</td>
            <td>{{$item->sulfur_dioxide_so2_actual}}</td>
            <td>{{$item->nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual}}</td>
            <td>{{$item->nitrogen_oxide_nox_actual}}</td>
            <td>{{$item->carbon_monoxide_co_actual}}</td>
            <td>{{$item->carbon_dioxide_co}}</td>
            <td>{{$item->opacity}}</td>
            <td>{{$item->total_particulate_isokinetic}}</td>
            <td>{{$item->sulfur_dioxide_so2}}</td>
            <td>{{$item->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
            <td>{{$item->nitrogen_oxide_nox}}</td>
            <td>{{$item->carbon_monoxide_co}}</td>
        </tr>
        @endforeach
    </tbody>
</table>