<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\MainCategoryRequest;
// use App\Http\Enumerations\CategoryType;

class MainCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 🔥 For Unpaid 🔥 //

/*
        // Use Helper Function

        $default_lang = getDefaultLang();

        // Use Scope In MainCategory Model

        $mainCategories = MainCategory::where('translation_lang', $default_lang)-> Selection() -> get();

        return view('admin.mainCategories.mainCategories', compact('mainCategories'));
 */

        // 🔥 For Paid 🔥 //

        // Use Scope scopeParent in Category Model

        $categories = Category::Parent() -> orderBy('id', 'DESC') -> paginate(PAGINATION_COUNT);

        return view('admin.mainCategories.mainCategories', compact('categories'));
    }

    // ------------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 🔥 For Unpaid 🔥 //

        // return view('admin.mainCategories.createMainCategories');

        // 🔥 For Paid 🔥 //

        $categories =   Category::select('id','parent_id')->get();

        return view('admin.mainCategories.createMainCategories',compact('categories'));

    }

    // ------------------------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request)
    {

        // 🔥 For Unpaid 🔥 //

        /*
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
        */

        // 🔥 For Paid 🔥 //

        try {

            // Make Validation

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //if user choose main category then we must remove parent id from the request

            /* if($request -> type == CategoryType::mainCategory) //main category
            {
                $request->request->add(['parent_id' => null]);
            } */

            //if user choose child category we must add parent id

            $category = Category::create($request->except('_token'));

            //save translations

            $category->name = $request->name;

            $category->save();

            DB::commit();

            return redirect()->route('admin.mainCategories')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------------------------//

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

    // ------------------------------------------------------------------------//

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // 🔥 For Unpaid 🔥 //

/*
        // categories - relationship in model MainCategory
        // get specific categories and its translations

        $mainCategory = MainCategory::with('categories')->Selection()->find($id);

        if (!$mainCategory)
        return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

        return view('admin.mainCategories.editMainCategories', compact('mainCategory'));
 */

        // 🔥 For Paid 🔥 //

        //get specific categories and its translations

        $category = Category::orderBy('id', 'DESC')->find($id);

        if (!$category)
            return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

        return view('admin.mainCategories.editMainCategories', compact('category'));
    }

    // ------------------------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainCategoryRequest $request, $id)
    {

        // 🔥 For Unpaid 🔥 //
/*
        try {

            // Validation

            // Find Main id

            $main_category = MainCategory::find($id);

            if (!$main_category)
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

            // Variable save default category in it

            $category = array_values($request->category) [0];

            // For update active

            if (!$request->has('category.0.active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            // Update Data

            MainCategory::where('id', $id) ->update([
                'name' => $category['name'],
                'active' => $request->active,
            ]);

            // For update photo

            if ($request->has('photo')) {

                // Use Helper Function "uploadImage"
                $filePath = uploadImage('mainCategories', $request->photo);

                MainCategory::where('id', $id)->update([
                    'photo' => $filePath,
                ]);
            }


            return redirect()->route('admin.mainCategories')->with(['success' => 'تم ألتحديث بنجاح']);

        }

        catch(\Exception $ex){

            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
 */

        // 🔥 For Paid 🔥 //

        try {

            // Validation

            // Find Main id

            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

            // For update active

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            // Update Data

            $category->update($request->all());

            // Save Translations

            $category->name = $request->name;
            $category->save();


            return redirect()->route('admin.mainCategories')->with(['success' => 'تم ألتحديث بنجاح']);

        }

        catch(\Exception $ex){

            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------------------------//

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 🔥 For Unpaid 🔥 //

/*
        try {
            $mainCategory = MainCategory::find($id);

            if (!$mainCategory)
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

            // Use Relationship

            $vendors = $mainCategory->vendors();

            // Found vendor in category

            if (isset($vendors) && $vendors->count() > 0) {
                return redirect()->route('admin.mainCategories')->with(['error' => 'لا يمكن حذف هذا القسم']);
            }

            // No vendor in category

            // /opt/lampp/htdocs/Ecommerce/assets/images/mainCategories/483ymAZJ5e0cfPuHaU8nJzWB6QRCvTgwhuUzMthu.jpg

            $image = Str::after($mainCategory->photo, 'assets/');

            // return $image;  // images/mainCategories/483ymAZJ5e0cfPuHaU8nJzWB6QRCvTgwhuUzMthu.jpg


            // $image = base_path('assets/' . $image);

            // unlink($image);


            //delete image from folder

            //$image_path = "/images/filename.ext";  // Value is not URL but directory file path

            if(File::exists($image)) {
                File::delete($image);
            }

            // Delete Translation (En , Fr)
            // Use Relationship categories in MainCategory Model

            $mainCategory-> categories() -> delete();

            // Delete Main Category (AR)

            $mainCategory->delete();

            return redirect()->route('admin.mainCategories')->with(['success' => 'تم حذف القسم بنجاح']);

        }

        catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
 */

        // 🔥 For Paid 🔥 //

        try {

            //get specific categories and its translations

            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category)
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

            $category->delete();

            return redirect()->route('admin.mainCategories')->with(['success' => 'تم الحذف بنجاح']);

        }

        catch (\Exception $ex) {

            return $ex;

            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------------------------//

    // 🔥 For Unpaid 🔥 //

    /* public function changeStatus($id)
    {
        try {

            $mainCategory = MainCategory::find($id);

            if (!$mainCategory)
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود']);

            $status =  $mainCategory -> active  == 0 ? 1 : 0;

            $mainCategory -> update(['active' =>$status ]);

            return redirect()->route('admin.mainCategories')->with(['success' => ' تم تغيير الحالة بنجاح']);

        }

        catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.mainCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    } */

    // ------------------------------------------------------------------------//

}
