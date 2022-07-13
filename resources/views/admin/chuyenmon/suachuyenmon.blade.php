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
                <form action="{{route('postsuachuyenmon', ['id'=>$chuyenmon->id])}}" method="POST" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã chuyên môn: </label>
                                <input type="text" class="form-control @error('machuyenmon') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập mã chuyên môn" name="machuyenmon" value="{{ $chuyenmon->machuyenmon }}">
                                @error('machuyenmon')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chuyên môn: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên chuyên môn" name="tenchuyenmon" value="{{ $chuyenmon->tenchuyenmon }}">
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
