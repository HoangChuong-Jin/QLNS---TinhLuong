<?php

namespace App\Http\Controllers\admin\type;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $view = LoaiSanPham::orderbyDesc('id')->get();
        return view('admin.pages.type',[
            'title'=>'Trang Quản Lý Loại',
            'tieude'=>'Quản lý loại sản phẩm',
            'loai'=>$view
        ]);
    }
}
