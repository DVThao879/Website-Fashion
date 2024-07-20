@extends('client.layouts.master')

@section('content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $product->name }}</strong></div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ Storage::url($product->image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{ $product->name }}</h2>
          <p>{{ $product->description }}</p>
          <p class="mb-4">Kích thước: {{ $product->size }}</p>
          <div class="d-flex color-item align-items-center mb-4" >
            <span>Màu:</span> <span class="color d-inline-block rounded-circle ml-1 border" style="background-color: {{ $product->color }}"></span>
          </div>
          <p><strong class="text-primary h4">Giá: <del>{{ number_format($product->price, 0, ",", ".") }} VND</del> {{ number_format($product->price_sale, 0, ",", ".") }} VND</strong></p>
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
              <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
          </div>
          </div>
          <p><a href="#" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Sản phẩm liên quan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @foreach ($relatedProducts as $item)
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{ Storage::url($item->image) }}" alt="Image" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{ route('detail', $item->id) }}">{{ $item->name }}</a></h3>
                    <div class="d-flex justify-content-center">
                        <p class="mb-0 mr-3">Kích cỡ: {{ $item->size }}</p>
                        <div class="d-flex color-item align-items-center" >
                        <span>Màu:</span> <span class="color d-inline-block rounded-circle ml-1 border" style="background-color: {{ $item->color }}"></span>
                        </div>
                    </div>
                    @if($item->price_sale > 0 || !empty($item->price_sale))
                    <p class="text-primary font-weight-bold"><del>{{ number_format($item->price, 0, ",", ".") }} VND</del> {{ number_format($item->price_sale, 0, ",", ".") }} VND</p>
                    @else
                    <p class="text-primary font-weight-bold">{{ number_format($item->price, 0, ",", ".") }} VND</p>
                    @endif
                    <div class="d-flex justify-content-center gap-4">
                      <a href="{{ route('detail', $item->id) }}" class="mr-2">Xem chi tiết</a>
                      <a href="#" class="">Thêm vào giỏ</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection