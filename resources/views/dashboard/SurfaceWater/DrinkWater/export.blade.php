<table>
    <thead>
        <tr>

            <th >Quality Standard</th>
            <th>Date</th>
            <th>Conductivity</th>
            <th>TDS</th>
            <th>TSS</th>
            <th>Turbidity</th>
            <th>Hardness</th>
            <th>Color</th>
            <th>Odor</th>
            <th>Taste</th>
            <th>Conductivity</th>
            <th>TDS</th>
            <th>TSS</th>
            <th>Turbidity</th>
            <th>Hardness</th>
            <th>Color</th>
            <th>Odor</th>
            <th>Taste</th>
            <th>pH</th>
            <th>Chloride (Cl)</th>
            <th>Fluoride (F)</th>
            <th>Residual Chlorine</th>
            <th>Sulphate (SO4)</th>
            <th>Sulphite (H2S)</th>
            <th>Free Cyanide (FCN)</th>
            <th>Total Cyanide (CN Tot)</th>
            <th>WAD Cyanide (CN Wad)</th>
            <th>Ammonia (NH4)</th>
            <th>Ammonia (N-NH3)</th>
            <th>Nitrate (NO3)</th>
            <th>Nitrite (NO2)</th>
            <th>Phosphate (PO4)</th>
            <th>Aluminium (Al)</th>
            <th>Arsenic (As)</th>
            <th>Barium (Ba)</th>
            <th>Cadmium (Cd)</th>
            <th>Chromium (Cr)</th>
            <th>Chromium Hexavalent (Cr6+)</th>
            <th>Cobalt (Co)</th>
            <th>Copper (Cu)</th>
            <th>Iron (Fe)</th>
            <th>Lead (Pb)</th>
            <th>Manganese (Mn)</th>
            <th>Mercury (Hg)</th>
            <th>Nickel (Ni)</th>
            <th>Selenium (Se)</th>
            <th>Silver (Ag)</th>
            <th>Zinc (Zn)</th>
            <th>Fecal Coliform</th>
            <th>E- Coli</th>
            <th>Total Coliform Bacteria </th>
        </tr>
    </thead>
    <tbody>
        @foreach($Drink as $item)
        <tr>
        <td>{{$item->PointId->nama}}</td>
        <td style="width: 80px">{{date('d-M-Y',strtotime($item->date))}}</td>
        <td>{{$item->conductivity}}</td>
        <td>{{$item->tds}}</td>
        <td>{{$item->tss}}</td>
        <td>{{$item->turbidity}}</td>
        <td>{{$item->hardness}}</td>
        <td>{{$item->color}}</td>
        <td>{{$item->odor}}</td>
        <td>{{$item->taste}}</td>
        <td>{{$item->ph}}</td>
        <td>{{$item->chloride}}</td>
        <td>{{$item->fluoride}}</td>
        <td>{{$item->residual_chlorine}}</td>
        <td>{{$item->sulphate}}</td>
        <td>{{$item->sulphite}}</td>
        <td>{{$item->free_cyanide}}</td>
        <td>{{$item->total_cyanide}}</td>
        <td>{{$item->wad_cyanide}}</td>
        <td>{{$item->ammonia_nh4}}</td>
        <td>{{$item->ammonia_nnh3}}</td>
        <td>{{$item->nitrate_no3}}</td>
        <td>{{$item->nitrate_no2}}</td>
        <td>{{$item->phosphate_po4 }}</td>
        <td>{{$item->aluminium_al}}</td>
        <td>{{$item->arsenic_as}}</td>
        <td>{{$item->barium_ba}}</td>
        <td>{{$item->cadmium_cd}}</td>
        <td>{{$item->chromium_cr}}</td>
        <td>{{$item->chromium_hexavalent}}</td>
        <td>{{$item->cobalt_co}}</td>
        <td>{{$item->copper_cu}}</td>
        <td>{{$item->iron_fe}}</td>
        <td>{{$item->lead_pb}}</td>
        <td>{{$item->manganese_mn}}</td>
        <td>{{$item->mercury_hg}}</td>
        <td>{{$item->nickel_ni}}</td>
        <td>{{$item->selenium_se}}</td>
        <td>{{$item->silver_ag}}</td>
        <td>{{$item->zinc_zn}}</td>
        <td>{{$item->fecal_coliform}}</td>
        <td>{{$item->c_coli}}</td>
        <td>{{$item->total_coliform_bacteria}}</td>
        </tr>
        @endforeach
    </tbody>
</table>