<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $shops = Shop::where('shop_name', 'like', '%' . $request->search . '%')
                ->orWhere('shop_address', 'like', '%' . $request->search . '%')
                ->paginate(5)
                ->withQueryString() /* carrying the query along changing another page */; // get() ; // search specified pattern in a column where % represents one or multiple chars
        } else {
            $shops = Shop::paginate(5); // all();
        }
        return view(
            'shop',
            [
                'pagetitle' => 'Shop',
                'activeShop' => 'active',
                'maintitle' => 'Shops',
                'shops' => $shops // Shop::all() -> fetching all shops
            ]
        );
    }
}
