<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BangKhuyenCao;
use Brian2694\Toastr\Facades\Toastr;
class KhuyencaoController extends Controller
{
    public function index()
    {
        $khuyencaos = BangKhuyenCao::all();
        return view('khuyencao.index', compact('khuyencaos'));
    }

    public function create()
    {
        return view('khuyencao.create');
    }

    public function store(Request $request)
    {
        $khuyencao = new BangKhuyenCao();
        $khuyencao->idkhuyencao = $request->input('idkhuyencao');
        $khuyencao->noidung = $request->input('noidung');
        $khuyencao->thoigian = $request->input('thoigian');
        $khuyencao->idcanbo = $request->input('idcanbo');
        $khuyencao->save();

        return redirect()->route('khuyencao.index');
    }

    public function edit($idkhuyencao, $idcanbo)
    {
        $khuyencao = BangKhuyenCao::findOrFail(['idkhuyencao' => $idkhuyencao, 'idcanbo' => $idcanbo]);
        return view('khuyencao.edit', compact('khuyencao'));
    }

    public function update(Request $request, $idkhuyencao, $idcanbo)
    {
        $khuyencao = BangKhuyenCao::findOrFail(['idkhuyencao' => $idkhuyencao, 'idcanbo' => $idcanbo]);
        $khuyencao->noidung = $request->input('noidung');
        $khuyencao->thoigian = $request->input('thoigian');
        $khuyencao->save();

        return redirect()->route('khuyencao.index');
    }

    public function destroy($idkhuyencao, $idcanbo)
    {
        $khuyencao = BangKhuyenCao::findOrFail(['idkhuyencao' => $idkhuyencao, 'idcanbo' => $idcanbo]);
        $khuyencao->delete();

        return redirect()->route('khuyencao.index');
    }
}
