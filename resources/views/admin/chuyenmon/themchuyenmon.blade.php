@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2></h2>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$tieude}}</h3>
                </div>
                <form action="{{route('postchuyenmon')}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã chuyên môn: </label>
                                <input type="text" class="form-control @error('machuyenmon') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã chuyên môn" name="machuyenmon" value="{{old('machuyenmon')}}">
                                @error('machuyenmon')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chuyên môn: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên chuyên môn" name="tenchuyenmon" value="{{old('tenchuyenmon')}}">
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class='fa fa-plus'></i> Tạo chuyên môn</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách chuyên môn</h3>
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
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã chuyên môn</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên chuyên môn</th>
                                        @if(Auth::user()->level==0)
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Cập nhật</th>
                                        @endif
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
                                            <td>{{$data->machuyenmon}}</td>
                                            <td>{{ $data->tenchuyenmon}}</td>
                                            @if(Auth::user()->level==0)
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)
                                                    ->format('d/m/Y H:i:s') }}</td></td>
                                            @endif
                                            <td><a href="{{route('suachuyenmon', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="{{route('xoachuyenmon', ['id'=>$data->id])}}"
                                                   onclick="return confirm('Bạn muốn xóa chuyên môn: {{$data->tenchuyenmon}}?');"
                                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Mã chuyên môn</th>
                                        <th rowspan="1" colspan="1">Tên chuyên môn</th>
                                        @if(Auth::user()->level==0)
                                        <th rowspan="1" colspan="1">Cập nhật</th>
                                        @endif
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
