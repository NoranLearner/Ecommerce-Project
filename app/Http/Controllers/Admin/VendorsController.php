<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use PhpParser\Node\Stmt\TryCatch;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::Selection()->paginate(PAGINATION_COUNT);
        return view('admin.vendors.vendors', compact('vendors'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // To choose MainCategory From default categories which is active
        // Use Scope in Vendor model
        $categories = MainCategory::where('translation_of', 0)->Active()->get();
        return view('admin.vendors.createVendors', compact('categories'));
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        // return $request;

        // Use Try Catch

        try {

            // Make Validation

            // For save active

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            // For save logo

            $filePath = "";
            if ($request->has('logo')) {
                // Use Helper Function "uploadImage"
                // public/assets/images/vendors
                // config/filesystems.php
                $filePath = uploadImage('vendors', $request->logo);
            }

            // Insert to DB

            $vendor = Vendor::create([
                'logo' => $filePath,
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'address' => $request->address,
                'active' => $request->active,
                'category_id' => $request->category_id,

                // 'password' => $request->password,
                // 'latitude' => $request->latitude,
                // 'longitude' => $request->longitude,
            ]);

            // Notification::send($vendor, new VendorCreated($vendor));

            // Redirect Message

            return redirect()->route('admin.vendors')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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

    // ------------------------------------------------------//
}
