<!-- AdminLTE App -->
<script src="{{ asset('blade_components/admin/js/adminlte.min.js') }}"></script>
<!-- MAIN -->
<script src="{{ asset('blade_components/admin/js/main.js') }}"></script>

<!-- Plugins -->
<!-- overlayScrollbars -->
<script src="{{ asset('blade_components/admin/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('blade_components/admin/js/toastr.min.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('blade_components/admin/js/sweetalert2.all.min.js') }}"></script>

@if(isset($dataTable) && ($dataTable == true))
    <!-- DataTables -->
    <script src="{{ asset('blade_components/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('blade_components/admin/js/dataTables.bootstrap4.js') }}"></script>
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
