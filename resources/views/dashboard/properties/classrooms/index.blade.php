@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item">Data Properties</a></li>
      <li class="breadcrumb-item">Classroom</a></li>
    </ol>
  </nav>
</div>

@if(session()->has('Success'))
  <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
    <li><i class="bi bi-info-circle-fill"></i>   {{ session('Success') }}</li>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert"">
    @foreach ($errors->all() as $error)
      <li><i class="bi bi-info-circle-fill"></i>   {{ $error }}</li>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endforeach
  </div>
@endif

<div class="container-fluid">
  <div class="p-4 border bg-white my-1">
    <form action="/dashboard/properties/classrooms" method="post">
      @csrf
      <div class="row justify-content-evenly align-items-center my-1">
        <div class="col-3">
          <select class="form-select" aria-label="Default select example" name="unit" value="{{ old('unit') }}">
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
          </select>
        </div>
        <div class="col-3">
          <select class="form-select" aria-label="Default select example" name="year_id" value="{{ old('year_id') }}">
            @foreach($years as $year)
              @if(old('year_id')==$year->id)
                <option value="{{ $year->id }}" selected>{{ $year->period }}</option>
              @else
                <option value="{{ $year->id }}">{{ $year->period }}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="col-3">
            <label for="name" class="visually-hidden">Nama Kelas</label>
            <input type="text" class="form-control" id="name" placeholder="Contoh: 1A" value="{{ old('name') }}" name="name" autofocus>
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-success my-3 col-12"><span data-feather="plus-circle"></span>  Add</button>
        </div>

      </div>
    </form>
  </div>
  
  <div class="p-4 border bg-white my-3">
    <div class="table-responsive-lg">
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Unit</th>
            <th scope="col">Year</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classrooms as $classroom)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $classroom->unit }}</td>
              <td>{{ $classroom->year->period }}</td>
              <td>{{ $classroom->name}}</td>
              <td>
                <form action="/dashboard/properties/classrooms/{{ $classroom->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Do you want to delete option of {{ $classroom->name }}?')"><span data-feather="trash-2"></span> Delete</button>
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