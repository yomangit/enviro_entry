<?php

namespace App\Imports;

use App\Models\Noise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportDataNoise implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Noise([
            'user_id'=>$row['user_id'],'date'=>$row['date'],'codesample_id'=>$row['codesample_id'],'location_id'=>$row['location_id'],
            'A1' => $row['a1'], 'A2' => $row['a2'], 'A3' => $row['a3'], 'A4' => $row['a4'], 'A5' => $row['a5'], 'A6' => $row['a6'], 'A7' => $row['a7'], 'A8' => $row['a8'], 'A9' => $row['a9'], 'A10' => $row['a10'], 'A11' => $row['a11'], 'A12' => $row['a12'],
            'B1' => $row['b1'], 'B2' => $row['b2'], 'B3' => $row['b3'], 'B4' => $row['b4'], 'B5' => $row['b5'], 'B6' => $row['b6'], 'B7' => $row['b7'], 'B8' => $row['b8'], 'B9' => $row['b9'], 'B10' => $row['b10'], 'B11' => $row['b11'], 'B12' => $row['b12'],
            'C1' => $row['c1'], 'C2' => $row['c2'], 'C3' => $row['c3'], 'C4' => $row['c4'], 'C5' => $row['c5'], 'C6' => $row['c6'], 'C7' => $row['c7'], 'C8' => $row['c8'], 'C9' => $row['c9'], 'C10' => $row['c10'], 'C11' => $row['c11'], 'C12' => $row['c12'],
            'D1' => $row['d1'], 'D2' => $row['d2'], 'D3' => $row['d3'], 'D4' => $row['d4'], 'D5' => $row['d5'], 'D6' => $row['d6'], 'D7' => $row['d7'], 'D8' => $row['d8'], 'D9' => $row['d9'], 'D10' => $row['d10'], 'D11' => $row['d11'], 'D12' => $row['d12'],
            'E1' => $row['e1'], 'E2' => $row['e2'], 'E3' => $row['e3'], 'E4' => $row['e4'], 'E5' => $row['e5'], 'E6' => $row['e6'], 'E7' => $row['e7'], 'E8' => $row['e8'], 'E9' => $row['e9'], 'E10' => $row['e10'], 'E11' => $row['e11'], 'E12' => $row['e12'],
            'F1' => $row['f1'], 'F2' => $row['f2'], 'F3' => $row['f3'], 'F4' => $row['f4'], 'F5' => $row['f5'], 'F6' => $row['f6'], 'F7' => $row['f7'], 'F8' => $row['f8'], 'F9' => $row['f9'], 'F10' => $row['f10'], 'F11' => $row['f11'], 'F12' => $row['f12'],
            'G1' => $row['g1'], 'G2' => $row['g2'], 'G3' => $row['g3'], 'G4' => $row['g4'], 'G5' => $row['g5'], 'G6' => $row['g6'], 'G7' => $row['g7'], 'G8' => $row['g8'], 'G9' => $row['g9'], 'G10' => $row['g10'], 'G11' => $row['g11'], 'G12' => $row['g12'],
            'H1' => $row['h1'], 'H2' => $row['h2'], 'H3' => $row['h3'], 'H4' => $row['h4'], 'H5' => $row['h5'], 'H6' => $row['h6'], 'H7' => $row['h7'], 'H8' => $row['h8'], 'H9' => $row['h9'], 'H10' => $row['h10'], 'H11' => $row['h11'], 'H12' => $row['h12'],
            'I1' => $row['i1'], 'I2' => $row['i2'], 'I3' => $row['i3'], 'I4' => $row['i4'], 'I5' => $row['i5'], 'I6' => $row['i6'], 'I7' => $row['i7'], 'I8' => $row['i8'], 'I9' => $row['i9'], 'I10' => $row['i10'], 'I11' => $row['i11'], 'I12' => $row['i12'],
            'J1' => $row['j1'], 'J2' => $row['j2'], 'J3' => $row['j3'], 'J4' => $row['j4'], 'J5' => $row['j5'], 'J6' => $row['j6'], 'J7' => $row['j7'], 'J8' => $row['j8'], 'J9' => $row['j9'], 'J10' => $row['j10'], 'J11' => $row['j11'], 'J12' => $row['j12']

        ]);
    }
  
}
