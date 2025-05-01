<?php
namespace App\Services\Monitor;

use App\Models\Monitor;

class MonitorContentService
{
    public function assignContent($monitorId, $productModelId, array $instructionIds)
    {
        $monitor = Monitor::findOrFail($monitorId);

        // Asociar modelo
        $monitor->productModel()->associate($productModelId);
        $monitor->save();

        // Asociar instrucciones
        $monitor->workInstructions()->sync($instructionIds);
    }
}
