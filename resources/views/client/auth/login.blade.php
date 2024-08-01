@extends('client.layouts.app')

@section('content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Đăng nhập</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="h3 mb-3 text-black">Đăng nhập</h2>
        </div>
        <div class="col-md-12">
          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="p-3 p-lg-5 border">
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
                  <label for="password" class="text-black">Mật khẩu </label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu...">
                  @error('password')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
                <div class="text-center mb-3">
                  <button class="btn btn-primary" type="submit">Đăng nhập</button>
                </div>
              <p class="text-center">Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng kí ngay!</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection