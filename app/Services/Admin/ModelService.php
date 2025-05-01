<?php
namespace App\Services\Admin;

use App\Models\ProductModel;

class ModelService
{
    public function getAll()
    {
        return ProductModel::with('line')->get();
    }

    public function store(array $data)
    {
        return ProductModel::create($data);
    }

    public function update(ProductModel $model, array $data)
    {
        $model->update($data);
        return $model;
    }

    public function delete(ProductModel $model)
    {
        return $model->delete();
    }
}
