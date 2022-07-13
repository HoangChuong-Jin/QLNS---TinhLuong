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
                    <h3 class="card-title">{{$tieude}}</h3>
                </div>
                <form action="{{route('postsuabangluong', ['id'=>$bangluong->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bảng lương: </label>
                                <input type="text" class="form-control @error('tenbangluong') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập tên bang lương" name="tenbangluong" value="{{ $bangluong->tenbangluong }}">
                                @error('tenbangluong')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày bắt đầu: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập ngày bắt đầu" name="ngaybatdau" value="{{ $bangluong->ngaybatdau }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày kết thúc: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="nhập ngày kết thúc" name="ngayketthuc" value="{{ $bangluong->ngayketthuc }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{ $bangluong->ghichu }}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class=''></i> Cập nhật</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

        </div>
    </div>
@endsection
