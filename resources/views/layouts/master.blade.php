@include('includes.header')
@if (Auth::user())
    @include('includes.sidebar')
@endif
<!-- Main Content -->
<div class="main-content">
    @yield('content')
</div>
@include('includes.footer')
