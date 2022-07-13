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
                <form action="{{route('posttinhluong')}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label style="color: black">Chọn bảng lương: </label>
                                <select class="form-control @error('bangluong_id') is-invalid @enderror" name="bangluong_id">
                                    <option value="" >--- Chọn bảng lương ---</option>
                                    @foreach($bangluongData as $bl)
                                        <option value="{{$bl->id}}" {{(old('bangluong_id')==$bl->id)?'selected':''}} >{{$bl->tenbangluong}}</option>
                                    @endforeach
                                </select>
                                @error('bangluong_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã lương: </label>
                                <input type="text" class="form-control @error('maluong') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập mã lương" name="maluong" value="{{old('maluong')}}">
                                @error('maluong')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label style="color: black">Chọn nhân viên: </label>
                                <select class="form-control @error('nhanvien_id') is-invalid @enderror" name="nhanvien_id" id="nhanvien_id">
                                    <option value="" >--- Chọn nhân viên ---</option>
                                    @foreach($nhanvienData as $nv)
                                        <option value="{{$nv->id}}" {{(old('nhanvien_id')==$nv->id)?'selected':''}}>{{$nv->manv}} - {{$nv->tennv}}</option>
                                    @endforeach
                                </select>
                                @error('nhanvien_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label style="color: black">Mức lương/ngày: </label>
                                <span id="mucluong">{{old('mucluong')}}</span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số ngày công: </label>
                                <input type="number" class="form-control @error('songaycong') is-invalid @enderror"
                                       placeholder="Nhập số ngày công" name="songaycong" id="songaycong" value="{{old('songaycong')}}">
                                @error('songaycong')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lương tháng: </label>
                                <input type="text" class="form-control @error('luongthang') is-invalid @enderror" id="luongthang"
                                       placeholder="" name="luongthang" value="{{old('luongthang')}}" readonly >
                                @error('luongthang')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khoản trừ: </label>
                                <input type="text" class="form-control" id="khoantrugoc"
                                       placeholder="" name="khoantrugoc" value="{{$khoantruData}}%" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khoản trừ ({{$khoantruData}}% giá trị tiền lương cơ bản): </label>
                                <input type="text" class="form-control" id="khoantru"
                                       placeholder="" name="khoantru" value="{{old('khoantru')}}" readonly>
                            </div>
                            <div class="form-group" hidden>
                                <label for="exampleInputEmail1">Phụ cấp gốc: </label>
                                <input type="text" class="form-control" id="phucapgoc"
                                       placeholder="" name="phucapgoc" value="{{old('sotienphucap')}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phụ cấp: </label>
                                <span id="phucap">{{old('phucap')}}</span>
                                <input type="text" class="form-control" id="phucapngay"
                                       placeholder="" name="phucapngay" value="{{old('sotienphucap')}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tạm ứng: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập số tiền tạm ứng" name="tamung" value="{{old('tamung')}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày tính: </label>
                                <input type="date" class="form-control @error('ngaytinh') is-invalid @enderror" id="ngaytinh"
                                       placeholder="" name="ngaytinh" value="">
                                <script>document.getElementById("ngaytinh").value = new Date().toJSON().slice(0,10)</script>
                                @error('ngaytinh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            {{--<div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{old('ghichu')}}</textarea>
                            </div>--}}
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class='fa fa-plus'></i> Tính lương</button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($){
            $("#nhanvien_id").change(function (){
                let route = '{{route("laymacv.ajax")}}';
                var nhanvien_id = $("#nhanvien_id").val();
                //alert(manv);
                $.ajax({
                    method:"GET",
                    url:route,
                    data:{nhanvien_id:nhanvien_id},
                    datatype: "json",
                    success: function (result){
                        if(result.error === false){

                            $("#mucluong").html(result.message1);
                            $("#phucap").html(result.message2);
                        }else{
                            $("#phucap").html('<input value="" type="text"/>');
                            $("#mucluong").html('<input value="" type="text"/>');
                        }
                    }
                });

            });
        });
        //Tính lương tháng
        const ngaycong = document.getElementById('songaycong');
        const luongthang = document.getElementById('luongthang');
        const khoantru = document.getElementById('khoantru');
        const inputHandler = function(e) {

            var ngaycong= e.target.value;
            let mucluong = document.getElementById('luongn').value;
            let phucap = document.getElementById('sotienphucap').value;
            luongthang.value = parseInt(ngaycong) * parseInt(mucluong);
            khoantru.value = (parseInt({{$khoantruData}})*(parseInt(ngaycong) * parseInt(mucluong)))/100;
            phucapngay.value= parseInt(phucap)*parseInt(ngaycong);
        }


        ngaycong.addEventListener('input', inputHandler);
        ngaycong.addEventListener('propertychange', inputHandler); // for I






    </script>

@endsection
