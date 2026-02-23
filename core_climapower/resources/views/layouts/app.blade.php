<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<script>
            var defaultThemeMode = "light";
            var themeMode;
            if ( document.documentElement ) {
                if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if ( localStorage.getItem("data-bs-theme") !== null ) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
        </script>
        <?php
            //validar rol
            if(Auth::user()->roles()->first()){
                $nombrerol = Auth::user()->roles()->first()->name;
            }else{
                $nombrerol = '';
            }
        ?>
        <input type="hidden" name="roluser" id="roluser" value="{{ $nombrerol }}">
        <input type="hidden" name="urlpagina1" id="urlpagina1" value="{{ Request::segment(1) }}">
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

	            @include('partials.topbar')

				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

		            @include('partials.sidebar_home')

					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->

					                @yield('contentHeader')

								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body pt-0">

                        					@yield('content')

										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<div id="kt_app_footer" class="app-footer">
							<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<div class="text-gray-900 order-2 order-md-1">
									<span class="text-muted fw-semibold me-1"><?php echo date('Y'); ?>&copy;</span>
									<a href="{{ url('/') }}" target="_blank" class="text-gray-800 text-hover-primary">{{ trans('global.global_title') }}. Todos los derechos reservados. Versión 1.0</a>
								</div>
							</div>
						</div>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

        <div class="modal fade" id="ModalVisualizarDetalleNomina" role="dialog" style="overflow-y: scroll;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div id="modalbodyVisualizarDetalleNomina">
                    </div>
                </div>
            </div>
        </div>

        <!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->

        @include('partials.javascripts')

    </body>
</html>