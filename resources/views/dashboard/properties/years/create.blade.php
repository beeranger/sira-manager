@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/properties/years" class="text-dark text-decoration-none">Year Property</a></li>
      <li class="breadcrumb-item active" aria-current="page">New</li>
    </ol>
  </nav>
</div>

@if(session()->has('Success'))
  <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
    <li><i class="bi bi-info-circle-fill"></i>   {{ session('Success') }}</li>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

<div class="container-sm-fluid">
  <div class="row justify-content-center align-items-center my-5">
    <div class="col-lg-10">
      <div class="p-5 border bg-white">
        <form action="/dashboard/properties/years" method="post">
          @csrf

          <div class="row justify-content-center align-items-center align-items-center my-2">
            <div class="col-3">
              <label for="period" class="col-form-label">Tahun Ajaran</label>
            </div>
            <div class="col-9 form-floating pd-3">
              <input type="text" class="form-control" name="period" id="period" placeholder="" value="{{ old('period') }}" autofocus>
              <label for="period" class="mx-2">Tahun Ajaran</label>
            </div>
          </div>
                      
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <button type="submit" class="btn btn-success my-3"><span data-feather="plus-square"></span>  Create</button>
            <a href="/dashboard/properties/years" class="btn btn-warning my-3" role="button"><span data-feather="arrow-left"></span>  Back</a>
          </div>
        
        </form>
      </div>

    </div>
  </div>

</div>


@endsection