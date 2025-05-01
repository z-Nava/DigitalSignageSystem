<?php
namespace App\Services\Monitor;

use App\Models\Monitor;

class MonitorContentService
{
    // Asignar modelo e instrucciones a un monitor
    public function assignModelAndInstructions(Monitor $monitor, $modelId, $workInstructionsIds)
    {
        // Asignar el modelo al monitor
        $monitor->models()->sync([$modelId]);

        // Asignar las instrucciones al monitor
        $monitor->workInstructions()->sync($workInstructionsIds);
    }
}
