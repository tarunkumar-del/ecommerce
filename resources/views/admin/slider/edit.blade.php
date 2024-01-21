@extends('admin.layouts.master')
@section('section')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label><br>
                                    <img src="{{asset($slider->images[0]->url)}}" width=200px alt="" srcset="">
                                </div>
                                <div class="form-group" >
                                    <label>Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">

                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ $slider->type }}">
                                </div>
                                <div class="form-group">

                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                </div>
                                <div class="form-group">

                                    <label>Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price" value="{{ $slider->starting_price }}">
                                </div>
                                <div class="form-group">
                                    <label>Button Url</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{ $slider->btn_url }}">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                      <option value="active" {{$slider->status == 'Active' ? 'selected' : '' }}>Active</option>
                                      <option value="inactive" {{ $slider->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                  </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                        <div class="card-footer text-right">

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
