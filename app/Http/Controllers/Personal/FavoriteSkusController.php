<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FavoriteSkusController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  Список товаров с избранным
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function favoriteSkus()
    {
        /** @var User $user */
        $user = Auth::user();

        $favoriteSkus = $user->favoriteSkus()->get();

        return view('auth.favorire_skus', compact('favoriteSkus'));
    }

    public function addFavoriteSku($skuId)
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            $user->favoriteSkus()->newPivot(['user_id' => $user->id, 'sku_id' => $skuId])->save();
        } catch (\Exception $e) {
            session()->flash('warning', 'Warning add sku');
        }

        return back();
    }

    public function removeFavoriteSku($skuId)
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            $user->favoriteSkus()->newPivotQuery()->where(['user_id' => $user->id, 'sku_id' => $skuId])->delete();
        } catch (\Exception $e) {
            session()->flash('warning', 'Warning remove sku');
        }

        return back();
    }
}
