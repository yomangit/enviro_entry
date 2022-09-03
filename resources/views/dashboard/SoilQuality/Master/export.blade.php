<table>
    <thead>
        <tr>
            <th>Point ID</th>
            <th>Date</th>
            <th> pH</th>
            <th>pH (H2O)</th>
            <th>Total Organic Carbon</th>
            <th>Total Nitrogen</th>
            <th>C/N*</th>
            <th>Calsium</th>
            <th>Magnesium</th>
            <th>Pottasium</th>
            <th> Sodium </th>
            <th>Jumlah</th>
            <th>P<sub>2</sub>O<sub>5</sub>(HCl 25%)</th>
            <th> K<sub>2</sub>(HCl 25%) </th>
            <th>P<sub>2</sub>O<sub>5</sub> (Olsen)</th>
            <th> Kapasitas Tukar Kation</th>
            <th> KB (Kejenuhan Basa) </th>
            <th> Al - Tukar </th>
            <th> H - Tukar </th>
            <th> Pasir </th>
            <th> Debu </th>
            <th> Lempung </th>
            <th> Moisture Content </th>
            <th> Bulk Density </th>
            <th> Ruang Pori Total </th>
            <th> PD </th>
            <th> Sangat Cepat </th>
            <th> Cepat </th>
            <th> Lambat</th>
            <th> Air Tersedia </th>
            <th> Permeabilitas </th>
            <th> pF 1 </th>
            <th> pF 2 </th>
            <th> pF 2.54 </th>
            <th> pF 4.2</th>
            <th> Laboratory</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Soil as $item)
        <tr>
            <td>{{ $item->  PointId->nama}}</td>
            <td>{{date('d-m-Y',strtotime($item->date))}}</td>
            <td>{{ $item->  ph }}</td>
            <td>{{ $item->  ph_h2o}}</td>
            <td>{{ $item->  total_organic_carbon }}</td>
            <td>{{ $item->  total_nitrogen   }}</td>
            <td>{{ $item->  cn}}</td>
            <td>{{ $item->  calsium   }}</td>
            <td>{{ $item->  magnesium  }}</td>
            <td>{{ $item->  pottasium }}</td>
            <td>{{ $item->  sodium}}</td>
            <td>{{ $item->  jumlah  }}</td>
            <td>{{ $item->  p2o5_hcl_25  }}</td>
            <td>{{ $item->  k2o_hcl_25 }}</td>
            <td>{{ $item->  p2o5_olsen }}</td>
            <td>{{ $item->  kapasitas_tukar_kation }}</td>
            <td>{{ $item->  kb_kejenuhan_basa }}</td>
            <td>{{ $item->  al_tukar }}</td>
            <td>{{ $item->  h_tukar }}</td>
            <td>{{ $item->  pasir }}</td>
            <td>{{ $item->  debu }}</td>
            <td>{{ $item->  lempung }}</td>
            <td>{{ $item->  moisture_content }}</td>
            <td>{{ $item->  bulk_density }}</td>
            <td>{{ $item->  ruang_pori_total }}</td>
            <td>{{ $item->  pd }}</td>
            <td>{{ $item->  sangat_cepat }}</td>
            <td>{{ $item->  cepat }}</td>
            <td>{{ $item->  lambat }}</td>
            <td>{{ $item->  air_tersedia }}</td>
            <td>{{ $item->  permeabilitas }}</td>
            <td>{{ $item->  pf_1 }}</td>
            <td>{{ $item->  pf_2 }}</td>
            <td>{{ $item->  pf_2_54 }}</td>
            <td>{{ $item->  pf_4_2 }}</td>
            <td>{{ $item->  laboratorium }}</td>
        </tr>
        @endforeach
    </tbody>
</table>