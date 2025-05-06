<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelRequest;
use App\Http\Requests\UpdateModelRequest;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\Line;
use App\Services\Admin\ModelService;

class ModelController extends Controller
{
    protected $modelService;

    public function __construct(ModelService $modelService)
    {
        $this->modelService = $modelService;
    }

    public function index()
    {
        $models = $this->modelService->getAll();
        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        $lines = Line::orderBy('type')->orderBy('name')->get()->groupBy('type');
        return view('admin.models.create', compact('lines'));
    }

    public function store(StoreModelRequest $request)
    {
        $this->modelService->store($request->only('name', 'line_id'));

        return redirect()->route('admin.models.index')->with('success', 'Modelo creado correctamente.');
    }

    public function edit(ProductModel $model)
    {
        $lines = Line::orderBy('type')->orderBy('name')->get()->groupBy('type');
        return view('admin.models.edit', compact('model', 'lines'));
    }

    public function update(UpdateModelRequest $request, ProductModel $model)
    {
        $this->modelService->update($model, $request->only('name', 'line_id'));

        return redirect()->route('admin.models.index')->with('success', 'Modelo actualizado correctamente.');
    }

    public function destroy(ProductModel $model)
    {
        $this->modelService->delete($model);

        return redirect()->route('admin.models.index')->with('success', 'Modelo eliminado correctamente.');
    }
}
