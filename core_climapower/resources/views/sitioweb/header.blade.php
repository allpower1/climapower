@inject('request','Illuminate\Http\Request')

<header id="header" class="header-transparent header-transparent-dark-bottom-border header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark box-shadow-none">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="#">
                                <img alt="ClimaPower" width="150" height="20" src="{{ url('img/logoclimapower.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == '')?'active':'' }}" href="{{ url('/') }}">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'acerca_nosotros')?'active':'' }}" href="{{ url('acerca_nosotros') }}">
                                                Acerca Nosotros
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'experiencias')?'active':'' }}" href="{{ url('experiencias') }}">
                                                Experiencias
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'proyectos')?'active':'' }}" href="{{ url('proyectos') }}">
                                                Proyectos
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'testimonios')?'active':'' }}" href="{{ url('testimonios') }}">
                                                Testimonios
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'nuestro_equipo')?'active':'' }}" href="{{ url('nuestro_equipo') }}">
                                                Nuestro Equipo
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'contacto')?'active':'' }}" href="{{ url('contacto') }}">
                                                Contacto
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>