<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::paginate(10);
        $issues = Issue::orderBy('id', 'desc')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'computer_id' => 'required|exists:computers,id', // Kiểm tra khóa ngoại
            'reported_by' => 'nullable|string|max:50',       // Người báo cáo (tùy chọn)
            'reported_date' => 'required|date',             // Ngày báo cáo
            'description' => 'required|string',            // Mô tả vấn đề
            'urgency' => 'required|in:Low,Medium,High',     // Mức độ sự cố
            'status' => 'required|in:Open,In Progress,Resolved', // Trạng thái sự cố
        ]);

        // Tạo mới một issue
        Issue::create($validated);

        // Chuyển hướng và thông báo thành công
        return redirect()
            ->route('issues.index') // Điều hướng đến danh sách issues
            ->with('success', 'Sự cố đã được thêm thành công!');
    }

    public function edit(Issue $issue)
    {
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Tìm issue cần cập nhật, nếu không tồn tại sẽ trả về lỗi 404
        $issue = Issue::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'reported_by' => 'nullable|string|max:50',       // Người báo cáo (tùy chọn)
            'reported_date' => 'required|date',             // Ngày báo cáo
            'description' => 'required|string',            // Mô tả vấn đề
            'urgency' => 'required|in:Low,Medium,High',     // Mức độ sự cố
            'status' => 'required|in:Open,In Progress,Resolved', // Trạng thái sự cố
        ]);

        // Cập nhật issue
        $issue->update($validated);

        // Chuyển hướng và thông báo thành công
        return redirect()
            ->route('issues.index') // Điều hướng đến danh sách issues
            ->with('success', 'Sự cố đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Xoá thành công');
    }
}
