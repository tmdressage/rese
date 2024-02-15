<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function postFavorite(Request $request)
    {
        $user_id = Auth::user()->id;
        $shop_id = $request->shop_id;
        $already_favorite = favorite::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        // お気に入り登録されていなければレコードを作成（お気に入り登録）
        if (!$already_favorite) {
            favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id
            ]);    

        } else {
            // お気に入り登録されていたらレコードを削除（お気に入り解除）
            favorite::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();          
        }

        return redirect()->back();
    }
}
