<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;
use App\Models\ProductModel;
use App\Models\WorkInstruction;
use App\Models\Line;
use App\Services\Monitor\MonitorContentService;

class MonitorContentController extends Controller
{
    protected $monitorContentService;

    public function __construct(MonitorContentService $monitorContentService)
    {
        $this->monitorContentService = $monitorContentService;
    }
    public function assignView()
    {
        $monitors = Monitor::all();
        $models = ProductModel::all();  
        $workInstructions = WorkInstruction::all();  
        $lines = Line::with('monitors.productModel', 'monitors.workInstructions')->get();
    
        return view('admin.monitors.assign', compact('monitors', 'models', 'workInstructions', 'lines'));
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

        return redirect()->route('admin.monitors.assign')->with('success', 'Modelo e instrucciones asignadas correctamente.');
    }

    public function showMonitorContent(Request $request)
    {
        $token = $request->get('token');

        $monitor = $this->monitorContentService->getMonitorWithInstructionsByToken($token);

        $instructions = $monitor->productModel->workInstructions;

        return view('client.display', compact('monitor', 'instructions'));
    }
}