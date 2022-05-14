<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 🔥 For Paid 🔥 //

        // Use Scope scopeChild in Category Model

        $categories = Category::Child()->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('admin.subCategories.subCategories', compact('categories'));
    }

    // ------------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 🔥 For Paid 🔥 //

        // Get Main Categories to choose from it

        $categories = Category::Parent()->orderBy('id','DESC') -> get();

        return view('admin.subCategories.createSubCategories',compact('categories'));

    }

    // ------------------------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {

        // return $request;

        // 🔥 For Paid 🔥 //

        try {

            //validation

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category = Category::create($request->except('_token'));

            //save translations

            $category->name = $request->name;

            $category->save();

            DB::commit();

            return redirect()->route('admin.subCategories')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.subCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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
        // 🔥 For Paid 🔥 //
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
        // 🔥 For Paid 🔥 //

        //get specific categories and its translations

        $category = Category::orderBy('id', 'DESC')->find($id);

        if (!$category)
            return redirect()->route('admin.subCategories')->with(['error' => 'هذا القسم غير موجود']);

        $categories = Category::Parent()->orderBy('id','DESC') -> get();


        return view('admin.subCategories.editSubCategories', compact('category','categories'));
    }

    // ------------------------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        // 🔥 For Paid 🔥 //

        try {

            //validation

            // Find Main id

            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.subCategories')->with(['error' => 'هذا القسم غير موجود']);

            // For update active

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //update DB

            $category->update($request->all());

            //save translations

            $category->name = $request->name;

            $category->save();

            return redirect()->route('admin.subCategories')->with(['success' => 'تم ألتحديث بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.subCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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
        // 🔥 For Paid 🔥 //

        try {

            //get specific categories and its translations

            $category = Category::orderBy('id', 'DESC')->find($id);

            if (!$category)
                return redirect()->route('admin.subCategories')->with(['error' => 'هذا القسم غير موجود']);

            $category->delete();

            return redirect()->route('admin.subCategories')->with(['success' => 'تم  الحذف بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.subCategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    // ------------------------------------------------------------------------//
}
