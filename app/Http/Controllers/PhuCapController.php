<?php

namespace App\Http\Controllers\admin;

namespace App\Http\Controllers;
use App\Models\PhuCap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ChucVu;

class PhuCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chucvuData = chucvu::getchucvuData();
        $phucapData = phucap::getphucap2Data();
        return view(
            'admin.luong.phucap.phucap',[
            'title'=>'Phụ Cấp',
            'tieude'=>'Quản lý phụ cấp',
            'tieude1'=>'Thêm phụ cấp',
            'chucvuData'=>$chucvuData,
            ]
        )->with('viewdata', $phucapData);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'maphucap' => 'required|unique:phucap,maphucap',
            'chucvu' => 'required|unique:phucap,chucvu_id'
        ]);
        \DB::table('phucap')->insert([
            'maphucap' => $request->maphucap,
            'tenphucap' => $request->tenphucap,
            'sotien' => $request->sotien,
            'ghichu' => $request->ghichu,
            'chucvu_id' => $request->chucvu,
            'updated_at' => Carbon::now()
        ]);
        /*toastr()->success('Thêm dữ liệu thành công');*/
        return redirect()->route('phucap');
    }

    public function index3($id)
    {
        $phucap=\DB::table('phucap')->where('id',$id)->first();
        $chucvuData = chucvu::getchucvuData();
        return view('admin.luong.phucap.suaphucap',[
            'title'=>'Sửa Phụ Cấp',
            'tieude'=>'Sửa phụ cấp',
            'chucvuData'=>$chucvuData,
            'phucap'=>$phucap
        ]);
    }

    public function postsua(Request $request)
    {
        /*dd($request->all());*/
        $this->validate($request, [
            'maphucap' => 'required|unique:phucap,maphucap,' . $request->id . ',id',
            'tenphucap' => 'required|unique:phucap,tenphucap,'. $request->id . ',id',
            'sotien' => 'required',
            'chucvu' => 'required'
        ]);

        $orm = PhuCap::find($request->id);

        $orm->maphucap = $request->maphucap;
        $orm->tenphucap = $request -> tenphucap;
        $orm-> chucvu_id = $request->chucvu;
        $orm-> sotien = $request->sotien;
        $orm-> ghichu = $request->ghichu;

        $orm-> updated_at = Carbon::now();

        $orm->save();

        /*toastr()->success('Cập nhật dữ liệu thành công!');*/
        return redirect()->route('phucap');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('phucap')->where('id', '=', $id)->delete();
            return redirect()->route('phucap');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('phucap');
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
     * @param  \App\Models\PhuCap  $phuCap
     * @return \Illuminate\Http\Response
     */
    public function show(PhuCap $phuCap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhuCap  $phuCap
     * @return \Illuminate\Http\Response
     */
    public function edit(PhuCap $phuCap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhuCap  $phuCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhuCap $phuCap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhuCap  $phuCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhuCap $phuCap)
    {
        //
    }
}
