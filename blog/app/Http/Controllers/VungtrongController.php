<?php

namespace App\Http\Controllers;

use App\Models\VungTrong;
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
  // public function create()
  // {
  //   $shape = DB::table('sde.vung_trong')
  //     ->get();
  //   return view('welcome', ['shape' => $shape]);
  // }
  public function insert(Request $request)
  {
    $shape = $request->input('shape');
    $shape = $this->removeBrackets($shape);
    $dataJson = json_encode($shape);
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

    $insert = DB::table('sde.vung_trong')->insert(array_merge(
      $data,
      ['shape' => $dataJson]
    ));
    return redirect()->back()->with('success', 'Cập nhật thành công');
  }


  public function removeBrackets($input)
  {
    $data = json_decode($input, true);
    return $data[0];
  }
  public function delete($id)
  {
    VungTrong::where('idvungtrong', $id)->delete();
    return response()->json(['success' => true]);
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


  }
  public function edit($id)
  {
    $vungtrong = DB::table('sde.vung_trong')->where('idvungtrong', $id)->get();
    return view('pagestest.vungtrong')->with('vungtrong', $vungtrong);
  }
  public function getId(Request $request)
  {
    $shape = $request->input('shape');
    if (!$shape) {
      return response()->json('Lỗi: shape không có giá trị', 400);
    }
    $id = DB::table('sde.vung_trong')
      ->where('shape', $shape)
      ->value('idvungtrong');

    return response()->json($id);
  }
}
