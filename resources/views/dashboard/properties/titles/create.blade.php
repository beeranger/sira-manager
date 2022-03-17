@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/properties/titles" class="text-dark text-decoration-none">Title Property</a></li>
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
@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert"">
    @foreach ($errors->all() as $error)
      <li><i class="bi bi-info-circle-fill"></i>   {{ $error }}</li>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endforeach
  </div>
@endif

<div class="container-sm-fluid">
  <div class="row justify-content-center align-items-center my-5">
    <div class="col-lg-10">
      <div class="p-5 border bg-white">
        <form action="/dashboard/properties/titles" method="post">
          @csrf

          <div class="row justify-content-center align-items-center align-items-center my-2">
            <div class="col-3">
              <label for="name" class="col-form-label">Jabatan</label>
            </div>
            <div class="col-9 form-floating pd-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="" value="{{ old('name') }}">
              <label for="name" class="mx-2">New Title</label>
              @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
          </div>

          <div class="row justify-content-center align-items-center align-items-center my-2">
            <div class="col-3">
              <label for="slug" class="col-form-label">Slug</label>
            </div>
            <div class="col-9 form-floating pd-3">
              <input type="text" class="form-control" name="slug" id="slug" placeholder="" value="{{ old('slug') }}" disable readonly>
              <label for="slug" class="mx-2">New Slug</label>
            </div>
          </div>
            
          <div class="row justify-content-center align-items-center my-3">
            <div class="col-3">
              <label for="employee_auth" class="col-form-label">Data Karyawan</label>
            </div>
            <div class="col-9">
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="hidden" name="disable" value="0">
                <input type="checkbox" class="btn-check" id="disable" name="disable" value="1" checked>
                <label class="btn btn-outline-success" for="disable">Disable</label>
                <input type="hidden" name="view" value="0">
                <input type="checkbox" class="btn-check" id="view" name="view" value="1">
                <label class="btn btn-outline-success" for="view">View</label>
                <input type="hidden" name="add" value="0">
                <input type="checkbox" class="btn-check" id="add" name="add" value="1">
                <label class="btn btn-outline-success" for="add">Add</label>
                <input type="hidden" name="edit" value="0">
                <input type="checkbox" class="btn-check" id="edit" name="edit" value="1">
                <label class="btn btn-outline-success" for="edit">Edit</label>
                <input type="hidden" name="delete" value="0">
                <input type="checkbox" class="btn-check" id="delete" name="delete" value="1">
                <label class="btn btn-outline-success" for="delete">Delete</label>
                <input type="hidden" name="download" value="0">
                <input type="checkbox" class="btn-check" id="download" name="download" value="1">
                <label class="btn btn-outline-success" for="download">Download</label>
              </div>
            </div>
          </div>
        
          <!-- <div class="row justify-content-center align-items-center my-3">
            <div class="col-2">
              <label for="student_auth" class="col-form-label">Data Siswa</label>
            </div>
            <div class="col-9">
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="hidden" name="disable" value="0">
                <input type="checkbox" class="btn-check" id="disable" name="disable" value="1" checked>
                <label class="btn btn-outline-success" for="disable">Disable</label>
                <input type="hidden" name="view" value="0">
                <input type="checkbox" class="btn-check" id="view" name="view" value="1">
                <label class="btn btn-outline-success" for="view">View</label>
                <input type="hidden" name="add" value="0">
                <input type="checkbox" class="btn-check" id="add" name="add" value="1">
                <label class="btn btn-outline-success" for="add">Add</label>
                <input type="hidden" name="edit" value="0">
                <input type="checkbox" class="btn-check" id="edit" name="edit" value="1">
                <label class="btn btn-outline-success" for="edit">Edit</label>
                <input type="hidden" name="delete" value="0">
                <input type="checkbox" class="btn-check" id="delete" name="delete" value="1">
                <label class="btn btn-outline-success" for="delete">Delete</label>
                <input type="hidden" name="download" value="0">
                <input type="checkbox" class="btn-check" id="download" name="download" value="1">
                <label class="btn btn-outline-success" for="download">Download</label>
              </div>
            </div>
          </div>
          
          <div class="row justify-content-center align-items-center my-3">
            <div class="col-2">
              <label for="schoolfund_auth" class="col-form-label">Data Anggaran Sekolah</label>
            </div>
            <div class="col-9">
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="hidden" name="disable" value="0">
                <input type="checkbox" class="btn-check" id="disable" name="disable" value="1" checked>
                <label class="btn btn-outline-success" for="disable">Disable</label>
                <input type="hidden" name="view" value="0">
                <input type="checkbox" class="btn-check" id="view" name="view" value="1">
                <label class="btn btn-outline-success" for="view">View</label>
                <input type="hidden" name="add" value="0">
                <input type="checkbox" class="btn-check" id="add" name="add" value="1">
                <label class="btn btn-outline-success" for="add">Add</label>
                <input type="hidden" name="edit" value="0">
                <input type="checkbox" class="btn-check" id="edit" name="edit" value="1">
                <label class="btn btn-outline-success" for="edit">Edit</label>
                <input type="hidden" name="delete" value="0">
                <input type="checkbox" class="btn-check" id="delete" name="delete" value="1">
                <label class="btn btn-outline-success" for="delete">Delete</label>
                <input type="hidden" name="download" value="0">
                <input type="checkbox" class="btn-check" id="download" name="download" value="1">
                <label class="btn btn-outline-success" for="download">Download</label>
              </div>
            </div>
          </div>
          
          <div class="row justify-content-center align-items-center my-3">
            <div class="col-2">
              <label for="student_auth" class="col-form-label">Data Pembayaran</label>
            </div>
            <div class="col-9">
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="hidden" name="disable" value="0">
                <input type="checkbox" class="btn-check" id="disable" name="disable" value="1" checked>
                <label class="btn btn-outline-success" for="disable">Disable</label>
                <input type="hidden" name="view" value="0">
                <input type="checkbox" class="btn-check" id="view" name="view" value="1">
                <label class="btn btn-outline-success" for="view">View</label>
                <input type="hidden" name="add" value="0">
                <input type="checkbox" class="btn-check" id="add" name="add" value="1">
                <label class="btn btn-outline-success" for="add">Add</label>
                <input type="hidden" name="edit" value="0">
                <input type="checkbox" class="btn-check" id="edit" name="edit" value="1">
                <label class="btn btn-outline-success" for="edit">Edit</label>
                <input type="hidden" name="delete" value="0">
                <input type="checkbox" class="btn-check" id="delete" name="delete" value="1">
                <label class="btn btn-outline-success" for="delete">Delete</label>
                <input type="hidden" name="download" value="0">
                <input type="checkbox" class="btn-check" id="download" name="download" value="1">
                <label class="btn btn-outline-success" for="download">Download</label>
              </div>
            </div>
          </div> -->
          
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <button type="submit" class="btn btn-success my-3"><span data-feather="plus-square"></span>  Create</button>
            <a href="/dashboard/properties/titles" class="btn btn-warning my-3" role="button"><span data-feather="arrow-left"></span>  Back</a>
          </div>
        
        </form>
      </div>

    </div>
  </div>

</div>

<script>
    const name=document.querySelector('#name');
    const slug=document.querySelector('#slug');

    name.addEventListener('change',function(){
        fetch('/dashboard/properties/titles/checkSlug?name='+name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    
    document.addEventListener('trix-file-accept',function(e){
      e.preventDefault;
    });
</script>

@endsection