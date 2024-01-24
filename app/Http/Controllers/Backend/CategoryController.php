<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render("admin.category.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', 'unique:categories,name'],
            'status' => ['required'],
        ]);


        /**slider store */
        $store = new Category();
        $store->icon = $request->icon;
        $store->name = $request->name;
        $store->slug = Str::slug($request->name);
        $store->status = $request->status;
        $store->user_id = auth()->user()->id;
        $store->save();
        toastr('created successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', 'unique:categories,name,'.$id],
            'status' => ['required'],
        ]);
        /**slider store */
        $store = Category::findOrFail($id);
        $store->icon = $request->icon;
        $store->name = $request->name;
        $store->slug = Str::slug($request->name);
        $store->status = $request->status;
        $store->user_id = auth()->user()->id;
        $store->save();
        toastr('Updated successfully!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category = Category::findOrFail($id);
        $category->delete();
        return response(['status'=>'success','message'=>'Successfully deleted']);
    }
    public function categoryStatus(Request $request){

        $category = Category::findOrFail($request->id);
        $category->status = $request->status == "true" ? 'active':'inactive';
        $category->save();
        return response(['status'=>'success','message'=>'updated successfully!']);
    }
}
