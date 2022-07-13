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
                    <h3 class="card-title">{{$tieude}}&nbsp;</h3>
                    <small style="color: black">&nbsp;Những ô nhập có dấu <span style="color: red;">*</span> là bắt buộc</small>
                </div>
                <form action="{{route('postnhanvien')}}" method="POST" enctype="multipart/form-data" style="
                margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã nhân viên <span style="color: red;">*</span>:</label>
                                <input type="text" class="form-control @error('manv') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã nhân viên" name="manv" value="{{old('manv')}}">
                                @error('manv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tên nhân viên <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control @error('tennv') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập tên nhân viên" name="tennv" value="{{old('tennv')}}">
                                @error('tennv')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giới tính <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('gioitinh') is-invalid @enderror" name="gioitinh">
                                    <option value="" {{old('gioitinh')=='' ?'selected':''}}>--- Chọn giới tính ---</option>
                                    <option value="1" {{old('gioitinh')=='1' ?'selected':''}}>Nam</option>
                                    <option value="0" {{old('gioitinh')=='0' ?'selected':''}}>Nữ</option>
                                </select>
                                @error('gioitinh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <span style="color: red;">*</span>:</label>
                                <input type="date" class="form-control @error('ngaysinh') is-invalid @enderror" id="exampleInputEmail1" name="ngaysinh" value="{{old('ngaysinh')}}">
                                @error('ngaysinh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nơi sinh: </label>
                                <textarea class="form-control" name="noisinh">{{old('noisinh')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Số CMND <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control @error('cmnd') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập số CMND" name="cmnd" value="{{old('cmnd')}}">
                                @error('cmnd')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày cấp:</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp" name="ngaycap" value="{{old('ngaycap')}}">
                            </div>
                            <div class="form-group">
                                <label>Nơi cấp:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập nơi cấp" name="noicap" value="{{old('noicap')}}">
                            </div>
                            <div class="form-group">
                                <label>Hộ khẩu <span style="color: red;">*</span>: </label>
                                <textarea class="form-control @error('hokhau') is-invalid @enderror" name="hokhau">{{old('hokhau')}}</textarea>
                                @error('hokhau')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tạm trú <span style="color: red;">*</span>:</label>
                                <textarea class="form-control @error('tamtru') is-invalid @enderror" name="tamtru">{{old('tamtru')}}</textarea>
                                @error('tamtru')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quốc tịch:</label>
                                <select class="form-control" name="quoctich">
                                    <option value="">--- Chọn quốc tịch ---</option>
                                    @foreach($quoctichData as $dataquoctich)
                                        <option value="{{$dataquoctich->id}}" {{(old('quoctich')==$dataquoctich->id)?'selected':''}}>{{$dataquoctich->tenquoctich}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dân tộc:</label>
                                <select class="form-control" name="dantoc">
                                    <option value="">--- Chọn dân tộc ---</option>
                                    @foreach($dantocData as $datadantoc)
                                        <option value="{{$datadantoc->id}}" {{(old('dantoc')==$datadantoc->id)?'selected':''}}>{{$datadantoc->tendantoc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tôn giáo: </label>
                                <select class="form-control" name="tongiao">
                                    <option value="">--- Chọn tôn giáo ---</option>
                                    @foreach($tongiaoData as $datatongiao)
                                        <option value="{{$datatongiao->id}}" {{(old('tongiao')==$datatongiao->id)?'selected':''}}>{{$datatongiao->tentongiao}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình ảnh <span style="color: red;">*</span>:</label>
                                <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="exampleInputEmail1" name="hinhanh" value="{{old('hinhanh')}}">
                                @error('hinhanh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red;">*</span>: </label>
                                <input type="number" class="form-control @error('sdt') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="sdt" value="{{old('sdt')}}">
                                @error('sdt')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gmail <span style="color: red;">*</span>:</label>
                                <input type="email" class="form-control @error('gmail') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập địa chỉ gmail" name="gmail" value="{{old('gmail')}}">
                                @error('gmail')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trình độ <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('trinhdo') is-invalid @enderror" name="trinhdo">
                                    <option value="">--- Chọn trình độ ---</option>
                                    @foreach($trinhdoData as $datatrinhdo)
                                        <option value="{{$datatrinhdo->id}}" {{(old('trinhdo')==$datatrinhdo->id)?'selected':''}}>{{$datatrinhdo->tentrinhdo}}</option>
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
                                        <option value="{{$databangcap->id}}" {{(old('bangcap')==$databangcap->id)?'selected':''}}>{{$databangcap->tenbangcap}}</option>
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
                                        @if($honnhan->tthonnhan==0)
                                            <option value="{{$honnhan->id}} " {{(old('honnhan')==$honnhan->id)?'selected':''}}>Độc thân</option>
                                        @else
                                            <option value="{{$honnhan->id}} " {{(old('honnhan')==$honnhan->id)?'selected':''}}>Đã kết hôn</option>
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
                                        <option value="{{$loainv->id}}" {{(old('loainv')==$loainv->id)?'selected':''}}>{{$loainv->tenloainv}}</option>
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
                                        <option value="{{$phongban->id}}" {{(old('phongban')==$phongban->id)?'selected':''}}>{{$phongban->tenphongban}}</option>
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
                                        <option value="{{$chucvu->id}}" {{(old('chucvu')==$chucvu->id)?'selected':''}}>{{$chucvu->tenchucvu}}</option>
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
                                        <option value="{{$chuyenmon->id}}" {{(old('chuyenmon')==$chuyenmon->id)?'selected':''}}>{{$chuyenmon->tenchuyenmon}}</option>
                                    @endforeach
                                </select>
                                @error('chuyenmon')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái <span style="color: red;">*</span>: </label>
                                <select class="form-control @error('trangthai') is-invalid @enderror" name="trangthai">
                                    <option value="" {{old('trangthai')=='' ?'selected':''}}>--- Chọn trạng thái ---</option>
                                    <option value="1" {{old('trangthai')=='1' ?'selected':''}}>Đang làm việc</option>
                                    <option value="0" {{old('trangthai')=='0' ?'selected':''}}>Đã nghỉ việc</option>
                                </select>
                                @error('trangthai')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <button type="submit" class='btn btn-primary'><i class='fa fa-plus'></i> Thêm mới nhân viên</button>
                </form>

            </div>

        </div>
    </div>
@endsection
