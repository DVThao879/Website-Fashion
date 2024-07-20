@extends('client.layouts.master')

@section('content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('index') }}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{ route('cart.show') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="border p-4 rounded" role="alert">
            Returning customer? <a href="#">Click here</a> to login
          </div>
        </div>
      </div>
      <form action="{{ route('order.place') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Thông tin</h2>
          <div class="p-3 p-lg-5 border">
            <div class="form-group">
              <label for="c_country" class="text-black">Tên <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_country" name="name" placeholder="Nhập tên" required>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="c_companyname" name="email" placeholder="Nhập email" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="address" placeholder="Nhập địa chỉ" required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Mã giảm giá</h2>
              <div class="p-3 p-lg-5 border">
                
                <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                <div class="input-group w-75">
                  <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                  </div>
                </div>

              </div>
            </div>
          </div>
          
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Đơn của bạn</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }} <strong class="mx-2">x</strong> {{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 0, ",", ".") }} VND</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-black font-weight-bold"><strong>Tổng cộng giỏ hàng</strong></td>
                        <td class="text-black">{{ number_format($totalAmount, 0, ",", ".") }} VND</td>
                    </tr>
                    <tr>
                        <td class="text-black font-weight-bold"><strong>Tổng đơn hàng</strong></td>
                        <td class="text-black font-weight-bold"><strong>{{ number_format($totalAmount, 0, ",", ".") }} VND</strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg py-3 btn-block" >Thanh toán đơn hàng</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </form>
      <!-- </form> -->
    </div>
  </div>
@endsection