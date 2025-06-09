<table>
    <thead>
        <tr>
            <th> Quality Standard </th>
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
			<th> Nitrogen Oxide (NOx) </th>
            <th> Nitrogen Dioxide (NO2) </th>
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
    <tbody>
        @foreach ($QualityStandard as $standard2)
        <tr>
            <td>{{$standard2->nama}}</td>
            <td>{{$standard2->equipment}}</td>
            <td>{{$standard2->fuel_type}}</td>
            <td>{{$standard2->capacity}}</td>
            <td>{{$standard2->ambient_temperature}}</td>
            <td>{{$standard2->stack_temperature}}</td>
            <td>{{$standard2->meter_temperature}}</td>
            <td>{{$standard2->moisture_content}}</td>
            <td>{{$standard2->actual_volume_sample}}</td>
            <td>{{$standard2->standard_volume_sample}}</td>
            <td>{{$standard2->actual_oxygen_o2}}</td>
            <td>{{$standard2->velocity_linear}}</td>
            <td>{{$standard2->dry_molecular_weight}}</td>
            <td>{{$standard2->actual_stack_flowrate}}</td>
            <td>{{$standard2->percent_of_isokinetic}}</td>
            <td>{{$standard2->ammonia_nh3}}</td>
            <td>{{$standard2->chlorine_cl2}}</td>
            <td>{{$standard2->hydrogen_chloride_hcl}}</td>
            <td>{{$standard2->hydrogen_fluoride_hf}}</td>
            <td>{{$standard2->nitrogen_oxide_nox}}</td>
			<td>{{$standard2->nitrogen_dioxide_no2}}</td>
            <td>{{$standard2->opacity}}</td>
            <td>{{$standard2->total_particulate_isokinetic}}</td>
            <td>{{$standard2->sulfur_dioxide_so2}}</td>
            <td>{{$standard2->hydrogen_sulphide_h2s}}</td>
            <td>{{$standard2->mercury_hg}}</td>
            <td>{{$standard2->arsenic_as}}</td>
            <td>{{$standard2->antimony_sb}}</td>
            <td>{{$standard2->cadmium_cd}}</td>
            <td>{{$standard2->zinc_zn}}</td>
            <td>{{$standard2->lead_pb}}</td>
        </tr>
        @endforeach
    </tbody>
</table>