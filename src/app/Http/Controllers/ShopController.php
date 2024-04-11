<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function thanks(Request $request)
    {
        return view('thanks');
    }

    public function menu_two(Request $request)
    {
        return view('menu_two');
    }

}
