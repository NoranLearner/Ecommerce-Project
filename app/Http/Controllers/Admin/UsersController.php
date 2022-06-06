<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    // ------------------------------------------------------//

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = Admin::latest()->where( 'id', '<>', auth()->id() ) -> get(); //use pagination here

        return view('admin.users.index', compact('users'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create',compact('roles'));
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AdminRequest $request)
    {

        // return $request;

        try{

            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);   // the best place on model
            $user->role_id = $request->role_id;

            // save the new user data

            if($user->save())
                return redirect()->route('admin.users.index')->with(['success' => 'تم التحديث بنجاح']);
            else
                return redirect()->route('admin.users.index')->with(['success' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }

        catch (\Exception $ex) {
            return $ex;
            // return message for unhandled exception
            return redirect()->route('admin.users.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
