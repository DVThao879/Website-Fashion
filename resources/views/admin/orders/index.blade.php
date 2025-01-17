@extends('admin.layouts.master')

@section('title')
    Danh sách đơn hàng
@endsection

@section('style-libs')
    <!-- Custom styles for this page -->
    <link href="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('script-libs')
    <!-- Page level plugins -->
    <script src="{{asset('theme/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme/admin/js/demo/datatables-demo.js')}}"></script>
@endsection

@section('content')
    @if(session('message'))
        <p class="alert alert-success">{{session('message')}}</p>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>PTTT</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>PTTT</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                   @if($item->payment_method == 1)
                                   <span class="badge badge-success">Thanh toán trực tiếp</span>
                                   @elseif($item->payment_method == 2)
                                   <span class="badge badge-success">Thanh toán online</span>
                                   @endif
                                </td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge badge-success">Đơn hàng mới</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge badge-success">Đang xử lí</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge badge-success">Đang giao hàng</span>
                                    @elseif ($item->status == 3)
                                        <span class="badge badge-success">Đã giao hàng</span>
                                    @elseif ($item->status == 4)
                                        <span class="badge badge-danger">Đã bị hủy</span>
                                    @else
                                        <span class="badge badge-danger">Không xác định</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-primary mr-2" href="{{route('admin.orders.show', $item)}}">Xem</a>
                                    <a class="btn btn-success mr-2" href="{{route('admin.orders.edit', $item)}}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection