<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả bài viết
        $products = Product::latest()->paginate(5); // Sắp xếp theo ngày tạo, phân trang
        // Render ra view
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate file ảnh
        ]);

        // Xử lý file ảnh (nếu có)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Lưu file ảnh vào thư mục public/storage/products
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm mới
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Lưu đường dẫn ảnh
        ]);

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Lấy bài viết theo ID
        $product = Product::findOrFail($id);

        // Render ra view
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy bài viết theo ID
        $product = Product::findOrFail($id);

        // Render ra view chỉnh sửa
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate file ảnh
        ]);

        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Xử lý file ảnh (nếu có)
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Lưu ảnh mới vào thư mục public/storage/products
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image; // Giữ nguyên ảnh cũ nếu không upload ảnh mới
        }

        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Đường dẫn ảnh
        ]);

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Sản phẩm được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lấy bài viết theo ID và xóa
        $product = Product::findOrFail($id);
        $product->delete();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('products.index')->with('success', 'Bài viết đã được xóa!');
    }
}
