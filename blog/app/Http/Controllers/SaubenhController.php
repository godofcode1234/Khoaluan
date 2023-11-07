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

    // public function create()
    // {
    //     $shapesaubenh =  SauBenh::all();
    //     return view('welcome', ['shapesaubenh' => $shapesaubenh]);
    // }

    public function store(Request $request)
    {
        $shape = $request->input('shapesaubenh');
        $shape = $this->removeBrackets($shape);
        $dataJson = json_encode($shape);
        $validatedData = $request->validate([

            'idvungtrong' => 'required',
            'tensaubenh' => 'required|max:20',
            'mucdogayhai' => 'required|integer',
            'thoigianphathien' => 'required',
            'hinhanh' => 'nullable|integer',
            'mota' => 'nullable',
            'phuongphap' => 'nullable'
        ]);
        $data = array_merge($validatedData, ['shapesaubenh' => $dataJson]);

        SauBenh::create($data);

        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
    public function removeBrackets($input)
    {
        $data = json_decode($input, true);
        return $data[0];
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
