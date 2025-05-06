<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;
use App\Models\Line;
use App\Services\Admin\MonitorService;
use App\Http\Requests\StoreMonitorRequest;
use App\Http\Requests\UpdateMonitorRequest;

class MonitorController extends Controller
{
    protected $monitorService;

    public function __construct(MonitorService $monitorService)
    {
        $this->monitorService = $monitorService;
    }

    public function index()
    {
        $monitors = $this->monitorService->getAll();
        return view('admin.monitors.index', compact('monitors'));
    }

    public function create()
    {
        $lines = Line::orderBy('type')->orderBy('name')->get()->groupBy('type');
        return view('admin.monitors.create', compact('lines'));
    }

    public function store(StoreMonitorRequest $request)
    {
        $this->monitorService->store($request->only('name', 'ip_address', 'line_id'));

        return redirect()->route('admin.monitors.index')->with('success', 'Monitor creado correctamente.');
    }

        public function edit(Monitor $monitor)
    {
        $lines = Line::orderBy('type')->orderBy('name')->get()->groupBy('type');
        return view('admin.monitors.edit', compact('monitor', 'lines'));
    }

    public function update(UpdateMonitorRequest $request, Monitor $monitor)
    {
        $this->monitorService->update($monitor, $request->only('name', 'ip_address', 'line_id'));

        return redirect()->route('admin.monitors.index')->with('success', 'Monitor actualizado correctamente.');
    }

    public function destroy(Monitor $monitor)
    {
        $this->monitorService->delete($monitor);

        return redirect()->route('admin.monitors.index')->with('success', 'Monitor eliminado correctamente.');
    }

}
