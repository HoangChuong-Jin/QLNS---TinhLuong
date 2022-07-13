@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h2>{{$tieude}}</h2>
            <a href="{{route('themtaikhoan')}}" class="btn btn-primary">Thêm tài khoản</a>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tài khoản</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('admin.alert')
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Stt</th>
                                        {{--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Hình ảnh</th>--}}
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Họ & tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Gmail</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Quyền</th>
                                        @if(Auth::user()->level==0)
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Khóa</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=0; ?>
                                            @foreach($viewdata as $data)
                                        <?php $stt++ ?>
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$data->tennv}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            @if($data->level==0)
                                                <td>Admin</td>
                                            @elseif($data->level==1)
                                                <td>Quản lý</td>
                                            @else
                                                <td>Nhân viên</td>
                                            @endif
                                            @if(Auth::user()->level==0)
                                                @if($data->lock==0)
                                                    <td> <a href="{{route('trangthai',['id'=>$data->id])}}" class="fa fa-lock text-danger"></a> </td>
                                                @else
                                                    <td> <a href="{{route('trangthai',['id'=>$data->id])}}" class="fa fa-unlock"></a> </td>
                                                @endif
                                            <td><a href="{{route('suataikhoan' , ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="{{route('xoataikhoan', ['id'=>$data->id])}}"
                                                   onclick="return confirm('Bạn muốn xóa tài khoản: {{$data->name}}?');"
                                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                                            @endif
                                        </tr>
                                            @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        {{--<th rowspan="1" colspan="1">Hình ảnh</th>--}}
                                        <th rowspan="1" colspan="1">Họ & tên</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Gmail</th>
                                        <th rowspan="1" colspan="1">Quyền</th>
                                        @if(Auth::user()->level==0)
                                        <th rowspan="1" colspan="1">Khóa</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                        @endif
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.content -->
    </div>
@endsection
