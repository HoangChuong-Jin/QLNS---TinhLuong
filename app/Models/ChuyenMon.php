<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ChuyenMon extends Model
{
    use HasFactory;
    protected $fillable = [
        'machuyenmon',
        'tenchuyenmon',
    ];

    public static function getchuyenmonData()
    {
        $value = DB::table('chuyenmon')->get();
        return $value;
    }
}
