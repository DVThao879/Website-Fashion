@extends('admin.layouts.master')

@section('title')
    Chi tiết mã khuyến mại
@endsection

@section('content')
<ul class="list-unstyled">
    <li class="mb-2">ID: {{$promotion->id}}</li>
    <li class="mb-2">Mã code: {{$promotion->code}}</li>
    <li class="mb-2">
    Giảm theo phần trăm: 
    @if(!empty($promotion->discount_percentage))
    {{  number_format($promotion->discount_percentage, 0, ",", ".") }} %
    @else
        <span class="text-danger">Không có!</span>
    @endif
    </li>
    <li class="mb-2">
        Giảm theo tiền:
        @if(!empty($promotion->discount_amount))
        {{ number_format($promotion->discount_amount, 0, ",", ".") }} VND
        @else
        <span class="text-danger">Không có!</span>
        @endif
    </li>
    <li class="mb-2">Số lượng: {{$promotion->quantity}}</li>
    <li class="mb-2">Ngày bắt đầu: {{$promotion->start_date}}</li>
    <li class="mb-2">Ngày kết thúc: {{ $promotion->end_date }}</li>
    <li class="mb-2">Trạng thái: {!! $promotion->is_active ? '<span class="">Hoạt động</span>' : '<span class="">Không hoạt động</span>' !!}</li>
</ul>
@endsection