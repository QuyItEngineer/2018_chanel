<li class="header">INFORMATION</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
        <a href="{!! route('home') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>
<li  class="{{ Request::is('dashboard/horizon') ? 'active' : '' }}">
    <a href="{!! route('dashboard.horizon') !!}"><i class="fa fa-tasks"></i><span>Horizon</span></a>
</li>

<li class="header">MAIN FUNCTIONS</li>

<li class="header">MEMBERS</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>
<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

{{--<li class="{{ Request::is('chanels*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('chanels.index') !!}"><i class="fa fa-edit"></i><span>Chanels</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('banners*') ? 'active' : '' }}">
    <a href="{!! route('banners.index') !!}"><i class="fa fa-edit"></i><span>Banners</span></a>
</li>

