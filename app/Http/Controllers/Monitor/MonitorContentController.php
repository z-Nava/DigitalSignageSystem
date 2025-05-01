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
        // Validación
        $request->validate([
            'monitor_id' => 'required|exists:monitors,id',  // Asegúrate de que el monitor exista
            'product_model_id' => 'required|exists:models,id',  // Asegúrate de que el modelo exista
            'work_instructions' => 'required|array',
            'work_instructions.*' => 'exists:work_instructions,id',  // Asegúrate de que las instrucciones existan
        ]);

        // Obtener el monitor seleccionado
        $monitor = Monitor::findOrFail($request->monitor_id);  // Obtener el monitor por su ID

        // Asignar el modelo al monitor
        $monitor->productModel()->associate($request->product_model_id);
        $monitor->save();

        // Asignar las instrucciones al monitor
        $monitor->workInstructions()->sync($request->work_instructions);

        return redirect()->route('admin.monitors.index')->with('success', 'Modelo e instrucciones asignadas correctamente.');
    }


}