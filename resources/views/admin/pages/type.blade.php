@extends('admin.main')

@section('content')
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4 mb-4">
        <i class="fa fa-bars text-primary mr-1"></i>
    </button>

    <div class="container">
        <h2 class="display-4 text-dark">{{$tieude}}</h2>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-11 content-view" style="background-color: #fff;padding: 16px;border-radius:8px">
                <div class="add-category">
                </div>
                @include('admin.alert')
                <table class="table table-hover" id ="tblType">
                    <thead>
                    <tr id="list-header">
                        <th scope="col">STT</th>
                        <th scope="col">Tên loại sản phẩm</th>
                        <th scope="col">Tên không dấu</th>
                        <th scope="col">Cập nhật</th>
                        <th scope="col" class="final">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt=0; ?>
                    @foreach($loai as $l)
                        <?php $stt++ ?>
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td>{{$l->tenloai}}</td>
                            <td>{{$l->tenloai_slug}}</td>
                            <td>{{$l->updated_at}}</td>
                            <td class="final">
                                <a href="admin/type/edittype/{{$l->id}}"  title ="Sửa" class="category-edit"><i class='bx bxs-edit'></i></a>
                                <a  onclick="removeRow({{$l->id}},'admin/type/destroy')" title="Xóa" class="category-del" style="color: red"><i class='bx bxs-x-circle'></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#tblType').DataTable();
    } );
</script>
@endsection
