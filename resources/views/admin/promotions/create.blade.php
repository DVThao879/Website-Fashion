@extends('admin.layouts.master')

@section('title')
Thêm mã khuyến mại
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
<form action="{{route('admin.promotions.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Main product information -->
                <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin mã khuyến mại</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseProductInfo">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="code" class="form-label">Mã code</label>
                            <input type="text" class="form-control" id="code" placeholder="Nhập mã..." name="code" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount_percentage">Phần trăm giảm giá:</label>
                            <input type="number" name="discount_percentage" id="discount_percentage" placeholder="Nhập % giảm..." class="form-control" step="0.01" min="1" max="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="discount_amount">Số tiền giảm giá:</label>
                            <input type="number" name="discount_amount" id="discount_amount" placeholder="Nhập số tiền giảm..." class="form-control" step="0.01" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Ngày kết thúc</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Trạng thái</label>
                            <input class="form-check-input ml-2" value="1" type="checkbox" checked name="is_active" id="is_active">
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

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const discountPercentageInput = document.getElementById('discount_percentage');
        const discountAmountInput = document.getElementById('discount_amount');

        function updateInputStates() {
            if (discountPercentageInput.value) {
                discountAmountInput.disabled = true;
            } else if (discountAmountInput.value) {
                discountPercentageInput.disabled = true;
            } else {
                discountAmountInput.disabled = false;
                discountPercentageInput.disabled = false;
            }
        }

        updateInputStates();

        discountPercentageInput.addEventListener('input', updateInputStates);
        discountAmountInput.addEventListener('input', updateInputStates);
    });
</script>
@endsection