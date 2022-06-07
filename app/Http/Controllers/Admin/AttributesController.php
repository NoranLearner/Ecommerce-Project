<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.attributes.attributes', compact('attributes'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.createAttributes');
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        // return $request;

        try {

            //validation

            DB::beginTransaction();

            $attribute = Attribute::create([]);

            //save translations

            $attribute->name = $request->name;

            $attribute->save();

            DB::commit();

            return redirect()->route('admin.attributes')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.attributes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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
        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('admin.attributes')->with(['error' => 'هذا العنصر  غير موجود ']);

        return view('admin.attributes.editAttributes', compact('attribute'));
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        try {

            //validation

            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => 'هذا العنصر غير موجود']);

            DB::beginTransaction();

            //update DB

            // $attribute ->update($request->except('_token', 'id'));

            //save translations

            $attribute->name = $request->name;

            $attribute->save();

            DB::commit();

            return redirect()->route('admin.attributes')->with(['success' => 'تم ألتحديث بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.attributes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
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
        try {

            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => 'هذة الخاصية غير موجودة']);

            $attribute->delete();

            return redirect()->route('admin.attributes')->with(['success' => 'تم  الحذف بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.attributes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    // ------------------------------------------------------//
}
