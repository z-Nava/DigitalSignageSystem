<?php

namespace Database\Seeders;
use App\Models\Line;
use App\Models\Monitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MonitorSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Line::all() as $line) {
            for ($i = 0; $i < 2; $i++) {
                Monitor::create([
                    'name'      => $line->name . '-M' . ($i + 1),
                    'ip_address'=> '192.168.' . rand(0, 255) . '.' . rand(1, 254),
                    'line_id'   => $line->id,
                    'token'     => Str::random(40),
                ]);
            }
        }
    }
}
