@extends('admin.main')

@section('content')
<div class="content-wrapper">
    <div class="row p-3">

    </div>
    <div class="row p-5">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nhanvien}}</h3>

                    <p>Nhân viên</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('nhanvien')}}" class="small-box-footer">
                    Danh sách nhân viên <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-orange">
                <div class="inner">
                    <h3>{{$phongban}}</h3>

                    <p>Phòng ban</p>
                </div>
                <div class="icon">
                    <i class="fa fa-school"></i>
                </div>
                <a href="{{route('phongban')}}" class="small-box-footer">
                    Danh sách phòng ban <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>VNĐ <sup style="font-size: 20px"></sup></h3>

                    <p>Lương</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="{{route('bangluong')}}" class="small-box-footer">
                    Danh sách lương <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Nhân viên</h3>

                    <p>Thêm nhân viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('themnhanvien')}}" class="small-box-footer">
                    thêm nhân viên <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$user}}</h3>

                    <p>Tài khoản</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{route('taikhoan')}}" class="small-box-footer">
                    Danh sách tài khoản <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>EXCEL</h3>

                    <p>Xuất báo cáo nhân viên</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file"></i>
                </div>
                <a href="{{route('nhanvien')}}" class="small-box-footer">
                    Danh sách nhân viên <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>EXCEL</h3>

                    <p>Xuất báo cáo lương</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file"></i>
                </div>
                <a href="{{route('bangluong')}}" class="small-box-footer">
                    Danh sách Lương <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
