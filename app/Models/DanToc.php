<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class DanToc extends Model
{
    use HasFactory;

    public static function getdantocData()
    {
        $value = DB::table('dantoc')->get();
        return $value;
    }
}

