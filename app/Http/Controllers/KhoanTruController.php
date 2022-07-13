<?php

namespace App\Http\Controllers\admin;

namespace App\Http\Controllers;
use App\Models\KhoanTru;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KhoanTruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoantruData = khoantru::getkhoantruData();
        return view(
            'admin.luong.khoantru.khoantru',[
            'title'=>'Khoản Trừ',
            'tieude'=>'Quản lý khoản trừ',
            'tieude1'=>'Thêm khoản trừ'
            ]
        )->with('viewdata', $khoantruData);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'makhoantru' => 'required|unique:khoantru,makhoantru',
            'tenkhoantru' => 'required|max:255',
            'giatri' => '',

        ]);
        \DB::table('khoantru')->insert([
            'makhoantru' => $request->makhoantru,
            'tenkhoantru' => $request->tenkhoantru,
            'giatri' => $request->giatri,
            'updated_at' => Carbon::now()
        ]);
        /*toastr()->success('Thêm dữ liệu thành công');*/
        return redirect()->route('khoantru');
    }

    public function index3($id)
    {
        $khoantru=\DB::table('khoantru')->where('id',$id)->first();
        return view('admin.luong.khoantru.suakhoantru',[
            'title'=>'Sửa Khoản Trừ',
            'tieude'=>'Sửa khoản trừ',
            'khoantru'=>$khoantru
        ]);
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'makhoantru' => 'required|unique:khoantru,makhoantru,' . $request->id . ',id',
            'tenkhoantru' => 'required|max:255',
            'giatri' => 'required'
        ]);

        \DB::table('khoantru')->where('id', $request->id)->update([
            'makhoantru' => $request->makhoantru,
            'tenkhoantru' => $request->tenkhoantru,
            'giatri' => $request->giatri,
            'ghichu' => $request->ghichu,
            'updated_at' => Carbon::now()
        ]);
        /*toastr()->success('Cập nhật dữ liệu thành công!');*/
        return redirect()->route('khoantru');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('khoantru')->where('id', '=', $id)->delete();
            return redirect()->route('khoantru');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('khoantru');
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
     * @param  \App\Models\KhoanTru  $khoanTru
     * @return \Illuminate\Http\Response
     */
    public function show(KhoanTru $khoanTru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhoanTru  $khoanTru
     * @return \Illuminate\Http\Response
     */
    public function edit(KhoanTru $khoanTru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KhoanTru  $khoanTru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KhoanTru $khoanTru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhoanTru  $khoanTru
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhoanTru $khoanTru)
    {
        //
    }
}
