@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>{{$tieude}}</h2>
            <a href="{{route('tinhluong')}}" class="btn btn-primary">Tính lương</a>
            <a data-toggle="modal" data-target="#xuat_luong" class="btn btn-success">Xuất excel</a>
            <a href="{{route('khoantru')}}" class="btn btn-warning">Khoản trừ</a>
            <a href="{{route('phucap')}}" class="btn btn-danger">Phụ cấp</a>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="form-group" id="filter_col1" data-column="1">
                        <label class="form-label" >Chọn bảng lương</label>
                        <select name="tenbangluong" class="form-control column_filter " id="col1_filter">
                            <option value="">--Chọn bảng lương--</option>
                            @foreach($bangluongData as $bl)
                                <option value="{{$bl->tenbangluong}}" >{{$bl->tenbangluong}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--<div class="form-group">
                        <label style="color: black">Chọn bảng lương: </label>
                        <select class="form-control" name="">
                            <option value="" >-- Chọn bảng lương --</option>
                            @foreach($bangluongData as $bl)
                                <option value="{{$bl->id}}" >{{$bl->tenbangluong}}</option>
                            @endforeach
                        </select>
                    </div>--}}
                </div>
                <form action="" method="POST" style="margin: 10px;">
                    @include('admin.alert')
                    <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Stt</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Bảng lương</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Mã lương</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Tên nhân viên</th>
                            {{--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Chức vụ</th>--}}
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Lương tháng</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1">Ngày công</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Thực lãnh</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" >Ngày chấm</th>
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
                            <td>{{$data->tenbangluong}}</td>
                            <td>{{$data->maluong}}</td>
                            <td>{{$data->tennv}}</td>
                            {{--<td>{{$data->tenchucvu}}</td>--}}
                            <td>{{$data->luongthang}}</td>
                            <td>{{$data->ngaycong}}</td>
                            <td>{{$data->thuclanh}}</td>

                            <td>{{ Carbon\Carbon::createFromFormat
                                    ('Y-m-d', $data->ngaycham)->format('d/m/Y') }}</td>

                            <td><a href="{{route('ctluong', ['id'=>$data->id])}}" class=""><i class="fa fa-eye"></i></a></td>
                            <td><a href="{{route('sualuong', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                            <td><a href="{{route('xoaluong', ['id'=>$data->id])}}"
                                   onclick="return confirm('Bạn muốn xóa lương của: {{$data->tennv}}?');"
                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Stt</th>
                            <th rowspan="1" colspan="1">Bảng lương</th>
                            <th rowspan="1" colspan="1">Mã lương</th>
                            <th rowspan="1" colspan="1">Tên nhân viên</th>
                            {{--<th rowspan="1" colspan="1">Chức vụ</th>--}}
                            <th rowspan="1" colspan="1">Lương tháng</th>
                            <th rowspan="1" colspan="1">Ngày công</th>
                            <th rowspan="1" colspan="1">Thực lãnh</th>
                            <th rowspan="1" colspan="1">Ngày chấm</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </tfoot>
                    </table>

                </form>


            </div>

        </div>
    </div>
    <div class="modal fade" id="xuat_luong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xuất bảng lương</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('xuat_luong')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" >Chọn bảng lương</label>
                            <select name="bangluong_id" class="form-control" id="bangluong_id">
                                <option value="none">--Chọn bảng lương--</option>
                                <option value="all">Tất cả</option>
                                @foreach($bangluongData as $bl)
                                    <option value="{{$bl->id}}" >{{$bl->tenbangluong}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Xuất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        function filterGlobal () {
            $('#example1').DataTable().search(
                $('#global_filter').val(),

            ).draw();
        }

        function filterColumn ( i ) {
            $('#example1').DataTable().column( i ).search(
                $('#col'+i+'_filter').val()
            ).draw();
        }

        $(document).ready(function() {

            $('#example1').DataTable();


        } );

        $('select.column_filter').on('change', function () {
            filterColumn( $(this).parents('div').attr('data-column') );
        } );


    </script>
@endsection
