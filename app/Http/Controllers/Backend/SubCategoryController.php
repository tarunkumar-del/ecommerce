<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name'],
            'status' => ['required'],
        ]);


        /**subcategory store */
        $store = new SubCategory();
        $store->category_id = $request->category;
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
        $subcategories = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub-category.edit', compact('subcategories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name,' . $id],
            'status' => ['required'],
        ]);


        /**subcategory store */
        $store = SubCategory::findOrFail($id);
        $store->category_id = $request->category;
        $store->name = $request->name;
        $store->slug = Str::slug($request->name);
        $store->status = $request->status;
        $store->user_id = auth()->user()->id;
        $store->save();
        toastr('updated successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return response(['status' => 'success', 'message' => 'Successfully deleted']);
    }
    public function subCategoryStatus(Request $request)
    {
        $category = SubCategory::findOrFail($request->id);
        $category->status = $request->status == "true" ? 'active' : 'inactive';
        $category->save();
        return response(['status' => 'success', 'message' => 'Updated successfully!']);
    }
}
