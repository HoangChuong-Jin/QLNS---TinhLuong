<?php

namespace App\Imports;

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
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NhanVienImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    private $request;
    public function __construct($request) {
        $this->request = $request;
        $this->phongbanData = phongban::getphongbanData();
        $this->chucvuData = chucvu::getchucvuData();
        $this->trinhdoData = trinhdo::gettrinhdoData();
        $this->bangcapData = bangcap::getbangcapData();
        $this->chuyenmonData = chuyenmon::getchuyenmonData();
        $this->loainhanvienData = loainhanvien::getloainvData();
        $this->quoctichData = quoctich::getquoctichData();
        $this->dantocData = dantoc::getdantocData();
        $this->tongiaoData = tongiao::gettongiaoData();
        $this->tinhtranghonnhanData = tinhtranghonnhan::gettinhtranghonnhanData();
    }
    public function headingRow() : int
    {
        return 1;
    }
    public function model(array $row)
    {
        if($row['hon_nhan'] == 'Đã kết hôn') {
            $hn = 1;
        } else {
            $hn=0;
        }
        $phongban_id = $this->phongbanData->where('tenphongban',$row['phong_ban'])->first();
        $chucvu_id = $this->chucvuData->where('tenchucvu',$row['chuc_vu'])->first();
        $trinhdo_id = $this->trinhdoData->where('tentrinhdo',$row['trinh_do'])->first();
        $bangcap_id = $this->bangcapData->where('tenbangcap',$row['bang_cap'])->first();
        $chuyenmon_id = $this->chuyenmonData->where('tenchuyenmon',$row['chuyen_mon'])->first();
        $loainhanvien_id = $this->loainhanvienData->where('tenloainv',$row['loai_nhan_vien'])->first();
        $quoctich_id = $this->quoctichData->where('tenquoctich',$row['quoc_tich'])->first();
        $dantoc_id = $this->dantocData->where('tendantoc',$row['dan_toc'])->first();
        $tongiao_id = $this->tongiaoData->where('tentongiao',$row['ton_giao'])->first();
        $tinhtranghonnhan_id = $this->phongbanData->where('tthonnhan',$hn)->first();
        if($row['trang_thai'] == 'Đang làm việc') {
            $tt = 1;
        } else {
            $tt=0;
        }
        if($row['gioi_tinh'] == 'Nam') {
            $gt = 1;
        } else {
            $gt=0;
        }
        return new NhanVien([
            'manv' => $row['manv'] ?? $row['ma_nhan_vien'],
            'tennv' => $row['tennv'] ?? $row['ten_nhan_vien'],
            'sdt' => $row['sdt'] ?? $row['so_dien_thoai'],
            'gmail' => $row['gmail'] ?? $row['gmail'],
            'gioitinh' => $gt,
            'ngaysinh' => $row['ngaysinh'] ?? date("Y-m-d", strtotime($row['ngay_sinh'])),
            'noisinh' => $row['noisinh'] ?? $row['noi_sinh'],
            'cmnd' => $row['cmnd'] ?? $row['cmnd'],
            'ngaycap_cmnd' => $row['ngaycap_cmnd'] ?? $row['ngay_cap_cmnd'],
            'noicap_cmnd' => $row['noicap_cmnd'] ?? $row['noi_cap_cmnd'],
            'hokhau' => $row['hokhau'] ?? $row['ho_khau'],
            'tamtru' => $row['tamtru'] ?? $row['tam_tru'],
            'phongban_id' => $phongban_id->id ?? NULL ,
            'trinhdo_id' => $trinhdo_id->id ?? NULL ,
            'bangcap_id' => $bangcap_id->id ?? NULL ,
            'chucvu_id' => $chucvu_id->id ?? NULL ,
            'chuyenmon_id' => $chuyenmon_id->id ?? NULL ,
            'loainv_id' => $loainhanvien_id->id ?? NULL ,
            'quoctich_id' => $quoctich_id->id ?? NULL ,
            'dantoc_id' => $dantoc_id->id ?? NULL ,
            'tongiao_id' => $tongiao_id->id ?? NULL ,
            'honnhan_id' => $tinhtranghonnhan_id->id ?? NULL,
            'trangthai'=>$tt,
        ]);
    }
}
