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
                <form action="{{route('postsualoainv', ['id'=>$loainv->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã loại nhân viên: </label>
                                <input type="text" class="form-control @error('maloainv') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã loại nhân viên" name="maloainv" value="{{ $loainv->maloainv }}">
                                @error('maloainv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên loại nhân viên: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại nhân viên" name="tenloainv" value="{{ $loainv->tenloainv }}">
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
