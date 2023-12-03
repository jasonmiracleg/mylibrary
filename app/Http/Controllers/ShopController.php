<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view(
            'shop',
            [
                'pagetitle' => 'Shop',
                'activeShop' => 'active',
                'maintitle' => 'Shops',
                'shops' => Shop::all()
            ]
        );
    }
}
