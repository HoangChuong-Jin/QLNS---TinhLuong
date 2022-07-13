<?php

namespace App\Http\Controllers\admin\nhanvien;

use App\Exports\NhanVienExport;
use App\Http\Controllers\Controller;
use App\Imports\NhanVienImport;
use App\Models\NhanVien;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\PhongBan;
use App\Models\ChucVu;
use App\Models\TrinhDo;
use App\Models\BangCap;
use App\Models\ChuyenMon;
use App\Models\LoaiNhanVien;
use App\Models\QuocTich;
use App\Models\DanToc;
use App\Models\TonGiao;
use App\Models\TinhTrangHonNhan;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path= config('app.url') . '/public/images/avata/';
        $nhanvienData = nhanvien::getnhanvienData();
        return view(
            'admin.nhanvien.nhanvien',[
                'title'=>'Quản Lý Nhân Viên',
                'tieude'=>'Quản lý nhân viên',
                'path'=>$path
            ]
        )->with('viewdata', $nhanvienData);
    }

    public function index2()
    {
        $phongbanData = phongban::getphongbanData();
        $chucvuData = chucvu::getchucvuData();
        $trinhdoData = trinhdo::gettrinhdoData();
        $bangcapData = bangcap::getbangcapData();
        $chuyenmonData = chuyenmon::getchuyenmonData();
        $loainhanvienData = loainhanvien::getloainvData();
        $quoctichData = quoctich::getquoctichData();
        $dantocData = dantoc::getdantocData();
        $tongiaoData = tongiao::gettongiaoData();
        $tinhtranghonnhanData = tinhtranghonnhan::gettinhtranghonnhanData();
        return view('admin.nhanvien.themnhanvien',[
            'title'=>'Thêm Nhân Viên',
            'tieude'=>'Thêm nhân viên',
            'phongbanData'=>$phongbanData,
            'chucvuData'=>$chucvuData,
            'trinhdoData'=>$trinhdoData,
            'bangcapData'=>$bangcapData,
            'chuyenmonData'=>$chuyenmonData,
            'loainhanvienData'=>$loainhanvienData,
            'quoctichData'=>$quoctichData,
            'dantocData'=>$dantocData,
            'tongiaoData'=>$tongiaoData,
            'tinhtranghonnhanData'=>$tinhtranghonnhanData
        ]);
    }

    public function postthem(Request $request)
    {
        $this->validate($request, [
            'manv' => 'required|unique:nhanvien,manv',
            'tennv' => 'required',
            'sdt' => 'required|numeric',
            'gmail' => 'required|unique:nhanvien,gmail,' . $request->id . ',id',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'cmnd' => 'required',
            'hokhau' => 'required',
            'tamtru' => 'required',
            'trangthai' => 'required',
            'loainv' => 'required',
            'chuyenmon' => 'required',
            'trinhdo' => 'required',
            'bangcap' => 'required',
            'chucvu' => 'required',
            'phongban' => 'required',
        ]);
        if(!empty($request->hinhanh))
        {
            $path = 'images/avata/';
            $file = $request->file('hinhanh');
            $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';
            $upload = $file->move(public_path($path), $new_name);
        }

        $orm = new NhanVien();

		$orm->manv = $request->manv;
		$orm->tennv = $request -> tennv;
        $orm-> sdt = $request->sdt;
        $orm-> gmail = $request->gmail;
        if(!empty($request->hinhanh)) $orm-> hinhanh = $new_name;
        $orm-> gioitinh = $request->gioitinh;
        $orm-> ngaysinh = $request->ngaysinh;
        if(!empty($request->noisinh)) $orm-> noisinh = $request->noisinh;
        $orm-> cmnd = $request->cmnd;
        if(!empty($request->noicap))$orm-> noicap_cmnd = $request->noicap;
        if(!empty($request->ngaycap))$orm-> ngaycap_cmnd = $request->ngaycap;
        $orm-> hokhau = $request->hokhau;
        $orm-> tamtru = $request->tamtru;
        $orm-> trangthai = $request->trangthai;
        if(!empty($request->honnhan))$orm-> honnhan_id = $request->honnhan;
        if(!empty($request->quoctich))$orm-> quoctich_id = $request->quoctich;
        if(!empty($request->tongiao))$orm-> tongiao_id = $request->tongiao;
        if(!empty($request->dantoc))$orm-> dantoc_id = $request->dantoc;
        $orm-> loainv_id = $request->loainv;
        $orm-> chuyenmon_id = $request->chuyenmon;
        $orm-> trinhdo_id = $request->trinhdo;
        $orm-> bangcap_id = $request->bangcap;
        $orm-> chucvu_id = $request->chucvu;
        $orm-> phongban_id = $request->phongban;

        $orm-> updated_at = Carbon::now();

		$orm->save();

        toastr()->success('Thêm dữ liệu thành công');
        return redirect()->route('nhanvien');
    }

    public function index3($id)
    {
        $nhanvien=\DB::table('nhanvien')->where('id',$id)->first();

        $phongbanData = phongban::getphongbanData();
        $chucvuData = chucvu::getchucvuData();
        $trinhdoData = trinhdo::gettrinhdoData();
        $bangcapData = bangcap::getbangcapData();
        $chuyenmonData = chuyenmon::getchuyenmonData();
        $loainhanvienData = loainhanvien::getloainvData();
        $quoctichData = quoctich::getquoctichData();
        $dantocData = dantoc::getdantocData();
        $tongiaoData = tongiao::gettongiaoData();
        $tinhtranghonnhanData = tinhtranghonnhan::gettinhtranghonnhanData();
        return view('admin.nhanvien.suanhanvien', [
            'title' => 'Sửa Thông Tin Nhân Viên',
            'tieude' => 'Sửa thông tin nhân viên',
            'tieude2' => 'Thông tin nhân viên',
            'phongbanData' => $phongbanData,
            'chucvuData' => $chucvuData,
            'trinhdoData' => $trinhdoData,
            'bangcapData' => $bangcapData,
            'chuyenmonData' => $chuyenmonData,
            'loainhanvienData' => $loainhanvienData,
            'quoctichData' => $quoctichData,
            'dantocData' => $dantocData,
            'tongiaoData' => $tongiaoData,
            'tinhtranghonnhanData' => $tinhtranghonnhanData,
            'nhanvien' => $nhanvien,
        ]);
    }

    public function postsua(Request $request)
    {
        $this->validate($request, [
            'manv' => 'required|unique:nhanvien,manv,' . $request->id . ',id',
            'tennv' => 'required',
            'sdt' => 'required|numeric',
            'gmail' => 'required|unique:nhanvien,gmail,' . $request->id . ',id',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'cmnd' => 'required',
            'hokhau' => 'required',
            'tamtru' => 'required',
            'trangthai' => 'required',
            'loainv' => 'required',
            'chuyenmon' => 'required',
            'trinhdo' => 'required',
            'bangcap' => 'required',
            'chucvu' => 'required',
            'phongban' => 'required',
        ]);
        if(!empty($request->hinhanh))
        {
        $path = 'images/avata/';
        $file = $request->file('hinhanh');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move(public_path($path), $new_name);
        }

        $orm = NhanVien::find($request->id);

		$orm->manv = $request->manv;
		$orm->tennv = $request -> tennv;
        $orm-> sdt = $request->sdt;
        $orm-> gmail = $request->gmail;
        if(!empty($request->hinhanh)) $orm-> hinhanh = $new_name;
        $orm-> gioitinh = $request->gioitinh;
        $orm-> ngaysinh = $request->ngaysinh;
        if(!empty($request->noisinh)) $orm-> noisinh = $request->noisinh;
        $orm-> cmnd = $request->cmnd;
        if(!empty($request->noicap))$orm-> noicap_cmnd = $request->noicap;
        if(!empty($request->ngaycap))$orm-> ngaycap_cmnd = $request->ngaycap;
        $orm-> hokhau = $request->hokhau;
        $orm-> tamtru = $request->tamtru;
        $orm-> trangthai = $request->trangthai;
        if(!empty($request->honnhan))$orm-> honnhan_id = $request->honnhan;
        if(!empty($request->quoctich))$orm-> quoctich_id = $request->quoctich;
        if(!empty($request->tongiao))$orm-> tongiao_id = $request->tongiao;
        if(!empty($request->dantoc))$orm-> dantoc_id = $request->dantoc;
        $orm-> loainv_id = $request->loainv;
        $orm-> chuyenmon_id = $request->chuyenmon;
        $orm-> trinhdo_id = $request->trinhdo;
        $orm-> bangcap_id = $request->bangcap;
        $orm-> chucvu_id = $request->chucvu;
        $orm-> phongban_id = $request->phongban;

        $orm-> updated_at = Carbon::now();

		$orm->save();

        toastr()->success('Cập nhật dữ liệu thành công');
        return redirect()->route('nhanvien');

    }

    public function postsua_member(Request $request)
    {
        $this->validate($request, [
            'tennv' => 'required',
            'sdt' => 'required|numeric',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'cmnd' => 'required',
            'hokhau' => 'required',
        ]);

        /*dd($request->all());*/

        if(!empty($request->hinhanh))
        {
            $path = 'images/avata/';
            $file = $request->file('hinhanh');
            $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';
            $upload = $file->move(public_path($path), $new_name);
        }

        $orm = NhanVien::find($request->id);

        $orm->tennv = $request -> tennv;
        $orm-> sdt = $request->sdt;
        if(!empty($request->hinhanh)) $orm-> hinhanh = $new_name;
        $orm-> gioitinh = $request->gioitinh;
        $orm-> ngaysinh = $request->ngaysinh;
        if(!empty($request->noisinh)) $orm-> noisinh = $request->noisinh;
        $orm-> cmnd = $request->cmnd;
        if(!empty($request->noicap))$orm-> noicap_cmnd = $request->noicap;
        if(!empty($request->ngaycap))$orm-> ngaycap_cmnd = $request->ngaycap;
        $orm-> hokhau = $request->hokhau;
        $orm-> tamtru = $request->tamtru;
        if(!empty($request->honnhan))$orm-> honnhan_id = $request->honnhan;

        $orm-> updated_at = Carbon::now();

        $orm->save();

        /*\DB::table('nhanvien')->where('id', $request->id)->update([
            'tennv' => $request->tennv,
            'hinhanh' => $request->hinhanh,
            'sdt' => $request->sdt,
            'gioitinh' => $request->gioitinh,
            'ngaysinh' => $request->ngaysinh,
            'noisinh' => $request->noisinh,
            'cmnd' => $request->cmnd,
            'ngaycap_cmnd' => $request->ngaycap,
            'noicap_cmnd' => $request->noicap,
            'hokhau' => $request->hokhau,
            'tamtru' => $request->tamtru,

            'updated_at' => Carbon::now()
        ]);*/

        toastr()->success('Cập nhật dữ liệu thành công');
        return redirect()->route('member');

    }

    public function getxoa($id)
    {
        try {
            \DB::table('nhanvien')->where('id', '=', $id)->delete();
            return redirect()->route('nhanvien');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('nhanvien');
        }
    }

    public function index4($id)
    {
        $id_ch =$id;
        $nhanvienData = nhanvien::all();
        $phongbanData = phongban::getphongbanData();
        $chucvuData = chucvu::getchucvuData();
        $trinhdoData = trinhdo::gettrinhdoData();
        $bangcapData = bangcap::getbangcapData();
        $chuyenmonData = chuyenmon::getchuyenmonData();
        $loainhanvienData = loainhanvien::getloainvData();
        $quoctichData = quoctich::getquoctichData();
        $dantocData = dantoc::getdantocData();
        $tongiaoData = tongiao::gettongiaoData();
        $tinhtranghonnhanData = tinhtranghonnhan::gettinhtranghonnhanData();
        /*dd($id_ch);*/
        return view('admin.nhanvien.chitietnhanvien', [
            'title' => 'Thông Tin Nhân Viên',
            'tieude' => 'Thông tin nhân viên',
            'phongbanData'=>$phongbanData,
            'chucvuData'=>$chucvuData,
            'trinhdoData'=>$trinhdoData,
            'bangcapData'=>$bangcapData,
            'chuyenmonData'=>$chuyenmonData,
            'loainhanvienData'=>$loainhanvienData,
            'quoctichData'=>$quoctichData,
            'dantocData'=>$dantocData,
            'tongiaoData'=>$tongiaoData,
            'tinhtranghonnhanData'=>$tinhtranghonnhanData,
            'nhanvienData'=>$nhanvienData,
            'id_ch' =>$id_ch
        ]);
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
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function show(NhanVien $nhanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function edit(NhanVien $nhanVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NhanVien $nhanVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(NhanVien $nhanVien)
    {
        //
    }
    public function export()
    {
        return Excel::download(new NhanVienExport(), 'Danh_Sach_Nhan_Vien.xlsx');
    }
    public function nhap_nv(Request $request){
        try {
            $import = Excel::import(new NhanVienImport($request), request()->file('type_file'));
            if($import){
                return redirect()->back()->with('success', 'Nhập liệu thành công');
            } else {
                Session::flash('error','Nhập liệu thất bại');
            }
        }catch (\Exception $err){
            Session::flash('error','Lỗi file hoặc dữ liệu trùng');
        }
        return redirect()->back();
    }
}
