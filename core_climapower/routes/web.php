<?php

use App\Http\Controllers\AdminAcercaNosotrosController;
use App\Http\Controllers\AdminAvisoLegalController;
use App\Http\Controllers\AdminAreasController;
use App\Http\Controllers\AdminNewsletterController;
use App\Http\Controllers\AdminNuestrasEstrategiasController;
use App\Http\Controllers\AdminNuestroEquipoController;
use App\Http\Controllers\AdminNuestrosProyectosController;
use App\Http\Controllers\AdminPreguntasFrecuentesController;
use App\Http\Controllers\AdminServiciosController;
use App\Http\Controllers\AdminSitioWebController;
use App\Http\Controllers\AdminSliderHomeController;
use App\Http\Controllers\AdminTestimoniosController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FilesRespaldosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitioWebController;
use App\Http\Controllers\UpdateUserClienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SitioWebController::class, 'index']);

//rutas admin
Auth::routes();
Route::get('loginadmin', [LoginController::class, 'showLoginForm']);
Route::get('login', [LoginController::class, 'showLoginForm']);

Route::get('sobrenosotros', [SitioWebController::class, 'sobrenosotros']);

//INICIO SITIOS AUTOADMINISTRABLES
//EMPRESA
Route::get('site_climapower', [SitioWebController::class, 'AdminSiteClimaPower']);
Route::get('site_grupochr', [SitioWebController::class, 'AdminSiteGrupoChr']);
Route::get('directorio', [SitioWebController::class, 'AdminDirectorio']);
Route::get('datos_comerciales', [SitioWebController::class, 'AdminDatosComerciales']);
Route::get('servicios', [SitioWebController::class, 'AdminServicios']);
Route::get('productos', [SitioWebController::class, 'AdminProductos']);
Route::get('contratos', [SitioWebController::class, 'AdminContratos']);
Route::get('eficiencia_energetica', [SitioWebController::class, 'AdminEficienciaEnergetica']);
Route::get('unidades_negocios', [SitioWebController::class, 'AdminUnidadesNegocios']);
//IMPORTANTE
Route::get('informacion_general', [SitioWebController::class, 'AdminInformacionGeneral']);
Route::get('terminosycondiciones', [SitioWebController::class, 'AdminTerminosYCondiciones']);
Route::get('politicas_calidad', [SitioWebController::class, 'AdminPoliticasCalidad']);
Route::get('politicas_cookies', [SitioWebController::class, 'AdminPoliticasCookies']);
Route::get('formas_pagos', [SitioWebController::class, 'AdminFormasPagos']);
Route::get('comunidades', [SitioWebController::class, 'AdminComunidades']);
Route::get('despachos', [SitioWebController::class, 'AdminDespachos']);
Route::get('excluye', [SitioWebController::class, 'AdminExcluye']);
Route::get('garantias', [SitioWebController::class, 'AdminGarantias']);
Route::get('aviso_legal', [SitioWebController::class, 'AdminAvisoLegal']);
//LINKS
Route::get('tienda_electronica', [SitioWebController::class, 'AdminTiendaElectronica']);
Route::get('preguntas_frecuentes', [SitioWebController::class, 'AdminPreguntasFrecuentes']);
Route::get('descargas_pdf', [SitioWebController::class, 'AdminDescargasPDF']);
Route::get('normativas', [SitioWebController::class, 'AdminNormativas']);
Route::get('partners', [SitioWebController::class, 'AdminPartners']);
Route::get('soporte', [SitioWebController::class, 'AdminSoporte']);
Route::get('reclamos', [SitioWebController::class, 'AdminReclamos']);
Route::get('oferta_trabajo', [SitioWebController::class, 'AdminOfertaTrabajo']);
Route::get('trabaja_con_nosotros', [SitioWebController::class, 'AdminTrabajaConNosotros']);
Route::get('site_grupochrcl', [SitioWebController::class, 'AdminSiteGrupoChrCL']);
//FIN SITIOS AUTOADMINISTRABLES

Route::get('contacto', [SitioWebController::class, 'contacto']);
Route::post('enviar_contacto', [SitioWebController::class, 'procesarContacto']);
Route::post('enviar_newsletter', [SitioWebController::class, 'procesarNewsLetter']);
Route::post('enviar_testimonio', [SitioWebController::class, 'procesarNuevoTestimonio']);

