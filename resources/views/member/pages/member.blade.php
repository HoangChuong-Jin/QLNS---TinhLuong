<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Sao khuê</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('resources/css/k_vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/k_styles.css') }}">

    <!-- favicons
    ================================================== -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('resources/images/favicon-16x16.png') }}">

    {{--<link rel="manifest" href="site.webmanifest">--}}

</head>
<body id="top" class="ss-preload theme-particles">
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- intro
    ================================================== -->
    <section id="intro" class="s-intro">

        <div id="particles-js" class="s-intro__particles"></div>

        <header class="s-intro__header">
            <div class="s-intro__logo">
                <a class="logo" href="" style="color: white !important">
                    SAO KHUÊ
                </a>
            </div>
        </header>  <!-- s-intro__header -->

        <div class="row s-intro__content">
            <div class="column">

                <div class="text-pretitle">
                    Nice to meet you.
                </div>

                <h1 class="text-huge-title">
                    We are preparing <br>
                    something exciting <br>
                    & amazing for you.
                </h1>

                <div class="s-intro__content-bottom">

                    <div class="s-intro__content-bottom-block">


                    </div> <!-- end s-intro-content__bottom-block -->

                    <div class="s-intro__content-bottom-block">



                    </div> <!-- end s-intro-content__bottom-block -->

                </div> <!-- end s-intro-content__bottom -->

            </div>
        </div> <!-- s-intro__content -->

        <div class="s-intro__notify">
            <a type="button" href="{{route('logout')}}" class="btn--stroke btn--small">
                Logout
            </a>
        </div>

        <div class="s-intro__scroll">
            <a href="#hidden" class="smoothscroll">
                Scroll For More
            </a>
        </div> <!-- s-intro__scroll -->

    </section>
    <!-- end s-intro -->

    <!-- hidden element
    ================================================== -->
    <div id="hidden" aria-hidden="true" style="opacity: 0;">

    </div>


    <!-- details
    ================================================== -->
    <section id="details" class="s-details">

        <div class="row">
            <div class="column">

                <h1 class="text-huge-title text-center">
                    Hi, We Are Sao Khuê.
                </h1>

                <nav class="tab-nav">
                    <ul class="tab-nav__list">
                        <li class="active" data-id="tab-about">
                            <a href="#0">
                                <span>Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-services">
                                <span>Wage</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-contact">
                                <span>account</span>
                            </a>
                        </li>
                    </ul>
                </nav> <!-- end tab-nav -->
                <div class="tab-content">

                    <!-- 01 - tab about -->
                    <div id="tab-about" class='tab-content__item'>

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>Information.</h2>

                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <div class="row">
                                    <div class="column lg-6 tab-12">
                                        @foreach($nhanvien as $nv)
                                            @if($nv->id == $user->nhanvien_id)
                                        <div class="col-lg-2" style="margin-left: auto!important; margin-right: auto!important;">
                                            @if($nv->hinhanh !="")
                                                <img src="{{ asset('/public/images/avata/'.$nv->hinhanh) }}"
                                                 width="70%" class="" alt="hinhanh" style="margin-left: auto!important; margin-right: auto!important;">
                                            @else
                                                <img src="{{ asset('/public/images/user-img2.png') }}"
                                                     width="70%" class="" alt="hinhanh" style="margin-left: auto!important; margin-right: auto!important;">
                                            @endif
                                        </div>
                                        <p class="box-title">Ngày sinh:
                                            <b>
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $nv->ngaysinh)->format('d/m/Y') }}
                                            </b>
                                        </p>
                                        <p class="box-title">Nơi sinh: {{$nv->noisinh}}</p>
                                        <p class="box-title">Số CMND: <b>{{$nv->noisinh}}</b></p>
                                        <p class="box-title">Ngày cấp:
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d', $nv->ngaycap_cmnd)->format('d/m/Y') }}
                                        </p>
                                        <p class="box-title">Nơi cấp: {{$nv->noicap_cmnd}}</p>
                                        <p class="box-title">Hộ khẩu: <b>{{$nv->hokhau}}</b></p>
                                        <p class="box-title">Tạm trú: {{$nv->tamtru}}</p>
                                            @endif
                                        @endforeach
                                        @foreach($nhanvien as $nv)
                                            @if($nv->id == $user->nhanvien_id)
                                            @foreach($quoctichData as $quoctich)
                                                @if($nv->quoctich_id == $quoctich->id)
                                                    <p class="box-title">Quốc tịch: {{$quoctich->tenquoctich}}</p>
                                                @endif
                                            @endforeach
                                            @foreach($dantocData as $dantoc)
                                                @if($nv->dantoc_id == $dantoc->id)
                                                    <p class="box-title">Dân tộc: {{$dantoc->tendantoc}}</p>
                                                @endif
                                            @endforeach
                                            @foreach($tongiaoData as $tongiao)
                                                @if($nv->tongiao_id == $tongiao->id)
                                                    <p class="box-title">Tôn giáo: {{$tongiao->tentongiao}}</p>
                                                @endif
                                            @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="column lg-6 tab-12">
                                        @foreach($nhanvien as $nv)
                                            @if($nv->id == $user->nhanvien_id)
                                                <p class="box-title">Tên nhân viên: <b>{{$nv->manv}}</b></p>
                                            <p class="box-title">Tên nhân viên: <b>{{$nv->tennv}}</b></p>
                                            @if($nv->gioitinh == 1)
                                                <p class="box-title">Giới tính: Nam</p>
                                            @else
                                                <p class="box-title">Giới tính: Nữ</p>
                                            @endif
                                            <p class="box-title">Số điện thoại: {{$nv->sdt}}</p>
                                            <p class="box-title">Gmail: {{$nv->gmail}}</p>
                                            @endif
                                        @endforeach
                                        @foreach($loainhanvienData as $loainv)
                                            @if($nv->loainv_id == $loainv->id)
                                                <p class="box-title">Loại nhân viên: <b>{{$loainv->tenloainv}}</b></p>
                                            @endif
                                        @endforeach
                                        @foreach($tinhtranghonnhanData as $tthn)
                                            @if($nv->honnhan_id == $tthn->id)
                                                <p class="box-title">Tình trạng hôn nhân:
                                                    @if($tthn->tthonnhan == 0)
                                                        <b>Độc thân</b>
                                                    @else
                                                        <b>Đã kết hôn</b>
                                                    @endif
                                                </p>
                                            @foreach($trinhdoData as $trinhdo)
                                                @if($nv->trinhdo_id == $trinhdo->id)
                                                    <p class="box-title">Trình độ: <b>{{$trinhdo->tentrinhdo}}</b></p>
                                                @endif
                                            @endforeach
                                            @foreach($chuyenmonData as $chuyenmon)
                                                @if($nv->chuyenmon_id == $chuyenmon->id)
                                                    <p class="box-title">Chuyên môn: <b>{{$chuyenmon->tenchuyenmon}}</b></p>
                                                @endif
                                            @endforeach
                                            @foreach($bangcapData as $bangcap)
                                                @if($nv->bangcap_id == $bangcap->id)
                                                    <p class="box-title">Bằng cấp: <b>{{$bangcap->tenbangcap}}</b></p>
                                                @endif
                                            @endforeach
                                            @foreach($phongbanData as $phongban)
                                                @if($nv->phongban_id == $phongban->id)
                                                    <p class="box-title">Phòng ban: <b>{{$phongban->tenphongban}}</b></p>
                                                @endif
                                            @endforeach
                                            @foreach($chucvuData as $chucvu)
                                                @if($nv->chucvu_id == $chucvu->id)
                                                    <p class="box-title">Chức vụ: <b>{{$chucvu->tenchucvu}}</b></p>
                                                @endif
                                            @endforeach

                                            @if($nv->trangthai == 1)
                                                <p class="box-title">Trạng thái:
                                                    <span class="badge bg-blue">Đang làm việc </span>
                                                </p>
                                            @else
                                                <p class="box-title">Trạng thái:
                                                    <span class="badge bg-orange">Đã nghĩ việc </span>
                                                </p>
                                            @endif
                                            @endif
                                        @endforeach
                                        <button type="button" class="btn btn--stroke u-fullwidth ss-modal-trigger">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end 01 - tab about -->

                    <!-- 02 - tab services -->
                    <div id="tab-services" class='tab-content__item'>

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>Monthly salary.</h2>
                                <table class="table">
                                    <thead class="thead-dark" style="background-color: #0a0b0b;">
                                        <tr>
                                            <th scope="col" style="color: white; text-align: center">Tháng</th>
                                            <th scope="col" style="color: white; text-align: center">Lương</th>
                                            <th scope="col" style="color: white; text-align: center">Ngày công</th>
                                            <th scope="col" style="color: white; text-align: center">Lương cơ bản</th>
                                            <th scope="col" style="color: white; text-align: center">Khoản trừ</th>
                                            <th scope="col" style="color: white; text-align: center">Phụ cấp</th>
                                            <th scope="col" style="color: white; text-align: center">Tạm ứng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($nhanvien as $nv)
                                            @if($nv->id == $user->nhanvien_id)
                                                @foreach($luong as $l)
                                                    @if($l->nhanvien_id == $nv->id)
                                                        <tr>
                                                            @foreach($bangluong as $bl)
                                                                @if($bl->id==$l->bangluong_id)
                                                            <td>{{$bl->tenbangluong}}</td>
                                                                @endif
                                                            @endforeach
                                                            <td>{{$l->thuclanh}} vnđ</td>
                                                            <td>{{$l->ngaycong}} ngày</td>
                                                            <td>{{$l->luongthang}} vnđ</td>
                                                            <td>{{$l->khoantru}} vnđ</td>
                                                            <td>{{$l->phucap}} vnđ</td>
                                                            @if($l->tamung != "")
                                                                <td>{{$l->tamung}} vnđ</td>
                                                            @else
                                                                <td>0 vnđ</td>
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                        </div>
                         <!-- end services-list -->

                    </div> <!-- end 02 - tab services -->

                    <!-- 03 - tab contact -->
                    <div id="tab-contact" class="tab-content__item">

                        <div class="row tab-content__item-header">
                            <div class="column">
                                <h2>User account.</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <div class="row">
                                    <div class="column lg-6 tab-12">
                                        <form action="{{route('suathongtintaikhoan_member')}}"
                                              class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            <br>
                                            @csrf
                                            <div class="form-group" hidden>
                                                <label for="inputExperience" class="col-sm-2 control-label">id</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail"
                                                           placeholder="Name" name="id" value="{{$user->id}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExperience" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail"
                                                           placeholder="Name" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputName"
                                                           placeholder="Gmail nhân viên" name="email" value="{{$user->email}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    @if($user->level == 0)
                                                        <p class="box-title"> <b>Quyền hạn: </b>
                                                            <span class="badge bg-blue"> Administrator </span>
                                                        </p>
                                                    @elseif($user->level == 1)
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
                                                    @if($user->lock == 1)
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
                                                    <button type="submit" class="btn btn--stroke " >
                                                        <i class="fa fa-save"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="column lg-6 tab-12">
                                        <form action="{{route('postdoimk_member')}}"
                                              class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            <br>
                                            @if(session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <span class="font-weight-bold text-green"><i class="fal fa-check-circle"></i> {{ session('success') }}</span>
                                                </div>
                                            @endif
                                            @if(session('warning'))
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <span class="font-weight-bold text-red"><i class="fal fa-exclamation-triangle"></i> {{ session('warning') }}</span>
                                                </div>
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputExperience" class="col-sm-2 control-label">Mật khẩu cũ:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                                                           id="password" placeholder="Mật khẩu cũ" name="old_password" value="" >
                                                    @error('old_password')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Mật khẩu mới:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control @error('new_password') is-invalid @enderror"
                                                           id=""  placeholder="Mật khẩu mới" name="new_password" value="">
                                                    @error('new_password')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Mật khẩu mới:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                                           id=""  placeholder="Nhập lại mật khẩu mới" name="new_password_confirmation" value="">
                                                    @error('new_password_confirmation')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding-top: 10px;">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn--stroke " >
                                                        <i class=""></i> Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end 03 - tab contact -->

                </div> <!-- end tab content -->
                <!-- footer  -->
                <footer>
                    <div class="ss-copyright">
                        <span>© Copyright NHC & HA</span>
                    </div>
                </footer>

                <!-- Modal -->
                <!-- Chang password -->
                <!-- Update info -->
                <div hidden class="s-intro__modal ss-modal">
                    <div class="ss-modal__inner">

                        <span class="ss-modal__close"></span>
                        <h4 style="margin-top: 1200px;">Update information</h4>
                        @foreach($nhanvien as $nv)
                            @if($nv->id == $user->nhanvien_id)

                        <form action="{{route('postsuanhanvien_member' ,['id'=>$nv->id])}}" id="" class="mc-form"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên nhân viên <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control {{--@error('manv') is-invalid @enderror--}}"
                                       placeholder="Nhập tên tên nhân viên" name="tennv" value="{{$nv->tennv}}">

                                <label>Giới tính <span style="color: red;">*</span>: </label>
                                <select class="form-control {{--@error('gioitinh') is-invalid @enderror--}}" name="gioitinh">
                                    @if($nv->gioitinh == 1)
                                        <option value="1" selected='selected'>Nam</option>
                                        <option value="0">Nữ</option>
                                    @else
                                        <option value="1">Nam</option>
                                        <option value="0" selected='selected'>Nữ</option>
                                    @endif
                                </select>

                                <label>Số điện thoại <span style="color: red;">*</span>: </label>
                                <input type="number" class="form-control {{--@error('sdt') is-invalid @enderror--}}"
                                       placeholder="Nhập số điện thoại" name="sdt" value="{{$nv->sdt}}">

                                <label>Ngày sinh <span style="color: red;">*</span>:</label>
                                <input type="date" class="form-control {{--@error('ngaysinh') is-invalid @enderror--}}"
                                       name="ngaysinh"
                                       value="{{$nv->ngaysinh}}">

                                <label>Nơi sinh: </label>
                                <input class="form-control" name="noisinh"
                                       placeholder="Nhập nơi sinh" value="{{$nv->noisinh}}">

                                <label>Số CMND <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control {{--@error('cmnd') is-invalid @enderror--}}"
                                       placeholder="Nhập số CMND" name="cmnd" value="{{$nv->cmnd}}">

                                <label>Ngày cấp cmnd:</label>
                                <input type="date" class="form-control"
                                       placeholder="Nhập nơi cấp" name="ngaycap"
                                       value="{{$nv->ngaycap_cmnd}}">

                                <label>Nơi cấp cmnd:</label>
                                <input type="text" class="form-control"
                                       placeholder="Nhập nơi cấp" name="noicap" value="{{$nv->noicap_cmnd}}">

                                <label>Hộ khẩu <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control"
                                       placeholder="Nhập hộ khẩu" name="hokhau" value="{{$nv->hokhau}}">

                                <label>Tạm trú <span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control"
                                       placeholder="Nhập tạm trú" name="tamtru" value="{{$nv->tamtru}}">

                                <select class="form-control" name="quoctich">
                                    <option value="">--- Chọn quốc tịch ---</option>
                                    @foreach($quoctichData as $quoctich)
                                            @if($nv->quoctich_id == $quoctich->id)
                                                <option value="{{$quoctich->id}}" selected='selected'>
                                                    {{$quoctich->tenquoctich}}
                                                </option>
                                            @else
                                                <option value="{{$quoctich->id}}">{{$quoctich->tenquoctich}}</option>
                                            @endif
                                    @endforeach
                                </select>
                                <select class="form-control" name="dantoc">
                                    <option value="">--- Chọn dân tộc ---</option>
                                    @foreach($dantocData as $dantoc)
                                        @if($nv->dantoc_id == $dantoc->id)
                                            <option value="{{$dantoc->id}}" selected='selected'>
                                                {{$dantoc->tendantoc}}
                                            </option>
                                        @else
                                            <option value="{{$dantoc->id}}">{{$dantoc->tendantoc}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select class="form-control" name="tongiao">
                                    <option value="">--- Chọn tôn giáo ---</option>
                                    @foreach($tongiaoData as $tongiao)
                                        @if($nv->tongiao_id == $tongiao->id)
                                            <option value="{{$tongiao->id}}" selected='selected'>
                                                {{$tongiao->tentongiao}}
                                            </option>
                                        @else
                                            <option value="{{$tongiao->id}}">{{$tongiao->tentongiao}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select class="form-control" name="honnhan">
                                    <option value="">--- Chọn tinh trang hôn nhân ---</option>
                                    @foreach($tinhtranghonnhanData as $honnhan)
                                        @if($nv->honnhan_id == $honnhan->id)
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
                                <label>Đổi hình ảnh: </label>
                                <input type="file" class="form-control" id="" name="hinhanh" value="{{$nv->hinhanh}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn--stroke u-fullwidth ss-modal-trigger">
                                Save
                            </button>
                        </form>

                            @endif
                        @endforeach
                    </div> <!-- end ss-modal__inner -->
                </div> <!-- end ss-modal -->
            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <span>Back to Top</span>
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
             </a>
        </div><!-- end ss-go-top -->

    </section>
    <!-- end s-details -->


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('resources/js/k_plugins.js') }}"></script>
    <script src="{{ asset('resources/js/k_main.js') }}"></script>
    <script src="{{ asset('resources/js/k_particles.min.js') }}"></script>
    <script src="{{ asset('resources/js/k_particle-settings.js') }}"></script>
</body>
</html>
