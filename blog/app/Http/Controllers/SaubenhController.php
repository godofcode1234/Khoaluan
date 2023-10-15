<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;            
class SaubenhController extends Controller
{
    // Lấy danh sách 
public function getList() {
    return DB::table('Sâu bệnh')->get();
  }
  
  // Thêm mới
  public function create($vungTrongId, $tenSauBenh, $mucDoGayHai, $thoiGianPhatHien, $hinhAnh, $moTa, $phuongPhap) {
    return DB::table('Sâu bệnh')->insert([
      'id vùng trồng' => $vungTrongId,
      'tên sâu bệnh' => $tenSauBenh,
      'mức độ gây hại' => $mucDoGayHai, 
      'thời gian phát hiện' => $thoiGianPhatHien,
      'hình ảnh' => $hinhAnh,
      'mô tả' => $moTa,
      'phương pháp' => $phuongPhap
    ]);
  }
  
  // Cập nhật  
  public function update($id, $data) {
    return DB::table('Sâu bệnh')
            ->where('id sâu bệnh', $id)
            ->update($data); 
  }
  
  // Xóa
  public function delete($id) {
    return DB::table('Sâu bệnh')
           ->where('id sâu bệnh', $id)  
           ->delete();
  }
}
