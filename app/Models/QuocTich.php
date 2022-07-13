<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class QuocTich extends Model
{
    use HasFactory;

    public static function getquoctichData()
    {
        $value = DB::table('quoctich')->get();
        return $value;
    }
}
