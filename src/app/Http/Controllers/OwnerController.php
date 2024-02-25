<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function getOwner()
    {
        $user = Auth::User();
        $ownerShopId = $user->owner_shop_id;
        $ownerShop = Shop::find($ownerShopId);

        return view('owner.owner', compact('ownerShop'));
    }

    public function postOwner(OwnerRequest $request)
    {
        $user = Auth::User();
        $ownerShopId = $user->owner_shop_id;
        $ownerShop = Shop::find($ownerShopId);

        $shop_name = $request->input('shop_name');

        $dir = 'img';
        $file_name = $request->file('shop_img')->getClientOriginalName();
        $request->file('shop_img')->storeAs('public/' . $dir, $file_name);
        $shop_img = 'storage/' . $dir . '/' . $file_name;

        $shop_area = $request->input('shop_area');
        $shop_genre = $request->input('shop_genre');
        $shop_text = $request->input('shop_text');

        if (isset($ownerShop)) {

            try {
                Shop::where('id', '=', $ownerShopId)->update([
                    'shop_name' => $shop_name,
                    'shop_img' => $shop_img,
                    'shop_area' => $shop_area,
                    'shop_genre' => $shop_genre,
                    'shop_text' => $shop_text,
                ]);

                return redirect('owner')->with('result', '店舗情報を更新しました');
            } catch (\Throwable $th) {
                return redirect('owner')->with('error', '予期せぬエラーが発生しました');
            }
        } else {
            try {
                Shop::create([
                    'shop_name' => $shop_name,
                    'shop_img' => $shop_img,
                    'shop_area' => $shop_area,
                    'shop_genre' => $shop_genre,
                    'shop_text' => $shop_text,
                ]);

            } catch (\Throwable $th) {
                return redirect('owner')->with('error', '予期せぬエラーが発生しました');
            }

            $create_shop = Shop::latest()->first();

            User::where('id', '=', $user->id)->update([
                'owner_shop_id' => $create_shop->id
            ]);

            return redirect('owner')->with('result', '店舗情報を登録しました');
        }
    }
}
