<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TinhTrangHonNhan extends Model
{
    use HasFactory;

    public static function gettinhtranghonnhanData()
    {
        $value = DB::table('tinhtranghonnhan')->get();
        return $value;
    }
}
