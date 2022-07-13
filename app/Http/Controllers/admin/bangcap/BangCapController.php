<?php

namespace App\Http\Controllers\admin\bangcap;

use App\Http\Controllers\Controller;
use App\Models\BangCap;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BangCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bangcapData = bangcap::getbangcapData();
        return view(
            'admin.bangcap.bangcap',[
                'title'=>'Quản Lý Bằng cấp',
                'tieude'=>'Quản lý bằng cấp'
            ]
        )->with('viewdata', $bangcapData);
    }

    public function index2()
    {
        $bangcapData = bangcap::getbangcapData();
        return view('admin.bangcap.thembangcap',[
            'title'=>'Thêm Bằng Cấp',
            'tieude'=>'Thêm bằng cấp'
        ])->with('viewdata', $bangcapData);
    }

    public function index3($id)
    {
        $bangcap=\DB::table('bangcap')->where('id',$id)->first();
        return view('admin.bangcap.suabangcap',[
            'title'=>'Sửa Bằng Cấp',
            'tieude'=>'Sửa bằng cấp',
            'bangcap'=>$bangcap
        ]);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'mabangcap' => 'required|unique:bangcap,mabangcap',
            'tenbangcap' => 'required|max:255',

        ]);
        \DB::table('bangcap')->insert([
            'mabangcap' => $request->mabangcap,
            'tenbangcap' => $request->tenbangcap,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Thêm dữ liệu thành công');
        return redirect()->route('bangcap');
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'mabangcap' => 'required|unique:bangcap,mabangcap,' . $request->id . ',id',
            'tenbangcap' => 'required|max:255',
        ],[
            'mabangcap.unique'=>'Mã bằng cấp '.$request->mabangcap.' đã tồn tại'
        ]);

        \DB::table('bangcap')->where('id', $request->id)->update([
            'mabangcap' => $request->mabangcap,
            'tenbangcap' => $request->tenbangcap,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('bangcap');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('bangcap')->where('id', '=', $id)->delete();
            return redirect()->route('bangcap');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('bangcap');
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
     * @param  \App\Models\BangCap  $bangCap
     * @return \Illuminate\Http\Response
     */
    public function show(BangCap $bangCap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BangCap  $bangCap
     * @return \Illuminate\Http\Response
     */
    public function edit(BangCap $bangCap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BangCap  $bangCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BangCap $bangCap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BangCap  $bangCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(BangCap $bangCap)
    {
        //
    }
}
