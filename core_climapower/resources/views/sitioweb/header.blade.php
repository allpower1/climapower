@inject('request','Illuminate\Http\Request')
@inject('modeldatasitio','App\Models\AdminContactoOtros')

@php
    $datossitio = $modeldatasitio->where('id',1)->first();
@endphp

<header id="header" class="header-transparent header-transparent-dark-bottom-border header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0 bg-dark box-shadow-none">
        <div class="header-top header-top-borders">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    @if($datossitio->nuestra_ubicacion)
                                    <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                        <span class="ps-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> {{ $datossitio->nuestra_ubicacion }}</span>
                                    </li>
                                    @endif
                                    @if($datossitio->telefono)
                                    <li class="nav-item nav-item-borders py-2">
                                        <a href="tel:{{$datossitio->telefono}}"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> {{$datossitio->telefono}}</a>
                                    </li>
                                    @endif
                                    @if($datossitio->email)
                                    <li class="nav-item nav-item-borders py-2 d-none d-md-inline-flex">
                                        <a href="mailto:{{$datossitio->email}}"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> <span class="__cf_email__" data-cfemail="{{$datossitio->email}}">{{$datossitio->email}}</span></a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
                                        <a href="{{ url('login') }}">Inicio Sesión</a>
                                    </li>
                                    <li class="nav-item nav-item-borders py-2 pe-0 dropdown">
                                        <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="img/blank.gif" class="flag flag-es" alt="Español" /> Español
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                            <a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-us" alt="English" /> English</a>
                                            <a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-es" alt="Español" /> Español</a>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
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
                                                Inicio
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'acerca_nosotros')?'active':'' }}" href="{{ url('acerca_nosotros') }}">
                                                Empresa
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'partners')?'active':'' }}" href="{{ url('partners') }}">
                                                Partners
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'areas')?'active':'' }}" href="{{ url('areas') }}">
                                                Áreas
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'servicios')?'active':'' }}" href="{{ url('servicios') }}">
                                                Servicios
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'proyectos')?'active':'' }}" href="{{ url('proyectos') }}">
                                                Proyectos
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ ($request->segment(1) == 'nuestro_equipo')?'active':'' }}" href="{{ url('nuestro_equipo') }}">
                                                Equipo
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link " href="https://shop.climapower.cl/" target="_blank">
                                                Tienda
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