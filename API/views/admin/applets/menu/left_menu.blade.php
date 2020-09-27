@php
    $currentModule = request()->segment(ADMIN_MODULE_SEGMENT_NUM);
    $active = '';
    $modules = array_filter($modules, function ($value, $index) {
        return $value['active'] == true;
    }, ARRAY_FILTER_USE_BOTH);
@endphp
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{Route::currentRouteName() == 'home'? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            {{ trans('default.dashboard') }}
            <span class="right badge badge-success">
                HOME
            </span>
        </p>
    </a>
</li>
@foreach($modules as $index => $module)
    @php
        if($index == $currentModule){
            $active = 'active';
        } else {
            $active = '';
        }
    @endphp
    <li class="nav-item">
        <a href="{{ route($index) }}"
           class="nav-link {{ $active }}">
            <i class="nav-icon {{ $module['icon'] }}"></i>
            <p>
                {{ trans('default.'.$module['name']) }}
                @if(isset($module['system']) && $module['system'] == true)
                    <span class="right badge badge-warning">
                        <img src="{{ statimg('system.png','admin') }}" title="system" alt="system">
                    </span>
                @endif
            </p>
        </a>
    </li>
@endforeach