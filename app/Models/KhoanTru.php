<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class KhoanTru extends Model
{
    use HasFactory;

    public static function getkhoantruData()
    {
        $value = DB::table('khoantru')->get();
       
        return $value;
    }
    public static function getSumkhoantruData()
    {
       
        $value = DB::table('khoantru')->sum('khoantru.giatri');
        return $value;
    }
}
