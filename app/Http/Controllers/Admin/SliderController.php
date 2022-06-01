<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{

    // ------------------------------------------------------------------------//

    public function addImages()
    {

        $images = Slider::get(['photo']);
        return view('admin.sliders.createSliders', compact('images'));
    }

    // ------------------------------------------------------------------------//

    //to save images to folder only

    public function saveSliderImages(Request $request)
    {
        $file = $request->file('dzfile');

        // In Helper File - General

        $filename = uploadImage('sliders', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    // ------------------------------------------------------------------------//

    public function saveSliderImagesDB(SliderRequest $request)
    {
        // return $request;

        try {

            //validation

            // save dropzone images

            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    Slider::create([
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {

            return $ex;

            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    // ------------------------------------------------------------------------//

}
