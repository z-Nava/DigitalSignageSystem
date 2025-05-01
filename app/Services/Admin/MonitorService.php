<?php
namespace App\Services\Admin;

use App\Models\Monitor;

class MonitorService
{
    public function getAll()
    {
        return Monitor::with('line')->get();
    }

    public function store(array $data)
    {
        return Monitor::create($data);
    }

    public function update(Monitor $monitor, array $data)
    {
        $monitor->update($data);
        return $monitor;
    }

    public function delete(Monitor $monitor)
    {
        return $monitor->delete();
    }
}
