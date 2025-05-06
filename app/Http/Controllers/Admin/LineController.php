<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLineRequest;
use Illuminate\Http\Request;
use App\Models\Line;
use App\Services\Admin\LineService;


class LineController extends Controller
{
    protected $lineService;

    public function __construct(LineService $lineService)
    {
        $this->lineService = $lineService;
    }

    public function index()
    {
        $lines = $this->lineService->getAll();
        return view('admin.lines.index', compact('lines'));
    }

    public function create()
    {
        return view('admin.lines.create');
    }

    public function store(StoreLineRequest $request)
    {
        $this->lineService->store($request->only('name', 'type'));

        return redirect()->route('admin.lines.index')->with('success', 'Línea creada correctamente.');
    }

    public function edit(Line $line)
    {
        return view('admin.lines.edit', compact('line'));
    }

    public function update(Request $request, Line $line)
    {
        $this->lineService->update($line, $request->only('name', 'type'));

        return redirect()->route('admin.lines.index')->with('success', 'Línea actualizada correctamente.');
    }

    public function destroy(Line $line)
    {
        $this->lineService->delete($line);

        return redirect()->route('admin.lines.index')->with('success', 'Línea eliminada correctamente.');
    }

}
