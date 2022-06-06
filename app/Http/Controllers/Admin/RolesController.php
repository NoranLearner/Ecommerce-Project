<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{

    // ------------------------------------------------------//

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get(); // use pagination and  add custom pagination on index.blade
        return view('admin.roles.index', compact('roles'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveRole(RolesRequest $request)
    {

        // return $request;

        try {

            $role = $this->process(new Role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => 'تم ألاضافة بنجاح']);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

        catch (\Exception $ex) {
            return $ex;
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        try {

            $role = Role::findOrFail($id);

            $role = $this->process($role, $request);

            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => 'تم التحديث بنجاح']);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

        catch (\Exception $ex) {

            // return message for unhandled exception

            return redirect()->route('admin.roles.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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

    // ------------------------------------------------------//

    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }

    // ------------------------------------------------------//

}
