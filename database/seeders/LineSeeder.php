<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Baterias', 'Motores', 'MXFuel', 'Consolas'];
        $nomenclatures = ['MXC', 'MXB', 'MXM', 'MXF'];

        foreach ($types as $type) {
            foreach ($nomenclatures as $nomenclature) {
                Line::create([
                    'name' => $nomenclature . '0' . random_int(1, 100),
                    'type' => $type,
                ]);
            }
        }
    }
}