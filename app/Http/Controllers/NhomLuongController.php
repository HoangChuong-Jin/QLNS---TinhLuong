<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhomLuong;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NhomLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $bangluongData = nhomluong::getbangluong2Data();
        return view(
            'admin.luong.bangluong',[
            'title'=>'Lương',
            'tieude'=>'Quản lý bảng lương'
            ]
        )->with('viewdata', $bangluongData);
    }*/

    public function index()
    {
        $bangluongData = nhomluong::getbangluongData();
        return view(
            'admin.luong.bangluong.taobangluong',[
                'title'=>'Bảng Lương',
                'tieude'=>'Quản lý bảng lương',
                'tieude1' => 'tạo bảng lương'
            ]
        )->with('viewdata', $bangluongData);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'tenbangluong' => 'required|unique:bangluong,tenbangluong'
        ]);
        \DB::table('bangluong')->insert([
            'tenbangluong' => $request->tenbangluong,
            'ngaybatdau' => $request->ngaybatdau,
            'ngayketthuc' => $request->ngayketthuc,
            'ghichu' => $request->ghichu,
            'updated_at' => Carbon::now()
        ]);
        /*toastr()->success('Thêm dữ liệu thành công');*/
        return redirect()->route('taobangluong');
    }

    public function index3($id)
    {
        $bangluong=\DB::table('bangluong')->where('id',$id)->first();
        return view('admin.luong.bangluong.suabangluong',[
            'title'=>'Sửa Bảng Lương',
            'tieude'=>'Sửa bảng lương',
            'bangluong'=>$bangluong
        ]);
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'tenbangluong' => 'required|unique:bangluong,tenbangluong,' . $request->id . ',id',
        ]);

        \DB::table('bangluong')->where('id', $request->id)->update([
            'tenbangluong' => $request->tenbangluong,
            'ngaybatdau' => $request->ngaybatdau,
            'ngayketthuc' => $request->ngayketthuc,
            'ghichu' => $request->ghichu,
            'updated_at' => Carbon::now()
        ]);
        /*toastr()->success('Cập nhật dữ liệu thành công!');*/
        return redirect()->route('taobangluong');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('bangluong')->where('id', '=', $id)->delete();
            return redirect()->route('taobangluong');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('taobangluong');
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
     * @param  \App\Models\NhomLuong  $nhomLuong
     * @return \Illuminate\Http\Response
     */
    public function show(NhomLuong $nhomLuong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhomLuong  $nhomLuong
     * @return \Illuminate\Http\Response
     */
    public function edit(NhomLuong $nhomLuong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NhomLuong  $nhomLuong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NhomLuong $nhomLuong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhomLuong  $nhomLuong
     * @return \Illuminate\Http\Response
     */
    public function destroy(NhomLuong $nhomLuong)
    {
        //
    }
}
