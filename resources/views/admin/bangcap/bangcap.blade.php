@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h2>{{$tieude}}</h2>
            <a href="{{route('thembangcap')}}" class="btn btn-primary">Thêm bằng cấp</a>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bằng cấp</h3>
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
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã bằng cấp</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên bằng cấp</th>
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
                                            <td>{{$data->mabangcap}}</td>
                                            <td>{{ $data->tenbangcap }}</td>
                                            @if(Auth::user()->level==0)
                                            <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)
                                                    ->format('d/m/Y H:i:s') }}</td></td>
                                            @endif
                                            <td><a href="{{route('suabangcap', ['id'=>$data->id])}}" class="text-orange"><i class="fa fa-edit"></i></a></td>
                                            <td><a href="{{route('xoabangcap', ['id'=>$data->id])}}"
                                                   onclick="return confirm('Bạn muốn xóa bằng cấp: {{$data->tenbangcap}}?');"
                                                   class="text-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Stt</th>
                                        <th rowspan="1" colspan="1">Mã bằng cấp</th>
                                        <th rowspan="1" colspan="1">Tên bằng cấp</th>
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
        <!-- /.content -->
    </div>
@endsection
