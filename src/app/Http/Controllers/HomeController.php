<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome()
    {
        $shops = Shop::all();
        return view('home', compact('shops'), ['keyword' => '']);
    }

    public function logoutGetHome()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getSelect(Request $request)
    {
        $area = $request->input('area');
        $genre = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::query();

        if (!empty($area)) {
            $query->where('shop_area', 'LIKE', $area);
        }

        if (!empty($genre)) {
            $query->where('shop_genre', 'LIKE', $genre);
        }

        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        $shops = $query->get();

        return view('home', compact('shops', 'area', 'genre', 'keyword'));
    }
}
