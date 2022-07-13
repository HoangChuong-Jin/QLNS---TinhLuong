@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>{{$tieude}}</h2>
        </div>
        {{----}}
        <div class="content" style="padding: 15px;">
            @foreach($nhanvienData as $nhanvien)
                @if($nhanvien->id == $id_ch)
            <div class="row" style="border: 2px solid grey; padding: 10px;">

                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <h3 class="box-title">Mã nhân viên: {{$nhanvien->manv}}</h3>
                            <hr>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">

                                <div class="col-lg-2">
                                    @if($nhanvien->hinhanh !="")
                                        <img src="{{ asset('/public/images/avata/'.$nhanvien->hinhanh) }}" width="100%" class="" alt="hinhanh">
                                    @else
                                        <img src="{{ asset('/public/images/user-img2.png') }}" width="100%" class="" alt="hinhanh">
                                    @endif
                                </div>
                                <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                                    <p class="box-title">Tên nhân viên: <b>{{$nhanvien->tennv}}</b></p>
                                    @if($nhanvien->gioitinh == 1)
                                        <p class="box-title">Giới tính: Nam</p>
                                    @else
                                        <p class="box-title">Giới tính: Nữ</p>
                                    @endif
                                    <p class="box-title">Ngày sinh:
                                        <b>
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d', $nhanvien->ngaysinh)
                                                    ->format('d/m/Y') }}
                                        </b>
                                    </p>
                                    <p class="box-title">Nơi sinh: {{$nhanvien->noisinh}}</p>
                                    <p class="box-title">Số CMND: <b>{{$nhanvien->cmnd}}</b></p>
                                    <p class="box-title">Ngày cấp:
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $nhanvien->ngaycap_cmnd)
                                                    ->format('d/m/Y') }}
                                    </p>
                                    <p class="box-title">Nơi cấp: {{$nhanvien->noicap_cmnd}}</p>
                                    <p class="box-title">Hộ khẩu: <b>{{$nhanvien->hokhau}}</b></p>
                                    <p class="box-title">Tạm trú: {{$nhanvien->tamtru}}</p>

                                @foreach($quoctichData as $quoctich)
                                    @if($nhanvien->quoctich_id == $quoctich->id)
                                        <p class="box-title">Quốc tịch: {{$quoctich->tenquoctich}}</p>
                                    @endif
                                @endforeach
                                @foreach($dantocData as $dantoc)
                                    @if($nhanvien->dantoc_id == $dantoc->id)
                                        <p class="box-title">Dân tộc: {{$dantoc->tendantoc}}</p>
                                    @endif
                                @endforeach
                                @foreach($tongiaoData as $tongiao)
                                    @if($nhanvien->tongiao_id == $tongiao->id)
                                        <p class="box-title">Tôn giáo: {{$tongiao->tentongiao}}</p>
                                    @endif
                                @endforeach
                                </div>
                                <!-- col-5 -->
                                <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                                    <p class="box-title">Số điện thoại: {{$nhanvien->sdt}}</p>
                                    <p class="box-title">Gmail: {{$nhanvien->gmail}}</p>
                                    @foreach($loainhanvienData as $loainv)
                                        @if($nhanvien->loainv_id == $loainv->id)
                                            <p class="box-title">Loại nhân viên: <b>{{$loainv->tenloainv}}</b></p>
                                        @endif
                                    @endforeach
                                    @foreach($tinhtranghonnhanData as $tthn)
                                        @if($nhanvien->honnhan_id == $tthn->id)
                                            <p class="box-title">Tình trạng hôn nhân:
                                                @if($tthn->tthonnhan == 0)
                                                    <b>Độc thân</b>
                                                @else
                                                    <b>Đã kết hôn</b>
                                                @endif
                                            </p>
                                        @endif
                                    @endforeach
                                    @foreach($trinhdoData as $trinhdo)
                                        @if($nhanvien->trinhdo_id == $trinhdo->id)
                                            <p class="box-title">Trình độ: <b>{{$trinhdo->tentrinhdo}}</b></p>
                                        @endif
                                    @endforeach
                                    @foreach($chuyenmonData as $chuyenmon)
                                        @if($nhanvien->chuyenmon_id == $chuyenmon->id)
                                            <p class="box-title">Chuyên môn: <b>{{$chuyenmon->tenchuyenmon}}</b></p>
                                        @endif
                                    @endforeach
                                    @foreach($bangcapData as $bangcap)
                                        @if($nhanvien->bangcap_id == $bangcap->id)
                                            <p class="box-title">Bằng cấp: <b>{{$bangcap->tenbangcap}}</b></p>
                                        @endif
                                    @endforeach
                                    @foreach($phongbanData as $phongban)
                                        @if($nhanvien->phongban_id == $phongban->id)
                                            <p class="box-title">Phòng ban: <b>{{$phongban->tenphongban}}</b></p>
                                        @endif
                                    @endforeach
                                    @foreach($chucvuData as $chucvu)
                                        @if($nhanvien->chucvu_id == $chucvu->id)
                                            <p class="box-title">Chức vụ: <b>{{$chucvu->tenchucvu}}</b></p>
                                        @endif
                                    @endforeach

                                    @if($nhanvien->trangthai == 1)
                                        <p class="box-title">Trạng thái:
                                            <span class="badge bg-blue">Đang làm việc </span>
                                        </p>
                                    @else
                                        <p class="box-title">Trạng thái:
                                            <span class="badge bg-orange">Đã nghĩ việc </span>
                                        </p>
                                    @endif
                                </div>
                                <!-- col-5 -->
                            </div>
                            <!-- row -->
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
