<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'lock',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getuserData()
    {
        $value = DB::table('users as u')
            ->join('nhanvien as nv','nv.id','=','u.nhanvien_id')
            -> select('u.*','nv.tennv')
            ->get();
        return $value;
    }

    public static function getuser2Data($id)
    {
        $value = DB::table('users as u')
            ->join('nhanvien as nv','nv.id','=','u.nhanvien_id')
            -> where('u.id',$id)
            -> select('u.*','nv.tennv')
            ->first();
        return $value;
    }

    public static function tttaikhoan()
    {
        $value = DB::table('users as u')->join('nhanvien as n','u.nhanvien_id','=','n.id')
            ->where('u.nhanvien_id','=',Auth::user()->nhanvien_id)
            -> select('u.*','n.tennv','n.hinhanh')
            ->first();
        return $value;
    }
}
