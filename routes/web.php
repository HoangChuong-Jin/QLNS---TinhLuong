<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\nhanvien\NhanVienController;
use App\Http\Controllers\admin\type\TypeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[MainController::class,'index'])->name('login');

Route::post('/login',[LoginController::class, 'store'])->name('store');

Route::middleware(['auth'])->group(function (){
    Route::get('admin',[MainController::class,'admin'])->name('admin');
    Route::get('member',[MainController::class,'member'])->name('member');
    Route::get('logout',[MainController::class,'logout'])->name('logout');

    Route::prefix('member')->group(function () {
        Route::post('/thongtintaikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postsua_member'])->name('suathongtintaikhoan_member');
        Route::post('/postdoimatkhau_member',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postdoimk_member'])->name('postdoimk_member');
        Route::post('/postsuanhanvien_member',[\App\Http\Controllers\admin\nhanvien\NhanVienController::class,'postsua_member'])->name('postsuanhanvien_member');
    });

    Route::prefix('admin')->group(function (){
        #Loai
        Route::prefix('type')->group(function (){
            Route::get('/',[TypeController::class,'index'])->name('type');
        });
        #ChucVu
        Route::prefix('chucvu')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'index'])->name('chucvu');
            Route::get('/themchucvu',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'index2'])->name('themchucvu');
            Route::post('/postchucvu',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'postthem'])->name('postchucvu');
            Route::get('/suachucvu/{id}',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'index3'])->name('suachucvu');
            Route::post('/postsuachucvu',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'postsua'])->name('postsuachucvu');
            Route::get('/xoachucvu/{id}',[\App\Http\Controllers\admin\chucvu\ChucVuController::class,'getxoa'])->name('xoachucvu');
        });
        #PhongBan
        Route::prefix('phongban')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'index'])->name('phongban');
            Route::get('/themphongban',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'index2'])->name('themphongban');
            Route::post('/postphongban',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'postthem'])->name('postphongban');
            Route::get('/suaphongban/{id}',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'index3'])->name('suaphongban');
            Route::post('/suaphongban',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'postsua'])->name('postsuaphongban');
            Route::get('/xoaphongban/{id}',[\App\Http\Controllers\admin\phongban\PhongBanController::class,'getxoa'])->name('xoaphongban');
        });

        #ChuyenMon
        Route::prefix('chuyenmon')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'index'])->name('chuyenmon');
            Route::get('/themchuyenmon',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'index2'])->name('themchuyenmon');
            Route::post('/postchuyenmon',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'postthem'])->name('postchuyenmon');
            Route::get('/suachuyenmon/{id}',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'index3'])->name('suachuyenmon');
            Route::post('/suachuyenmon',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'postsua'])->name('postsuachuyenmon');
            Route::get('/xoachuyenmon/{id}',[\App\Http\Controllers\admin\chuyenmon\ChuyenMonController::class,'getxoa'])->name('xoachuyenmon');
        });

        #BangCap
        Route::prefix('bangcap')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'index'])->name('bangcap');
            Route::get('/thembangcap',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'index2'])->name('thembangcap');
            Route::post('/postbangcap',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'postthem'])->name('postbangcap');
            Route::get('/suabangcap/{id}',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'index3'])->name('suabangcap');
            Route::post('/suabangcap',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'postsua'])->name('postsuabangcap');
            Route::get('/xoabangcap/{id}',[\App\Http\Controllers\admin\bangcap\BangCapController::class,'getxoa'])->name('xoabangcap');
        });

        #LoaiNhanVien
        Route::prefix('loainv')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'index'])->name('loainv');
            Route::get('/themloainv',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'index2'])->name('themloainv');
            Route::post('/postloainv',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'postthem'])->name('postloainv');
            Route::get('/sualoainv/{id}',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'index3'])->name('sualoainv');
            Route::post('/sualoainv',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'postsua'])->name('postsualoainv');
            Route::get('/xoaloainv/{id}',[\App\Http\Controllers\admin\loainhanvien\LoaiNhanVienController::class,'getxoa'])->name('xoaloainv');
        });

        #NhanVien
        Route::prefix('nhanvien')->group(function (){
            Route::get('/',[NhanVienController::class,'index'])->name('nhanvien');
            Route::get('/themnhanvien',[NhanVienController::class,'index2'])->name('themnhanvien');
            Route::post('/postnhanvien',[NhanVienController::class,'postthem'])->name('postnhanvien');
            Route::get('/suanhanvien/{id}',[NhanVienController::class,'index3'])->name('suanhanvien');
            Route::post('/postsuanhanvien',[NhanVienController::class,'postsua'])->name('postsuanhanvien');
            Route::get('/xoanhanvien/{id}',[\App\Http\Controllers\admin\nhanvien\NhanVienController::class,'getxoa'])->name('xoanhanvien');
            Route::get('/ctnhanvien/{id}',[\App\Http\Controllers\admin\nhanvien\NhanVienController::class,'index4'])->name('ctnhanvien');
            Route::get('/xuat_nv',[NhanVienController::class,'export'])->name('xuat_nv');
            Route::post('nhap_nv',[NhanVienController::class,'nhap_nv'])->name('import_ex_nv');
        });

        #TaiKhoan
        Route::prefix('taikhoan')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'index'])->name('taikhoan');
            Route::get('/themtaikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'index2'])->name('themtaikhoan');
            Route::get('/suataikhoan/{id}',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'index_suatk'])->name('suataikhoan');
            Route::post('/suataikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postsuataikhoan'])->name('postsuataikhoan');
            Route::get('/thongtintaikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'index3'])->name('thongtintaikhoan');
            Route::post('/thongtintaikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postsua'])->name('suathongtintaikhoan');
            Route::get('/doimatkhau',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'index4'])->name('doimatkhau');
            Route::get('/layemail/ajax',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'LayEmail_Ajax'])->name('layemail.ajax');
            Route::get('/trangthai/{id}',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'trangthai'])->name('trangthai');
            Route::post('/postdoimatkhau',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postdoimk'])->name('postdoimk');
            Route::post('/postthemtaikhoan',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'postthemtaikhoan'])->name('postthemtaikhoan');
            Route::get('/xoataikhoan/{id}',[\App\Http\Controllers\admin\taikhoan\TaiKhoanController::class,'getxoa'])->name('xoataikhoan');
        });

        #BangLuong
        Route::prefix('bangluong')->group(function (){
            /*Route::get('/',[\App\Http\Controllers\NhomLuongController::class,'index'])->name('bangluong');*/
            Route::get('/',[\App\Http\Controllers\NhomLuongController::class,'index'])->name('taobangluong');
            Route::post('/postbangluong',[\App\Http\Controllers\NhomLuongController::class,'postthem'])->name('postbangluong');
            Route::get('/suabangluong/{id}',[\App\Http\Controllers\NhomLuongController::class,'index3'])->name('suabangluong');
            Route::post('/suabangluong',[\App\Http\Controllers\NhomLuongController::class,'postsua'])->name('postsuabangluong');
            Route::get('/xoabangluong/{id}',[\App\Http\Controllers\NhomLuongController::class,'getxoa'])->name('xoabangluong');
        });
        #PhuCap
        Route::prefix('phucap')->group(function (){
            Route::get('/',[\App\Http\Controllers\PhuCapController::class,'index'])->name('phucap');
            Route::post('/postphucap',[\App\Http\Controllers\PhuCapController::class,'postthem'])->name('postphucap');
            Route::get('/suaphucap/{id}',[\App\Http\Controllers\PhuCapController::class,'index3'])->name('suaphucap');
            Route::post('/suaphucap',[\App\Http\Controllers\PhuCapController::class,'postsua'])->name('postsuaphucap');
            Route::get('/xoaphucap/{id}',[\App\Http\Controllers\PhuCapController::class,'getxoa'])->name('xoaphucap');
        });
        #KhoanTru
        Route::prefix('khoantru')->group(function (){
            Route::get('/',[\App\Http\Controllers\KhoanTruController::class,'index'])->name('khoantru');
            Route::post('/postkhoantru',[\App\Http\Controllers\KhoanTruController::class,'postthem'])->name('postkhoantru');
            Route::get('/suakhoantru/{id}',[\App\Http\Controllers\KhoanTruController::class,'index3'])->name('suakhoantru');
            Route::post('/suakhoantru',[\App\Http\Controllers\KhoanTruController::class,'postsua'])->name('postsuakhoantru');
            Route::get('/xoakhoantru/{id}',[\App\Http\Controllers\KhoanTruController::class,'getxoa'])->name('xoakhoantru');
        });
        #Luong
        Route::prefix('luong')->group(function (){
            Route::get('/',[\App\Http\Controllers\admin\luong\LuongController::class,'index'])->name('tinhluong');
            Route::get('/laymacv/ajax',[\App\Http\Controllers\admin\luong\LuongController::class,'LayMaCV_Ajax'])->name('laymacv.ajax');
            Route::post('/tinhluong',[\App\Http\Controllers\admin\luong\LuongController::class,'posttinhluong'])->name('posttinhluong');
            Route::get('/bangluong',[\App\Http\Controllers\admin\luong\LuongController::class,'index2'])->name('bangluong');
            Route::post('/xuat_luong',[\App\Http\Controllers\admin\luong\LuongController::class,'xuat_luong'])->name('xuat_luong');
            Route::get('/ctluong/{id}',[\App\Http\Controllers\admin\luong\LuongController::class,'ctluong'])->name('ctluong');
            Route::get('/xoaluong/{id}',[\App\Http\Controllers\admin\luong\LuongController::class,'getxoa'])->name('xoaluong');
            Route::get('/sualuong/{id}',[\App\Http\Controllers\admin\luong\LuongController::class,'index3'])->name('sualuong');
            Route::post('/postluong',[\App\Http\Controllers\admin\luong\LuongController::class,'postsua'])->name('postsualuong');
        });
    });
});

