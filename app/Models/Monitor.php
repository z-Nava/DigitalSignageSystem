<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = ['line_id', 'name', 'ip_address', 'token'];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    public function workInstructions()
    {
        return $this->belongsToMany(WorkInstruction::class, 'model_monitor')->withTimestamps();
    }

    public function models()
    {
        return $this->belongsToMany(ProductModel::class, 'model_monitor');
    }

    public function productModel()
    {
        return $this->belongsTo(ProductModel::class, 'product_model_id');
    }

}
    