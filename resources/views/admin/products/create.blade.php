@extends('admin.layouts.master')

@section('title')
Thêm sản phẩm
@endsection

@section('style-libs')
<!-- Plugins css -->
<link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('script-libs')
<!-- ckeditor -->
<script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<!-- dropzone js -->
<script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>

<script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection

@section('content')
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Main product information -->
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" placeholder="Nhập tên danh mục..." name="name" required>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-xl-6 col-lg-6">
                                <label for="product-title-input2" class="form-label">Giá</label>
                                <input type="number" class="form-control" id="product-title-input2" placeholder="Nhập giá..." name="price" required>
                            </div>
                            <div class="mb-3 col-xl-6 col-lg-6">
                                <label for="product-title-input3" class="form-label">Giá KM</label>
                                <input type="number" class="form-control" id="product-title-input3" placeholder="Nhập giá giảm..." name="price_sale" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-xl-6 col-lg-6">
                                <label for="product-title-input4" class="form-label">Size (S, M, L, XL)</label>
                                <input type="text" class="form-control" id="product-title-input4" placeholder="Nhập size..." name="size" required>
                            </div>
                            <div class="mb-3 col-xl-6 col-lg-6">
                                <label for="product-title-input5" class="form-label">Color (Red, Blue, Green, Black, White)</label>
                                <input type="text" class="form-control" id="product-title-input5" placeholder="Nhập tên màu..." name="color" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="product-title-input6" class="form-label">Danh mục</label>
                            <select name="category_id" id="product-title-input6" class="form-control">
                                @foreach($categories as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product-title-input7" class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" id="product-title-input7" cols="30" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!--    gallery -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseProductGallery" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Hình ảnh</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductGallery">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Thêm hình ảnh</h5>
                            <p class="text-muted">Hình ảnh cho danh mục</p>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="category-checkbox" class="form-label">Trạng thái</label>
                            <input class="form-check-input ml-2" value="1" type="checkbox" checked name="is_active" id="category-checkbox">
                        </div>
                    </div>
                </div>
            </div>
            <!--                        Button -->
            <div class="d-flex justify-content-center mb-3">
                <button class="btn btn-success w-sm" type="submit">Thêm</button>
            </div>
        </div>

    </div>
</form>
@endsection