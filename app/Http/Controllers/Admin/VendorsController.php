<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Notifications\VendorCreated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
                // Use Scope in Vendor Model to bcrypt password
                'password' => $request->password,
                // 'latitude' => $request->latitude,
                // 'longitude' => $request->longitude,
            ]);

            // For send email to vendor after save it
            // app/Notifications/VendorCreated.php

            Notification::send($vendor, new VendorCreated($vendor));

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

        try {

            $vendor = Vendor::Selection()->find($id);

            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا']);

            $categories = MainCategory::where('translation_of', 0)->active()->get();

            return view('admin.vendors.editVendors', compact('vendor', 'categories'));

        }

        catch(\Exception $ex){

            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, $id)
    {

        try {

            // Validation

            // Find vendor id

            $vendor = Vendor::Selection()->find($id);

            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا']);


            DB::beginTransaction();

            //Update Logo

            if ($request->has('logo') ) {

                // Use Helper Function "uploadImage"

                $filePath = uploadImage('vendors', $request->logo);
                Vendor::where('id', $id)->update([
                        'logo' => $filePath,
                ]);
            }

            // For update active

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            // Variable save vendor in it

            $data = $request->except('_token', 'id', 'logo', 'password');

            // For update password

            if ($request->has('password') && !is_null($request->  password)) {

                $data['password'] = $request->password;
            }

            // Update Data

            Vendor::where('id', $id)->update(
                    $data
                );

            DB::commit();

            return redirect()->route('admin.vendors')->with(['success' => 'تم التحديث بنجاح']);

        }

        catch (\Exception $exception) {

            return $exception;
            DB::rollback();
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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

            $vendor = Vendor::find($id);

            if (!$vendor)
                return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود']);

            // Found products in vendor
            // No products in vendor

            $logo = Str::after($vendor->logo, 'assets/');

            /* $logo = base_path('assets/' . $logo);

            unlink($logo); */


            //delete image from folder

            //$image_path = "/images/filename.ext";  // Value is not URL but directory file path

            if(File::exists($logo)) {
                File::delete($logo);
            }

            // Delete Vendor

            $vendor->delete();

            return redirect()->route('admin.vendors')->with(['success' => 'تم حذف المتجر بنجاح']);

        }

        catch (\Exception $ex) {
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    // ------------------------------------------------------//
}
