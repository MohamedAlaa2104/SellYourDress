<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['hasAnyPermission']);
        $this->middleware(['can:read products'])->only(['index','productsTable']);
        $this->middleware(['can:create products'])->only(['store']);
        $this->middleware(['can:edit products'])->only(['update', 'ajaxButtons']);
        $this->middleware(['can:delete products'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.products.create')->with('categories', Category::pluck('name_'.LaravelLocalization::getCurrentLocale(), 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'category_id'=>'required',
            'name_en'=>'required|unique:products,name_en',
            'name_ar'=>'required|unique:products,name_ar',
            'description_en'=>'required',
            'description_ar'=>'required',
            'price'=>'required|integer',
            'sell_type'=>'required',
            'mainImg'=>'required|mimes:jpg,png,jpeg,svg,gif|max:10000',
            'imgs'=>'required',
            'imgs.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $product = Product::create([
            'category_id'=>$request->category_id,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'price'=>$request->price,
            'sell_type'=>$request->sell_type,
            'active'=>$request->active,
            'featured'=>$request->featured,
        ]);

        $logo = Image::make(public_path('img/dress-logo-white.png'))->resize(60,60);
        if ($request->hasFile('mainImg')){
            $name = rand(1000000,15000000);
            $img = Image::make($request->file('mainImg'))->resize(305,458);
            $img = $img->insert($logo, 'bottom-right', 10,10)->save($name.'.jpg');
            $product->addMedia(public_path($name.'.jpg'))->toMediaCollection('main');
        }

        if ($request->hasFile('imgs')){
            foreach ($request->file('imgs') as $request_img){
                $name = rand(1000000,15000000);
                $img = Image::make($request_img)->resize(305,458);
                $img = $img->insert($logo, 'bottom-right', 10,10)->save($name.'.jpg');
                $product->addMedia(public_path($name.'.jpg'))->toMediaCollection();
            }
        }


        return redirect()->route('dashboard.products.index')->with('success', 'The product has been created successfully!');
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('dashboard.products.edit')->with(['product'=>$product, 'categories'=>Category::pluck('name_'.LaravelLocalization::getCurrentLocale(), 'id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'=>'required',
            'name_en'=>'required|unique:products,name_en,'.$product->id,
            'name_ar'=>'required|unique:products,name_ar,'.$product->id,
            'description_en'=>'required',
            'description_ar'=>'required',
            'price'=>'required|integer',
            'sell_type'=>'required',
            'mainImg'=>'mimes:jpg,png,jpeg,svg,gif|max:10000',
            'imgs.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $product->update([
            'category_id'=>$request->category_id,
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'description_en'=>$request->description_en,
            'description_ar'=>$request->description_ar,
            'price'=>$request->price,
            'sell_type'=>$request->sell_type,
            'active'=>$request->active,
            'featured'=>$request->featured,
        ]);

        if ($request->hasFile('mainImg')){
            $product->clearMediaCollection('main');
            $logo = Image::make(public_path('img/dress-logo-white.png'))->resize(60,60);
            $name = rand(1000000,15000000);
            $img = Image::make($request->file('mainImg'))->resize(305,458);
            $img = $img->insert($logo, 'bottom-right', 10,10)->save($name.'.jpg');
            $product->addMedia(public_path($name.'.jpg'))->toMediaCollection('main');
        }

        if ($request->hasFile('imgs')){
            $product->clearMediaCollection();
            $logo = Image::make(public_path('img/dress-logo-white.png'))->resize(60,60);
            foreach ($request->file('imgs') as $request_img){
                $name = rand(1000000,15000000);
                $img = Image::make($request_img)->resize(305,458);
                $img = $img->insert($logo, 'bottom-right', 10,10)->save($name.'.jpg');
                $product->addMedia(public_path($name.'.jpg'))->toMediaCollection();
            }
        }

        return redirect()->route('dashboard.products.index')->with('success', 'The product has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->clearMediaCollection();
        $product->clearMediaCollection('main');
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'The product has been deleted successfully!');

    }

    public function productsTable()
    {
        return DataTables::eloquent(Product::with('Category'))
            ->addColumn('active', function($row) {
                return view('dashboard.products.product-switch')->with(['id'=> $row->id, 'status'=>$row->active, 'type'=>'active']);
            })
            ->addColumn('featured', function($row) {
                return view('dashboard.products.product-switch')->with(['id'=> $row->id, 'status'=>$row->featured, 'type'=>'featured']);
            })
            ->addColumn('action', function($row) {
                return view('dashboard.products.products-datatables')->with('row', $row);
            })
            ->addColumn('img', function($row) {
                return '<img width="50"  src="'.$row->getFirstMedia('main')->getUrl().'">';
            })
            ->rawColumns(['img'])
            ->addIndexColumn()
            ->toJson();
    }

    public function ajaxButtons(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if($request->type == 'active'){
            $product->active = $product->active ? "0" : "1";
        }

        if($request->type == 'featured'){
            $product->featured = $product->featured ? "0" : "1";
        }
        $product->save();
        return $product;
    }
}
