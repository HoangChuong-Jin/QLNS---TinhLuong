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
                    <h3 class="card-title">{{$tieude2}}</h3>
                    <small style="color: black">&nbsp;Những ô nhập có dấu <span style="color: red;">*</span> là bắt buộc</small>
                </div>
                <form action="{{route('postsuanhanvien' ,['id'=>$nhanvien->id])}}" method="POST" enctype="multipart/form-data" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã nhân viên <span style="color: red;">*</span>:</label>
                                <input type="text" class="form-control @error('manv') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã nhân viên" name="manv" value="{{$nhanvien->manv}}">
                                @error('manv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tên nhân viên <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control @error('tennv') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập tên nhân viên" name="tennv" value="{{$nhanvien->tennv}}">
                                @error('tennv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giới tính <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('gioitinh') is-invalid @enderror" name="gioitinh">
                                    @if($nhanvien->gioitinh == 1)
                                        <option value="1" selected='selected'>Nam</option>
                                        <option value="0">Nữ</option>
                                    @else
                                        <option value="1">Nam</option>
                                        <option value="0" selected='selected'>Nữ</option>
                                    @endif
                                </select>
                                @error('gioitinh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <span style="color: red;">*</span>:</label>
                                <input type="date" class="form-control @error('ngaysinh') is-invalid @enderror" id="exampleInputEmail1" name="ngaysinh" value="{{$nhanvien->ngaysinh}}">
                                @error('ngaysinh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nơi sinh: </label>
                                <textarea class="form-control" name="noisinh">{{$nhanvien->noisinh}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Số CMND <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control @error('cmnd') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập số CMND" name="cmnd" value="{{$nhanvien->cmnd}}">
                                @error('cmnd')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày cấp:</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập nơi cấp" name="ngaycap" value="{{$nhanvien->ngaycap_cmnd}}">
                            </div>
                            <div class="form-group">
                                <label>Nơi cấp:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập nơi cấp" name="noicap" value="{{$nhanvien->noicap_cmnd}}">
                            </div>
                            <div class="form-group">
                                <label>Hộ khẩu <span style="color: red;">*</span>: </label>
                                <textarea class="form-control @error('hokhau') is-invalid @enderror" name="hokhau">{{$nhanvien->hokhau}}</textarea>
                                @error('hokhau')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tạm trú <span style="color: red;">*</span>:</label>
                                <textarea class="form-control @error('tamtru') is-invalid @enderror" name="tamtru">{{$nhanvien->tamtru}}</textarea>
                                @error('tamtru')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quốc tịch:</label>
                                <select class="form-control" name="quoctich">
                                    <option value="">--- Chọn quốc tịch ---</option>
                                    @foreach($quoctichData as $dataquoctich)
                                        @if($dataquoctich->id==$nhanvien->quoctich_id)
                                            <option value="{{$dataquoctich->id}}" selected='selected'>{{$dataquoctich->tenquoctich}}</option>
                                        @else
                                            <option value="{{$dataquoctich->id}}">{{$dataquoctich->tenquoctich}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dân tộc:</label>
                                <select class="form-control" name="dantoc">
                                    <option value="">--- Chọn dân tộc ---</option>
                                    @foreach($dantocData as $datadantoc)
                                        @if($datadantoc->id==$nhanvien->dantoc_id)
                                            <option value="{{$datadantoc->id}}" selected='selected'>{{$datadantoc->tendantoc}}</option>
                                        @else
                                            <option value="{{$datadantoc->id}}">{{$datadantoc->tendantoc}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tôn giáo: </label>
                                <select class="form-control" name="tongiao">
                                    <option value="">--- Chọn tôn giáo ---</option>
                                    @foreach($tongiaoData as $datatongiao)
                                        @if($datatongiao->id==$nhanvien->tongiao_id)
                                            <option value="{{$datatongiao->id}}" selected='selected'>{{$datatongiao->tentongiao}}</option>
                                        @else
                                            <option value="{{$datatongiao->id}}">{{$datatongiao->tentongiao}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình ảnh: </label><br>
                                @if($nhanvien->hinhanh)
                                    <img src="{{ asset('/public/images/avata/'.$nhanvien->hinhanh) }}"
                                         width="100px" class="" alt="hinhanh">
                                @else
                                    <img src="{{ asset('/public/images/user-img2.png') }}"
                                         width="100px" class="" alt="hinhanh">
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Đổi hình ảnh: </label>
                                <input type="file" class="form-control" id="" name="hinhanh" value="{{$nhanvien->hinhanh}}">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red;">*</span>: </label>
                                <input type="number" class="form-control @error('sdt') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="sdt" value="{{$nhanvien->sdt}}">
                                @error('sdt')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gmail <span style="color: red;">*</span>:</label>
                                <input type="email" class="form-control @error('gmail') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập địa chỉ gmail" name="gmail" value="{{$nhanvien->gmail}}">
                                @error('gmail')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trình độ <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('trinhdo') is-invalid @enderror" name="trinhdo">
                                    <option value="">--- Chọn trình độ ---</option>
                                    @foreach($trinhdoData as $datatrinhdo)
                                        @if($datatrinhdo->id==$nhanvien->trinhdo_id)
                                            <option value="{{$datatrinhdo->id}}" selected='selected'>{{$datatrinhdo->tentrinhdo}}</option>
                                        @else
                                            <option value="{{$datatrinhdo->id}}" >{{$datatrinhdo->tentrinhdo}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('trinhdo')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bằng cấp <span style="color: red;">*</span>:</label>
                                <select class="form-control @error('bangcap') is-invalid @enderror" name="bangcap">
                                    <option value="">--- Chọn bằng cấp ---</option>
                                    @foreach($bangcapData as $databangcap)
                                        @if($databangcap->id==$nhanvien->bangcap_id)
                                            <option value="{{$databangcap->id}}" selected='selected'>{{$databangcap->tenbangcap}}</option>
                                        @else
                                            <option value="{{$databangcap->id}}">{{$databangcap->tenbangcap}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('bangcap')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tình trạng hôn nhân:</label>
                                <select class="form-control @error('honnhan') is-invalid @enderror" name="honnhan">
                                    <option value="">--- Chọn tình trạng hôn nhân ---</option>
                                    @foreach($tinhtranghonnhanData as $honnhan)
                                        @if($honnhan->id==$nhanvien->honnhan_id)
                                            <option value="{{$honnhan->id}}" selected='selected'>
                                                @if($honnhan->tthonnhan == 0)
                                                    Độc thân
                                                @else Đã kết hôn
                                                @endif
                                            </option>
                                        @else
                                            <option value="{{$honnhan->id}}" >
                                                @if($honnhan->tthonnhan == 0)
                                                    Độc thân
                                                @else Đã kết hôn
                                                @endif
                                            </option>
                                        @endif

                                    @endforeach
                                </select>
                                @error('honnhan')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Loại nhân viên <span style="color: red;">*</span> : </label>
                                <select class="form-control @error('loainv') is-invalid @enderror" name="loainv">
                                    <option value="">--- Chọn loại nhân viên ---</option>
                                    @foreach($loainhanvienData as $loainv)
                                        @if($loainv->id==$nhanvien->loainv_id)
                                            <option value="{{$loainv->id}}" selected='selected'>{{$loainv->tenloainv}}</option>
                                        @else
                                            <option value="{{$loainv->id}}" >{{$loainv->tenloainv}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('loainv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phòng ban <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('phongban') is-invalid @enderror" name="phongban">
                                    <option value="">--- Chọn phòng ban ---</option>
                                    @foreach($phongbanData as $phongban)
                                        @if($phongban->id==$nhanvien->phongban_id)
                                            <option value="{{$phongban->id}}" selected='selected'>{{$phongban->tenphongban}}</option>
                                        @else
                                            <option value="{{$phongban->id}}" >{{$phongban->tenphongban}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('phongban')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chức vụ <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('chucvu') is-invalid @enderror" name="chucvu">
                                    <option value="">--- Chọn chức vụ ---</option>
                                    @foreach($chucvuData as $chucvu)
                                        @if($chucvu->id==$nhanvien->chucvu_id)
                                            <option value="{{$chucvu->id}}" selected='selected'>{{$chucvu->tenchucvu}}</option>
                                        @else
                                            <option value="{{$chucvu->id}}" >{{$chucvu->tenchucvu}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('chucvu')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chuyên môn <span style="color: red;">*</span>:</label>
                                <select class="form-control @error('chuyenmon') is-invalid @enderror" name="chuyenmon">
                                    <option value="">--- Chọn chuyên môn ---</option>
                                    @foreach($chuyenmonData as $chuyenmon)
                                        @if($chuyenmon->id==$nhanvien->chuyenmon_id)
                                            <option value="{{$chuyenmon->id}}" selected='selected'>{{$chuyenmon->tenchuyenmon}}</option>
                                        @else
                                            <option value="{{$chuyenmon->id}}">{{$chuyenmon->tenchuyenmon}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('chuyenmon')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('trangthai') is-invalid @enderror" name="trangthai">
                                    @if($nhanvien->trangthai == 1)
                                        <option value="1" selected='selected'>Đang làm việc</option>
                                        <option value="0" >Đã nghỉ việc</option>
                                    @else
                                        <option value="1" >Đang làm việc</option>
                                        <option value="0" selected='selected'>Đã nghỉ việc</option>
                                    @endif
                                </select>
                                @error('trangthai')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <button type="submit" class='btn btn-primary'><i class=''></i> Cập nhật</button>
                </form>

            </div>

        </div>
    </div>
@endsection
