<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Point ID</th>
            <th> Equipment </th>
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
            <th> Ammonia (NH3) </th>
            <th> Chlorine (Cl2) </th>
            <th> Hydrogen Chloride (HCl) </th>
            <th> Hydrogen Fluoride (HF) </th>
            <th> Nitrogen Dioxide (NO2) </th>
			<th> Nitrogen Oxide (NOx) </th>
            <th> Opacity </th>
            <th> Total Particulate (isokinetic) </th>
            <th> Sulfur Dioxide (SO2) </th>
            <th> Hydrogen Sulphide (H2S) </th>
            <th> Mercury (Hg) </th>
            <th> Arsenic (As) </th>
            <th> Antimony (Sb) </th>
            <th> Cadmium (Cd) </th>
            <th> Zinc (Zn) </th>
            <th> Lead (Pb) </th>
        </tr>
    </thead>
    @foreach($Emission as $item)
    <tr>
        <td >{{date('d-m-Y',strtotime($item->date))}}</td>
        <td >{{$item->PointId->nama}}</td>
        <td>{{$item->equipment}}</td>
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
        <td>{{$item->ammonia_nh3}}</td>
        <td>{{$item->chlorine_cl2}}</td>
        <td>{{$item->hydrogen_chloride_hcl}}</td>
        <td>{{$item->hydrogen_fluoride_hf}}</td>
        <td>{{$item->nitrogen_dioxide_no2}}</td>
		<td>{{$item->nitrogen_oxide_nox}}</td>
        <td>{{$item->opacity}}</td>
        <td>{{$item->total_particulate_isokinetic}}</td>
        <td>{{$item->sulfur_dioxide_so2}}</td>
        <td>{{$item->hydrogen_sulphide_h2s}}</td>
        <td>{{$item->mercury_hg}}</td>
        <td>{{$item->arsenic_as}}</td>
        <td>{{$item->antimony_sb}}</td>
        <td>{{$item->cadmium_cd}}</td>
        <td>{{$item->zinc_zn}}</td>
        <td>{{$item->lead_pb}}</td>
    </tr>
    @endforeach
</table>