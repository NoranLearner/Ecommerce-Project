<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $admin = Admin::find( auth('admin') -> user() -> id );

        return view('admin.profile.editProfile', compact('admin'));
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        // return $request;

        //validation

        //update db

        try {

            $admin = Admin::find( auth('admin') -> user() -> id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id']);

            unset($request['password_confirm']);

            $admin -> update($request->all());

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        }

        catch (\Exception $ex) {

            // return $ex;

            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

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
        //
    }
}
