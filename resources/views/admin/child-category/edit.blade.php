@extends('admin.layouts.master')
@section('section')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Child Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.update', $childCategory->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select class="form-control" name="sub_category">
                                        @foreach ($subCategories as $details)
                                            <option value="{{ $details->id }}"
                                                {{ $childCategory->subcategory_id == $details->id ? 'selected' : '' }}>
                                                {{ $details->name }}({{ $details->category->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $childCategory->name }}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" {{ $childCategory->status == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive"
                                            {{ $childCategory->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
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
