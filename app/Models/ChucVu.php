<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';

    protected $fillable = [
        'machucvu',
        'tenchucvu',
    ];

    public static function getchucvuData()
    {
        $value = DB::table('chucvu')->get();
        return $value;
    }
}
