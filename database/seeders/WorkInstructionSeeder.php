<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductModel;
use App\Models\WorkInstruction;

class WorkInstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ProductModel::all() as $model) {
            for ($i = 1; $i <= 2; $i++) {
                WorkInstruction::create([
                    'model_id'    => $model->id,
                    'title'       => "Instrucción {$i} para {$model->name}",
                    'description' => "Descripción de la instrucción {$i} del modelo {$model->name}",
                    'file_path'   => null, // o 'instructions/doc.pdf' si quieres simular archivo
                ]);
            }
        }
    }
}
