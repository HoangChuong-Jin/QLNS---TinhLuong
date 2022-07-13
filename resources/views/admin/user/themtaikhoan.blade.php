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
                <form action="{{route('postthemtaikhoan')}}" role="form" method="POST" enctype="multipart/form-data" style="margin: 10px;">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nhân viên :</label>
                            <select class="form-control @error('nhanvien_id') is-invalid @enderror" name="nhanvien_id" id="nhanvien_id">
                                <option value="chon">--- Chọn nhân viên ---</option>
                                @foreach($nhanvienData as $datanv)
                                    <option value="{{$datanv->id}}" {{(old('nhanvien_id')==$datanv->id)?'selected':''}}>
                                        {{$datanv->manv}} - {{$datanv->tennv}}
                                    </option>
                                @endforeach
                            </select>
                            @error('nhanvien_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div>
                            <label for="exampleInputPassword1">Email:</label>
                            <span id="email">{{old('email')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu:</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="new_password">
                            @error('new_password')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập lại mật khẩu:</label>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                             id="exampleInputPassword1" placeholder="Nhập lại mật khẩu" name="new_password_confirmation">
                             @error('new_password_confirmation')
                             <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quyền hạn:</label>
                            <div class="col-md-12">
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="2" checked @if(old('level') == '2') checked @endif>
                                    Nhân viên
                                </label>
                                @if(Auth::user()->level==0)
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="1" @if(old('level') == '1') checked @endif>
                                    Quản lý
                                </label>
                                <label>&nbsp;
                                    <input type="radio" name="level" class="minimal" value="0" @if(old('level') == '0') checked @endif>
                                    Administrator
                                </label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái:</label>
                            <div class="col-md-12">
                                <label>&nbsp;
                                    <input type="radio" name="status" class="minimal" value="1" @if(old('status') == '1') checked @endif>
                                    Đang hoạt động
                                </label>
                                <label>&nbsp;
                                    <input type="radio" name="status" class="minimal" value="0"  @if(old('status') == '0') checked @endif>
                                    Ngừng hoạt động
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type='submit' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo tài khoản mới</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($){
            $("#nhanvien_id").change(function (){
                let route = '{{route("layemail.ajax")}}';
                var nhanvien_id = $("#nhanvien_id").val();
                //alert(manv);
                $.ajax({
                    method:"GET",
                    url:route,
                    data:{nhanvien_id:nhanvien_id},
                    datatype: "json",
                    success: function (result){
                        if(result.error === false){
                            $("#email").html(result.message);
                        }else{
                            $("#email").html('<input value="" type="text"/>');

                        }
                    }
                });

            });
        });




    </script>

@endsection
