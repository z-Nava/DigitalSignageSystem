<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;
use App\Models\ProductModel;
use App\Models\WorkInstruction;
use App\Models\Line;
use App\Services\Monitor\MonitorContentService;
use App\Http\Requests\AssignMonitorContentRequest;

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

    public function assign(AssignMonitorContentRequest $request)
    {
        $validated = $request->validated();

        $this->monitorContentService->assignContent(
            $validated['monitor_id'],
            $validated['product_model_id'],
            $validated['work_instructions']
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