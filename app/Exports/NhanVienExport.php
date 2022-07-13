<?php

namespace App\Exports;


use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\ChuyenMon;
use App\Models\DanToc;
use App\Models\LoaiNhanVien;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\QuocTich;
use App\Models\TinhTrangHonNhan;
use App\Models\TonGiao;
use App\Models\TrinhDo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class NhanVienExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $nhanvienData = nhanvien::all();
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
        return view('admin.export.nhanvien_ex',[
            'nhanvienData'=>$nhanvienData,
            'phongbanData'=>$phongbanData,
            'chucvuData'=>$chucvuData,
            'trinhdoData'=>$trinhdoData,
            'bangcapData'=>$bangcapData,
            'chuyenmonData'=>$chuyenmonData,
            'loainhanvienData'=>$loainhanvienData,
            'quoctichData'=>$quoctichData,
            'dantocData'=>$dantocData,
            'tongiaoData'=>$tongiaoData,
            'tinhtranghonnhanData'=>$tinhtranghonnhanData
        ]);
    }
}
