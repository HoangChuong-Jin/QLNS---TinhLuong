<?php

namespace App\Http\Controllers\admin\taikhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class taikhoanController extends Controller
{
    public function index()
    {
        $userData = user::getuserData();
        return view('admin.user.taikhoan',[
            'title'=>'Quản Lý Tài Khoản',
            'tieude'=>'Quản lý tài khoản'
        ])->with('viewdata', $userData);
    }

    public function index2()
    {
        $nhanvienData = nhanvien::getnhanvienData();
        return view('admin.user.themtaikhoan',[
            'title'=>'Quản Lý Tài Khoản',
            'tieude'=>'Thêm tài khoản',
            'nhanvienData'=>$nhanvienData,
        ]);
    }

    public function index3(){
        $userData = user::tttaikhoan();
        return view('admin.user.thongtintaikhoan',[
            'title'=>'Quản lý Tài Khoản',
            'tieude'=>'Thông tin tài khoản',
            'userData'=>$userData
        ]);
    }

    public function postsua(Request $request)
    {
        /*dd($request->all());*/
        $this->validate($request, [
            'name' => 'required'
        ]);

        $orm = user::find($request->id);
        $orm->name = $request->name;

        $orm-> updated_at = Carbon::now();

        $orm->save();

        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('thongtintaikhoan');
    }

    public function postsua_member(Request $request)
    {
        /*dd($request->all());*/
        $this->validate($request, [
            'name' => 'required'
        ]);

        $orm = user::find($request->id);
        $orm->name = $request->name;

        $orm-> updated_at = Carbon::now();

        $orm->save();

        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('member');
    }

    public function index4(){
        $userData = user::tttaikhoan();
        return view('admin.user.doimatkhau',[
            'title'=>'Quản lý Tài Khoản',
            'tieude'=>'Đổi mật khẩu',
            'userData'=>$userData
        ]);
    }
    public function LayEmail_Ajax(Request  $request)
    {
        $nhanvien_id=$request->get('nhanvien_id');
        $nhanvien= NhanVien::where('id',$nhanvien_id)->first();

        //$output= $chucvu->mucluong;
        $output='<input type="text" id="emailnv" name="email" class="form-control" value="'.$nhanvien->gmail.'" readonly>';

        return Response()->json([
            'error'=>false,
            'message'=>$output,

        ]);
    }

    public function trangthai($id)
    {

        $orm = User::find($id);
        $orm->lock = 1 -$orm->lock;
        $orm->save();

        return redirect()->route('taikhoan');
    }
    public function postthemtaikhoan(Request $request)
    {
        $this->validate($request, [
            'nhanvien_id' => 'required',
            'level' => 'required',
            'status' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ]);
        $nhanvien= NhanVien::where('id',$request->nhanvien_id)->first();
        $orm = new User();

		$orm->nhanvien_id = $request->nhanvien_id;
		$orm->name = Str::before($nhanvien -> gmail, '@');
        $orm-> email = $nhanvien->gmail;
        $orm-> password = Hash::make($request -> new_password);
        $orm-> level = $request->level;
        $orm-> lock = $request->status;
		$orm->save();

        toastr()->success('Thêm dữ liệu thành công!');
        return redirect()->route('taikhoan');
    }
    public function postdoimk(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|max:255',
            'new_password' => 'required|min:6|confirmed'
        ]);

        $users= User::where('id', Auth::user()->id)->first();
        if(Hash::check($request->old_password, $users->password))
        {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('doimatkhau')->with('success', 'Đổi mật khẩu thành công!');
        }
        else
            return redirect()->route('doimatkhau')->with('warning', 'Mật khẩu cũ không chính xác!');
    }

    public function postdoimk_member(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|max:255',
            'new_password' => 'required|min:6|confirmed'
        ]);
        /*dd($request);*/
        $users= User::where('id', Auth::user()->id)->first();
        if(Hash::check($request->old_password, $users->password))
        {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('member')->with('success', 'Đổi mật khẩu thành công!');
        }
        else
            return redirect()->route('member')->with('warning', 'Mật khẩu cũ không chính xác!');
    }

    public function index_suatk($id)
    {
        $userData = user::getuser2Data($id);
        $user=\DB::table('users')->where('id',$id)->first();
        return view('admin.user.suataikhoan',[
            'title'=>'Quản Lý Tài Khoản',
            'tieude'=>'Sửa tài khoản',
            'userData'=>$userData,
            'user' => $user,
        ]);
    }

    public function postsuataikhoan(Request $request)
    {
        /*dd($request->all());*/
        $this->validate($request, [
            'name' => 'required',
            'level' => 'required',
            'status' => 'required'
        ]);
        $orm = user::find($request->id);
        $orm->name = $request->name;
        $orm-> level = $request->level;
        $orm-> lock = $request->status;

        $orm-> updated_at = Carbon::now();

        $orm->save();

        toastr()->success('Cập nhật dữ liệu thành công!');
        return redirect()->route('taikhoan');
    }

    public function getxoa($id)
    {
        try {
            \DB::table('users')->where('id', '=', $id)->delete();
            return redirect()->route('taikhoan');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('taikhoan');
        }
    }
}
