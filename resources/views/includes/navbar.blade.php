<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('images/logo.svg') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('images/logo-mini.svg') }}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link " id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">Fausto Marins</p>
                    </div>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
