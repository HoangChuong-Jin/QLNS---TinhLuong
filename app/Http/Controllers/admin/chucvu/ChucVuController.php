<?php

namespace App\Http\Controllers\admin\chucvu;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function view;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$view = ChucVu::orderbyDesc('id')->get();
        return view('admin.chucvu.chucvu',[
            'title'=>'Trang Quản Lý Chức Vụ',
            'loai'=>$view
        ]);*/

        $chucvuData = chucvu::getchucvuData();
        return view(
            'admin.chucvu.chucvu',[
            'title'=>'Quản Lý Chức Vụ',
            'tieude'=>'Quản lý chức vụ']
        )->with('viewdata', $chucvuData);
    }

    public function index2()
    {
        $chucvuData = chucvu::getchucvuData();
        return view('admin.chucvu.themchucvu',[
            'title'=>'Thêm Chức Vụ',
            'tieude'=>'Thêm chức vụ'
        ])->with('viewdata', $chucvuData);
    }

    public function index3($id)
    {
        $chucvu=\DB::table('chucvu')->where('id',$id)->first();
        return view('admin.chucvu.suachucvu',[
            'title'=>'Sửa Chức Vụ',
            'tieude'=>'Sửa chức vụ',
            'chucvu'=>$chucvu
        ]);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'machucvu' => 'required|unique:chucvu,machucvu',
            'tenchucvu' => 'required|max:255',
            'mucluong' => 'required',

        ]);
        \DB::table('chucvu')->insert([
            'machucvu' => $request->machucvu,
            'tenchucvu' => $request->tenchucvu,
            'mucluong' => $request->mucluong,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Thêm dữ liệu thành công','Thông báo');
        return redirect()->route('chucvu');
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'machucvu' => 'required|unique:chucvu,machucvu,' . $request->id . ',id',
            'tenchucvu' => 'required|max:255',
            'mucluong' => 'required',
        ],[
            'machucvu.unique'=>'Mã chức vụ '.$request->machucvu.' đã tồn tại'
        ]);

        \DB::table('chucvu')->where('id', $request->id)->update([
            'machucvu' => $request->machucvu,
            'tenchucvu' => $request->tenchucvu,
            'mucluong' => $request->mucluong,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('chucvu');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('chucvu')->where('id', '=', $id)->delete();
            return redirect()->route('chucvu');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('chucvu');
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
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function show(ChucVu $chucVu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function edit(ChucVu $chucVu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChucVu $chucVu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChucVu $chucVu)
    {
        //
    }
}
