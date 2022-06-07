<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.brands.brands', compact('brands'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.createBrands');
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        // return $request;

        try {

            //validation

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $fileName = "";
            if ($request->has('photo')) {
                // In Brand Model & Helper File & config filesystems
                $fileName = uploadImage('brands', $request->photo);
            }

            $brand = Brand::create($request->except('_token', 'photo'));

            //save translations

            $brand->name = $request->name;

            $brand->photo = $fileName;

            $brand->save();

            DB::commit();

            return redirect()->route('admin.brands')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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
        //get specific categories and its translations

        $brand = Brand::find($id);

        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => 'هذه الماركة غير موجودة ']);

        return view('admin.brands.editBrands', compact('brand'));
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        try {

            //validation

            // Find Main id

            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذة الماركة غير موجودة']);

            DB::beginTransaction();

            // For update photo

            if ($request->has('photo')) {

                $fileName = uploadImage('brands', $request->photo);

                Brand::where('id', $id)->update(['photo' => $fileName,]);
            }

            // For update active

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //update DB

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations

            $brand->name = $request->name;

            $brand->save();

            DB::commit();

            return redirect()->route('admin.brands')->with(['success' => 'تم ألتحديث بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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

            //get specific categories and its translations

            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذة الماركة غير موجودة']);

            $brand->delete();

            return redirect()->route('admin.brands')->with(['success' => 'تم  الحذف بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------//
}
