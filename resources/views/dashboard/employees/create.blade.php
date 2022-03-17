@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/employees" class="text-dark text-decoration-none">Employee</a></li>
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
                <form action="/dashboard/employees" method="post">
                    @csrf
                    <h6 class="text-muted my-4"><span data-feather="user"></span>   IDENTITAS PRIBADI</h6>
                    <div class="mb-2 mt-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label for="npwp" class="col-sm-1 col-form-label">NPWP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" value="{{ old('npwp') }}">
                            @error('npwp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('birth_date') is-invalid @enderror" id="datepicker1" name="birth_date" value="{{ old('birth_date') }}" required>
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="gender" class="col-sm-1 col-form-label">Gender</label>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="Default select example" name="gender_id" required>
                                @foreach($genders as $gender)
                                    @if(old('gender_id')==$gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->category }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->category }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="religion" class="col-sm-1 col-form-label">Agama</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="religion" name="religion" value="Islam" disable readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="phone" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <h6 class="text-muted my-4"><span data-feather="bookmark"></span>   RIWAYAT PENDIDIKAN</h6>
                    <div class="mb-2 row">
                        <label for="2" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="education_id_1" required>
                                @foreach($edus as $edu)
                                    @if(old('education_id_1')==$edu->id)
                                        <option value="{{ $edu->id }}" selected>{{ $edu->level }}</option>
                                    @else
                                        <option value="{{ $edu->id }}">{{ $edu->level }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="field_area_id_1" class="col-sm-2 col-form-label">Bidang Keilmuan</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="field_area_id_1" required>
                                @foreach($field_areas as $field_area)
                                    @if(old('field_area_id_1')==$field_area->id)
                                        <option value="{{ $field_area->id }}" selected>{{ $field_area->name }}</option>
                                    @else
                                        <option value="{{ $field_area->id }}">{{ $field_area->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="edu_2" class="col-sm-2 col-form-label">Pendidikan Lainnya</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="education_id_2">
                                @foreach($edus as $edu)
                                    @if(old('education_id_2')==$edu->id)
                                        <option value="{{ $edu->id }}" selected>{{ $edu->level }}</option>
                                    @else
                                        <option value="{{ $edu->id }}">{{ $edu->level }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="field_area_id_2" class="col-sm-2 col-form-label">Bidang Keilmuan</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="field_area_id_2">
                                @foreach($field_areas as $field_area)
                                    @if(old('field_area_id_2')==$field_area->id)
                                        <option value="{{ $field_area->id }}" selected>{{ $field_area->name }}</option>
                                    @else
                                        <option value="{{ $field_area->id }}">{{ $field_area->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="cert_1" class="col-sm-2 col-form-label">Sertifikasi 1</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="certification_id_1">
                                @foreach($certifications as $certification)
                                    @if(old('certification_id_1')==$certification->id)
                                        <option value="{{ $certification->id }}" selected>{{ $certification->title }}</option>
                                    @else
                                        <option value="{{ $certification->id }}">{{ $certification->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="institution_1" class="col-sm-2 col-form-label">Lembaga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="institution_1" name="institution_1" value="{{ old('institution_1') }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="cert_2" class="col-sm-2 col-form-label">Sertifikasi 2</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="certification_id_2">
                                @foreach($certifications as $certification)
                                    @if(old('certification_id_2')==$certification->id)
                                        <option value="{{ $certification->id }}" selected>{{ $certification->title }}</option>
                                    @else
                                        <option value="{{ $certification->id }}">{{ $certification->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="institution_2" class="col-sm-2 col-form-label">Lembaga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="institution_2" name="institution_2" value="{{ old('institution_2') }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="cert_3" class="col-sm-2 col-form-label">Sertifikasi 3</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="certification_id_3">
                                @foreach($certifications as $certification)
                                    @if(old('certification_id_3')==$certification->id)
                                        <option value="{{ $certification->id }}" selected>{{ $certification->title }}</option>
                                    @else
                                        <option value="{{ $certification->id }}">{{ $certification->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="institution_3" class="col-sm-2 col-form-label">Lembaga</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="institution_3" name="institution_3" value="{{ old('institution_3') }}">
                        </div>
                    </div>

                    <h6 class="text-muted my-4"><span data-feather="briefcase"></span>   KEPROFESIAN</h6>
                    <div class="mb-2 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}" required>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="nuptk" class="col-sm-2 col-form-label">NUPTK</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('nuptk') is-invalid @enderror" id="nuptk" name="nuptk" value="{{ old('nuptk') }}">
                            @error('nuptk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="join_date" class="col-sm-2 col-form-label">Tanggal Bergabung</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('join_date') is-invalid @enderror" id="datepicker3" name="join_date" value="{{ old('join_date') }}" required>
                            @error('join_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="title" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="Default select example" id="title_id" name="title_id" required>
                                @foreach($titles as $title)
                                @if(old('title_id')==$title->id)
                                <option value="{{ $title->id }}" selected>{{ $title->name }}</option>
                                @else
                                <option value="{{ $title->id }}">{{ $title->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="group" class="col-sm-2 col-form-label">Golongan Kerja</label>
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="Default select example" id="group_id" name="group_id" required>
                                @foreach($groups as $group)
                                    @if(old('group_id')==$group->id)
                                        <option value="{{ $group->id }}" selected>{{ $group->category }}</option>
                                    @else
                                        <option value="{{ $group->id }}">{{ $group->category }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button type="submit" class="btn btn-success my-3" ><span data-feather="user-plus"></span>  Create</button>
                        <a href="/dashboard/students" class="btn btn-warning my-3" role="button"><span data-feather="arrow-left"></span>  Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
