<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\ProductStockRequest;
use App\Http\Requests\ProductGeneralRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id','slug','price', 'created_at')->paginate(PAGINATION_COUNT);
        return view('admin.products.general.products', compact('products'));
    }

    // ------------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        // Use Scope in Brand Model
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        return view('admin.products.general.createProducts', $data);
    }

    // ------------------------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGeneralRequest $request)
    {
        // return $request;

        try {

            //validation

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);


            $product = Product::create(
                [

                'slug' => $request->slug,

                'brand_id' => $request->brand_id,

                'is_active' => $request->is_active,

                ]
            );

            //save translations

            $product->name = $request->name;

            $product->description = $request->description;

            $product->short_description = $request->short_description;

            $product->save();

            //save product categories

            $product->categories()->attach($request->categories);

            //save product tags

            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'تم الحفظ بنجاح']);

        }

        catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

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
        //
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
        //
    }

    // ------------------------------------------------------------------------//

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

    // ------------------------------------------------------------------------//

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

    // ------------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrice($product_id)
    {
        return view('admin.products.price.createPrice') -> with('id',$product_id) ;
    }

    // ------------------------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePrice(ProductPriceRequest $request)
    {
        // return $request;

        try {

            //validation

            Product::whereId($request -> product_id) -> update($request -> only([
                'price',
                'special_price',
                'special_price_type',
                'special_price_start',
                'special_price_end'
                ]));

            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);

        }

        catch (\Exception $ex) {

            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    // ------------------------------------------------------------------------//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStock($product_id)
    {
        return view('admin.products.stock.createStock') -> with('id',$product_id) ;
    }

    // ------------------------------------------------------------------------//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveStock(ProductStockRequest $request)
    {
        // return $request;

        try {

            //validation

            Product::whereId($request -> product_id) -> update($request -> except([
                '_token',
                'product_id'
                ]));

            return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);

        }

        catch (\Exception $ex) {

            return $ex;

            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    // ------------------------------------------------------------------------//

    // ------------------------------------------------------------------------//

    // ------------------------------------------------------------------------//


    // ------------------------------------------------------------------------//

    // ------------------------------------------------------------------------//

    // ------------------------------------------------------------------------//



}
