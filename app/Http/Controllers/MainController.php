<?php

namespace App\Http\Controllers;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\ChuyenMon;
use App\Models\DanToc;
use App\Models\LoaiNhanVien;
use App\Models\PhongBan;
use App\Models\QuocTich;
use App\Models\TinhTrangHonNhan;
use App\Models\TonGiao;
use App\Models\TrinhDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\User;
use App\Models\Luong;
use App\Models\NhomLuong;
use DB;

class MainController extends Controller
{
    public function index(){
        return view('admin.user.login2',[
            'title'=>'Trang Đăng Nhập'
        ]);
    }
    public function admin(){
        $nhanvien = DB::table('nhanvien')->count();
        $phongban = DB::table('phongban')->count();
        $user = DB::table('users')->count();
        if(Auth::user()->level == 1 || Auth::user()->level == 0) {
            return view('admin.pages.home',[
                'title'=>'Trang Quản Trị',
                'nhanvien'=>$nhanvien,
                'phongban' => $phongban,
                'user' => $user
            ]);
        } else{
            return redirect()->route('login');
        }
    }
    public function member(){
        $nhanvien = nhanvien::getnhanvienData();
        $user = user::tttaikhoan();
        $luong = Luong::getluongData();
        $bangluong = nhomluong::getbangluongData();

        $phongbanData = phongban::getphongbanData();
        $chucvuData = chucvu::getchucvuData();
        $trinhdoData = trinhdo::gettrinhdoData();
        $bangcapData = bangcap::getbangcapData();
        $chuyenmonData = chuyenmon::getchuyenmonData();
        $loainhanvienData = loainhanvien::getloainvData();
        $quoctichData = quoctich::getquoctichData();
        $dantocData = dantoc::getdantocData();
        $tongiaoData = tongiao::gettongiaoData();
        $tinhtranghonnhanData = tinhtranghonnhan::gettinhtranghonnhanData();
        /*dd($luong);*/
        return view('member.pages.member',[
            'title'=>'Trang Nhân Viên',
            'nhanvien'=>$nhanvien,
            'user'=>$user,
            'luong'=>$luong,
            'bangluong'=>$bangluong,

            'phongbanData'=>$phongbanData,
            'chucvuData'=>$chucvuData,
            'trinhdoData'=>$trinhdoData,
            'bangcapData'=>$bangcapData,
            'chuyenmonData'=>$chuyenmonData,
            'loainhanvienData'=>$loainhanvienData,
            'quoctichData'=>$quoctichData,
            'dantocData'=>$dantocData,
            'tongiaoData'=>$tongiaoData,
            'tinhtranghonnhanData'=>$tinhtranghonnhanData,
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    /* Tạm - Lương */
    public function index2(){
        return view('admin.luong.taobangluong',[
            'title'=>'Bảng Lương',
            'tieude'=>'Tạo bảng lương'
        ]);
    }

    public function index3(){
        return view('admin.luong.bangluong',[
            'title'=>'Bảng Lương',
            'tieude'=>'Lương nhân viên'
        ]);
    }

    public function index4(){
        return view('admin.luong.phucap.phucap',[
            'title'=>'Phụ Cấp',
            'tieude'=>'Phụ Cấp',
            'tieude1'=>'Tạo phụ cấp'
        ]);
    }

    public function index5(){
        return view('admin.luong.khoanthu.khoanthu',[
            'title'=>'Khoản Thu',
            'tieude'=>'khoản thu',
            'tieude1'=>'Tạo khoan thu'
        ]);
    }

    public function index6(){

    }
}
