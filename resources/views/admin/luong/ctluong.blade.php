@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>{{$tieude}}</h2>
        </div>
        {{----}}
        <div class="content" style="padding: 15px;">
            @foreach($luongData as $luong)
                @if($luong->id == $id_ch)
                    <div class="row" style="border: 2px solid grey; padding: 10px;">

                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    @foreach($bangluongData as $bl)
                                        @if($bl->id == $luong->bangluong_id)
                                            <h3>Bảng lương: {{$bl->tenbangluong}}</h3>
                                        @endif
                                    @endforeach

                                    <h3 class="box-title">Mã Lương: {{$luong->maluong}}</h3>
                                    <hr>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        @foreach($nhanvienData as $nhanvien)
                                            @if($luong->nhanvien_id == $nhanvien->id)
                                                <div class="col-lg-2">
                                                    <img src="{{ asset('/public/images/avata/'.$nhanvien->hinhanh) }}"
                                                         width="100%" class="" alt="hinhanh">
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                                        @foreach($nhanvienData as $nhanvien)
                                            @if($luong->nhanvien_id == $nhanvien->id)
                                                <p>Mã nhân viên: <b>{{$nhanvien->manv}}</b></p>
                                                <p>Tên nhân viên: {{$nhanvien->tennv}}</p>
                                            @endif
                                        @endforeach
                                            <p>Số ngày công: <b>{{$luong->ngaycong}}</b> ngày</p>
                                            <p>Lương tháng: <b>{{$luong->luongthang}}</b> vnđ</p>
                                        </div>
                                        <!-- col-5 -->
                                        <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                                            <p>Phụ cấp: {{$luong->phucap}} vnđ</p>
                                            <p>Khoản trừ: {{$luong->khoantru}} vnđ</p>
                                            @if($luong->tamung != "")
                                                <p>Tạm ứng: {{$luong->tamung}} vnđ</p>
                                            @else
                                                <p>Tạm ứng: 0 vnđ</p>
                                            @endif
                                            <p>Ngày tính lương:
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $luong->ngaycham)
                                                    ->format('d/m/Y') }}
                                            </p>
                                            <p>Thực lãnh: <b>{{$luong->thuclanh}}</b> vnđ</p>
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

