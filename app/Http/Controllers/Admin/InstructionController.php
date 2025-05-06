<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkInstruction;
use App\Models\ProductModel;
use App\Services\Admin\InstructionService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWorkInstructionRequest;
use App\Http\Requests\UpdateWorkInstructionRequest;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class InstructionController extends Controller
{
    protected $instructionService;

    public function __construct(InstructionService $instructionService)
    {
        $this->instructionService = $instructionService;
    }

    public function index()
    {
        $lines = $this->instructionService->getAll();
        return view('admin.instructions.index', compact('lines'));
    }

    public function create(Request $request)
    {
        $models = ProductModel::all();
        $preselectedModelId = $request->model_id;
        return view('admin.instructions.create', compact('models', 'preselectedModelId'));
    }

    public function store(StoreWorkInstructionRequest $request)
    {
        $data = $request->only('model_id', 'title', 'description');

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('instructions', 'public');
        }

        $this->instructionService->store($data);

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción creada correctamente.');
    }

    public function edit(WorkInstruction $instruction)
    {
        $models = ProductModel::all();
        return view('admin.instructions.edit', compact('instruction', 'models'));
    }

    public function update(UpdateWorkInstructionRequest $request, WorkInstruction $instruction)
    {
        $data = $request->only('model_id', 'title', 'description');

        if ($request->hasFile('file_path')) {
            if ($instruction->file_path && Storage::disk('public')->exists($instruction->file_path)) {
                Storage::disk('public')->delete($instruction->file_path);
            }

            $data['file_path'] = $request->file('file_path')->store('instructions', 'public');
        }

        $this->instructionService->update($instruction, $data);

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción actualizada correctamente.');
    }

    public function destroy(WorkInstruction $instruction)
    {
        $this->instructionService->delete($instruction);

        return redirect()->route('admin.instructions.index')->with('success', 'Instrucción eliminada correctamente.');
    }
}
