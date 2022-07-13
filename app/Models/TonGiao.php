<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class TonGiao extends Model
{
    use HasFactory;

    public static function gettongiaoData()
    {
        $value = DB::table('tongiao')->get();
        return $value;
    }
}
