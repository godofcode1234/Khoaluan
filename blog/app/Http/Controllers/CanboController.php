<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;

class CanboController extends Controller
{
  public function index(Request $request)
  {
    $canbo = DB::table('sde.can_bo_quan_ly')
      ->get();
    // ->pluck('shape');
    return view('canbo.index', ['canbo' => $canbo]);
  }
  // Lấy danh sách cán bộ

  public function store(Request $request)
  {
    $data = [
      'idcanbo' => $request->input('idcanbo'),
      'tencanbo' => $request->input('tencanbo'),
      'chucvu' => $request->input('chucvu'),
      'sdt' => $request->input('sdt'),
      'email' => $request->input('email')
    ];

    DB::table('sde.can_bo_quan_ly')->insert([
      $data
    ]);
    return redirect()->back()->with('success', 'Cập nhật thành công');
  }
  // Thêm mới cán bộ
  public function create($tenCanBo, $chucVu, $sdt, $email)
  {
    return DB::table('Cán bộ quản lý')->insert([
      'tên cán bộ' => $tenCanBo,
      'chức vụ' => $chucVu,
      'sdt' => $sdt,
      'email' => $email
    ]);
  }

  // Cập nhật cán bộ
  public function update(Request $request, $idcanbo)
  {
    $data = [
      'tencanbo' => $request->input('tencanbo'),
      'chucvu' => $request->input('chucvu'),
      'sdt' => $request->input('sdt'),
      'email' => $request->input('email')
    ];

    DB::table('sde.can_bo_quan_ly')
      ->where('idcanbo', $idcanbo)
      ->update($data);

    return redirect()->back()->with('success', 'Cập nhật thành công');
  }

  // Xóa cán bộ
  public function delete($id)
  {
    return DB::table('Cán bộ quản lý')
      ->where('id cán bộ', $id)
      ->delete();
  }
}
