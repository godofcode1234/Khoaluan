<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class VungtrongController extends Controller
{
  public function index(Request $request)
  {
    $vungtrong = DB::table('sde.vung_trong')
      ->get();
    // ->pluck('shape');
    return view('pagestest.vungtrong', ['vungtrong' => $vungtrong]);
  }
  public function insert(Request $request)
  {
    $data = [
      'iddiachinh' => $request->input('iddiachinh'),
      'idvungtrong' => $request->input('idvungtrong'),
      'dientichtrong' => $request->input('dientichtrong'),
      'giongcay' => $request->input('giongcay'),
      'tuoicay' => $request->input('tuoicay'),
      'giaidoansinhtruong' => $request->input('giaidoansinhtruong'),
      'ngaytrong' => $request->input('ngaytrong'),
      'loaidat' => $request->input('loaidat'),
    ];

    $insert = DB::table('sde.vung_trong')->insert([
      $data
    ]);
    return response(['success' => 'Employee created successfully.']);
  }
  public function delete($id)
  {
    $deleted = DB::table('sde.vung_trong')->where('id', $id)->delete();
    if ($deleted) {
      return redirect()->back()->with('success', 'Xóa thành công');
    }
    return redirect()->back()->with('error', 'Không tìm thấy dữ liệu');
  }
  public function update(Request $request)
  {

    // $updated = DB::table('sde.vung_trong')
    //             ->where('id', $id)
    //             ->update(['name' => $request->name, 
    //                       'description' => $request->description]);

    // if($updated) {
    //   return redirect()->back()->with('success', 'Cập nhật thành công');
    // }

    return view('test');
  }
}
