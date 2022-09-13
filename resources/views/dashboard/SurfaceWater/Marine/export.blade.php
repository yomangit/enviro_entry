<table>
    <thead style="background-color: green; color: skyblue; border: 3px solid #ee00ee">
        <tr>
            <th>Quality Standard</th>
            <th>date</th>
            <th>Clarity</th>
            <th>Temperature (Water)</th>
            <th>Garbage</th>
            <th>Oil Layer</th>
            <th>Odor</th>
            <th>Color</th>
            <th>Turbidity</th>
            <th>Total Suspended Solids</th>
            <th>Salinity in situ</th>
            <th>Total Dissolved Solids</th>
            <th>Conductivity (Insitu)</th>
            <th>pH</th>
            <th>Sulphide</th>
            <th>Ammonia (N-NH3)</th>
            <th>Nitrate (N-NO3)</th>
            <th>Total-Phosphate (P-PO4)</th>
            <th>Cyanide (Total)</th>
            <th>Total Coliform</th>
            <th>Chromium Hexavalent-Total(Cr-VI)</th>
            <th>Arsenic-Hydrid Dissolved (As)</th>
            <th>Boron-Dissolved (B)</th>
            <th>Cadmium-Dissolved (Cd)</th>
            <th>Copper-Dissolved (Cu)</th>
            <th>Lead-Dissolved (Pb)</th>
            <th>Nickel-Dissolved (Ni)</th>
            <th>Zinc-Dissolved (Zn)</th>
            <th>Mercury-Dissolved (Hg)</th>
            <th>Biologycal Oxygen Demand</th>
            <th>Dissolved Oxygen</th>
            <th>Oil And  Grease</th>
            <th>Surfactant</th>
            <th>Total Phenol</th>
            <th>Hydrocarbon</th>
            <th>Tributyl Tin</th>
            <th>Total Poly Chlor Biphenyl</th>
            <th>Poly Aromatic Hydrocarbon</th>
            <th>Total Pesticides as Organo Chlorine Pesticides</th>
            <th>Benzene Hexa Chloride</th>
            <th>Endrin</th>
            <th>Dichloro Diphenyl Trichloroethane</th>
            <th>Total Petroleum Hydrocarbons</th>
        </tr>
    </thead>
    <tbody>
    @foreach($Marine as $item)
        <tr>
            <td>{{$item->PointId->nama}}</td>
            <td>{{date('d-M-Y',strtotime($item->date))}}</td>
            <td>{{$item->clarity}}</td>
            <td>{{$item->temperature_water}}</td>
            <td>{{$item->garbage}}</td>
            <td>{{$item->oil_ayer}}</td>
            <td>{{$item->odour}}</td>
            <td>{{$item->colour}}</td>
            <td>{{$item->turbidity}}</td>
            <td>{{$item->total_suspended_solids}}</td>
            <td>{{$item->salinity_in_situ}}</td>
            <td>{{$item->total_dissolved_solids}}</td>
            <td>{{$item->conductivity_insitu}}</td>
            <td>{{$item->ph}}</td>
            <td>{{$item->sulphide}}</td>
            <td>{{$item->ammonia_n_nh3}}</td>
            <td>{{$item->nitrate_n_no3}}</td>
            <td>{{$item->total_phosphate_p_po4}}</td>
            <td>{{$item->cyanide_total}}</td>
            <td>{{$item->total_coliform}}</td>
            <td>{{$item->chromium_hexavalent_total_cr_vi}}</td>
            <td>{{$item->arsenic_hydrid_dissolved_as}}</td>
            <td>{{$item->boron_dissolved_b}}</td>
            <td>{{$item->cadmium_dissolved_cd}}</td>
            <td>{{$item->copper_dissolved_cu}}</td>
            <td>{{$item->lead_dissolved_pb}}</td>
            <td>{{$item->nickel_dissolved_ni}}</td>
            <td>{{$item->zinc_dissolved_zn}}</td>
            <td>{{$item->mercury_dissolved_hg}}</td>
            <td>{{$item->biologycal_oxygen_demand}}</td>
            <td>{{$item->dissolved_oxygen}}</td>
            <td>{{$item->oil_grease}}</td>
            <td>{{$item->surfactant}}</td>
            <td>{{$item->total_phenol}}</td>
            <td>{{$item->hydrocarbon}}</td>
            <td>{{$item->tributyl_tin}}</td>
            <td>{{$item->total_poly_chlor_biphenyl}}</td>
            <td>{{$item->poly_aromatic_hydrocarbon}}</td>
            <td>{{$item->total_pesticides_as_organo_chlorine_pesticides}}</td>
            <td>{{$item->benzene_hexa_chloride}}</td>
            <td>{{$item->endrin}}</td>
            <td>{{$item->dichloro_diphenyl_trichloroethane}}</td>
            <td>{{$item->total_petroleum_hydrocarbons}}</td>
        </tr>
        @endforeach

    </tbody>
</table>