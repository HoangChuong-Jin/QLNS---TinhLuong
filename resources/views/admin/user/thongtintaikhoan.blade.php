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
                <div class="row" style="margin: 10px;">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                @if(Auth::user()->avatar!="")
                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('/public/images/user-img.png') }}"
                                         style="margin-left: 33%;" alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-responsive img-circle"
                                         src="{{ asset('/public/images/avata/'.$userData->hinhanh) }}"
                                         style="margin-left: 33%;" alt="User profile picture">
                                @endif

                                <h3 class="profile-username text-center">
                                    {{$userData->tennv}}
                                </h3>

                                @if($userData->level == 0)
                                    <p class="text-muted text-center">
                                        Administrator
                                    </p>
                                @elseif($userData->level ==1)
                                    <p class="text-muted text-center">
                                        Quản lý
                                    </p>
                                @else
                                    <p class="text-muted text-center">
                                        Nhân viên
                                    </p>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#settings" data-toggle="tab">Thay đổi thông tin</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form action="{{route('suathongtintaikhoan')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <br>
                                        @csrf
                                        <div class="form-group" hidden>
                                            <label for="inputExperience" class="col-sm-2 control-label">id</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail"
                                                       placeholder="Name" name="id" value="{{$userData->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail"
                                                       placeholder="Name" name="name" value="{{$userData->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                       placeholder="Gmail nhân viên" name="email" value="{{$userData->email}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                @if($userData->level == 0)
                                                    <p class="box-title"> <b>Quyền hạn: </b>
                                                        <span class="badge bg-blue"> Administrator </span>
                                                    </p>
                                                @elseif($userData->level == 1)
                                                    <p class="box-title"> <b>Quyền hạn: </b>
                                                        <span class="badge bg-orange">Quản lý </span>
                                                    </p>
                                                @else
                                                    <p class="box-title"> <b>Quyền hạn: </b>
                                                        <span class="badge bg-orange">Nhân viên </span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                @if($userData->lock == 1)
                                                    <p class="box-title"> <b>Trạng thái: </b>
                                                        <span class="badge bg-blue">Đang làm việc </span>
                                                    </p>
                                                @else
                                                    <p class="box-title"> <b>Trạng thái: </b>
                                                        <span class="badge bg-danger">Đã nghĩ việc </span>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding-top: 10px;">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Lưu lại</button>
                                                <a href="{{route('doimatkhau')}}" class="btn btn-primary" ><i class=""></i> Đổi mật khẩu</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>


            </div>


        </div>
    </div>
@endsection
