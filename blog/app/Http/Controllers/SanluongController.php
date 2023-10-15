<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;
class SanluongController extends Controller
{
    // Lấy danh sách 
public function getList() {
    return DB::table('Sản lượng')->get();
  }
  
  // Thêm mới  
  public function create($vungTrongId, $thoiGianThuHoach, $soLuong, $donGia, $chiPhi, $loiNhuan) {
    return DB::table('Sản lượng')->insert([
      'id vùng trồng' => $vungTrongId,
      'thời gian thu hoạch' => $thoiGianThuHoach, 
      'số lượng' => $soLuong,
      'đơn giá' => $donGia,
      'chi phí' => $chiPhi,
      'lợi nhuận' => $loiNhuan
    ]);
  }
  
  // Cập nhật  
  public function update($id, $data) {
    return DB::table('Sản lượng')
            ->where('id sản lượng', $id)
            ->update($data);
  }
  
  // Xóa
  public function delete($id) {
    return DB::table('Sản lượng')
           ->where('id sản lượng', $id)
           ->delete(); 
  }
}
