<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Author;
use App\Models\Category;
use App\Models\Wrapper;
use App\Models\Number;
use App\Models\Emptyitem;


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

    public function shop_all(Request $request)
    {
        $authors = Author::all();
        $categories = Category::all();
        $query = Wrapper::query();

        if ($request->filled('wrapper_id')) {
            $query->where('wrapper_id', $request->input('wrapper_id'));
        }
        $id = $query->get();


        // ビューにデータを渡す
        return view('shop_all', ['authors' => $authors, 'categories' => $categories, 'id' => $id]);
    }

    public function shop_detail(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('shop');
        $image = $request->input('image');
        $group = $request->input('group');
        $date = $request->input('date');
        $time = $request->input('time');
        $number = $request->input('number');
        $id = Wrapper::all();
        $displays = Wrapper::find($request->wrapper_id);
        dd($displays);
        $numbers = Number::all();

        // ビューにデータを渡す
        return view('shop_detail', compact('name', 'city', 'shop', 'image', 'group', 'date', 'time', 'number', 'displays', 'numbers'));
    }

    public function shop_detail_two(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('shop');
        $image = $request->input('image');
        $group = $request->input('group');
        $date = $request->input('date');
        $timeId = $request->input('time');
        $numberId = $request->input('number');
        $time = Wrapper::find($timeId);
        $fake = Number::find($numberId);

        // ビューにデータを渡す
        return view('shop_detail_two', compact('name', 'city', 'shop', 'image', 'group', 'date', 'time', 'fake', ));
    }

    public function done()
    {
        return view('done');
    }

    public function like_thanks(Request $request)
    {
        $authorId = $request->input('author_id');
        Author::where('id', $authorId)->update(['is_correct' => true]);
        return view('like_thanks');
    }
    
    public function my_page(Request $request)
    {
        $authors = Author::all();
        // 配列としてデータを取得
        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('shop');
        $image = $request->input('image');
        $date = $request->input('date');
        $timeId = $request->input('time');
        $numberId = $request->input('number');
        $time = Wrapper::find($timeId);
        $fake = Number::find($numberId);

        // 配列のデータをビューに渡す
        return view('my_page', compact('authors', 'name', 'city', 'shop', 'image', 'date', 'time', 'fake'));
    }

    public function showShops()
    {
        $shops = Shop::all();
        return view('shops', compact('shops'));
    }

}
