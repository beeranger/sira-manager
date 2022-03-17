@extends('dashboard.layouts.main')

@section('container')

<div class="row mt-3">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" class="text-dark text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/students" class="text-dark text-decoration-none">Students</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $student->name }}</li>
    </ol>
  </nav>
</div>

<div class="container-sm-fluid">
    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-10">
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/dashboard/finances/{{ $student->nis }}" class="btn btn-info my-3" role="button"><i class="bi bi-cash-coin"></i>  Data Keuangan</a>
            </div>
    
            <div class="p-5 border bg-white">
                <form action="/dashboard/students/{{ $student->nis }}" method="post">
                    <h6 class="text-muted my-4"><span data-feather="user"></span>    IDENTITAS PRIBADI</h6>
                    <div class="mb-2 mt-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$student->name) }}" disabled>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- <label for="nickname" class="col-sm-2 col-form-label">Nama Panggilan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" autofocus value="{{ old('nickname',$student->nickname) }}" disabled>
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
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik',$student->nik) }}" disabled>
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
                            <input type="text" class="form-control @error('birth_date') is-invalid @enderror" id="datepicker1" name="birth_date" value="{{ old('birth_date',$student->birth_date) }}" disabled>
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="gender" class="col-sm-1 col-form-label">Gender</label>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="Default select example" name="gender_id" disabled>
                                @foreach($genders as $gender)
                                    @if(old('gender_id',$student->gender_id)==$gender->id)
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
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address',$student->address) }}" disabled>
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
                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name',$student->father_name) }}" disabled>
                            @error('father_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="father" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_phone') is-invalid @enderror" id="father_phone" name="father_phone" value="{{ old('father_phone',$student->father_phone) }}" disabled>
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
                                <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" id="father_occupation" name="father_occupation" value="{{ old('father_occupation',$student->father_occupation) }}" disabled>
                                @error('father_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="father" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('father_income') is-invalid @enderror" id="father_income" name="father_income" value="{{ old('father_income',$student->father_income) }}" disabled>
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
                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name',$student->mother_name) }}" disabled>
                            @error('mother_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="mother" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('mother_phone') is-invalid @enderror" id="mother_phone" name="mother_phone" value="{{ old('mother_phone',$student->mother_phone) }}" disabled>
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
                                <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation',$student->mother_occupation) }}" disabled>
                                @error('mother_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="mother" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('mother_income') is-invalid @enderror" id="mother_income" name="mother_income" value="{{ old('mother_income',$student->mother_income) }}" disabled>
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
                            <input type="text" class="form-control @error('guardian_name') is-invalid @enderror" id="guardian_name" name="guardian_name" value="{{ old('guardian_name',$student->guardian_name) }}" disabled>
                            @error('guardian_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="guardian_relationship" class="col-sm-1 col-form-label">Hubungan</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('guardian_relationship') is-invalid @enderror" id="guardian_relationship" name="guardian_relationship" value="{{ old('guardian_relationship',$student->guardian_relationship) }}" disabled>
                            @error('guardian_relationship')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="guardian_phone" class="col-sm-1 col-form-label">No. HP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('guardian_phone') is-invalid @enderror" id="guardian_phone" name="guardian_phone" value="{{ old('guardian_phone',$student->guardian_phone) }}" disabled>
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
                                <input type="text" class="form-control @error('guardian_occupation') is-invalid @enderror" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation',$student->guardian_occupation) }}" disabled>
                                @error('guardian_occupation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="guardian_income" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('guardian_income') is-invalid @enderror" id="guardian_income" name="guardian_income" value="{{ old('guardian_income',$student->guardian_income) }}" disabled>
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
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis',$student->nis) }}" disabled>
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn',$student->nisn) }}" disabled>
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
                            <select class="form-select" aria-label="Default select example" name="status" value="{{ old('status',$student->status) }}" disabled>
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
                            <input type="text" class="form-control @error('year_enrolled') is-invalid @enderror" id="datepicker2" name="year_enrolled" value="{{ old('year_enrolled',$student->year_enrolled) }}" disabled>
                            @error('year_enrolled')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label for="year_graduated" class="col-sm-2 col-form-label">Tahun Lulus</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control @error('year_graduated') is-invalid @enderror" id="datepicker4" name="year_graduated" value="{{ old('year_graduated',$student->year_graduated) }}" disabled>
                            @error('year_graduated')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="old_school" class="col-sm-2 col-form-label">Riwayat Sekolah</label>
                        <div class="col-sm-3 form-floating">
                            <input type="text" class="form-control  @error('kindergarten') is-invalid @enderror" id="floatingInput" placeholder="" name="kindergarten" value="{{ old('kindergarten',$student->kindergarten) }}"  disabled>
                            <label for="floatingInput" class="mx-2">TK</label>
                            @error('kindergarten')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 form-floating">
                            <input type="text" class="form-control  @error('elementary') is-invalid @enderror" id="floatingInput" placeholder="" name="elementary" value="{{ old('elementary',$student->elementary) }}" disabled>
                            <label for="floatingInput" class="mx-2">SD</label>
                            @error('elementary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-3 form-floating">
                            <input type="text" class="form-control  @error('juniorhs') is-invalid @enderror" id="floatingInput" placeholder="" name="juniorhs" value="{{ old('juniorhs',$student->juniorhs) }}" disabled>
                            <label for="floatingInput" class="mx-2">SMP</label>
                            @error('juniorhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <form action="/dashboard/students/{{ $student->nis }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger my-3" onclick="return confirm('Do you want to delete data of a student named {{ $student->name }}?')"><span data-feather="trash"></span>  Delete</button>
                        </form>
                        <a href="/dashboard/students" class="btn btn-warning my-3" role="button"><span data-feather="arrow-left"></span>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-sm-fluid">
    <div class="row justify-content-center align-items-center my-3">
        <div class="col-lg-10">
            <div class="p-5 border bg-white">


            </div>
        </div>
    </div>
</div>
@endsection