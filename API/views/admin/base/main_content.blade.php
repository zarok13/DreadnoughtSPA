<section class="content">
    @if(!isset($smallWindow))
        @yield('content')
        @if($moduleName != 'roles')
            @include('admin.base._deletion_modal')
        @endif
    @else
        @yield('small_window')
    @endif
    
</section>
<!-- /.content -->
