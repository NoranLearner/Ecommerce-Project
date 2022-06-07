<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    // ------------------------------------------------------//

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* public function index()
    {
        return view('home');
    } */

    // ------------------------------------------------------//

    public function home()
    {
        $data = [];
        $data['sliders'] = Slider::get(['photo']);
        $data['categories'] = Category::parent()->select('id', 'slug')->with(
            ['childrens' => function ($q) {
                $q->select('id', 'parent_id', 'slug');
                // Relationship in Category Model
                $q->with(
                    ['childrens' => function ($qq) {
                        $qq->select('id', 'parent_id', 'slug');
                    }]
                    );
            }] )->get();
        return view('front.home', $data);
    }

    // ------------------------------------------------------//
}
