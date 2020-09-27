<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.base.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div id="image-loader" style="display: none;">
    <img src="{{ statimg('loadingImg.gif', true) }}">
</div>
<div class="wrapper">
@if(!isset($smallWindow))
    @include('admin.base.panel')
    @include('admin.base.sidebar')
@endif
<!-- Page Content  -->
    <div class="content-wrapper">
        @if(isset($homePage) && $homePage == true)
            @include('admin.base.dashboard')
        @else
            @if(!isset($smallWindow))
                @include('admin.base.main_title')
            @endif
            @include('admin.base.main_content')
        @endif
    </div>
    @if(!isset($smallWindow))
        @include('admin.base.footer')

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    @endif
</div>
@include('admin.base.scripts')
</body>
</html>
