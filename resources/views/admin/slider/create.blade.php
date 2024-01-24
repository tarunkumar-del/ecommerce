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
                            <h4>Create Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" method="post">
                                    <label>Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">

                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                                </div>
                                <div class="form-group">

                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">

                                    <label>Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price" value="{{ old('starting_price') }}">
                                </div>
                                <div class="form-group">
                                    <label>Button Url</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{ old('btn_url') }}">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" class="form-control" name="serial" value="{{ old('serial') }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                      <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                      <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
