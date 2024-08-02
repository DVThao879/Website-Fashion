@extends('client.layouts.app')

@section('content')
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cửa hàng</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            @foreach ($products as $item)
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="shop-single.html"><img src="{{ Storage::url($item->image) }}" alt="Image" class="img-fluid"></a>
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
                        <form action="{{ route('cart.add') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $item->id }}">
                          <input type="hidden" name="name" value="{{ $item->name }}">
                          <input type="hidden" name="price" value="{{ $item->price }}">
                          <input type="hidden" name="price_sale" value="{{ $item->price_sale }}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="image" value="{{ $item->image }}">
                          <button type="submit" class="border-0 bg-white">Thêm vào giỏ</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{-- <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div> --}}
          {{-- Phân trang laravel --}}
          <div class="pagination-wrapper">
            {{ $products->links('pagination::bootstrap-4') }}
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Danh mục</h3>
            <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="{{ route('shop') }}" class="d-flex"><span>Tất cả</span> <span class="text-black ml-auto">({{ $totalProducts }})</span></a></li>
                @foreach ($categories as $item)
                <li class="mb-1"><a href="{{ route('shop', $item->id) }}" class="d-flex"><span>{{ $item->name }}</span> <span class="text-black ml-auto">({{ $item->products_count }})</span></a></li>
                @endforeach
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Lọc theo giá</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
              <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
              </label>
              <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
              </label>
              <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
              </label>
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
              </a>
            </div>

          </div>
        </div>
      </div>
    
    </div>
  </div>
@endsection