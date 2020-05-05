<!-- AdminLTE App -->
<script src="{{ asset('blade_components/admin/js/adminlte.min.js') }}"></script>
<!-- main -->
<script src="{{ asset('blade_components/admin/js/main.js') }}"></script>
<!-- Plugins -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('blade_components/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- overlayScrollbars -->
<script src="{{ asset('blade_components/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('blade_components/admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('blade_components/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('blade_components/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('blade_components/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('blade_components/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('blade_components/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
