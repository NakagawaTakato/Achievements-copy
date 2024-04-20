<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\User;
use App\Models\Shop;
use App\Models\Author;
use App\Models\Category;
use App\Models\Wrapper;
use App\Models\Number;
use App\Models\My_author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;


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


        // ビューにデータを渡す
        return view('shop_all', ['authors' => $authors, 'categories' => $categories]);
    }

    public function shop_detail(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('shop');
        $image = $request->input('image');
        $group = $request->input('group');
        $date = $request->input('date');
        $number = $request->input('number');
        $wrappers = Wrapper::all();
        $numbers = Number::all();

        // ビューにデータを渡す
        return view('shop_detail', compact('name', 'city', 'shop', 'image', 'group', 'date', 'number', 'wrappers', 'numbers'));
    }

    public function shop_detail_two(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $shop = $request->input('shop');
        $image = $request->input('image');
        $group = $request->input('group');

        $contacts = $request->all();
        $wrapper = Wrapper::find($request->wrapper_id);
        dd($wrapper);

        // ビューにデータを渡す
        return view('shop_detail_two', compact('name', 'city', 'shop', 'image', 'group', 'contacts', 'wrapper' ));
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
        $wrappers = Wrapper::all();
        $authors = Author::all();
        $date = $request->input('date');
        $numberId = $request->input('number');

        return view('my_page', compact('wrappers', 'authors', 'date'));
    }

    public function showShops()
    {
        $shops = Shop::all();
        return view('shops', compact('shops'));
    }

}
