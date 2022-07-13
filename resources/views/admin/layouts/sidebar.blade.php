

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
        <img src="{{ asset('resources/adminlte/dist/img/saokhue.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SAO KHUÊ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->avatar!="")
                <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ asset('/public/images/user-img.png') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{route('thongtintaikhoan')}}" class="d-block"> {{Auth::user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            TỔNG QUAN
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/nhanvien') ? 'menu-open' : '' }}
                {{ request()->is('*/nhanvien/themnhanvien') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/nhanvien') ? 'active' : '' }}
                    {{ request()->is('*/nhanvien/themnhanvien') ? 'active' : '' }}
                    {{ request()->is('*/nhanvien/suanhanvien/*') ? 'active' : '' }}
                    {{ request()->is('*/nhanvien/ctnhanvien/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            NHÂN VIÊN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('nhanvien')}}" class="nav-link {{ request()->is('*/nhanvien') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('themnhanvien')}}" class="nav-link {{ request()->is('*/themnhanvien') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/phongban') ? 'menu-open' : '' }}
                {{ request()->is('*/phongban/themphongban') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link
                    {{ request()->is('*/phongban') ? 'active' : '' }}
                    {{ request()->is('*/phongban/themphongban') ? 'active' : '' }}
                    {{ request()->is('*/phongban/suaphongban/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            PHÒNG BAN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('phongban')}}" class="nav-link {{ request()->is('*/phongban') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phòng ban</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('themphongban')}}" class="nav-link {{ request()->is('*/phongban/themphongban') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới phòng ban</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/chucvu') ? 'menu-open' : '' }}
                {{ request()->is('*/chucvu/themchucvu') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/chucvu') ? 'active' : '' }}
                    {{ request()->is('*/chucvu/themchucvu') ? 'active' : '' }}
                    {{ request()->is('*/chucvu/suachucvu/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>
                            CHỨC VỤ
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('chucvu')}}" class="nav-link {{ request()->is('*/chucvu') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách chức vụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('themchucvu')}}" class="nav-link {{ request()->is('*/chucvu/themchucvu') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới chức vụ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/chuyenmon') ? 'menu-open' : '' }}
                {{ request()->is('*/chuyenmon/themchuyenmon') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/chuyenmon') ? 'active' : '' }}
                    {{ request()->is('*/chuyenmon/themchuyenmon') ? 'active' : '' }}
                    {{ request()->is('*/chuyenmon/suachuyenmon/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            CHUYÊN MÔN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('chuyenmon')}}" class="nav-link {{ request()->is('*/chuyenmon') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách chuyên môn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('themchuyenmon')}}" class="nav-link {{ request()->is('*/chuyenmon/themchuyenmon') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới chuyên môn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/bangcap') ? 'menu-open' : '' }}
                {{ request()->is('*/bangcap/thembangcap') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/bangcap') ? 'active' : '' }}
                    {{ request()->is('*/bangcap/thembangcap') ? 'active' : '' }}
                    {{ request()->is('*/bangcap/suabangcap/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            BẰNG CẤP
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bangcap')}}" class="nav-link {{ request()->is('*/bangcap') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách bằng cấp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('thembangcap')}}" class="nav-link {{ request()->is('*/bangcap/thembangcap') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới bằng cấp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/loainv') ? 'menu-open' : '' }}
                 {{ request()->is('*/loainv/themloainv') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/loainv') ? 'active' : '' }}
                    {{ request()->is('*/loainv/themloainv') ? 'active' : '' }}
                    {{ request()->is('*/loainv/sualoainv/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            LOẠI NHÂN VIÊN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('loainv')}}" class="nav-link {{ request()->is('*/loainv') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách loại nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('themloainv')}}" class="nav-link {{ request()->is('*/loainv/themloainv') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới loại nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/luong/*') ? 'menu-open' : '' }}
                {{ request()->is('*/luong/bangluong') ? 'menu-open' : '' }}
                {{ request()->is('*/luong/ctluong/*') ? 'menu-open' : '' }}
                {{ request()->is('*/bangluong') ? 'menu-open' : '' }}
                {{ request()->is('*/bangluong/suabangluong/*') ? 'menu-open' : '' }}
                {{ request()->is('*/phucap') ? 'menu-open' : '' }}
                {{ request()->is('*/phucap/suaphucap/*') ? 'menu-open' : '' }}
                {{ request()->is('*/khoantru') ? 'menu-open' : '' }}
                {{ request()->is('*/khoantru/suakhoantru/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/luong/*') ? 'active' : '' }}
                    {{ request()->is('*/luong/bangluong') ? 'active' : '' }}
                    {{ request()->is('*/luong/ctluong/*') ? 'active' : '' }}
                    {{ request()->is('*/bangluong') ? 'active' : '' }}
                    {{ request()->is('*/bangluong/suabangluong/*') ? 'active' : '' }}
                    {{ request()->is('*/phucap') ? 'active' : '' }}
                    {{ request()->is('*/phucap/suaphucap/*') ? 'active' : '' }}
                    {{ request()->is('*/khoantru') ? 'active' : '' }}
                    {{ request()->is('*/khoantru/suakhoantru/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            QUẢN LÝ LƯƠNG
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bangluong')}}" class="nav-link {{ request()->is('*/luong/bangluong') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảng lương</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taobangluong')}}" class="nav-link {{ request()->is('admin/bangluong') ? 'active' : '' }}
                            {{ request()->is('*/bangluong/suabangluong/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo bảng lương</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tinhluong')}}" class="nav-link {{ request()->is('*/luong') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tính lương</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('khoantru')}}" class="nav-link {{ request()->is('*/khoantru') ? 'active' : '' }}
                            {{ request()->is('*/khoantru/suakhoantru/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khoản trừ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('phucap')}}" class="nav-link {{ request()->is('*/phucap') ? 'active' : '' }}
                            {{ request()->is('*/phucap/suaphucap/*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phụ cấp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('*/taikhoan') ? 'menu-open' : '' }}
                {{ request()->is('*/taikhoan/thongtintaikhoan') ? 'menu-open' : '' }}
                {{ request()->is('*/taikhoan/themtaikhoan') ? 'menu-open' : '' }}
                {{ request()->is('*/taikhoan/doimatkhau') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('*/taikhoan') ? 'active' : '' }}
                    {{ request()->is('*/taikhoan/thongtintaikhoan') ? 'active' : '' }}
                    {{ request()->is('*/taikhoan/themtaikhoan') ? 'active' : '' }}
                    {{ request()->is('*/taikhoan/doimatkhau') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            TÀI KHOẢN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('thongtintaikhoan')}}" class="nav-link {{ request()->is('*/taikhoan/thongtintaikhoan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thông tin tài khoản</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('taikhoan')}}" class="nav-link {{ request()->is('*/taikhoan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách tài khoản</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('themtaikhoan')}}" class="nav-link {{ request()->is('*/taikhoan/themtaikhoan') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo tài khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('doimatkhau')}}" class="nav-link {{ request()->is('*/taikhoan/doimatkhau') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đổi mật khẩu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đăng xuất</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
