<table>
    <thead>
        <tr>

            <th>Quality Standard</th>
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
        @foreach($StandardQuality as $standard)
        <tr>
            <td>{{ $standard->  nama    }}</td>
            <td>{{ $standard->  ph }}</td>
            <td>{{ $standard->  ph_h2o    }}</td>
            <td>{{ $standard->  total_organic_carbon }}</td>
            <td>{{ $standard->  total_nitrogen   }}</td>
            <td>{{ $standard->  cn    }}</td>
            <td>{{ $standard->  calsium   }}</td>
            <td>{{ $standard->  magnesium  }}</td>
            <td>{{ $standard->  pottasium }}</td>
            <td>{{ $standard->  sodium    }}</td>
            <td>{{ $standard->  jumlah  }}</td>
            <td>{{ $standard->  p2o5_hcl_25  }}</td>
            <td>{{ $standard->  k2o_hcl_25 }}</td>
            <td>{{ $standard->  p2o5_olsen }}</td>
            <td>{{ $standard->  kapasitas_tukar_kation }}</td>
            <td>{{ $standard->  kb_kejenuhan_basa }}</td>
            <td>{{ $standard->  al_tukar }}</td>
            <td>{{ $standard->  h_tukar }}</td>
            <td>{{ $standard->  pasir }}</td>
            <td>{{ $standard->  debu }}</td>
            <td>{{ $standard->  lempung }}</td>
            <td>{{ $standard->  moisture_content }}</td>
            <td>{{ $standard->  bulk_density }}</td>
            <td>{{ $standard->  ruang_pori_total }}</td>
            <td>{{ $standard->  pd }}</td>
            <td>{{ $standard->  sangat_cepat }}</td>
            <td>{{ $standard->  cepat }}</td>
            <td>{{ $standard->  lambat }}</td>
            <td>{{ $standard->  air_tersedia }}</td>
            <td>{{ $standard->  permeabilitas }}</td>
            <td>{{ $standard->  pf_1 }}</td>
            <td>{{ $standard->  pf_2 }}</td>
            <td>{{ $standard->  pf_2_54 }}</td>
            <td>{{ $standard->  pf_4_2 }}</td>
            <td>{{ $standard->  laboratorium }}</td>
        </tr>
        @endforeach
    </tbody>
</table>