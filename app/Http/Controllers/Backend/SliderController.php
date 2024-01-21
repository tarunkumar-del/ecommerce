<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\DataTables\SliderDataTable;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render("admin.slider.index");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'type' => ['required', 'max:200'],
            'title' => ['required', 'max:2000'],
            'starting_price' => ['max:200'],
            'btn_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required'],
            'banner' => ['required', 'image', 'max:2000'],
        ]);
        /** Handle file upload */
        $uploadBanner = $this->uploadImage($request, 'banner', 'uploads');
        /**slider store */
        $store = new Slider();
        $store->type = $request->type;
        $store->title = $request->title;
        $store->starting_price = $request->starting_price;
        $store->btn_url = $request->btn_url;
        $store->serial = $request->serial;
        $store->status = $request->status;
        $store->user_id = auth()->user()->id;
        $store->save();
        /** image store */
        $image = new Image();
        $image->url = $uploadBanner ?? null;
        $image->imageable_id = $store->id;
        $image->imageable_type = Slider::class;
        $image->save();

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

        $slider = Slider::with([
            'images' => function ($query) {
                $query->where('imageable_type', '=', 'App\Models\Slider');
            }
        ])->find($id);

        return view('admin.slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => ['required', 'max:200'],
            'title' => ['required', 'max:2000'],
            'starting_price' => ['max:200'],
            'btn_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required'],
            'banner' => ['nullable', 'image', 'max:2000'],
        ]);
        /**slider store */
        $store = Slider::findOrFail($id);
        $store->type = $request->type;
        $store->title = $request->title;
        $store->starting_price = $request->starting_price;
        $store->btn_url = $request->btn_url;
        $store->serial = $request->serial;
        $store->status = $request->status;
        $store->user_id = auth()->user()->id;
        $store->save();
        /** image store */
        $image = Image::where(['imageable_id' => $id, 'imageable_type' => Slider::class])->first();
        $oldPath = $image->url;
        /** Handle file upload */
        $uploadBanner = $this->updateImage($request, 'banner', 'uploads', $oldPath);
        $image->url = $uploadBanner ?? $oldPath;
        $image->imageable_id = $store->id;
        $image->imageable_type = Slider::class;
        $image->save();
        toastr('updated successfully', 'success');
        return redirect()->route('admin.slider.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $slider = Slider::findOrFail($id);
        $slider->delete();
        $image = Image::where(['imageable_id' => $id, 'imageable_type' => Slider::class])->first();
        $Path = $image->url;
        $this->deleteImage($Path);
        $image->delete();
        return response(['status'=>'success','message'=>'deleted successfully']);
    }
}
