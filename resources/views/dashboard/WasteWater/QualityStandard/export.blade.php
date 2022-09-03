<table>
    <thead>
        <tr>
            <th>Quality Standard</th>
            <th>Conductivity</th>
            <th>TDS</th>
            <th>TSS</th>
            <th>Turbidity</th>
            <th>Hardness</th>
            <th>Alkalinity (as CaCo3)</th>
            <th>Alkalinity-Carbonate</th>
            <th>Alkalinity-Bicarbonate</th>
            <th>Temperature </th>
            <th>Salinity </th>
            <th>Dissolved Oxygen (DO) </th>
            <th>pH</th>
            <th>Alkalinity - Total</th>
            <th>Chloride (Cl)</th>
            <th>Fluoride (F)</th>
            <th>Sulphate (SO4)</th>
            <th>Sulphite (H2S)</th>
            <th>Free Chlorine (Cl2)</th>
            <th>Free Cyanide (FCN)</th>
            <th>Total Cyanide (CN Tot)</th>
            <th>WAD Cyanide (CN Wad)</th>
            <th>Ammonia (N-NH3)</th>
            <th>Nitrate (NO3)</th>
            <th>Nitrite (NO2)</th>
            <th>Phosphate (PO4)</th>
            <th>Total-Phosphate (P-PO4)</th>
            <th>Aluminium (Al)</th>
            <th>Antimony (Sb)</th>
            <th>Arsenic (As)</th>
            <th>Barium (Ba)</th>
            <th>Cadmium (Cd)</th>
            <th>Calcium (Ca)</th>
            <th>Chromium (Cr)</th>
            <th>Chromium Hexavalent (Cr6+)</th>
            <th>Cobalt (Co)</th>
            <th>Copper (Cu)</th>
            <th>Iron (Fe)</th>
            <th>Lead (Pb)</th>
            <th>Magnesium (Mg)</th>
            <th>Manganese (Mn)</th>
            <th>Mercury (Hg)</th>
            <th>Nickel (Ni)</th>
            <th>Selenium (Se)</th>
            <th>Silver (Ag)</th>
            <th>Sodium (Na)</th>
            <th>Tin (Sn)</th>
            <th>Zinc (Zn)</th>
            <th>Aluminium (T_Al)</th>
            <th>Arsenic (T_As)</th>
            <th>Cadmium (T_Cd)</th>
            <th>Chromium (T_Cr)</th>
            <th>Chromium Hexavalent (T_Cr6+)</th>
            <th>Cobalt (T_Co)</th>
            <th>Copper (T_Cu)</th>
            <th>Lead (T_Pb)</th>
            <th>Selenium (T_Se)</th>
            <th>Mercury (T_hg)</th>
            <th>Nickel (T_Ni)</th>
            <th>Zinc (T_Zn)</th>
            <th>BOD</th>
            <th>COD</th>
            <th>Oil and Grease</th>
            <th>Phenols</th>
            <th>Surfactant (MBAS)</th>
            <th>Total PCB</th>
            <th>A.O.X</th>
            <th>PCDFs</th>
            <th>PCDDs</th>
            <th>Quality Standard</th>
            <th>Fecal Coliformi</th>
            <th>E- Coli</th>
            <th>Total Coliform Bacteria </th>
        </tr>
    </thead>
    <tbody>
        @foreach($QualityStd as $item)
        <tr>
            <td>{{$item->nama}}</td>
            <td>{{$item->conductivity}}</td>
            <td>{{$item->tds}}</td>
            <td>{{$item->tss}}</td>
            <td>{{$item->turbidity}}</td>
            <td>{{$item->hardness}}</td>
            <td>{{$item->alkalinity_as_caco3}}</td>
            <td>{{$item->alkalinity_carbonate}}</td>
            <td>{{$item->alkalinity_bicarbonate}}</td>
            <td>{{$item->temperature}}</td>
            <td>{{$item->salinity}}</td>
            <td>{{$item->do}}</td>
            <td>{{$item->ph}}</td>
            <td>{{$item->alkalinity_total}}</td>
            <td>{{$item->cl}}</td>
            <td>{{$item->fluoride}}</td>
            <td>{{$item->sulphate}}</td>
            <td>{{$item->sulphite}}</td>
            <td>{{$item->free_chlorine}}</td>
            <td>{{$item->fcn}}</td>
            <td>{{$item->total_cyanide}}</td>
            <td>{{$item->wad_cyanide}}</td>
            <td>{{$item->ammonia}}</td>
            <td>{{$item->nitrate}}</td>
            <td>{{$item->nitrite}}</td>
            <td>{{$item->phosphate }}</td>
            <td>{{$item->total_phosphate }}</td>
            <td>{{$item->aluminium}}</td>
            <td>{{$item->antimony}}</td>
            <td>{{$item->arsenic}}</td>
            <td>{{$item->barium}}</td>
            <td>{{$item->cadmium}}</td>
            <td>{{$item->calcium}}</td>
            <td>{{$item->chromium}}</td>
            <td>{{$item->chromium_hexavalent}}</td>
            <td>{{$item->cobalt}}</td>
            <td>{{$item->copper}}</td>
            <td>{{$item->iron}}</td>
            <td>{{$item->lead}}</td>
            <td>{{$item->magnesium}}</td>
            <td>{{$item->manganese}}</td>
            <td>{{$item->mercury}}</td>
            <td>{{$item->nickel}}</td>
            <td>{{$item->selenium}}</td>
            <td>{{$item->silver}}</td>
            <td>{{$item->sodium}}</td>
            <td>{{$item->tin}}</td>
            <td>{{$item->zinc}}</td>
            <td>{{$item->aluminium_t_ai}}</td>
            <td>{{$item->arsenic_t_as}}</td>
            <td>{{$item->cadmium_t_cd}}</td>
            <td>{{$item->chromium_t}}</td>
            <td>{{$item->chromium_hexavalent_t}}</td>
            <td>{{$item->cobalt_t}}</td>
            <td>{{$item->cooper}}</td>
            <td>{{$item->lead_t}}</td>
            <td>{{$item->selenium_t}}</td>
            <td>{{$item->mercury_t}}</td>
            <td>{{$item->nickel_t}}</td>
            <td>{{$item->zinc_t}}</td>
            <td>{{$item->bod}}</td>
            <td>{{$item->cod}}</td>
            <td>{{$item->oil_and_grease}}</td>
            <td>{{$item->phenols}}</td>
            <td>{{$item->surfactant}}</td>
            <td>{{$item->total_pcb}}</td>
            <td>{{$item->a_o_x}}</td>
            <td>{{$item->pcdfs}}</td>
            <td>{{$item->pcdds}}</td>
            <td>{{$item->fecal_coliform}}</td>
            <td>{{$item->c_coli}}</td>
            <td>{{$item->total_coliform_bacteria}}</td>
        </tr>
        @endforeach
    </tbody>
</table>