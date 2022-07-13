<table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
    <thead>
    <tr>
        <th>STT</th>
        <th>Bảng lương</th>
        <th>Mã lương</th>
        <th>Tên nhân viên</th>
        <th>Ngày công</th>
        <th>Lương tháng</th>
        <th>Phụ cấp</th>
        <th>Khoản trừ</th>
        <th>Tạm ứng</th>
        <th>Thực lãnh</th>
        <th>Ngày chấm</th>
    </tr>
    </thead>
    <tbody>
        <?php $stt=0; ?>
        @foreach($bangluong as $bl)
            <?php $stt++; ?>
            <tr>
                <td>{{$stt}}</td>
                <td>{{$bl->tenbangluong}}</td>
                <td>{{$bl->maluong}}</td>
                <td>{{$bl->tennv}}</td>
                <td>{{$bl->ngaycong}}</td>
                <td>{{$bl->luongthang}}</td>
                <td>{{$bl->phucap}}</td>
                <td>{{$bl->khoantru}}</td>
                <td>{{$bl->tamung}}</td>
                <td>{{$bl->thuclanh}}</td>
                <td>
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $bl->ngaycham)
                                                    ->format('d/m/Y') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

