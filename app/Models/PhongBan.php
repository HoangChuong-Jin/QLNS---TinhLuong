<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class PhongBan extends Model
{
    use HasFactory;
    protected $fillable = [
        'maphongban',
        'tenphongban',
    ];

    public static function getphongbanData()
    {
        $value = DB::table('phongban')->get();
        return $value;
    }
}
