<table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th>STT</th>
        <th>Mã nhân viên</th>
        <th>Tên nhân viên</th>
        <th>Giới tính</th>
        <th>Số điện thoại</th>
        <th>Gmail</th>
        <th>Ngày sinh</th>
        <th>Nơi sinh</th>
        <th>Cmnd</th>
        <th>Ngày cấp cmnd</th>
        <th>Nơi cấp cmnd</th>
        <th>Hộ khẩu</th>
        <th>Tạm trú</th>
        <th>Quốc tịch</th>
        <th>Dân tộc</th>
        <th>Tôn giáo</th>
        <th>Loại nhân viên</th>
        <th>Hôn nhân</th>
        <th>Trình độ</th>
        <th>Chuyên môn</th>
        <th>Bằng cấp</th>
        <th>Phòng ban</th>
        <th>Chức vụ</th>
        <th>Trang thái</th>
    </tr>
    </thead>
    <tbody>
        <?php $stt=0; ?>
        @foreach($nhanvienData as $nhanvien)
            <?php $stt++; ?>
            <tr>
                <td>{{$stt}}</td>
                <td>{{$nhanvien->manv}}</td>
                <td>{{$nhanvien->tennv}}</td>
                <td>
                    @if($nhanvien->gioitinh == 1)
                        Nam
                    @else
                        Nữ
                    @endif
                </td>
                <td>{{$nhanvien->sdt}}</td>
                <td>{{$nhanvien->gmail}}</td>
                <td>
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $nhanvien->ngaysinh)
                                                    ->format('d/m/Y') }}
                </td>
                <td>{{$nhanvien->noisinh}}</td>
                <td>{{$nhanvien->cmnd}}</td>
                <td>
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $nhanvien->ngaycap_cmnd)
                                                    ->format('d/m/Y') }}
                </td>
                <td>{{$nhanvien->noicap_cmnd}}</td>
                <td>{{$nhanvien->hokhau}}</td>
                <td>{{$nhanvien->tamtru}}</td>
                <td>
                    @foreach($quoctichData as $quoctich)
                        @if($nhanvien->quoctich_id == $quoctich->id)
                            {{$quoctich->tenquoctich}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($dantocData as $dantoc)
                        @if($nhanvien->dantoc_id == $dantoc->id)
                            {{$dantoc->tendantoc}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($tongiaoData as $tongiao)
                        @if($nhanvien->tongiao_id == $tongiao->id)
                           {{$tongiao->tentongiao}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($loainhanvienData as $loainv)
                        @if($nhanvien->loainv_id == $loainv->id)
                            {{$loainv->tenloainv}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($tinhtranghonnhanData as $tinhtranghonnhan)
                        @if($nhanvien->honnhan_id == $tinhtranghonnhan->id)
                            @if($tinhtranghonnhan->tthonnhan == 1)
                                Đã kết hôn
                            @else
                                Độc thân
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($trinhdoData as $trinhdo)
                        @if($nhanvien->trinhdo_id == $trinhdo->id)
                            {{$trinhdo->tentrinhdo}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($chuyenmonData as $chuyenmon)
                        @if($nhanvien->chuyenmon_id == $chuyenmon->id)
                            {{$chuyenmon->tenchuyenmon}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($bangcapData as $bangcap)
                        @if($nhanvien->bangcap_id == $bangcap->id)
                            {{$bangcap->tenbangcap}}
                        @endif
                    @endforeach
                </td>
               <td>
                   @foreach($phongbanData as $phongban)
                       @if($nhanvien->phongban_id == $phongban->id)
                           {{$phongban->tenphongban}}
                       @endif
                   @endforeach
               </td>
                <td>
                    @foreach($chucvuData as $chucvu)
                        @if($nhanvien->chucvu_id == $chucvu->id)
                            {{$chucvu->tenchucvu}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @if($nhanvien->trangthai == 1)
                        Đang làm việc
                    @else
                        Đã nghĩ việc
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
