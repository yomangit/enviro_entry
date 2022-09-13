<table>
    <thead>
        <tr>
            <th>Location</th>
            <th>Biota</th>
            <th>Date</th>
            <th>Taxa Richness</th>
            <th>Species Density (cell/m3)</th>
            <th>Diversity Index</th>
            <th>Evenness Value</th>
            <th>Dominance Index</th>
        </tr>
    </thead>
    <tbody>
        @foreach($FreshWater as $item)
        <tr>
            <td>{{ $item->locationBiota->nama }}</td>
            <td>{{ $item->Biota->nama }}</td>
            <td>{{ date('d-M-Y', strtotime( $item->date)) }}</td>
            <td>{{ $item->taxa_richness }}</td>
            <td>{{ $item->species_density }}</td>
            <td>{{ $item->diversity_index }}</td>
            <td>{{ $item->evenness_value }}</td>
            <td>{{ $item->dominance_index }}</td>
            <td>
        </tr>
        @endforeach
    </tbody>
</table>