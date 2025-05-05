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
            'type' => $data['type'] ?? 'general', // Default type is 'general'
        ]);
    }

    public function update(Line $line, array $data)
    {
        $line->update([
            'name' => $data['name'],
            'type' => $data['type'] ?? $line->type, // Keep the current type if not provided
        ]);
        return $line;
    }

    public function delete(Line $line)
    {
        return $line->delete();
    }
}
