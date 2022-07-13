<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $fillable = [
        'manv',
        'tennv',
        'sdt',
        'gmail',
        'gioitinh',
        'noisinh',
        'ngaysinh',
        'cmnd',
        'ngaycap_cmnd',
        'noicap_cmnd',
        'hokhau',
        'tamtru',
        'phongban_id',
        'trinhdo_id',
        'bangcap_id',
        'chucvu_id',
        'chuyenmon_id',
        'loainv_id',
        'quoctich_id',
        'dantoc_id',
        'tongiao_id',
        'honnhan_id',
        'trangthai',
    ];

    public static function getnhanvienData()
    {
        $value = DB::table('nhanvien')/*->join('phongban as pb','pb.id','=','nv.phongban_id')*/->get();
        return $value;
    }

    public static function getxemnhanvienData($id)
    {
        $value = DB::table('nhanvien as nv')->join('phongban as pb','pb.id','=','nv.phongban_id')
                            -> join('chucvu as cv', 'cv.id','=','nv.chucvu_id')
                            -> join('trinhdo as td', 'td.id','=','nv.trinhdo_id')
                            -> join('chuyenmon as cm', 'cm.id','=','nv.chuyenmon_id')
                            -> join('bangcap as bc', 'bc.id','=','nv.bangcap_id')
                            -> join('tinhtranghonnhan as hn', 'hn.id','=','nv.honnhan_id')
                            -> join('loainhanvien as lnv', 'lnv.id','=','nv.loainv_id')
                            -> join('quoctich as qt', 'qt.id','=','nv.quoctich_id')
                            -> join('dantoc as dt', 'dt.id','=','nv.dantoc_id')
                            -> join('tongiao as tg', 'tg.id','=','nv.tongiao_id')
                            -> where('nv.id',$id)
                            -> select('nv.*','pb.tenphongban', 'cv.tenchucvu','td.tentrinhdo','cm.tenchuyenmon',
                            'bc.tenbangcap','hn.tthonnhan','lnv.tenloainv','qt.tenquoctich','dt.tendantoc','tg.tentongiao')
                            ->first();
        return $value;
    }

    public static function getxemctnhanvienData($id)
    {
        $value = DB::table('nhanvien as nv')
            -> where('nv.id','=',$id)
            -> select('nv.manv','nv.tennv','nv.hinhanh')
            ->first();
        return $value;
    }
}
