@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>{{$tieude}}</h2>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$tieude1}}</h3>
                </div>
                <form action="{{route('postbangluong')}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bảng lương: </label>
                                <input type="text" class="form-control @error('tenbangluong') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập Tên bảng lương" name="tenbangluong" value="{{old('tenbangluong')}}">
                                @error('tenbangluong')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày bắt đầu: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="Từ ngày" name="ngaybatdau" value="{{old('ngaybatdau')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày kết thúc: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="Đến ngày" name="ngayketthuc" value="{{old('ngayketthuc')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{old('ghichu')}}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class='fa fa-plus'></i> Tạo bảng lương</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bảng lương</h3>
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
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Stt</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Tên bảng lương</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày bắt đầu</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày kết thúc</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Ghi chú</th>
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
                                            <td>{{$data->tenbangluong}}</td>

                                            <td>
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $data->ngaybatdau)->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $data->ngayketthuc)->format('d/m/Y') }}
                                            </td>
                                            <td>{{$data->ghichu}}</td>
                                            <td><a href="{{route('suabangluong', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="{{route('xoabangluong', ['id'=>$data->id])}}"
                                                   onclick="return confirm('Bạn muốn xóa bảng lương: {{$data->tenbangluong}}?');"
                                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Tên bảng lương</th>
                                        <th rowspan="1" colspan="1">Ngày bắt đầu</th>
                                        <th rowspan="1" colspan="1">Ngày kết thúc</th>
                                        <th rowspan="1" colspan="1">Ghi chú</th>
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
    </div>
@endsection
