@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/students" class="text-dark text-decoration-none">Student</a></li>
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
    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-10">
            <div class="p-5 border bg-white">
                <form action="/dashboard/students" method="post">
                    @csrf
                    <h6 class="text-muted my-4"><span data-feather="user"></span>    IDENTITAS PRIBADI</h6>
                    <div class="mb-2 mt-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- <label for="nickname" class="col-sm-2 col-form-label">Nama Panggilan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" autofocus value="{{ old('nickname') }}" required>
                            @error('nickname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> -->
    
                    </div>
                    <div class="mb-2 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" required>
                            @error('nik')
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
    
                    <h6 class="text-muted my-4"><span data-feather="users"></span>    IDENTITAS ORANG TUA</h6>
                    <div class="mb-2 row">
                        <label for="father" class="col-sm-2 col-form-label">Nama Ayah Kandung</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                            @error('father_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="father" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_phone') is-invalid @enderror" id="father_phone" name="father_phone" value="{{ old('father_phone') }}" required>
                            @error('father_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="father" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <div class="col-auto">
                                <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}" required>
                                @error('father_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="father" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_income') is-invalid @enderror" id="father_income" name="father_income" value="{{ old('father_income') }}" required>
                            @error('father_income')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="mother" class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
                            @error('mother_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="mother" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('mother_phone') is-invalid @enderror" id="mother_phone" name="mother_phone" value="{{ old('mother_phone') }}" required>
                            @error('mother_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="mother" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <div class="col-auto">
                                <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}" required>
                                @error('mother_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="mother" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('mother_income') is-invalid @enderror" id="mother_income" name="mother_income" value="{{ old('mother_income') }}" required>
                            @error('mother_income')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="guardian_name" class="col-sm-2 col-form-label">Nama Wali</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}">
                            @error('guardian_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="guardian_relationship" class="col-sm-1 col-form-label">Hubungan</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('guardian_relationship') is-invalid @enderror" id="guardian_relationship" name="guardian_relationship" value="{{ old('guardian_relationship') }}">
                            @error('guardian_relationship')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="guardian_phone" class="col-sm-1 col-form-label">No. HP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('guardian_phone') is-invalid @enderror" id="guardian_phone" name="guardian_phone" value="{{ old('guardian_phone') }}">
                            @error('guardian_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="guardian_occupation" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <div class="col-auto">
                                <input type="text" class="form-control @error('guardian_occupation') is-invalid @enderror" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation') }}">
                                @error('guardian_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="guardian_income" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('guardian_income') is-invalid @enderror" id="guardian_income" name="guardian_income" value="{{ old('guardian_income') }}">
                            @error('guardian_income')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
    
                    <h6 class="text-muted my-4"><span data-feather="book-open"></span>    KESISWAAN</h6>
                    <div class="mb-2 row">
                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}" required>
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value = "Aktif" selected>Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Pindah">Pindah</option>
                            </select>
                            @error('Status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="year_enrolled" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('year_enrolled') is-invalid @enderror" id="datepicker2" name="year_enrolled" value="{{ old('year_enrolled') }}" required>
                            @error('year_enrolled')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="year_graduated" class="col-sm-2 col-form-label">Tahun Lulus</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="datepicker4" name="year_graduated" value="{{ old('year_graduated') }}" required>
                            @error('year_graduated')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="recent_class" class="col-sm-2 col-form-label">Kelompok Belajar</label>
                        <div class="col-sm-4 form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="unit" value="{{ old('unit') }}">
                                <option value="SD" selected>SD</option>
                                <option value="SMP">SMP</option>
                            </select>
                            <label for="unit" class="mx-2">Unit</label>
                            @error('unit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 form-floating">
                            <select class="form-select" id="year_id" aria-label="Floating label select example" name="year_id" value="{{ old('year_id') }}">
                                @foreach($years as $year)
                                    @if(old('year_id')==$year->id)
                                        <option value="{{ $year->id }}" selected>{{ $year->period }}</option>
                                    @else
                                        <option value="{{ $year->id }}">{{ $year->period }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="year_id" class="mx-2">Tahun Pelajaran</label>
                            @error('year_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 form-floating">
                            <select class="form-select" id="classroom_id" aria-label="Floating label select example" name="classroom_id">
                                @foreach($classrooms as $classroom)
                                    @if(old('classroom_id')==$classroom->year_id)
                                        <option value="{{ $classroom->year_id }}" selected>{{ $classroom->name }}</option>
                                    @else
                                        <option value="{{ $classroom->year_id }}">{{ $classroom->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="classroom_id" class="mx-2">Nama Kelas</label>
                            @error('classroom_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="old_school" class="col-sm-2 col-form-label">Riwayat Sekolah</label>
                        <div class="col-sm-10 form-floating">
                            <input type="text" class="form-control  @error('kindergarten') is-invalid @enderror" id="floatingInput" placeholder="" name="kindergarten" value="{{ old('kindergarten') }}">
                            <label for="floatingInput" class="mx-2">TK</label>
                            @error('kindergarten')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row justify-content-end">
                        <div class="col-sm-10 form-floating">
                            <input type="text" class="form-control  @error('elementary') is-invalid @enderror" id="floatingInput" placeholder="" name="elementary" value="{{ old('elementary') }}">
                            <label for="floatingInput" class="mx-2">SD</label>
                            @error('elementary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row justify-content-end">
                        <div class="col-sm-10 form-floating">
                            <input type="text" class="form-control  @error('juniorhs') is-invalid @enderror" id="floatingInput" placeholder="" name="juniorhs" value="{{ old('juniorhs') }}">
                            <label for="floatingInput" class="mx-2">SMP</label>
                            @error('juniorhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button type="submit" class="btn btn-success my-3"><span data-feather="user-plus"></span>  Create</button>
                        <a href="/dashboard/students" class="btn btn-warning my-3" role="button"><span data-feather="arrow-left"></span>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

<script>
var $year_id = $('#year_id'),
    $classroom_id = $('#classroom_id'),
    $options = $classroom_id.find('option');
$year_id.on('change',function(){
    $classroom_id.html($options.filter('[value="' + this.value + '"]'));
}).trigger('change');
</script>


@endsection

