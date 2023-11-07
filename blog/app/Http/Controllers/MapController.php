<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SauBenh;

use Brian2694\Toastr\Facades\Toastr;

class MapController extends Controller
{
    public function index()
    {
        $polygonCoordinates = DB::table('sde.bando')
            ->get();

        return view('welcome', ['polygonCoordinates' => $polygonCoordinates]);
    }
    public function create()
    {
        $shape = DB::table('sde.vung_trong')->get();
        $shapesaubenh = SauBenh::all();
        return view('welcome', ['shape' => $shape, 'shapesaubenh' => $shapesaubenh]);
    }
    public function store(Request $request)
    {

        $shape = $request->input('shape');

        $data = $this->removeBrackets($shape);

        // Chuyển mảng thành chuỗi json
        $dataJson = json_encode($data);

        DB::table('sde.bando')->insert([
            'shape' => $dataJson,
        ]);

        return redirect()->back()->with('success', 'Dữ liệu đã được lưu thành công');
    }

    public function removeBrackets($input)
    {
        $data = json_decode($input, true);
        return $data[0];
    }
}
