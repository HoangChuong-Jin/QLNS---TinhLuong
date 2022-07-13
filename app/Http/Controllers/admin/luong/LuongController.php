<?php

namespace App\Http\Controllers\admin\luong;

use App\Exports\LuongExport;
use App\Http\Controllers\Controller;
use App\Models\Luong;
use Illuminate\Http\Request;

use App\Models\NhomLuong;
use App\Models\NhanVien;
use App\Models\PhuCap;
use App\Models\KhoanTru;
use App\Models\ChucVu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $nhanvienData = nhanvien::getnhanvienData();
        $chucvuData = chucvu::getchucvuData();
        $bangluongData = nhomluong::getbangluongData();
        $phucapData = phucap::getphucapData();
        $khoantruData = khoantru::getSumkhoantruData();

        return view('admin.luong.tinhluong',[
            'title'=>'Tính Lương',
            'tieude'=>'Tính lương nhân viên',
            'bangluongData'=>$bangluongData,
            'nhanvienData'=>$nhanvienData,
            'chucvuData'=>$chucvuData,
            'phucapData'=>$phucapData,
            'khoantruData'=>$khoantruData,
        ]);
    }

    public function index2()
    {
        $bangluongData = nhomluong::getbangluongData();
        $luongData = luong::gettinhluongData();
        return view('admin.luong.bangluong',[
            'title'=>'Tính Lương',
            'tieude'=>'Lương nhân viên',
            'bangluongData'=> $bangluongData,
            'viewdata' => $luongData
        ]);/*->with('viewdata', $luongData);*/
    }

    public function LayMaCV_Ajax(Request  $request)
    {
        $nhanvien_id=$request->get('nhanvien_id');
        $nhanvien= NhanVien::where('id',$nhanvien_id)->first();

        $chucvu= ChucVu::where('id',$nhanvien->chucvu_id)->first();
        $phucap= PhuCap::where('chucvu_id',$nhanvien->chucvu_id)->first();
        //$output= $chucvu->mucluong;
        $output1='<input type="text" id="luongn" name="mucluong" class="form-control" value="'.$chucvu->mucluong.'" readonly>';
        $output2='<input type="hidden" id="sotienphucap" name="phucap" class="form-control" value="'.$phucap->sotien.'" readonly>';
        return Response()->json([
            'error'=>false,
            'message1'=>$output1,
            'message2'=>$output2,
        ]);
    }


    public function posttinhluong(Request $request)
    {

        $this->validate($request, [
            'maluong' => 'required',
            'nhanvien_id' => 'required',
            'bangluong_id' => 'required',
            'songaycong' => 'required',
            'luongthang' => 'required',
            'khoantru' => 'required',
            'ngaytinh' => 'required',
        ]);

        //tính thực lãnh
        $thuclanh=0;


        if(!empty($request->phucapngay) && !empty($request->tamung)){
            $thuclanh = $request->luongthang+$request->phucapngay-$request->tamung - $request->khoantru;
        }
        elseif(!empty($request->phucap))
        {
            $thuclanh = $request->luongthang + $request->phucapngay - $request->khoantru;
        }
        elseif(!empty($request->tamung))
        {
            $thuclanh = $request->luongthang - $request->tamung - $request->khoantru;
        }
        else
        {
            $thuclanh = $request->luongthang - $request->khoantru;
        }


        $nhanvien= NhanVien::where('id',$request->nhanvien_id)->first();

        $orm = new Luong();

		$orm->maluong = $request->maluong;
		$orm->nhanvien_id = $request -> nhanvien_id;
        $orm-> chucvu_id = $nhanvien->chucvu_id;
        $orm-> bangluong_id = $request->bangluong_id;
        $orm-> ngaycong = $request->songaycong;
        $orm-> luongthang = $request->luongthang;
        if(!empty($request->phucap)) $orm-> phucap = $request->phucapngay;
        $orm-> khoantru = $request->khoantru;
        if(!empty($request->tamung)) $orm-> tamung = $request->tamung;
        $orm-> thuclanh = $thuclanh;
        $orm-> ngaycham = $request->ngaytinh;

		$orm->save();

        /*toastr()->success('Thêm dữ liệu thành công');*/
        return redirect()->route('bangluong');
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
     * @param  \App\Models\Luong  $luong
     * @return \Illuminate\Http\Response
     */
    public function show(Luong $luong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luong  $luong
     * @return \Illuminate\Http\Response
     */
    public function edit(Luong $luong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Luong  $luong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Luong $luong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luong  $luong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luong $luong)
    {
        //
    }
    public function xuat_luong(Request $request)
    {
        if($request->input('bangluong_id')=="none")
        {
            Session::flash('error','Phải chọn bảng lương');
            return redirect()->back();
        }
        if($request->input('bangluong_id')=="all")
        {
            return Excel::download(new LuongExport($request), 'Danh_Sach_Luong.xlsx');
        } else {
            $bangluong = DB::table('bangluong')
                ->where('id',$request->input('bangluong_id'))
                ->select('tenbangluong')->first();
            return Excel::download(new LuongExport($request), 'Danh_Sach_Luong_'.$bangluong->tenbangluong.'.xlsx');
        }

    }

    public function ctluong($id)
    {
        $id_ch = $id;
        $nhanvienData = nhanvien::all();
        $bangluongData = nhomluong::getbangluongData();
        $luongData = luong::getluongData();
        /*dd($id_ch);*/
        return view('admin.luong.ctluong', [
            'title' => 'Thông Tin Lương',
            'tieude' => 'Thông tin lương',
            'nhanvienData' => $nhanvienData,
            'bangluongData' => $bangluongData,
            'luongData' => $luongData,
            'id_ch' => $id_ch
        ]);
    }

    public function getxoa($id)
    {
        try {
            \DB::table('luong')->where('id', '=', $id)->delete();
            return redirect()->route('bangluong');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('bangluong');
        }
    }

    public function index3($id)
    {
        $luongData=\DB::table('luong')->where('id',$id)->first();
        $id_ch = $id;
        $bangluong = nhomluong::getbangluongData();
        $nhanvien = nhanvien::getnhanvienData();
        /*dd($id_ch);*/
        return view('admin.luong.sualuong', [
            'title' => 'Sửa Lương Nhân Viên',
            'tieude' => 'Sửa lương nhân viên',
            'tieude2' => 'lương nhân viên',
            'bangluong' => $bangluong,
            'nhanvien' => $nhanvien,
            'luong' => $luongData,
            'id_ch'=> $id_ch
        ]);
    }

    public function postsua(Request $request)
    {
        /*dd($request->all());*/
        $orm = Luong::find($request->id);


        $orm-> tamung = $request->tamung;
        $orm-> thuclanh = $request->thuclanh;
        $orm-> ngaycham = $request->ngaycham;

        $orm->save();

        /*toastr()->success('Thêm dữ liệu thành công');*/
        return redirect()->route('bangluong');
    }
}
