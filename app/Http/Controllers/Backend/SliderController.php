<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.slider.index", [
            'user' => auth()->user(),
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
