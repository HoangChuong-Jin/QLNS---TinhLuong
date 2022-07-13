<?php

namespace App\Http\Controllers\admin\chuyenmon;

use App\Http\Controllers\Controller;
use App\Models\ChuyenMon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChuyenMonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chuyenmonData = chuyenmon::getchuyenmonData();
        return view(
            'admin.chuyenmon.chuyenmon',[
                'title'=>'Quản Lý Chuyên Môn',
                'tieude'=>'Quản lý chuyên môn'
            ]
        )->with('viewdata', $chuyenmonData);
    }

    public function index2()
    {
        $chuyenmonData = chuyenmon::getchuyenmonData();
        return view('admin.chuyenmon.themchuyenmon',[
            'title'=>'Thêm Chuyên Môn',
            'tieude'=>'Thêm chuyên môn'
        ])->with('viewdata', $chuyenmonData);
    }

    public function index3($id)
    {
        $chuyenmon=\DB::table('chuyenmon')->where('id',$id)->first();
        return view('admin.chuyenmon.suachuyenmon',[
            'title'=>'Sửa Chuyên Môn',
            'tieude'=>'Sửa chuyên môn',
            'chuyenmon'=>$chuyenmon
        ]);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'machuyenmon' => 'required|unique:chuyenmon,machuyenmon',
            'tenchuyenmon' => 'required|max:255',

        ]);
        \DB::table('chuyenmon')->insert([
            'machuyenmon' => $request->machuyenmon,
            'tenchuyenmon' => $request->tenchuyenmon,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Thêm dữ liệu thành công');
        return redirect()->route('chuyenmon');
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'machuyenmon' => 'required|unique:chuyenmon,machuyenmon,' . $request->id . ',id',
            'tenchuyenmon' => 'required|max:255',
        ],[
            'machuyenmon.unique'=>'Mã chuyên môn '.$request->machuyenmon.' đã tồn tại'
        ]);

        \DB::table('chuyenmon')->where('id', $request->id)->update([
            'machuyenmon' => $request->machuyenmon,
            'tenchuyenmon' => $request->tenchuyenmon,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('chuyenmon');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('chuyenmon')->where('id', '=', $id)->delete();
            return redirect()->route('chuyenmon');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('chuyenmon');
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
     * @param  \App\Models\ChuyenMon  $chuyenMon
     * @return \Illuminate\Http\Response
     */
    public function show(ChuyenMon $chuyenMon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChuyenMon  $chuyenMon
     * @return \Illuminate\Http\Response
     */
    public function edit(ChuyenMon $chuyenMon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChuyenMon  $chuyenMon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChuyenMon $chuyenMon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChuyenMon  $chuyenMon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChuyenMon $chuyenMon)
    {
        //
    }
}
