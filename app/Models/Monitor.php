<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = ['line_id', 'name', 'ip_address'];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function workInstructions()
    {
        return $this->belongsToMany(WorkInstruction::class)->withTimestamps();
    }
}
