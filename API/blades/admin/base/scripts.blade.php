<!-- AdminLTE App -->
<script src="{{ asset('blade_components/admin/js/adminlte.min.js') }}"></script>
<!-- MAIN -->
<script src="{{ asset('blade_components/admin/js/main.js') }}"></script>

<!-- Plugins -->
<!-- overlayScrollbars -->
<script src="{{ asset('blade_components/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('blade_components/admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('blade_components/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

@if(isset($dataTable) && ($dataTable == true))
    <!-- DataTables -->
    <script src="{{ asset('blade_components/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('blade_components/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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
