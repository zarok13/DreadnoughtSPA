<section class="content">
    @if(!isset($smallWindow))
        @yield('content')
        @include('admin.base._deletion_modal')
    @else
        @yield('small_window')
    @endif
</section>
<!-- /.content -->
