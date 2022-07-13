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
                <form action="{{route('postsuataikhoan', ['id'=>$user->id])}}" role="form" method="POST" enctype="multipart/form-data" style="margin: 10px;">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên nhân viên: {{$userData->tennv}}</label>
                        </div>
                        <div class="form-group">
                            <label>Email: {{$user->email}}</label>
                        </div>
                        <div>
                            <label for="exampleInputPassword1">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quyền hạn:</label>
                            <div class="col-md-12">
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="2" @if($user->level == 2) checked @endif>
                                    Nhân viên
                                </label>
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="1"  @if($user->level == 1) checked @endif>
                                    Quản lý
                                </label>
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="0"   @if($user->level == 0) checked @endif>
                                    Administrator
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái:</label>
                            <div class="col-md-12">
                                <label>&nbsp;
                                    <input type="radio" name="status" class="minimal" value="1" @if($user->lock == 1) checked @endif >
                                    Đang hoạt động
                                </label>
                                <label>&nbsp;
                                    <input type="radio" name="status" class="minimal" value="0"  @if($user->lock == 0) checked @endif>
                                    Ngừng hoạt động
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type='submit' class='btn btn-primary'><i class=''></i> Cập nhật</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
@endsection

