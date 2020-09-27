@if(Session::has('successCreate'))
    <p class="alert alert-success">{{session('successCreate')}}</p>
@endif
@if(Session::has('successUpdate'))
    <p class="alert alert-success">{{session('successUpdate')}}</p>
@endif
@if(Session::has('successRemove'))
    <p class="alert alert-success">{{session('successRemove')}}</p>
@endif
@if(Session::has('warning'))
    <p class="alert alert-warning">{{session('warning')}}</p>
@endif
