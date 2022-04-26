<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pos()
    {

        $product = DB::table('products')->join('catagories','products.cat_id','catagories.id')->select('catagories.cat_name','products.*')->get();
        $customer = DB::table('customers')->get();
        $catagory = DB::table('catagories')->get();

        return view('pos', compact('product','customer','catagory'));
    }
}
