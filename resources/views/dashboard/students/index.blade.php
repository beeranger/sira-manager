@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Student</li>
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

  <div class="col">
    <a href="/dashboard/students/create" class="btn btn-success col-1 my-2 offset-sm-11"><span data-feather="user-plus"></span>  Add</a>
  </div>

  <div class="p-4 border bg-white">
    <div class="table-responsive-lg">
        <table class="table table-hover table-sm" id="datatable1">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">NIS</th>
              <th scope="col">NISN</th>
              <th scope="col">Angkatan</th>
              <th scope="col">Status</th>
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
                    ajax: "{{ route('students.index') }}",
                    columns: [
                        { data: 'null', sortable:false, render:function(data,type,row,meta){
                          return meta.row + meta.settings._iDisplayStart+1}
                        },
                        { data: 'name', name: 'name' },
                        { data: 'nis', name: 'nis' },
                        { data: 'nisn', name: 'nisn' },
                        { data: 'year_enrolled', name: 'year_enrolled' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false, searchable: false},
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

</div>
  



@endsection
