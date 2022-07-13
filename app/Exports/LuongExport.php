<?php

namespace App\Exports;



use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class LuongExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $request;
    public function __construct($request) {
        $this->request = $request;
    }
    public function view(): View
    {
        if($this->request->input('bangluong_id') == "all"){
           $bangluong = DB::table('luong')
               ->join('bangluong','bangluong_id','=','bangluong.id')
               ->join('nhanvien','nhanvien_id','=','nhanvien.id')
               ->select('luong.*','bangluong.tenbangluong','nhanvien.tennv')->get();
        } else{
            $bangluong = DB::table('luong')
                ->join('bangluong','bangluong_id','=','bangluong.id')
                ->join('nhanvien','nhanvien_id','=','nhanvien.id')
                ->select('luong.*','bangluong.tenbangluong','nhanvien.tennv')
                ->where('bangluong.id',$this->request->input('bangluong_id'))->get();
        }
        return view('admin.export.luong_ex',[
            'bangluong'=>$bangluong,
        ]);

    }
}
