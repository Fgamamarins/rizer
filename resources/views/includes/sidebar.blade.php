<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Fausto G. M.</span>
                    <span class="text-secondary text-small">Desenvolvedor</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-ticket" aria-expanded="false" aria-controls="ui-ticket">
                <span class="menu-title">Tickets</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-ticket menu-icon"></i>
            </a>
            <div class="collapse" id="ui-ticket">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('support.ticket.create') }}">Abrir Chamado(s)</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('support.ticket.index') }}">Chamado(s)</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-sellers" aria-expanded="false" aria-controls="ui-sellers">
                <span class="menu-title">Vendedores</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="ui-sellers">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sellers.index') }}">Vendedores</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sellers.create') }}">Criar Vendedor</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">UI Elements</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-crosshairs-gps menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="ui-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.ui-features.buttons') }}">Buttons</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.ui-features.typography') }}">Typography</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('examples.icons') }}">--}}
{{--                <span class="menu-title">Icons</span>--}}
{{--                <i class="mdi mdi-contacts menu-icon"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('examples.forms') }}">--}}
{{--                <span class="menu-title">Forms</span>--}}
{{--                <i class="mdi mdi-format-list-bulleted menu-icon"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('examples.charts') }}">--}}
{{--                <span class="menu-title">Charts</span>--}}
{{--                <i class="mdi mdi-chart-bar menu-icon"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('examples.tables') }}">--}}
{{--                <span class="menu-title">Tables</span>--}}
{{--                <i class="mdi mdi-table-large menu-icon"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">--}}
{{--                <span class="menu-title">Sample Pages</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-medical-bag menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="general-pages">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.samples.blankpage') }}"> Blank Page </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.samples.login') }}"> Login </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.samples.register') }}"> Register </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.samples.error404') }}"> 404 </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{ route('examples.samples.error500') }}"> 500 </a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}

    </ul>
</nav>
