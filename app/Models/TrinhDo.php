<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TrinhDo extends Model
{
    use HasFactory;

    public static function gettrinhdoData()
    {
        $value = DB::table('trinhdo')->get();
        return $value;
    }
}
