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
                <form action="{{route('postphucap')}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã phụ cấp: </label>
                                <input type="text" class="form-control @error('maphucap') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập mã phụ cấp" name="maphucap" value="{{old('maphucap')}}">
                                @error('maphucap')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phụ cấp: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập tên phụ cấp" name="tenphucap" value="{{old('tenphucap')}}">
                            </div>
                            <div class="form-group">
                                <label>Chức vụ : </label>
                                <select class="form-control @error('chucvu') is-invalid @enderror" name="chucvu">
                                    <option value="">--- Chọn chức vụ ---</option>
                                    @foreach($chucvuData as $chucvu)
                                        <option value="{{$chucvu->id}}" {{(old('chucvu')==$chucvu->id)?'selected':''}}>{{$chucvu->tenchucvu}}</option>
                                    @endforeach
                                </select>
                                @error('chucvu')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiền/ngày: </label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="nhập số tiền" name="sotien" value="{{old('sotien')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{old('ghichu')}}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo phụ cấp</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách phụ cấp</h3>
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
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Mã phụ cấp</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên phụ cấp</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Chức vụ</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">Tiền/ngày</th>
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
                                        <td>{{$data->maphucap}}</td>
                                        <td>{{$data->tenphucap}}</td>
                                        <td>{{$data->tenchucvu}}</td>
                                        <td>{{$data->sotien}}</td>
                                        <td>{{$data->ghichu}}</td>
                                        <td><a href="{{route('suaphucap', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                        <td><a href="{{route('xoaphucap', ['id'=>$data->id])}}"
                                               onclick="return confirm('Bạn muốn xóa phụ cấp: {{$data->tenphucap}}?');"
                                               class="text-danger"><i class="fa fa-trash"></i></a></td>
                                    @endforeach
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Mã phụ cấp</th>
                                        <th rowspan="1" colspan="1">Tên phụ cấp</th>
                                        <th rowspan="1" colspan="1">Chức vụ</th>
                                        <th rowspan="1" colspan="1">Tiền/ngày</th>
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
