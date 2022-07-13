@extends('admin.main')

@section('content')
    <div class="content-wrapper">
        {{----}}
        <div class="content-header">
            <h2>Sửa phụ cấp</h2>
        </div>
        {{----}}
        <div class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa phụ cấp</h3>
                </div>
                <form action="{{route('postsuaphucap', ['id'=>$phucap->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã phụ cấp: </label>
                                <input type="text" class="form-control @error('maphucap') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="Nhập mã phụ cấp" name="maphucap" value="{{ $phucap->maphucap }}">
                                @error('maphucap')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phụ cấp: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Nhập tên phụ cấp" name="tenphucap" value="{{ $phucap->tenphucap }}">
                            </div>
                            <div class="form-group">
                                <label>Chức vụ : </label>
                                <select class="form-control @error('chucvu') is-invalid @enderror" name="chucvu">
                                    <option value="chon">--- Chọn chức vụ ---</option>
                                    @foreach($chucvuData as $chucvu)
                                        @if($chucvu->id==$phucap->chucvu_id)
                                            <option value="{{$chucvu->id}}" selected='selected'>{{$chucvu->tenchucvu}}</option>
                                        @else
                                            <option value="{{$chucvu->id}}" >{{$chucvu->tenchucvu}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('chucvu')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiền/ngày: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="nhập số tiền" name="sotien" value="{{ $phucap->sotien }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú: </label>
                                <textarea class="form-control" name="ghichu">{{ $phucap->ghichu }}</textarea>
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
