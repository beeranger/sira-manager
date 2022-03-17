@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item">Data Properties</a></li>
      <li class="breadcrumb-item">Year</a></li>
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
    <a href="/dashboard/properties/years/create" class="btn btn-success my-3"><span data-feather="user-plus"></span>  Create</a>
  </div>
  
  <div class="p-4 border bg-white my-1">
    <div class="table-responsive-lg">
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Year ID</th>
            <th scope="col">Periode</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($years as $year)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $year->id }}</td>
              <td>{{ $year->period }}</td>
              <td>
                <!-- <a href="/dashboard/properties/years/{{ $year->id }}/edit" class="btn btn-warning border-0 btn-sm" role="button"><span data-feather="eye"></span> Edit</a> -->
                <form action="/dashboard/properties/years/{{ $year->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Do you want to delete option of {{ $year->name }}?')"><span data-feather="trash-2"></span> Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>



@endsection