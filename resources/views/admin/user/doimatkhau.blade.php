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
                                <li class="active"><a href="#settings" data-toggle="tab">Đổi mật khẩu</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
                                            <span class="font-weight-bold text-black"><i class="fal fa-check-circle"></i> {{ session('success') }}</span>
                                        </div> <br>
                                    @endif
                                    @if(session('warning'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
                                            <span class="font-weight-bold text-black"><i class="fal fa-exclamation-triangle"></i> {{ session('warning') }}</span>
                                        </div> <br>
                                    @endif
                                    <form action="{{route('postdoimk')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <br>
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Mật khẩu cũ:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                                                       id="" placeholder="Mật khẩu cũ" name="old_password" value="" >
                                                @error('old_password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Mật khẩu mới:</label>
                                            <div class="col-sm-10">
                                                <input type="" class="form-control @error('new_password') is-invalid @enderror"
                                                       id=""  placeholder="Mật khẩu mới" name="new_password" value="">
                                                @error('new_password')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Mật khẩu mới:</label>
                                            <div class="col-sm-10">
                                                <input type="" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                       id=""  placeholder="Nhập lại mật khẩu mới" name="new_password_confirmation" value="">
                                                @error('new_password_confirmation')
                                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
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
