<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;
use App\Models\ProductModel;
use App\Models\WorkInstruction;
use App\Services\Monitor\MonitorContentService;

class MonitorContentController extends Controller
{
    protected $monitorContentService;

    public function __construct(MonitorContentService $monitorContentService)
    {
        $this->monitorContentService = $monitorContentService;
    }

    // Vista para asignar modelo e instrucciones a un monitor
    public function assignView()
    {
        $monitors = Monitor::all();  // Obtener todos los monitores
        $models = ProductModel::all();  // Obtener todos los modelos
        $workInstructions = WorkInstruction::all();  // Obtener todas las instrucciones
    
        return view('admin.monitors.assign', compact('monitors', 'models', 'workInstructions'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'monitor_id' => 'required|exists:monitors,id',
            'product_model_id' => 'required|exists:models,id',
            'work_instructions' => 'required|array',
            'work_instructions.*' => 'exists:work_instructions,id',
        ]);

        // Delegamos la lógica al servicio
        $this->monitorContentService->assignContent(
            $request->monitor_id,
            $request->product_model_id,
            $request->work_instructions
        );

        return redirect()->route('admin.monitors.index')->with('success', 'Modelo e instrucciones asignadas correctamente.');
    }

    public function showMonitorContent(Request $request)
    {
        $token = $request->get('token');

        $monitor = $this->monitorContentService->getMonitorWithInstructionsByToken($token);

        if (!$monitor || !$monitor->productModel) {
            return response()->view('client.no_content', [], 404);
        }

        $instructions = $monitor->productModel->workInstructions;

        return view('client.display', compact('monitor', 'instructions'));
    }
}