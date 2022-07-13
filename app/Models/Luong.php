<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Luong extends Model
{
    use HasFactory;
    protected $table = 'luong';
    public static function getluongData()
    {
        $value = DB::table('luong')->get();
        return $value;
    }

    public static function gettinhluongData()
    {
        $value = DB::table('luong as l')
                            ->join('nhanvien as nv','nv.id','=','l.nhanvien_id')
                            -> join('chucvu as cv', 'cv.id','=','l.chucvu_id')
                            -> join('bangluong as bl', 'bl.id','=','l.bangluong_id')
                            /*-> where('l.nhanvien_id','=','nv.id','and',
                                'l.bangluong_id','=','bl.id','and'
                                ,'l.chucvu_id','=','cv.id')*/
                            -> select('l.*','bl.tenbangluong','nv.manv','nv.tennv','cv.tenchucvu')
                            ->get();
        return $value;
    }
}
