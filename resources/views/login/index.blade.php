@extends('layouts.main')


@section('container')

<div class="row justify-content-center">
  <div class="col-md-5">

    @if(session()->has('activationSuccess'))
      <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{ session('activationSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginFailed'))
      <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ session('loginFailed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main class="form-login">
      <h4 class="h5 my-5 fw-normal text-center">
        <p>Welcome to Sira Manager,</p>
        <p>to access please login your account</p>
      </h4>
      <form action="/" method="post">
        @csrf
        <div class="form-floating">
          <input type="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" placeholder="Userid" autofocus required value="{{ old('user_id') }}">
          <label for="floatingInput">User ID</label>
          @error('user_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not yet activated? <a href="/activate" class="text-success text-decoration-none">Activate Now</a></small>
    </main>
  </div>
</div>


@endsection