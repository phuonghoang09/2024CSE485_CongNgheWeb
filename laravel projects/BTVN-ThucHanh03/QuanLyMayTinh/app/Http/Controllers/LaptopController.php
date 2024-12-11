<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Renter;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = Laptop::with('renter')->get();
        return view('laptops.index', compact('laptops'));
    }

    public function create()
    {
        $renters = Renter::all();
        return view('laptops.create', compact('renters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'specifications' => 'required|string',
            'rental_status' => 'required|boolean',
            'renter_id' => 'nullable|exists:renters,id',
        ]);

        Laptop::create($request->all());
        return redirect()->route('laptops.index')->with('success', 'Thêm laptop thành công!');
    }

    public function edit(Laptop $laptop)
    {
        $renters = Renter::all();
        return view('laptops.edit', compact('laptop', 'renters'));
    }

    public function update(Request $request, Laptop $laptop)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'specifications' => 'required|string',
            'rental_status' => 'required|boolean',
            'renter_id' => 'nullable|exists:renters,id',
        ]);

        $laptop->update($request->all());
        return redirect()->route('laptops.index')->with('success', 'Cập nhật laptop thành công!');
    }

    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect()->route('laptops.index')->with('success', 'Xóa laptop thành công!');
    }
}
