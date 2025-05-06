<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductModel;
use App\Models\Line;

class ProductModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Line::all() as $line) {
            $prefix = match ($line->type) {
                'Baterias' => 'HO 6.0 Ah',
                'Consolas' => 'M12 Fuel Drill ',
                'Motores'  => 'MR BRUSHLESS',
                'MXFuel'   => 'MX FUEL Breaker KIR',
                default    => 'GEN',
            };

            for ($i = 0; $i < 3; $i++) {
                ProductModel::create([
                    'line_id' => $line->id,
                    'name'    => $prefix . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                ]);
            }
        }
    }
}
