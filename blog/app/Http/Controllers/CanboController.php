<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;
class CanboController extends Controller
{
    // Lấy danh sách cán bộ
public function getList() {
    return DB::table('Cán bộ quản lý')->get();
  }
  
  // Thêm mới cán bộ
  public function create($tenCanBo, $chucVu, $sdt, $email) {
    return DB::table('Cán bộ quản lý')->insert([
      'tên cán bộ' => $tenCanBo,
      'chức vụ' => $chucVu,
      'sdt' => $sdt,
      'email' => $email
    ]);
  }
  
  // Cập nhật cán bộ
  public function update($id, $data) {
    return DB::table('Cán bộ quản lý')
            ->where('id cán bộ', $id)
            ->update($data);  
  }
  
  // Xóa cán bộ
  public function delete($id) {
    return DB::table('Cán bộ quản lý')
            ->where('id cán bộ', $id)
            ->delete();
  }
}
