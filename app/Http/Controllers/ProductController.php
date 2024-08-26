<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function productIndex(Request $request)
    {
        $pageTitle = "Products";
        return view('admin.products', compact('pageTitle'));
    }
}
