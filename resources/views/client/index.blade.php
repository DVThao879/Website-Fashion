@extends('client.layouts.master')

@section('content')
  <div class="site-blocks-cover" style="background-image: url('{{ asset('theme/client/images/hero_1.jpg') }}');" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">Khám Phá Đôi Giày Hoàn Hảo</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">Tìm đôi giày lý tưởng với bộ sưu tập đa dạng của chúng tôi. Chất lượng tốt nhất để bạn tự tin và thoải mái mỗi ngày.</p>
            <p>
              <a href="#" class="btn btn-sm btn-primary">Mua ngay</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm site-blocks-1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
          <div class="icon mr-4 align-self-start">
            <span class="icon-truck"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">MIỄN PHÍ VẬN CHUYỂN</h2>
            <p>Miễn phí vận chuyển cho mọi đơn hàng. Giao hàng nhanh chóng và miễn phí trên toàn quốc.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
          <div class="icon mr-4 align-self-start">
            <span class="icon-refresh2"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">MIỄN PHÍ ĐỔI TRẢ</h2>
            <p>Chính sách đổi trả miễn phí trong vòng 30 ngày. Đổi trả dễ dàng và không tốn thêm phí.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
          <div class="icon mr-4 align-self-start">
            <span class="icon-help"></span>
          </div>
          <div class="text">
            <h2 class="text-uppercase">HỖ TRỢ KHÁCH HÀNG</h2>
            <p>Hỗ trợ khách hàng 24/7. Liên hệ chúng tôi bất cứ lúc nào để được trợ giúp nhanh chóng.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-blocks-2">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pb-4">
          <h2>Danh mục Hot</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($topCategories as $item)
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
          <a class="block-2-item" href="{{ route('shop', $item->id) }}">
            <figure class="image">
              <img src="{{ Storage::url($item->image) }}" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Bộ sưu tập</span>
              <h3>{{ $item->name }}</h3>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Sản phẩm nổi bật</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @foreach ($products as $item)
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
                    <form action="{{ route('cart.add') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $item->id }}">
                      <input type="hidden" name="name" value="{{ $item->name }}">
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
        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Giảm giá!</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5">
          <a href="#"><img src="\theme\client\images/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
        </div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a href="#">Giảm 50% các mặt hàng</a></h2>
          <p class="post-meta mb-4">Bới <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> Ngày 15/8/2024</p>
          <p>Khám phá các món đồ giảm giá hấp dẫn nhất!</p>
          <p><a href="#" class="btn btn-primary btn-sm">Mua ngay</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection