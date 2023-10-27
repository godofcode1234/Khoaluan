<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Brian2694\Toastr\Facades\Toastr;

class MapController extends Controller
{
    public function index()
    {
        $polygonCoordinates = DB::table('sde.bando')
            ->get()
            ->pluck('shape');
        return view('welcome', ['shape' => $polygonCoordinates]);
    }
}
