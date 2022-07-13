<?php

namespace App\Http\Controllers\admin\loainhanvien;

use App\Http\Controllers\Controller;
use App\Models\LoaiNhanVien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoaiNhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loainvData = loainhanvien::getloainvData();
        return view(
            'admin.loainhanvien.loainv',[
                'title'=>'Quản Lý Loại NV',
                'tieude'=>'Quản lý loại nhân viên'
            ]
        )->with('viewdata', $loainvData);
    }

    public function index2()
    {
        $loainvData = loainhanvien::getloainvData();
        return view('admin.loainhanvien.themloainv',[
            'title'=>'Thêm Loại Nhân Viên',
            'tieude'=>'Thêm loại nhân viên'
        ])->with('viewdata', $loainvData);
    }

    public function index3($id)
    {
        $loainhanvien=\DB::table('loainhanvien')->where('id',$id)->first();
        return view('admin.loainhanvien.sualoainv',[
            'title'=>'Sửa Loại Nhân Viên',
            'tieude'=>'Sửa loại nhân viên',
            'loainv'=>$loainhanvien
        ]);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'maloainv' => 'required|unique:loainhanvien,maloainv',
            'tenloainv' => 'required|max:255',

        ]);
        \DB::table('loainhanvien')->insert([
            'maloainv' => $request->maloainv,
            'tenloainv' => $request->tenloainv,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Thêm dữ liệu thành công');
        return redirect()->route('loainv');
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'maloainv' => 'required|unique:loainhanvien,maloainv,' . $request->id . ',id',
            'tenloainv' => 'required|max:255',
        ],[
            'maloainv.unique'=>'Mã loại nhân viên '.$request->maloainv.' đã tồn tại'
        ]);

        \DB::table('loainhanvien')->where('id', $request->id)->update([
            'maloainv' => $request->maloainv,
            'tenloainv' => $request->tenloainv,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('loainv');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('loainhanvien')->where('id', '=', $id)->delete();
            return redirect()->route('loainv');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('loainv');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiNhanVien  $loaiNhanVien
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiNhanVien $loaiNhanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiNhanVien  $loaiNhanVien
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiNhanVien $loaiNhanVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiNhanVien  $loaiNhanVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoaiNhanVien $loaiNhanVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiNhanVien  $loaiNhanVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiNhanVien $loaiNhanVien)
    {
        //
    }
}
