<?php

namespace App\Http\Controllers\admin\phongban;

use App\Http\Controllers\Controller;
use App\Models\PhongBan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongbanData = phongban::getphongbanData();
        return view(
            'admin.phongban.phongban',[
                'title'=>'Quản Lý Phòng Ban',
                'tieude'=>'Quản lý phòng ban']
        )->with('viewdata', $phongbanData);
    }

    public function index2()
    {
        $phongbanData = phongban::getphongbanData();
        return view('admin.phongban.themphongban',[
            'title'=>'Thêm Phòng Ban',
            'tieude'=>'Thêm phòng ban'
        ])->with('viewdata', $phongbanData);
    }

    public function index3($id)
    {
        $phongban=\DB::table('phongban')->where('id',$id)->first();
        return view('admin.phongban.suaphongban',[
            'title'=>'Sửa Phòng Ban',
            'tieude'=>'Sửa phòng ban',
            'phongban'=>$phongban
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postthem(Request $request)
    {
        $this->validate($request, [
            'maphongban' => 'required|unique:phongban,maphongban',
            'tenphongban' => 'required|max:255'

        ]);
        \DB::table('phongban')->insert([
            'maphongban' => $request->maphongban,
            'tenphongban' => $request->tenphongban,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Thêm dữ liệu thành công');
        return redirect()->route('phongban');
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'maphongban' => 'required|unique:phongban,maphongban,' . $request->id . ',id',
            'tenphongban' => 'required|max:255'
        ],[
            'maphongban.unique'=>'Mã phòng ban '.$request->maphongban.' đã tồn tại'
        ]);

        \DB::table('phongban')->where('id', $request->id)->update([
            'maphongban' => $request->maphongban,
            'tenphongban' => $request->tenphongban,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('phongban');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('phongban')->where('id', '=', $id)->delete();
            return redirect()->route('phongban');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('phongban');
        }
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
     * @param  \App\Models\PhongBan  $phongBan
     * @return \Illuminate\Http\Response
     */
    public function show(PhongBan $phongBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhongBan  $phongBan
     * @return \Illuminate\Http\Response
     */
    public function edit(PhongBan $phongBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhongBan  $phongBan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhongBan $phongBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhongBan  $phongBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhongBan $phongBan)
    {
        //
    }
}
