<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;


class Shop_allController extends Controller
{
    public function search(Request $request)
    {
        $query = Author::query();
        $categories = Category::all();

        if ($request->filled('area')) {
            $query->where('gender', $request->input('area'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $authors = $query->get();

        return view('shop_all', ['authors' => $authors, 'categories' => $categories]);
    }

    public function shop_detail(Request $request)
    {
        $shopId = $request->input('shop'); // IDを取得
        $shop = Shop::find($shopId); // IDを使用してショップのオブジェクトを取得

        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('kinds');
        $image = $request->input('image');
        $group = $request->input('group');

        // ビューにデータを渡す
        return view('shop_detail', compact('name', 'city', 'shop', 'image', 'group'));
    }

    public function mypage()
    {
        $user = User::find(Auth::id())->with('reservations', 'likes.area', 'likes.genre', 'likes.likes')->first();
        return view('/mypage', compact("user"));
    }

    public function done()
    {
        return view('done');
    }

    public function showShops()
    {
        $shops = Shop::all();
        return view('shops', compact('shops'));
    }

}
