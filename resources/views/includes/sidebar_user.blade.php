<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}">SITE DEV</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header text-align-center">PANEL DE USUARIO</li>
        <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i> <span>Publicaciones</span></a>
            <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="{{ route('publication.create') }}">crear publicaciones</a>
                </li>
                <li><a class="nav-link" href="/show/publication/{{ Auth::user()->id_user }}">Mis publicaciones</a></li>
            </ul>
        </li>
        <li class="menu-header">Biblioteca</li>
        @php
            $categories = App\Models\Resource::getAll();

        @endphp
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Recursos</span></a>
            <ul class="dropdown-menu">
                @if ($categories && $categories->count() > 0)
                    @foreach ($categories as $categorie)
                        <li class=active><a class="nav-link"
                                href="/resources/library/{{ $categorie->id_categorie }}">{{ $categorie->categorie_name }}</a>
                        </li>
                    @endforeach

                @endif
            </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank
                    Page</span></a></li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>Bootstrap</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
            </ul>
        </li>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
</aside>
