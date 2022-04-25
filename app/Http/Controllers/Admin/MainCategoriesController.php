<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Use Helper Function
        $default_lang = getDefaultLang();

        // Use Scope In MainCategory Model
        $mainCategories = MainCategory::where('translation_lang', $default_lang)-> Selection() -> get();

        return view('admin.mainCategories.mainCategories', compact('mainCategories'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mainCategories.createMainCategories');
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request)
    {
        // Make Validation

        // return $request;

        // Store in database

        try{

        // Variable save all categories in it and transfer to collection
        $main_categories = collect($request->category);

        // Get Default "Arabic" Category
        $filter = $main_categories->filter(function ($value, $key) {
            // Use Helper Function
            return $value['abbr'] == getDefaultLang();
        });

        // Get Category Values
        // 0 is first index of array
        $default_category = array_values( $filter-> all() ) [0];

        // For Save Photo
        $filePath = "";
        if ($request->has('photo')) {
            // Use Helper Function "uploadImage"
            // public/assets/images/mainCategories
            // config/filesystems.php
            $filePath = uploadImage('mainCategories', $request->photo);
        }

        // We have two insert in this method
        
        DB::beginTransaction();

        // Get Default Category id and Store in DB
        $default_category_id = MainCategory::insertGetId([
            'translation_lang' => $default_category['abbr'],
            'translation_of' => 0, // 0 For Default Category
            'name' => $default_category['name'],
            'slug' => $default_category['name'], // For Now Only
            'photo' => $filePath
        ]);

        // return $default_category_id; // return id of default category

        // ----------------------------- //

        // For Others Categories

        $categories = $main_categories->filter(function ($value, $key) {
            return $value['abbr'] != getDefaultLang();
        });

        // If found other categories "1&1=1"
        if (isset($categories) && $categories->count()) {

            // save data in array and store in DB one time

            $categories_arr = [];

            foreach ($categories as $category) {
                $categories_arr[] = [
                    'translation_lang' => $category['abbr'],
                    'translation_of' => $default_category_id,
                    'name' => $category['name'],
                    'slug' => $category['name'],
                    'photo' => $filePath
                ];
            }

            MainCategory::insert($categories_arr);
        }

        DB::commit();

        // ----------------------------- //

        return redirect()->route('admin.mainCategories')->with(['success' => 'تم الحفظ بنجاح']);

        } catch(\Exception $ex){

            DB::rollback();
            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------//

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // ------------------------------------------------------//

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // ------------------------------------------------------//

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
