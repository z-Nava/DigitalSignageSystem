<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkInstruction;
use App\Models\ProductModel;
use App\Services\Admin\InstructionService;

class InstructionController extends Controller
{
    protected $instructionService;

    public function __construct(InstructionService $instructionService)
    {
        $this->instructionService = $instructionService;
    }

    public function index()
    {
        $instructions = $this->instructionService->getAll();
        return view('admin.instructions.index', compact('instructions'));
    }

    public function create(Request $request)
    {
        $models = ProductModel::all();
        $preselectedModelId = $request->model_id;
        return view('admin.instructions.create', compact('models', 'preselectedModelId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:models,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string|max:255' // Más adelante puedes manejar archivos reales
        ]);

        $this->instructionService->store($request->only('model_id', 'title', 'description', 'file_path'));

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción creada correctamente.');
    }

    public function edit(WorkInstruction $instruction)
    {
        $models = ProductModel::all();
        return view('admin.instructions.edit', compact('instruction', 'models'));
    }

    public function update(Request $request, WorkInstruction $instruction)
    {
        $request->validate([
            'model_id' => 'required|exists:models,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'nullable|string|max:255'
        ]);

        $this->instructionService->update($instruction, $request->only('model_id', 'title', 'description', 'file_path'));

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción actualizada correctamente.');
    }

    public function destroy(WorkInstruction $instruction)
    {
        $this->instructionService->delete($instruction);

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción eliminada correctamente.');
    }
}
