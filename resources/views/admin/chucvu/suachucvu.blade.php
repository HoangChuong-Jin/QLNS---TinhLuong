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
                <form action="{{route('postsuachucvu', ['id'=>$chucvu->id])}}" method="POST" style="margin: 10px;">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã chức vụ: </label>
                            <input type="text" class="form-control @error('machucvu') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã chức vụ" name="machucvu" value="{{ $chucvu->machucvu }}">
                            @error('machucvu')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chức vụ: </label>
                            <input type="text" class="form-control @error('tenchucvu') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập tên chức vụ" name="tenchucvu" value="{{ $chucvu->tenchucvu }}">
                            @error('tenchucvu')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mức lương: </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên mức lương" name="mucluong" value="{{ $chucvu->mucluong }}">
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
