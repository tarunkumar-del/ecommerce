@extends('admin.layouts.master')
@section('section')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update',$subcategories->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        @foreach ($categories as $details)
                                            <option value="{{ $details->id }}"
                                                {{ $subcategories->category_id == $details->id ? 'selected' : '' }}>
                                                {{ $details->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $subcategories->name }}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" {{ $subcategories->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $subcategories->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
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
