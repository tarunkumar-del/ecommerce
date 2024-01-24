<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;
use App\Models\Category;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = SubCategory::with('category')->get();

        return view('admin.child-category.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name'],
            'status' => ['required'],
        ]);


        /**slider store */
        $store = new ChildCategory();
        $store->name = $request->name;
        $store->subcategory_id = $request->sub_category;
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

        // $childCategory = ChildCategory::with('subCategory.category')->get();
        // // dd(Category::with('SubCategory.childcategories')->get());

        // // dd($category->SubCategory());
        // dd($childCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::with('category')->get();
        return view('admin.child-category.edit', compact('childCategory', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name,' . $id],
            'status' => ['required'],
        ]);



        $store = ChildCategory::findOrFail($id);
        $store->name = $request->name;
        $store->subcategory_id = $request->sub_category;
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
        $category = ChildCategory::findOrFail($id);
        $category->delete();
        return response(['status' => 'success', 'message' => 'Successfully deleted']);
    }
    public function childCategoryStatus(Request $request)
    {
        $category = ChildCategory::findOrFail($request->id);
        $category->status = $request->status == "true" ? 'active' : 'inactive';
        $category->save();
        return response(['status' => 'success', 'message' => 'updated successfully!']);
    }
}