//verificacion de email
Route::get('email/verify',[VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}',[VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/verification-notification',[VerificationController::class,'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::middleware(['auth', 'verified'])->group(function () {
    //perfil publico
    Route::patch('change_perfil_publicidad',[ChangePasswordController::class,'changePerfilPublicidad'])->name('auth.change_perfil_publicidad');
    Route::get('eliminar_imagen_perfil_publicidad/{id_registro?}',[ChangePasswordController::class,'eliminarImagenPerfilPublicidad']);
    Route::patch('change_perfil_publico',[ChangePasswordController::class,'changePerfilPublico'])->name('auth.change_perfil_publico');
    Route::patch('change_horario_perfil_publico',[ChangePasswordController::class,'changeHorarioPerfilPublico'])->name('auth.change_horario_perfil_publico');

    //chats internos
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    // Crear nueva conversación
    Route::get('/chat/nueva_conversacion', [ChatController::class, 'startConversationForm'])->name('chat.nueva_conversacion');
    Route::post('/chat/start', [ChatController::class, 'startConversation'])->name('chat.start');

    Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{id}/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});

Route::middleware(['auth', 'unverified'])->group(function () {
    Route::get('esperando-verificacion',[VerificationController::class,'show'])->name('verificar-pendiente');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('avatares/{path}', [FilesRespaldosController::class,'avatares']);
Route::get('publicidad/{path}', [FilesRespaldosController::class,'publicidad']);
Route::get('adjuntomultimedia/{path}', [FilesRespaldosController::class,'adjuntomultimedia']);

//Change Password Routes...
Route::get('miperfil',[ChangePasswordController::class,'showChangePasswordForm']);
Route::patch('miperfil',[ChangePasswordController::class,'changePassword'])->name('auth.miperfil');

//Cambiar contraseña usuarios...
Route::patch('restaurar_password',[UsersController::class,'restablecerPassword'])->name('auth.restaurar_password');

//Cambiar estado de los usuarios
Route::patch('restablecer_estado',[UsersController::class,'restablecerEstado'])->name('auth.restablecer_estado');
Route::patch('gestionar_aprobacion_registro',[UsersController::class,'GestionarAprobacionRegistro'])->name('auth.gestionar_aprobacion_registro');

//Change Datos Generales del Perfil Routes...
Route::get('change_perfil',[ChangePasswordController::class,'showChangePasswordForm']);
Route::patch('change_perfil',[ChangePasswordController::class,'changePerfil'])->name('auth.change_perfil');

//Change Avatar Routes...
Route::get('save_avatar',[ChangePasswordController::class,'showChangePasswordForm']);
Route::patch('save_avatar',[ChangePasswordController::class,'saveAvatar'])->name('auth.save_avatar');

//Restaurar Avatar Routes...
Route::get('restaurar_avatar',[ChangePasswordController::class,'showChangePasswordForm']);
Route::patch('restaurar_avatar',[ChangePasswordController::class,'RestaurarAvatar'])->name('auth.restaurar_avatar');

//foto imagen carnet
Route::patch('guardar_carnet_frontal',[ChangePasswordController::class,'guardarCarnetFrontal'])->name('auth.guardar_carnet_frontal');
Route::patch('guardar_carnet_posterior',[ChangePasswordController::class,'guardarCarnetPosterior'])->name('auth.guardar_carnet_posterior');

Route::post('actualizar_user_cliente',[UsersController::class,'updateUserCliente'])->name('admin.users.actualizar_user_cliente');

//areas
Route::get('area/{id}',[SitioWebController::class,'detallearea']);
Route::get('areas',[SitioWebController::class,'listadoarea']);
Route::get('filearea/{path}', [FilesRespaldosController::class,'adjuntoarea']);

//nuestro equipo
Route::get('equipo/{id}',[SitioWebController::class,'detalleequipo']);
Route::get('nuestro_equipo',[SitioWebController::class,'listadoequipo']);
Route::get('fileequipo/{path}', [FilesRespaldosController::class,'adjuntoequipo']);

//acerca nosotros
Route::get('acerca_nosotros',[SitioWebController::class,'sobrenosotros']);
Route::get('fileacercanosotros/{path}', [FilesRespaldosController::class,'adjuntoacercanosotros']);

//footer
Route::get('filefondofooter/{path}', [FilesRespaldosController::class,'adjuntofondofooter']);

//slider home
Route::get('filesliderhome/{path}', [FilesRespaldosController::class,'adjuntosliderhome']);

//testimonio
Route::get('testimonios',[SitioWebController::class,'testimonios']);
Route::get('filetestimonio/{path}', [FilesRespaldosController::class,'adjuntotestimonio']);

//nuestros proyectos
Route::get('proyecto/{id}',[SitioWebController::class,'detalleproyecto']);
Route::get('proyectos',[SitioWebController::class,'listadoproyectos']);
Route::get('fileproyecto/{path}', [FilesRespaldosController::class,'adjuntoproyecto']);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin','as' => 'admin.'], function () {
    Route::get('home',[HomeController::class,'index']);
    Route::resource('permissions',PermissionsController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('users',UsersController::class);
    Route::resource('preguntasfrecuentes',AdminPreguntasFrecuentesController::class);
    Route::resource('avisolegal',AdminAvisoLegalController::class);
    Route::resource('servicios',AdminServiciosController::class);
    Route::resource('nuestrasestrategias',AdminNuestrasEstrategiasController::class);
    Route::resource('areas',AdminAreasController::class);
    Route::resource('nuestroequipo',AdminNuestroEquipoController::class);
    Route::resource('acercanosotros',AdminAcercaNosotrosController::class);
    Route::resource('sliderhome',AdminSliderHomeController::class);
    Route::resource('nuestros_proyectos',AdminNuestrosProyectosController::class);
    Route::get('usuarios_externos',[UsersController::class,'usuarios_externos']);
    Route::get('usuarios_externos/crear',[UsersController::class,'createUserExterno']);
    Route::post('usuarios_externos/guardar_registro',[UsersController::class,'storeUserExternos'])->name('auth.guardar_nuevo_usuario_externo');
    Route::get('usuarios/listado/{tipousuarios}',[UsersController::class,'listado_usuarios']);
    Route::get('users/editar_usuario/{id}',[UsersController::class,'editUserCliente']);
    Route::get('users/ver_usuario/{id}',[UsersController::class,'visualizarUserCliente']);
    Route::get('users/validar_email_users_cliente/{id}',[UsersController::class,'validarEmailUsersCliente']);
    Route::get('users/eliminar_usuario/{id}/{tipousuarios}',[UsersController::class,'destroy']);

    //admin contacto/otros
    Route::get('admincontactootros',[AdminSitioWebController::class,'indexContactoOtros']);
    Route::post('admincontactootros/actualizar',[AdminSitioWebController::class,'updateContactoOtros'])->name('admin.admincontactootros.update');

    //admin sitio web
    Route::get('adminsitioweb',[AdminSitioWebController::class,'index']);
    Route::get('adminsitioweb/editar/{idadminsitioweb}',[AdminSitioWebController::class,'edit'])->name('admin.adminsitioweb.edit');
    Route::post('adminsitioweb/actualizar',[AdminSitioWebController::class,'update'])->name('admin.adminsitioweb.update');

    //admin newsletter
    Route::get('newsletter', [AdminNewsletterController::class, 'index'])->name('admin.newsletter');
    Route::get('listado_newsletter',[AdminNewsletterController::class,'listado_newsletter']);

    //admin testimonios
    Route::get('testimonios', [AdminTestimoniosController::class, 'index']);
    Route::get('testimonio/editar/{idtestimonio}',[AdminTestimoniosController::class,'edit']);
    Route::post('testimonio/actualizar/{idtestimonio}',[AdminTestimoniosController::class,'update']);
    Route::get('testimonio/eliminar/{idtestimonio}',[AdminTestimoniosController::class,'destroy'])->name('admin.testimonios.destroy');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'editcliente','as' => 'editcliente.'], function () {
    Route::patch('UpdatePassword',[UpdateUserClienteController::class,'changePassword'])->name('UpdatePassword');
    //foto imagen carnet
    Route::patch('UpdatePersonalFotoPersonal',[UpdateUserClienteController::class,'guardarFotoPersonal'])->name('UpdatePersonalFotoPersonal');
    Route::patch('UpdatePersonalCarnetFrontal',[UpdateUserClienteController::class,'guardarCarnetFrontal'])->name('UpdatePersonalCarnetFrontal');
    Route::patch('UpdatePersonalCarnetPosterior',[UpdateUserClienteController::class,'guardarCarnetPosterior'])->name('UpdatePersonalCarnetPosterior');
});
