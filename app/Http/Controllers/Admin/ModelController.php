<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $lines = Line::all();
        return view('admin.models.create', compact('lines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'line_id' => 'required|exists:lines,id',
        ]);

        $this->modelService->store($request->only('name', 'line_id'));

        return redirect()->route('admin.models.index')->with('success', 'Modelo creado correctamente.');
    }

    public function edit(ProductModel $model)
    {
        $lines = Line::all();
        return view('admin.models.edit', compact('model', 'lines'));
    }

    public function update(Request $request, ProductModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'line_id' => 'required|exists:lines,id',
        ]);

        $this->modelService->update($model, $request->only('name', 'line_id'));

        return redirect()->route('admin.models.index')->with('success', 'Modelo actualizado correctamente.');
    }

    public function destroy(ProductModel $model)
    {
        $this->modelService->delete($model);

        return redirect()->route('admin.models.index')->with('success', 'Modelo eliminado correctamente.');
    }
}
