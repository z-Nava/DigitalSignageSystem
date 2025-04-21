<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = ['name'];

    public function monitors()
    {
        return $this->hasMany(Monitor::class);
    }

    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }
}
