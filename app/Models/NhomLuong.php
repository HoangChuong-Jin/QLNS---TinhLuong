<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

use App\Models\NhanVien;
use App\Models\Luong;

class NhomLuong extends Model
{
    use HasFactory;

    public static function getbangluongData()
    {
        $value = DB::table('bangluong')->get();
        return $value;
    }

    public static function getbangluong2Data()
    {
        $value = DB::table('bangluong as bl')
                            -> join('luong as l', 'l.bangluong_id','=','bl.id')
                            -> join('nhanvien as n', 'n.id','=','l.nhanvien_id')
                            -> where('bl.id','=','l.bangluong_id','and','l.id','=','')
                            -> select('bl.*','l.*','n.*')
                            ->get();
        return $value;
    }
}
