@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item">Data Properties</a></li>
      <li class="breadcrumb-item">Title</a></li>
    </ol>
  </nav>
</div>

@if(session()->has('Success'))
<div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
  <i class="bi bi-exclamation-triangle-fill"></i>
  {{ session('Success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid">
  
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/dashboard/properties/titles/create" class="btn btn-success my-3"><span data-feather="user-plus"></span>  Create</a>
  </div>
  
  <div class="p-4 border bg-white my-1">
    <div class="table-responsive-lg">
      <table class="table table-hover table-sm nowrap" id="datatable1">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Disable</th>
            <th scope="col">View</th>
            <th scope="col">Add</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">Download</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @push('scripts')
          <script>
            $(document).ready( function () {
              $('#datatable1').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('titles.index') }}",
                  columns: [
                      { data: 'null', sortable:false, render:function(data,type,row,meta){
                            return meta.row + meta.settings._iDisplayStart+1}
                          },
                      { data: 'name', name: 'name' },
                      { data: 'slug', name: 'slug' },
                      { data: 'disable', name: 'disable' },
                      { data: 'view', name: 'view' },
                      { data: 'add', name: 'add' },
                      { data: 'edit', name: 'edit' },
                      { data: 'delete', name: 'delete' },
                      { data: 'download', name: 'download' },
                      { data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
              });
            });
          </script>
          @endpush
        </tbody>
      </table>
    </div>
  </div>
  
</div>
@endsection
