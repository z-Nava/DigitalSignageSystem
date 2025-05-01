<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkInstruction extends Model
{
    protected $fillable = ['model_id', 'title', 'description', 'file_path'];

    public function model()
    {
        return $this->belongsTo(ProductModel::class, 'model_id');
    }

    public function monitors()
    {
        return $this->belongsToMany(Monitor::class, 'model_monitor')->withTimestamps();
    }
}
