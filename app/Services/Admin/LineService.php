<?php
namespace App\Services\Admin;

use App\Models\Line;

class LineService
{
    public function getAll()
    {
        return Line::all();
    }

    public function store(array $data)
    {
        return Line::create([
            'name' => $data['name'],
        ]);
    }

    public function update(Line $line, array $data)
    {
        $line->update([
            'name' => $data['name'],
        ]);
        return $line;
    }

    public function delete(Line $line)
    {
        return $line->delete();
    }
}
