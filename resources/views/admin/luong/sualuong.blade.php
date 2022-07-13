@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2></h2>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$tieude}}</h3>
                </div>
                <form action="{{route('postsualuong' ,['id'=>$luong->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã lương: </label>
                                <input type="text" class="form-control {{--@error('mabangcap') is-invalid @enderror--}}" id="exampleInputEmail1"
                                       placeholder="Nhập mã lương" name="maluong" value="{{$luong->maluong}}" readonly>
                                {{--@error('mabangcap')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror--}}
                            </div>
                            <div class="form-group">
                                <label style="color: black">Bảng lương: </label>
                                @foreach($bangluong as $bl)
                                    @if($bl->id == $luong->bangluong_id)
                                        <input type="text" class="form-control @error('') is-invalid @enderror" id="exampleInputEmail1"
                                               placeholder="Nhập mã lương" name="" value="{{$bl->tenbangluong}}" readonly>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label style="color: black">Chọn nhân viên: </label>
                                @foreach($nhanvien as $nv)
                                    @if($nv->id == $luong->nhanvien_id)
                                        <input type="text" class="form-control @error('') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập mã lương" name="" value="{{$nv->tennv}}" readonly>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số ngày công: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập số ngày công" name="ngaycong" value="{{$luong->ngaycong}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lương tháng: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="" name="luongthang" value="{{$luong->luongthang}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khoản trừ: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="" name="khoantru" value="{{$luong->khoantru}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phụ cấp: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="" name="phucap" value="{{$luong->phucap}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tạm ứng: </label>
                                <input type="number" class="form-control" id="tamungmoi"
                                       placeholder="Nhập số tiền tạm ứng" name="tamung" value="{{$luong->tamung}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày tính: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                       placeholder="" name="ngaycham" value="{{$luong->ngaycham}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thực lãnh: </label>
                                <input type="text" class="form-control" id="thuclanh"
                                       placeholder="Nhập số tiền thực lãnh" name="thuclanh" value="{{$luong->thuclanh}}" readonly>
                            </div>
                            {{--<div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{$luong->ghichu}}</textarea>
                            </div>--}}
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary'><i class=''></i> Cập nhật</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        //Tính lương tháng

        const thuclanh = document.getElementById('thuclanh');
        const tamungmoi = document.getElementById('tamungmoi');
        const inputHandler = function(e) {

            /*alert(tamungmoi);
            alert(thuclanh);*/
            var tamungmoi1= e.target.value;

            thuclanh.value = parseInt({{$luong->thuclanh}}) + parseInt({{$luong->tamung}}) - parseInt(tamungmoi1);
        }
        tamungmoi.addEventListener('input', inputHandler);
        tamungmoi.addEventListener('propertychange', inputHandler); // for I
    </script>
@endsection
