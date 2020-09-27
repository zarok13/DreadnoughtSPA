<!-- AdminLTE App -->
<script src="{{ asset('scripts/admin/js/adminlte.min.js') }}"></script>
<!-- MAIN -->
<script src="{{ asset('scripts/admin/js/main.js') }}"></script>

<!-- Plugins -->
<!-- overlayScrollbars -->
<script src="{{ asset('scripts/admin/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('scripts/admin/js/toastr.min.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('scripts/admin/js/sweetalert2.all.min.js') }}"></script>

@if(isset($dataTable) && ($dataTable == true))
    <!-- DataTables -->
    <script src="{{ asset('scripts/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('scripts/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $("#dreadnoughtDataTable").DataTable({});
    </script>
    {{-- <script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script> --}}
@endif
