<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PhuCap extends Model
{
    use HasFactory;
    protected $table = 'phucap';

    public static function getphucapData()
    {
        $value = DB::table('phucap')->get();
        return $value;
    }

    public static function getphucap2Data()
    {
        $value = DB::table('phucap as pc')
                            -> join('chucvu as cv', 'cv.id','=','pc.chucvu_id')
                            -> select('pc.*','cv.tenchucvu')
                            ->get();
        return $value;
    }
}
