<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class LoaiNhanVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'maloainv',
        'tenloainv',
    ];

    public static function getloainvData()
    {
        $value = DB::table('loainhanvien')->get();
        return $value;
    }
}
