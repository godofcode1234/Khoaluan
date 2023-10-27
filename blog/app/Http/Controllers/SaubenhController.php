<?php

namespace App\Http\Controllers;

use App\Models\SauBenh;
use Illuminate\Http\Request;

class SauBenhController extends Controller
{
    public function index()
    {
        $saubenh = SauBenh::all();
        return view('pagestest.saubenh')->with('saubenh', $saubenh);
    }

    public function create()
    {
        return view('saubenh.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idsaubenh' => 'required',
            'idvungtrong' => 'required',
            'tensaubenh' => 'required|max:20',
            'mucdogayhai' => 'required|integer',
            'thoigianphathien' => 'required',
            'hinhanh' => 'nullable|integer',
            'mota' => 'nullable',
            'phuongphap' => 'nullable'
        ]);

        SauBenh::create($validatedData);
        return redirect()->route('saubenh.index')->with('success', 'Dữ liệu đã được tạo thành công.');
    }

    public function show(SauBenh $sauBenh)
    {
        return view('test', compact('sauBenh'));
    }

    public function edit(SauBenh $sauBenh)
    {
        return view('test', compact('sauBenh'));
    }

    public function update(Request $request, SauBenh $sauBenh)
    {
        $validatedData = $request->validate([
            'idsaubenh' => 'required',
            'idvungtrong' => 'required',
            'tensaubenh' => 'required|max:20',
            'mucdogayhai' => 'required|integer',
            'thoigianphathien' => 'required',
            'hinhanh' => 'nullable|integer',
            'mota' => 'nullable',
            'phuongphap' => 'nullable'
        ]);

        $sauBenh->update($validatedData);
        return redirect()->route('test')->with('success', 'Dữ liệu đã được cập nhật thành công.');
    }

    public function destroy(SauBenh $sauBenh)
    {
        $sauBenh->delete();
        return redirect()->route('test')->with('success', 'Dữ liệu đã được xóa thành công.');
    }
}