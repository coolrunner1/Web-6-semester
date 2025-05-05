@if (auth()->check() && auth()->user()->hasRole(1))
    <x-admin-navbar/>
@else
    <x-user-navbar/>
@endif
