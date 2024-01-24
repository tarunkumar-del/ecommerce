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
                            <h4>Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.category.update',$category->id)}}" method="post" >
                                @csrf
                                @method('put')
                                <div class="form-group" method="post">
                                    <label>Icon</label>
                                   <div class="iconpicker">
                                    <button class="btn btn-primary" data-icon="{{$category->icon}}"data-selected-class="btn-danger"
                                    data-unselected-class="btn-info"role="iconpicker" name="icon"></button>
                                   </div>
                                </div>
                                <div class="form-group">

                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                      <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                      <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                  </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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
