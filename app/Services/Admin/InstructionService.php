<?php
namespace App\Services\Admin;

use App\Models\WorkInstruction;
use App\Models\Line;

class InstructionService
{
    public function getAll()
    {
        return Line::with('models.workInstructions')->get();
    }

    public function store(array $data)
    {
        return WorkInstruction::create($data);
    }

    public function update(WorkInstruction $instruction, array $data)
    {
        $instruction->update($data);
        return $instruction;
    }

    public function delete(WorkInstruction $instruction)
    {
        return $instruction->delete();
    }
}
