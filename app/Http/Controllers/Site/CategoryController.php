<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function productsBySlug($slug)
    {
        $data = [];
        $data['category'] = Category::where('slug', $slug)->first();

        if ($data['category'])
            $data['products'] = $data['category']->products;

        // return Product::find(21)->images;
        return view('front.products', $data);
    }
}
