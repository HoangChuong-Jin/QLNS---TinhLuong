@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h2>{{$tieude}}</h2>
            <a href="{{route('themnhanvien')}}" class="btn btn-primary">Thêm nhân viên</a>
            <a data-toggle="modal" data-target="#ImpNhanVien" class="btn btn-warning">Nhập excel</a>
            <a href="{{route('xuat_nv')}}" class="btn btn-success">Xuất excel</a>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách nhân viên</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('admin.alert')
                                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Stt</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã NV</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Họ & tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Giới tính</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Số điện thoại</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Gmail</th>
                                        @if(Auth::user()->level==0)
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Cập nhật</th>
                                        @endif
                                        <th>Chi tiết</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt=0; ?>
                                    @foreach($viewdata as $data)
                                        <?php $stt++ ?>
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$data->manv}}</td>
                                            <td>
                                                @if($data->hinhanh !="")
                                                    <img src="{{ asset('/public/images/avata/'.$data->hinhanh) }}" width="100px" class="" alt="hinhanh">
                                                @else
                                                    <img src="{{ asset('/public/images/user-img2.png') }}" width="100px" class="" alt="hinhanh">
                                                @endif
                                            </td>
                                            <td>{{$data->tennv}}</td>
                                            @if($data->gioitinh==1)
                                                <td>Nam</td>
                                            @else
                                                <td>Nữ</td>
                                            @endif
                                            <td>{{$data->sdt}}</td>
                                            <td>{{$data->gmail}}</td>
                                            @if(Auth::user()->level==0)
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)
                                                    ->format('d/m/Y H:i:s') }}</td>
                                            @endif
                                            <td><a href="{{route('ctnhanvien', ['id'=>$data->id])}}" class=""><i class="fa fa-eye"></i></a></td>
                                            <td><a href="{{route('suanhanvien', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="{{route('xoanhanvien', ['id'=>$data->id])}}"
                                                   onclick="return confirm('Bạn muốn xóa nhân viên: {{$data->tennv}}?');"
                                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Mã NV</th>
                                        <th rowspan="1" colspan="1">Hình ảnh</th>
                                        <th rowspan="1" colspan="1">Họ & tên</th>
                                        <th rowspan="1" colspan="1">Giới tính</th>
                                        <th rowspan="1" colspan="1">số điện thoại</th>
                                        <th rowspan="1" colspan="1">Gmail</th>
                                        @if(Auth::user()->level==0)
                                        <th rowspan="1" colspan="1">Cập nhật</th>
                                        @endif
                                        <th>Chi tiết</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
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
    <div class="modal fade" id="ImpNhanVien" tabindex="-1" aria-labelledby="ImpUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập danh sách nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('import_ex_nv')}}" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        @csrf
                        <div id="hien_chon" style="margin-left: 16px;display: none;">
                            <div class="file">
                                <img class="file-icon" alt="EXCEL icon" title="application/excel" src="{{ asset('/public/icons/application-excel.jpg') }}" width="20">
                                <span id="tenex"></span>
                            </div>
                        </div>
                        <label for="type-file">
                            <div class="btn plus" id="an_chon" style="color: green;font-size: 22px;">
                                <i class="fa fa-plus"></i> Chọn file excel
                            </div>
                        </label>
                        <input style="display: none" id="type-file" type="file" name="type_file" accept=".xlsx, .xls, .csv, .ods">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-warning">Nhập&nbsp;<i class='bx bxs-file-import'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("type-file").onchange = function () {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                var fname = $('#type-file')[0].files[0].name;
                document.getElementById("hien_chon").style.display = 'block';
                document.getElementById("an_chon").style.display = 'none';
                document.getElementById("tenex").innerText = fname;
            } else {
                alert("Please upgrade your browser, because your current browser lacks some new features we need!");
            }
        };
    </script>
@endsection
