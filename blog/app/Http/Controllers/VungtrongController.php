<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;
class MapController extends Controller
{  
    public function index(Request $request) {

     
      
    $polygonCoordinates = DB::table('sde.vung_trong')
    
    ->get()
    ->pluck('shape');
                             
    // Gán vào biến 
    
    return view('welcome', ['polygonCoordinates' => $polygonCoordinates]);
  
  }
  public function insert(Request $request) {
    // Lấy dữ liệu
    $coordinates = $request->input('shape');  
   $insert = DB::table('sde.vung_trong')->insert([
      'shape' =>  $coordinates,
      'iddiachinh' => 1
    ]);
   
  
    
    return redirect()->back();
  }
  public function delete($id) {

    $deleted = DB::table('sde.vung_trong')->where('id', $id)->delete();
  
    if($deleted) {
      return redirect()->back()->with('success', 'Xóa thành công');
    }
  
    return redirect()->back()->with('error', 'Không tìm thấy dữ liệu');
  
  }
  public function update(Request $request, $id) {

    $updated = DB::table('sde.vung_trong')
                ->where('id', $id)
                ->update(['name' => $request->name, 
                          'description' => $request->description]);
  
    if($updated) {
      return redirect()->back()->with('success', 'Cập nhật thành công');
    }
  
    return redirect()->back()->with('error', 'Không tìm thấy dữ liệu');
  
  }
}
