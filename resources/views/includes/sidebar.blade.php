<div class="main-sidebar sidebar-style-2">
    @role('admin')
        @include('includes.sidebar_admin')
    @endrole
    @role('userClient')
        @include('includes.sidebar_user')
    @endrole
</div>
