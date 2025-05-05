<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Baterias', 'Motores', 'MXFuel', 'Consolas'];

        foreach ($types as $type) {
            for ($i = 1; $i <= 2; $i++) {
                Line::create([
                    'name' => $type . ' ' . $i,
                    'type' => $type,
                ]);
            }
        }
    }
}
