
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Phiên bản 1.0
    </div>
    <!-- Default to the left -->
    <strong>Đề tài thực tập: <b style="color: #0000FF">Quản lý nhân sự.</b></strong> <a href="#">N.H.Chương</a> & <a href="#">N.T.H.Anh.</a>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@jquery
    @toastr_js
    @toastr_render
<!-- jQuery -->
<script src="{{ asset('resources/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('resources/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('resources/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('resources/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('resources/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('resources/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('resources/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('resources/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('resources/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@yield('javascript')
</body>
</html>
