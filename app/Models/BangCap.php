<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class BangCap extends Model
{
    use HasFactory;
    protected $fillable = [
        'mabangcap',
        'tenbangcap',
    ];

    public static function getbangcapData()
    {
        $value = DB::table('bangcap')->get();
        return $value;
    }
}
