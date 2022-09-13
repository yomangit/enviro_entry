<table>
    <thead>
        <tr>
            <th>Quality Standard</th>
            <th>Date</th>
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
            <th>Ammonia (NH4)</th>
            <th>Ammonium (N-NH3)</th>
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
            <th>Fecal Coliformi</th>
            <th>E- Coli</th>
            <th>Total Coliform Bacteria </th>
        </tr>
    </thead>
    <tbody>
@foreach($Wastewater as $item)
        <tr>
            <td>{{$item->PointId->nama}}</td>
            <td>{{date('d-m-Y',strtotime($item->date))}}</td>
            <td>{{$item-> conductivity}}</td>
            <td>{{$item-> totaldissolvedsolids_tds}}</td>
            <td>{{$item-> totalsuspendedsolids_tss}}</td>
            <td>{{$item-> turbidity}}</td>
            <td>{{$item-> hardness}}</td>
            <td>{{$item-> alkalinity_ascaco3}}</td>
            <td>{{$item-> alkalinitycarbonate}}</td>
            <td>{{$item-> alkalinitybicarbonate}}</td>
            <td>{{$item-> temperature}}</td>
            <td>{{$item-> salinity}}</td>
            <td>{{$item-> dissolvedoxygen_do}}</td>
            <td>{{$item-> ph	}}</td>
            <td>{{$item-> alkalinitytotal	}}</td>
            <td>{{$item-> chloride_cl	}}</td>
            <td>{{$item-> fluoride_f	}}</td>
            <td>{{$item-> sulphate_so4	}}</td>
            <td>{{$item-> sulphite_h2s	}}</td>
            <td>{{$item-> freechlorine_cl2	}}</td>
            <td>{{$item-> freecyanide_fcn	}}</td>
            <td>{{$item-> totalcyanide_cntot	}}</td>
            <td>{{$item-> wadcyanide_cnwad	}}</td>
            <td>{{$item-> ammonia_nh4	}}</td>
            <td>{{$item-> ammonium_n_nh3	}}</td>
            <td>{{$item-> nitrate_no3	}}</td>
            <td>{{$item-> nitrite_no2	}}</td>
            <td>{{$item-> phosphate_po4	}}</td>
            <td>{{$item-> totalphosphate_ppo4	}}</td>
            <td>{{$item-> aluminium_al	}}</td>
            <td>{{$item-> antimony_sb	}}</td>
            <td>{{$item-> arsenic_as	}}</td>
            <td>{{$item-> barium_ba	}}</td>
            <td>{{$item-> cadmium_cd	}}</td>
            <td>{{$item-> calcium_ca	}}</td>
            <td>{{$item-> chromium_cr	}}</td>
            <td>{{$item-> chromiumhexavalent_cr6	}}</td>
            <td>{{$item-> cobalt_co	}}</td>
            <td>{{$item-> copper_cu	}}</td>
            <td>{{$item-> iron_fe	}}</td>
            <td>{{$item-> lead_pb	}}</td>
            <td>{{$item-> magnesium_mg	}}</td>
            <td>{{$item-> manganese_mn	}}</td>
            <td>{{$item-> mercury_hg	}}</td>
            <td>{{$item-> nickel_ni	}}</td>
            <td>{{$item-> selenium_se	}}</td>
            <td>{{$item-> silver_ag	}}</td>
            <td>{{$item-> sodium_na	}}</td>
            <td>{{$item-> tin_sn	}}</td>
            <td>{{$item-> zinc_zn	}}</td>
            <td>{{$item-> arsenic_tas	}}</td>
            <td>{{$item-> cadmium_tcd	}}</td>
            <td>{{$item-> chromiumhexavalent_tcr6	}}</td>
            <td>{{$item-> chromium_tcr	}}</td>
            <td>{{$item-> cobalt_tco	}}</td>
            <td>{{$item-> copper_tco	}}</td>
            <td>{{$item-> lead_tpb	}}</td>
            <td>{{$item-> selenium_tse	}}</td>
            <td>{{$item-> mercury_thg	}}</td>
            <td>{{$item-> nickel_tni	}}</td>
            <td>{{$item-> zinc_tzn	}}</td>
            <td>{{$item-> bod	}}</td>
            <td>{{$item-> cod	}}</td>
            <td>{{$item-> oilandgrease	}}</td>
            <td>{{$item-> totalphenols	}}</td>
            <td>{{$item-> surfactant_mbas	}}</td>
            <td>{{$item-> totalpcb	}}</td>
            <td>{{$item-> aox	}}</td>
            <td>{{$item-> pcdfs	}}</td>
            <td>{{$item-> pcdds	}}</td>
            <td>{{$item-> fecalcoliform	}}</td>
            <td>{{$item-> ecoli	}}</td>
            <td>{{$item-> totalcoliformbacteria	}}</td>
        </tr>
@endforeach
    </tbody>
</table>