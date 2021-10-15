<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
//        return Product::find(1)->addons()->get();
        return view('menu.index', [
            'products' => Product::all(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Menu $menu)
    {
        //
    }


    public function edit(Menu $menu)
    {
        //
    }


    public function update(Request $request, Menu $menu)
    {
        //
    }

    public function destroy(Menu $menu)
    {
        //
    }
}
