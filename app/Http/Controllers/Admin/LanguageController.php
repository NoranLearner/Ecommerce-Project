<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Use Scope In Language Model
        $languages= Language::select()->paginate(PAGINATION_COUNT);
        return view('admin.languages.language', compact('languages'));
    }

    // ------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.createLanguage');
    }

    // ------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        // Make Validation

        // return $request;

        // Insert to database

        // return $request->except(['_token']);

        try {
            Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success' => 'تم حفظ اللغة بنجاح']);
        }
        catch (\Exception $ex) {
            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
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
        // Use Scope In Language Model
        $language = Language::select()->find($id);

        if (!$language) {
            return redirect()->route('admin.languages')->with(['error' => 'هذه اللغة غير موجوده']);
        }

        return view('admin.languages.editLanguage', compact('language'));
    }

    // ------------------------------------------------------//

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        try {

            $language = Language::find($id);

            if (!$language) {
                return redirect()->route('admin.languages.edit', $id)->with(['error' => 'هذه اللغة غير موجوده']);
            }

            // Update Database

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);

            $language->update($request->except('_token'));

            return redirect()->route('admin.languages')->with(['success' => 'تم تحديث اللغة بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

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

            $language = Language::find($id);

            if (!$language) {

                return redirect()->route('admin.languages', $id)->with(['error' => 'هذه اللغة غير موجوده']);

            }

            $language->delete();

            return redirect()->route('admin.languages')->with(['success' => 'تم حذف اللغة بنجاح']);

        }
        catch (\Exception $ex) {

            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);

        }
    }
    
}
