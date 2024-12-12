<?php

namespace App\Http\Controllers;

use App\Models\HardwareDevice;
use App\Models\ItCenter;
use Illuminate\Http\Request;

class HardwareDeviceController extends Controller
{
    public function index()
    {
        // Lấy tất cả các trung tâm tin học cùng với thiết bị của chúng
        $itCenters = ItCenter::with('devices')->get();

        // Trả về view với dữ liệu itCenters
        return view('devices.index', compact('itCenters'));    }

    public function create()
    {
        $centers = ItCenter::all();
        return view('devices.create', compact('centers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|boolean',
            'center_id' => 'required|exists:it_centers,id',
        ]);

        HardwareDevice::create($validated);
        return redirect()->route('devices.index')->with('success', 'Device added successfully!');
    }

    public function edit(HardwareDevice $device)
    {
        $centers = ItCenter::all();
        return view('devices.edit', compact('device', 'centers'));
    }

    public function update(Request $request, HardwareDevice $device)
    {
        $validated = $request->validate([
            'device_name' => 'required|string|max:255',
            'type' => 'required|string',
            'status' => 'required|boolean',
            'center_id' => 'required|exists:it_centers,id',
        ]);

        $device->update($validated);
        return redirect()->route('devices.index')->with('success', 'Device updated successfully!');
    }

    public function destroy(HardwareDevice $device)
    {
        $device->delete();
        return redirect()->route('devices.index')->with('success', 'Device deleted successfully!');
    }
}
