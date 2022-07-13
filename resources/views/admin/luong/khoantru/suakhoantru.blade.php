@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>{{$tieude}}</h2>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$tieude}}</h3>
                </div>
                <form action="{{route('postsuakhoantru', ['id'=>$khoantru->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã khoản trừ: </label>
                                <input type="text" class="form-control @error('makhoantru') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập mã khoản trừ" name="makhoantru" value="{{ $khoantru->makhoantru }}">
                                @error('makhoantru')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên khoản trừ: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập tên khoản trừ" name="tenkhoantru" value="{{ $khoantru->tenkhoantru }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tiền (%): </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="nhập số tiền (%)" name="giatri" value="{{ $khoantru->giatri }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{ $khoantru->ghichu }}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <button type='submit' class='btn btn-primary' name=''><i class=''></i> Cập nhật</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </form>

            </div>

        </div>
    </div>
@endsection
