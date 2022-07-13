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
                <form action="{{route('postkhoantru')}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã khoản trừ: </label>
                                <input type="text" class="form-control @error('makhoantru') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã khoản trừ" name="makhoantru" value="{{old('makhoantru')}}">
                                @error('makhoantru')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khoản trừ: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập tên khoản trừ" name="tenkhoantru" value="{{old('tenkhoantru')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền (%): </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="nhập số tiền (%)" name="giatri" value="{{old('giatri')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{old('ghichu')}}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class='fa fa-plus'></i> Tạo khoản trừ</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách khoản trừ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Stt</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Mã khoản trừ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên khoản trừ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Số tiền (%)</th>
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
                                        <td>{{$data->makhoantru}}</td>
                                        <td>{{$data->tenkhoantru}}</td>
                                        <td>{{$data->giatri}}%</td>
                                        <td>{{$data->ghichu}}</td>
                                        <td><a href="{{route('suakhoantru', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="{{route('xoakhoantru', ['id'=>$data->id])}}"
                                               onclick="return confirm('Bạn muốn xóa khoản trừ: {{$data->tenkhoantru}}?');"
                                               class="text-danger"><i class="fa fa-trash"></i></a></td>
                                    @endforeach
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Mã khoản trừ</th>
                                        <th rowspan="1" colspan="1">Tên khoản trừ</th>
                                        <th rowspan="1" colspan="1">Số tiền (%)</th>
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
