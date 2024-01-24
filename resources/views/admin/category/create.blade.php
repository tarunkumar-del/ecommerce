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
                            <form action="{{route('admin.category.store')}}" method="post" >
                                @csrf

                                <div class="form-group" method="post">
                                    <label>Icon</label>
                                   <div class="iconpicker">
                                    <button class="btn btn-primary" data-selected-class="btn-danger"
                                    data-unselected-class="btn-info"role="iconpicker" name="icon"></button>
                                   </div>
                                </div>
                                <div class="form-group">

                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                      <option value="active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                      <option value="inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
