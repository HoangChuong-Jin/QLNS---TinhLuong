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
                <form action="{{route('postsuaphongban', ['id'=>$phongban->id])}}" method="POST" style="margin: 10px;">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã phòng ban: </label>
                            <input type="text" class="form-control @error('maphongban') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã phòng ban" name="maphongban" value="{{ $phongban->maphongban }}">
                            @error('maphongban')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên phòng ban: </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phòng ban" name="tenphongban" value="{{ $phongban->tenphongban }}">
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
