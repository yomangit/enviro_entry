<table>
    <thead>
        <tr>
            <th> Quality Standard </th>
            <th> Conductivity </th>
            <th> Total Dissolved Solids (TDS) </th>
            <th> Total Suspended Solids (TSS) </th>
            <th> Turbidity </th>
            <th> Hardness </th>
            <th> Alkalinity </th>
            <th> Temperature </th>
            <th> Salinity </th>
            <th> Dissolved Oxygen (DO) </th>
            <th> Colour </th>
            <th> Odour </th>
            <th> Taste </th>
            <th> pH </th>
            <th> Chloride (Cl) </th>
            <th> Fluoride (F) </th>
            <th> Residual Chlorine </th>
            <th> Sulphate (SO4) </th>
            <th> Sulphite (H2S) </th>
            <th> Free Cyanide (FCN) </th>
            <th> Total Cyanide (CN Tot) </th>
            <th> WAD Cyanide (CN Wad) </th>
            <th> Ammonium (NH4) </th>
            <th> Ammonia (N-NH3) </th>
            <th> Nitrate (NO3) </th>
            <th> Nitrite (NO2) </th>
            <th> Phosphate (PO4) </th>
            <th> Aluminium (Al) </th>
            <th> Antimony (Sb) </th>
            <th> Arsenic (As) </th>
            <th> Barium (Ba) </th>
            <th> Cadmium (Cd) </th>
            <th> Chromium (Cr) </th>
            <th> Chromium Hexavalent (Cr6+) </th>
            <th> Cobalt (Co) </th>
            <th> Copper (Cu) </th>
            <th> Iron (Fe) </th>
            <th> Manganese (Mn) </th>
            <th> Lead (Pb) </th>
            <th> Mercury (Hg) </th>
            <th> Nickel (Ni) </th>
            <th> Selenium (Se) </th>
            <th> Silver (Ag) </th>
            <th> Zinc (Zn) </th>
            <th> Aluminium (T-Al) </th>
            <th> Arsenic (As) </th>
            <th> Cadmium (T-Cd) </th>
            <th> Chromium Hexavalent (T-Cr6+) </th>
            <th> Chromium (T-Cr) </th>
            <th> Cobalt (T-Co) </th>
            <th> Copper (T-Cu) </th>
            <th> Lead (T-Pb) </th>
            <th> Selenium (T-Se) </th>
            <th> Mercury (T-Hg) </th>
            <th> Nickel (T-Ni) </th>
            <th> Zinc (T-Zn) </th>
            <th> BOD </th>
            <th> COD </th>
            <th> Oil and Grease </th>
            <th> Phenols </th>
            <th> Permanganate Number as KMnO4 </th>
            <th> Surfactant (MBAS) </th>
            <th> Benzene </th>
            <th> Chloroform </th>
            <th> 2,4,6-trichloropenol </th>
            <th> 2,4-D </th>
            <th> Pentachlorophenol </th>
            <th> Total Pesticides </th>
            <th> Chlordane (Total Isomer) </th>
            <th> Dieldrin </th>
            <th> Aldrin </th>
            <th> Fecal Coliform </th>
            <th> E- Coli </th>
            <th> Total Coliform Bacteria </th>
        </tr>
    </thead>
    @foreach($MonthStandard as $monthstandard)
    <tbody>
        <tr>
            
    <td class="align-middle ">{{$monthstandard-> nama	}}</td>
    <td class="align-middle ">{{$monthstandard-> conductivity	}}</td>
    <td class="align-middle ">{{$monthstandard-> total_dissolved_solids_tds	}}</td>
    <td class="align-middle ">{{$monthstandard-> total_suspended_solids_tss	}}</td>
    <td class="align-middle ">{{$monthstandard-> turbidity	}}</td>
    <td class="align-middle ">{{$monthstandard-> hardness	}}</td>
    <td class="align-middle ">{{$monthstandard-> alkalinity	}}</td>
    <td class="align-middle ">{{$monthstandard-> temperature	}}</td>
    <td class="align-middle ">{{$monthstandard-> salinity	}}</td>
    <td class="align-middle ">{{$monthstandard-> dissolved_oxygen_do	}}</td>
    <td class="align-middle ">{{$monthstandard-> colour	}}</td>
    <td class="align-middle ">{{$monthstandard-> odour	}}</td>
    <td class="align-middle ">{{$monthstandard-> taste	}}</td>
    <td class="align-middle ">{{$monthstandard-> ph	}}</td>
    <td class="align-middle ">{{$monthstandard-> chloride_cl	}}</td>
    <td class="align-middle ">{{$monthstandard-> fluoride_f	}}</td>
    <td class="align-middle ">{{$monthstandard-> residual_chlorine	}}</td>
    <td class="align-middle ">{{$monthstandard-> sulphate_so4	}}</td>
    <td class="align-middle ">{{$monthstandard-> sulphite_h2s	}}</td>
    <td class="align-middle ">{{$monthstandard-> free_cyanide_fcn	}}</td>
    <td class="align-middle ">{{$monthstandard-> total_cyanide_cn_tot	}}</td>
    <td class="align-middle ">{{$monthstandard-> wad_cyanide_cn_wad	}}</td>
    <td class="align-middle ">{{$monthstandard-> ammonium_nh4	}}</td>
    <td class="align-middle ">{{$monthstandard-> ammonia_n_nh3	}}</td>
    <td class="align-middle ">{{$monthstandard-> nitrate_no3	}}</td>
    <td class="align-middle ">{{$monthstandard-> nitrite_no2	}}</td>
    <td class="align-middle ">{{$monthstandard-> phosphate_po4	}}</td>
    <td class="align-middle ">{{$monthstandard-> aluminium_al	}}</td>
    <td class="align-middle ">{{$monthstandard-> antimony_sb	}}</td>
    <td class="align-middle ">{{$monthstandard-> arsenic_as	}}</td>
    <td class="align-middle ">{{$monthstandard-> barium_ba	}}</td>
    <td class="align-middle ">{{$monthstandard-> cadmium_cd	}}</td>
    <td class="align-middle ">{{$monthstandard-> chromium_cr	}}</td>
    <td class="align-middle ">{{$monthstandard-> chromium_hexavalent_cr6	}}</td>
    <td class="align-middle ">{{$monthstandard-> cobalt_co	}}</td>
    <td class="align-middle ">{{$monthstandard-> copper_cu	}}</td>
    <td class="align-middle ">{{$monthstandard-> iron_fe	}}</td>
    <td class="align-middle ">{{$monthstandard-> manganese_mn	}}</td>
    <td class="align-middle ">{{$monthstandard-> lead_pb	}}</td>
    <td class="align-middle ">{{$monthstandard-> mercury_hg	}}</td>
    <td class="align-middle ">{{$monthstandard-> nickel_ni	}}</td>
    <td class="align-middle ">{{$monthstandard-> selenium_se	}}</td>
    <td class="align-middle ">{{$monthstandard-> silver_ag	}}</td>
    <td class="align-middle ">{{$monthstandard-> zinc_zn	}}</td>
    <td class="align-middle ">{{$monthstandard-> aluminium_t_al	}}</td>
    <td class="align-middle ">{{$monthstandard-> arsenic_t_as	}}</td>
    <td class="align-middle ">{{$monthstandard-> cadmium_t_cd	}}</td>
    <td class="align-middle ">{{$monthstandard-> chromium_hexavalent_t_cr6	}}</td>
    <td class="align-middle ">{{$monthstandard-> chromium_t_cr	}}</td>
    <td class="align-middle ">{{$monthstandard-> cobalt_t_co	}}</td>
    <td class="align-middle ">{{$monthstandard-> copper_t_cu	}}</td>
    <td class="align-middle ">{{$monthstandard-> lead_t_pb	}}</td>
    <td class="align-middle ">{{$monthstandard-> selenium_t_se	}}</td>
    <td class="align-middle ">{{$monthstandard-> mercury_t_hg	}}</td>
    <td class="align-middle ">{{$monthstandard-> nickel_t_ni	}}</td>
    <td class="align-middle ">{{$monthstandard-> zinc_t_zn	}}</td>
    <td class="align-middle ">{{$monthstandard-> bod	}}</td>
    <td class="align-middle ">{{$monthstandard-> cod	}}</td>
    <td class="align-middle ">{{$monthstandard-> oil_and_grease	}}</td>
    <td class="align-middle ">{{$monthstandard-> phenols	}}</td>
    <td class="align-middle ">{{$monthstandard-> permanganate_number_as_kmno4	}}</td>
    <td class="align-middle ">{{$monthstandard-> surfactant_mbas	}}</td>
    <td class="align-middle ">{{$monthstandard-> benzene	}}</td>
    <td class="align-middle ">{{$monthstandard-> chloroform	}}</td>
    @php
        $a='2_4_6_trichloropenol';
        $b='2_4_d';
    @endphp
    <td class="align-middle ">{{$monthstandard-> $a	}}</td>
    <td class="align-middle ">{{$monthstandard-> $b	}}</td>
    <td class="align-middle ">{{$monthstandard-> pentachlorophenol	}}</td>
    <td class="align-middle ">{{$monthstandard-> total_pesticides	}}</td>
    <td class="align-middle ">{{$monthstandard-> chlordane_total_isomer	}}</td>
    <td class="align-middle ">{{$monthstandard-> dieldrin	}}</td>
    <td class="align-middle ">{{$monthstandard-> aldrin	}}</td>
    <td class="align-middle ">{{$monthstandard-> fecal_coliform	}}</td>
    <td class="align-middle ">{{$monthstandard-> e_coli	}}</td>
    <td class="align-middle ">{{$monthstandard-> total_coliform_bacteria	}}</td>

        </tr>
    </tbody>
    @endforeach
</table>