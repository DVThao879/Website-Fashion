@extends('client.layouts.app')

@section('content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Đăng ký</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="h3 mb-3 text-black">Đăng ký</h2>
        </div>
        <div class="col-md-12">
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="name" class="text-black">Họ và tên </label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên..." value="{{ old('name') }}">
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="email" class="text-black">Email </label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email..." value="{{ old('email') }}">
                  @error('email')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="password" class="text-black">Password </label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu...">
                  @error('password')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="password_confirmation" class="text-black">Nhập lại password </label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu...">
                </div>
              </div>
                <div class="text-center mb-3">
                  <button class="btn btn-primary" type="submit">Đăng ký</button>
                </div>
              <p class="text-center">Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay!</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection