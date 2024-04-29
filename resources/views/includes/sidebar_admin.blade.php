<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}">SITE DEV</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">PANEL DE ADMINISTRACIÓN</li>
        <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Gestionar usuarios</span></a>
            <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="{{ route('all.users') }}">Consultar usuarios</a></li>
                <li><a class="nav-link" href="/publication/list">Consultar publicaciones</a></li>
            </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Gestionar categorías</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('create_category') }}">Crear Categoría</a></li>
                <li><a class="nav-link" href="{{ route('categories.list') }}">Consultar Categoría</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>Gestionar Recursos</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="bootstrap-alert.html">Crear recurso</a></li>
                <li><a class="nav-link" href="bootstrap-badge.html">Consultar recursos</a></li>
                <li><a class="nav-link" href="bootstrap-badge.html">Librería</a></li>
            </ul>
        </li>
        <li class="menu-header">Stisla</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                <span>Components</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="components-article.html">Article</a></li>
                <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a>
                </li>
                <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty
                        State</a></li>
            </ul>
        </li>

    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> PQR
        </a>
    </div>
</aside>
