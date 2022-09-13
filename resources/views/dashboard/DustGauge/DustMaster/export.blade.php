<table>
    <thead>
        <tr>
            <th>Code Sample</th>
            <th>Month </th>
            <th>Date In</th>
            <th>Date Out</th>
            <th>Total Days</th>
            <th>M4</th>
            <th>M3</th>
            <th>M6</th>
            <th>M5</th>
            <th>Diameter of the Funnel (mm)</th>
            <th>F=30</th>
            <th>TT</th>
            <th>Total Solid Insoluble</th>
            <th>Total Solid soluble
            </th>
            <th>Total Solid </th>
            <th>Number of Insect</th>
            <th>Visible of Dirt</th>
            <th>Visible of Algae</th>
            <th>Area Observation</th>
            <th>Observer by</th>
            <th>Volume Filtrat (ml)</th>
            <th>Total Volume water (ml)</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Dust as $code)
        @php
             $insoluble=0;$soluble=0;$total=0;
        @endphp
        <tr>
            <td>{{ $code->codedust->nama }}</td>
            <td>{{ date('M-Y', strtotime( $code->date_out)) }}</td>

            <td>{{ date('d-m-Y', strtotime( $code->date_in)) }}</td>
            <td>{{ date('d-m-Y', strtotime( $code->date_out)) }}</td>
            <td>{{ $selisi=(strtotime($code->date_out) - strtotime($code->date_in))/86400 }}</td>
            <td>{{ $code->m4 }}</td>
            <td>{{ $code->m3 }}</td>
            <td>{{ $code->m6 }}</td>
            <td>{{ $code->m5 }}</td>
            <td>150</td>
            <td>30</td>
            <td>3.14</td>
            @if ($code->m4 ==='-' && $code->m3==='-')
            <td>-</td>
            @elseif($code->m6 ==='-' && $code->m5==='-')
            <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))*1000000*4*30/(3.14*150*150*$selisi),2)) }}</td>
            @elseif($code->m4 !='-' && $code->m3!='-' && $code->m6 !='-' && $code->m5!='-')
            <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))/(3.14*0.005625*$selisi),2)) }}</td>

            @endif
            @if($code->m6 ==='-' && $code->m5==='-')
            <td>-</td>
            @else
            <td>{{ $soluble= (round(((doubleval($code->m6) - doubleval($code->m5))* doubleval($code->total_vlm_water) )/(3.14*0.005625*$selisi*$code->volume_filtrat),2)) }}</td>
            @endif
            <td>{{$total=round(($insoluble+$soluble),3)}}</td>

            <td>{{ $code->no_insect }}</td>
            <td>{{ $code->vb_dirt }}</td>
            <td>{{ $code->vb_algae }}</td>
            <td>{{ $code->area_observation }}</td>
            <td>{{ $code->observer }}</td>
            <td>{{ $code->volume_filtrat }}</td>
            <td>{{ $code->total_vlm_water }}</td>
            <td>{{ $code->remarks }}</td>
        </tr>
        @endforeach
    </tbody>
</table>