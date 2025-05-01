<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'models';
    protected $fillable = ['line_id', 'name'];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function workInstructions()
    {
        return $this->hasMany(WorkInstruction::class);
    }

    public function monitors()
    {
        return $this->belongsToMany(Monitor::class, 'model_monitor');
    }

}
