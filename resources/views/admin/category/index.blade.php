@extends('admin.layouts.master')
@section('section')
   <!-- Main Content -->

    <section class="section">
      <div class="section-header">
        <h1>Category</h1>

      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="card-header">
                <h4>Simple Table</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.category.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> create new</a>
                </div>
              </div>
              <div class="card-body">
                {{ $dataTable->table() }}
              </div>
              <div class="card-footer text-right">

              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function(){
            $('body').on('click','.change-status',function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).attr('data-id');
                $.ajax({
                    method:'put',
                    url:"{{route('admin.category.change-status')}}",
                    data:{
                        id:id,
                        status:isChecked,
                    },
                    success:function(data){
                        toastr.success(data.message);
                    }
                })
            })
        })
    </script>
@endpush

