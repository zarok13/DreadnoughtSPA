<section class="content">
    @if(!isset($smallWindow))
        @yield('content')
    @else
        @yield('small_window')
    @endif
</section>
<!-- /.content -->
