<?php

namespace App\Http\Controllers\Dashboard\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['hasAnyPermission']);
        $this->middleware(['can:read categories'])->only(['index','categoriesTable']);
        $this->middleware(['can:create categories'])->only(['store']);
        $this->middleware(['can:edit categories'])->only(['update']);
        $this->middleware(['can:delete categories'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.categories.index');
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
            'name_en'=>'required|unique:categories,name_en',
            'name_ar'=>'required|unique:categories,name_ar',
        ]);

        Category::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
        ]);
        return redirect()->route('dashboard.categories.index')->with('success', 'The item has been created');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name_en'=>'required|unique:categories,name_en,'.$category->id,
            'name_ar'=>'required|unique:categories,name_ar,'.$category->id,
        ]);

        $category->update([
           'name_en'=>$request->name_en,
           'name_ar'=>$request->name_ar,
        ]);
        return redirect()->route('dashboard.categories.index')->with('success', 'The item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'The item has been deleted');
    }

    public function categoriesTable()
    {
        return DataTables::eloquent(Category::query())
            ->addColumn('action', function($row) {
                return view('dashboard.categories.categories-datatable')->with('row', $row);
            })
            ->addIndexColumn()
            ->toJson();
    }
}
