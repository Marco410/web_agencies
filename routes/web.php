<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'IndexController@index')->name('index');

/* Route::get('/login', function () {
    return view('admin.login');
})->name('loginasd'); */

Route::get('/login/facebook', 'Auth\SocialLoginController@login')->name('login.facebook');
Route::get('/facebook/callback', 'Auth\SocialLoginController@callback')->name('callback.facebook');
Route::get('/login/google', 'Auth\SocialLoginController@login_google')->name('login.google');
Route::get('/google/callback', 'Auth\SocialLoginController@callback_google')->name('callback.google');

Route::get('/agencia/{agencia}', 'IndexController@agencia_details')->name('agencia.detalles');
Route::post('/agencia/cita/create', 'IndexController@agencia_create_cita')->name('agencia.create.cita');

Route::get('/agencias-automotrices', 'IndexController@agencias')->name('agencias');

Route::get('/marcas', 'IndexController@brands')->name('brands');
Route::get('/contacto', 'IndexController@contacto')->name('contacto');
Route::post('/contacto/guardar', 'IndexController@contacto_store')->name('contacto.store');
Route::get('/nosotros', 'IndexController@nosotros')->name('nosotros');
Route::get('/get-muni', 'DataController@get_muni')->name('get-muni');

Route::get('/add-service', function () {
return view('add-service');
})->name('add-service');
Route::get('/book-service', function () {
return view('book-service');
})->name('book-service');
Route::get('/chat', function () {
return view('chat');
})->name('chat');
Route::get('/edit-service', function () {
return view('edit-service');
})->name('edit-service');
Route::get('/preguntas-frecuentes', function () {
return view('faq');
})->name('faq');
Route::get('/m y-services-inactive', function () {
return view('my-services-inactive');
})->name('my-services-inactive');
Route::get('/my-services', function () {
return view('my-services');
})->name('my-services');
Route::get('/notifications', function () {
return view('notifications');
})->name('notifications');
Route::get('/aviso-privacidad', function () {
return view('privacy-policy');
})->name('privacy-policy');
Route::get('/provider-availability', function () {
return view('provider-availability');
})->name('provider-availability');
Route::get('/provider-bookings', function () {
return view('provider-bookings');
})->name('provider-bookings');
Route::get('/provider-dashboard', function () {
return view('provider-dashboard');
})->name('provider-dashboard');
Route::get('/provider-payment', function () {
return view('provider-payment');
})->name('provider-payment');
Route::get('/provider-reviews', function () {
return view('provider-reviews');
})->name('provider-reviews');
Route::get('/provider-settings', function () {
return view('provider-settings');
})->name('provider-settings');
Route::get('/provider-subscription', function () {
return view('provider-subscription');
})->name('provider-subscription');
Route::get('/provider-wallet', function () {
return view('provider-wallet');
})->name('provider-wallet');
Route::get('/search', function () {
return view('search');
})->name('search');
Route::get('/service-details', function () {
return view('service-details');
})->name('service-details');
Route::get('/terminos-y-condiciones', function () {
return view('term-condition');
})->name('term-condition');
Route::get('/user-bookings', function () {
return view('user-bookings');
})->name('user-bookings');
Route::get('/user-dashboard', function () {
return view('user-dashboard');
})->name('user-dashboard');
Route::get('/user-payment', function () {
return view('user-payment');
})->name('user-payment');
Route::get('/user-reviews', function () {
return view('user-reviews');
})->name('user-reviews');
Route::get('/user-settings', function () {
return view('user-settings');
})->name('user-settings');
Route::get('/user-wallet', function () {
return view('user-wallet');
})->name('user-wallet');
Route::get('/favourites', function () {
return view('favourites');
})->name('favourites');

/*****************LANDING ROUTES*******************/
Route::Group(['prefix' => 'landing'], function () {
    Route::get('/', 'LandingController@index')->name('landing.index');

    Route::post('/registro-dealer', 'LandingController@register_dealer')->name('landing.register_leader');
});

/*****************USER ROUTES*******************/
Route::Group(['prefix' => 'usuario'], function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    
    Route::get('/cambiar-plan/{agencia_id}', 'UserController@cambiar_plan')->name('user.cambiar.plan');
    Route::get('/activar-membresia/{agencia_id}', 'UserController@activar_membresia')->name('user.membresia.activar');

    Route::get('/perfil', 'UserController@perfil')->name('user.perfil');
    Route::post('/perfil/actualizar-email', 'UserController@perfil_update_email')->name('user.update.email');
    Route::post('/perfil/actualizar-nombre', 'UserController@perfil_update_nombre')->name('user.update.nombre');
    Route::post('/perfil/actualizar-telefono', 'UserController@perfil_update_telefono')->name('user.update.telefono');

    Route::get('perfil/membresia', 'UserController@perfil_membresia')->name('user.perfil.membresia');
    Route::get('perfil/membresia-cambiar', 'UserController@perfil_membresia_cambiar')->name('user.perfil.membresia.cambiar');
    Route::get('perfil/membresia-activar', 'UserController@perfil_membresia_activar')->name('user.perfil.membresia.activar');
    Route::get('perfil/membresia/contrato', 'UserController@perfil_membresia_contrato')->name('user.perfil.membresia.contrato');

    Route::get('perfil/membresia/get-data-contrato', 'UserController@get_data_contrato')->name('user.perfil.membresia.data.contrato');

    Route::post('perfil/membresia/contrato-firmar', 'UserController@firmar_contrato')->name('user.perfil.membresia.contrato.firmar');
    Route::get('perfil/membresia/contrato-cancelar', 'UserController@contrato_cancelar')->name('user.perfil.membresia.contrato.cancelar');

    Route::get('perfil/membresia/firma-delete', 'UserController@firma_delete')->name('user.perfil.membresia.firma.delete');

    Route::get('perfil/membresia/checkout', 'UserController@perfil_membresia_checkout')->name('user.perfil.membresia.check');
    Route::get('perfil/membresia/check', 'UserController@perfil_membresia_check')->name('user.perfil.membresia.ch');
    Route::get('perfil/membresia/get_paused', 'UserController@perfil_membresia_get_paused')->name('user.perfil.membresia.get.paused');
    Route::get('perfil/membresia/cancelar', 'UserController@cancel_subcription')->name('user.perfil.plan.cancel');
    Route::get('perfil/membresia/pausar', 'UserController@pause_subcription')->name('user.perfil.plan.pause');
    Route::get('perfil/update/membresia', 'UserController@perfil_update_membresia')->name('user.perfil.update.membresia');

    Route::post('/store-review', 'IndexController@store_review')->name('user.store-review');
    Route::post('/store-review-personal', 'IndexController@store_review_personal')->name('user.store-review-personal');

    Route::get('/comentarios-reviews', 'UserController@reviews')->name('user.reviews');
    Route::get('/agencias', 'UserController@agencies')->name('user.agencies');
    Route::get('/agencias/estadisticas/{agencia}', 'UserController@agencies_stats')->name('user.agency.stats');
    Route::get('/agencias/solicitar', 'UserController@agency_solicitar')->name('user.agency.solicitar');
    Route::post('/agencias/solicitar-add', 'UserController@agency_solicitar_add')->name('user.agency.solicitar.add');
    Route::post('/agencias/guardar-horario', 'UserController@add_horario')->name('user.add.horario');
    Route::post('/agencias/generar-qr', 'UserController@agency_qr')->name('user.agency.qr');
    Route::post('/agencias/subir-foto', 'UserController@agency_add_foto')->name('user.agency.add.foto');
    Route::post('/agencias/eliminar-foto', 'UserController@agency_delete_foto')->name('user.agency.delete.foto');
    Route::post('/agencias/actualizar-telefono', 'UserController@agency_update_telefono')->name('user.agency.update.telefono');
    Route::get('/agencias/descargar-qr/{qr_id}', 'UserController@download_qr')->name('user.download.qr');

    Route::get('/agencias/contrato', 'UserController@ver_contrato')->name('user.agencia.contrato');

    Route::get('/agencias-reclamadas', 'UserController@agencies_claim')->name('user.agencies.claim');
    Route::post('/reclamar-agencia', 'UserController@claim_agency')->name('user.claim.agency');

    Route::get('/data-reviews', 'UserController@data_reviews')->name('user.data.reviews');
    Route::get('/data-estandar', 'UserController@data_estandar')->name('user.data.estandar');
    Route::get('/data-reviews-personal', 'UserController@data_reviews_personal')->name('user.data.reviews.personal');
    Route::get('/data-reviews-personal-ver', 'UserController@data_reviews_personal_ver')->name('user.data.reviews.personal.ver');

    Route::get('/personal', 'UserController@personal')->name('user.personal');
    Route::get('/personal/ver/{personal_id}', 'UserController@personal_ver')->name('user.personal.ver');
    Route::post('/personal/añadir', 'UserController@personal_add')->name('user.personal.add');
    Route::post('/personal/editar', 'UserController@personal_edit')->name('user.personal.edit');
    Route::post('/personal/eliminar', 'UserController@personal_delete')->name('user.personal.delete');

    Route::get('/comentarios', 'UserController@comments')->name('user.comments');
    Route::post('/comentarios/save-asnwer', 'UserController@comentarios_save_respuesta')->name('user.comments.answer');
    Route::get('/comentarios/ver/{review_id}', 'UserController@comments_see')->name('user.comments.see');


    Route::get('/citas', 'UserController@citas')->name('user.citas');
    Route::get('/citas/ver/{cita_id}', 'UserController@citas_ver')->name('user.citas.ver');
    Route::post('/citas/ask', 'UserController@citas_ask')->name('user.citas.ask');
    
    Route::get('/reportes', 'UserController@reportes')->name('user.reportes');
    Route::get('/reporte-comentarios/{agencia_id}', 'UserController@reporte_comentarios')->name('user.reporte.comentarios');
    Route::get('/reporte-agencia/{agencia_id}', 'UserController@reporte_agencia')->name('user.reporte.agencia');
    Route::get('/reporte-mes/{agencia_id}', 'UserController@reporte_mes')->name('user.reporte.mes');
    Route::get('/reporte-empleados/{agencia_id}', 'UserController@reporte_empleados')->name('user.reporte.empleados');
    Route::get('/reporte-mensual/{agencia_id}', 'UserController@reporte_mensual')->name('user.reporte.mensual');

    Route::get('/notificaciones', 'UserController@notifications')->name('user.notifications');
});

/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () {
    Route::get('/add-category', function () {
        return view('admin.add-category');
    })->name('add-category');
    Route::get('/add-ratingstype', function () {
        return view('admin.add-ratingstype');
    })->name('add-ratingstype');
    Route::get('/add-subcategory', function () {
        return view('admin.add-subcategory');
    })->name('add-subcategory');
    Route::get('/add-subscription', function () {
        return view('admin.add-subscription');
    })->name('add-subscription');
    Route::get('/admin-notification', function () {
        return view('admin.admin-notification');
    })->name('admin-notification');
    Route::get('/admin-profile', function () {
        return view('admin.admin-profile');
    })->name('admin-profile');
    Route::get('/cancel-report', function () {
        return view('admin.cancel-report');
    })->name('cancel-report');
    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('categories');
    Route::get('/complete-report', function () {
        return view('admin.complete-report');
    })->name('complete-report');
    Route::get('/edit-category', function () {
        return view('admin.edit-category');
    })->name('edit-category');
    Route::get('/edit-ratingstype', function () {
        return view('admin.edit-ratingstype');
    })->name('edit-ratingstype');
    Route::get('/edit-subcategory/{id}', 'MarcaController@edit')->name('marca.edit');
    Route::get('/edit-subscription', function () {
        return view('admin.edit-subscription');
    })->name('edit-subscription');
    Route::get('/emailsettings', function () {
        return view('admin.emailsettings');
    })->name('emailsettings');
    Route::get('/inprogress-report', function () {
        return view('admin.inprogress-report');
    })->name('inprogress-report');
    Route::get('/payment_list', function () {
        return view('admin.payment_list');
    })->name('payment_list');
    Route::get('/pending-report', function () {
        return view('admin.pending-report');
    })->name('pending-report');
    Route::get('/ratingstype', function () {
        return view('admin.ratingstype');
    })->name('ratingstype');
    Route::get('/reject-report', function () {
        return view('admin.reject-report');
    })->name('reject-report');
    Route::get('/review-reports', function () {
        return view('admin.review-reports');
    })->name('review-reports');
    Route::get('/service-details', function () {
        return view('admin.service-details');
    })->name('service-details');
    Route::get('/service-list', function () {
        return view('admin.service-list');
    })->name('service-list');
    Route::get('/service-providers', function () {
        return view('admin.service-providers');
    })->name('service-providers');
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
    Route::get('/sms-settings', function () {
        return view('admin.sms-settings');
    })->name('sms-settings');
    Route::get('/stripe_payment_gateway', function () {
        return view('admin.stripe_payment_gateway');
    })->name('stripe_payment_gateway');
    Route::get('/subcategories', function () {
        return view('admin.subcategories');
    })->name('subcategories');
    Route::get('/subscriptions', function () {
        return view('admin.subscriptions');
    })->name('subscriptions');
    Route::get('/total-report', function () {
        return view('admin.total-report');
    })->name('total-report');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
    Route::get('/wallet-history', function () {
        return view('admin.wallet-history');
    })->name('wallet-history');
    Route::get('/wallet', function () {
        return view('admin.wallet');
    })->name('wallet');


    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');
    Route::get('/registro', function () {
        return view('admin.register');
    })->name('registro');

    Route::get('/forgot-pass', 'Auth\ForgotPasswordController@create')->name('forgot.password');
    Route::post('/forgot-pass', 'Auth\ForgotPasswordController@store')->name('password.email');

    Route::post('/login', 'Auth\LoginController@login_admin')->name('admin.login');
    Route::post('/login-user', 'Auth\LoginController@login_user')->name('user.login');

    Route::get('/login/verificar-email/{email}', 'Auth\LoginController@verificar_email')->name('admin.verificar-email');
    Route::get('/login/ree-send-email', 'Auth\LoginController@ree_send_email')->name('admin.login.ree.send.email');

    Route::post('/cerrar-sesion', 'Auth\LoginController@logout')->name('logout.admin');
    Route::post('/registro', 'Auth\RegisterController@store')->name('admin.register');

    Route::get('/usuarios', 'AdminController@users')->name('users');
    Route::get('/usuarios-delete', 'UserAdminController@delete')->name('users.delete');
    Route::get ('/usuarios-add', 'UserAdminController@add')->name('users.add');
    Route::get('/usuarios-edit/{id}', 'UserAdminController@edit')->name('users.edit');
    Route::post('/usuarios-agency-delete', 'UserAdminController@user_agency_delete')->name('users.agency.delete');
    Route::post('/usuarios-baja-plan', 'UserAdminController@user_baja_plan')->name('users.baja.plan');
    Route::post ('/usuarios-store', 'UserAdminController@store')->name('users.store');
    Route::post('/usuarios-update', 'UserAdminController@update')->name('users.update');
    Route::post('/usuarios-destroy', 'UserAdminController@destroy')->name('users.destroy');
    Route::post('/usuarios-recover', 'UserAdminController@recover')->name('users.recover');

    Route::get('/solicitudes', 'AdminController@solicitudes')->name('solicitudes');
    Route::get('/solicitud/ver/{solicitud_id}', 'AdminController@solicitud_ver')->name('solicitud.ver');
    Route::post('/solicitud/rechazar/{solicitud_id}', 'AdminController@solicitud_rechazar')->name('solicitud.rechazar');
    Route::post('/solicitud/aprobar/{solicitud_id}', 'AdminController@solicitud_aprobar')->name('solicitud.aprobar');
    
    Route::get('/solicitudes-agencias', 'AdminController@solicitudes_agencias')->name('solicitudes.agencies');
    Route::get('/solicitud-agencia/ver/{solicitud_id}', 'AdminController@solicitud_agencia_ver')->name('solicitud.agency.ver');
    Route::post('/solicitud-agencia/aprobar/{solicitud_id}', 'AdminController@solicitud_agencia_aprobar')->name('solicitud.agency.aprobar');
    Route::get('/solicitud-agencia/add/{solicitud_id}', 'AdminController@solicitud_agencia_add')->name('solicitud.agency.add');
    Route::post('/solicitud-agencia/rechazar/{solicitud_id}', 'AdminController@solicitud_agencia_rechazar')->name('solicitud.agency.rechazar');
    
    Route::get ('/usuarios/asignar-agencia/{user_id}', 'UserAdminController@asign_agency')->name('users.asign.agency');
    Route::get ('/usuarios/asignar-agencia/{user_id}/{agencia_id}', 'UserAdminController@asign_agency_store')->name('users.asign.agency.store');
    Route::get ('/usuarios/agencias/{user_id}', 'UserAdminController@see_agencies_asign')->name('users.see-agencies-asign');
    Route::get('/usuarios/agencia/contrato', 'UserAdminController@ver_contrato')->name('admin.agencia.contrato');

    Route::get('/inicio', 'AdminController@dashboard')->name('dashboard');

    Route::get('/agencias', 'AdminAgenciaController@index')->name('agencia');
    Route::get('/agencias-add', 'AdminAgenciaController@add')->name('agencia.add');
    Route::post('/agencias-store', 'AdminAgenciaController@store')->name('agencia.store');
    Route::get('/agencias-show', 'AdminAgenciaController@agencias_show')->name('agencia.show');
    //Agregado
    Route::get('/agencias/edit/show-municipios', 'AdminAgenciaController@getMunicipios')->name('agencia.municipios');
    Route::get('/agencias/show-marcas', 'AdminAgenciaController@getMarcas')->name('agencia.marcas');
    Route::get('/agencias/show-estados', 'AdminAgenciaController@getEstados')->name('agencia.estados');
    //Crud Eliminar , Editar
    Route::get('/agencias/editar{id}', 'AdminAgenciaController@edit')->name('agencia.edit');
    Route::get('/agencias/delete-temp', 'AdminAgenciaController@delete_temp')->name('agencia.delete');
    Route::get('/agencias/edit/save', 'AdminAgenciaController@edit_save')->name('agencia.edit-save');
    Route::get('/agencias/destroy', 'AdminAgenciaController@destroy')->name('agencia.destroy');
    Route::get('/agencias/recover', 'AdminAgenciaController@recover')->name('agencia.recover');


    Route::get('/agencias', 'AdminAgenciaController@index')->name('agencia');
    Route::get('/agencias-reclamadas', 'AdminAgenciaController@agencies_claim')->name('admin.agencies.claim');
    Route::get('/agencias-reclamadas-actualizar/{id}', 'AdminAgenciaController@agencies_claim_update')->name('admin.agencies.claim.update');
    Route::post('/agencias-reclamadas-store', 'AdminAgenciaController@agencies_claim_store')->name('admin.agencies.claim.store');


    Route::get('/relacion', 'AdminAgenciaController@relation_agency_brand')->name('relacion'); //relaciona las agencias con las marcas del antiguo sitio

    Route::get('/marcas', 'AdminController@brand')->name('marcas');
    Route::get('/marcas-nueva', 'AdminController@brand_add')->name('marcas.add');
    Route::post('/marcas-nueva', 'AdminController@brand_store')->name('marcas.store');
    Route::post('/marcas-delete', 'MarcaController@delete')->name('marcas.delete');
    Route::post('/marcas-update', 'MarcaController@update_store')->name('marcas.update');
    Route::get('/marcas-destroy', 'MarcaController@destroy')->name('marcas.destroy');
    Route::get('/marcas-recover', 'MarcaController@recover')->name('marcas.recover');

    Route::get('/configuracion', 'AdminController@settings_index')->name('settings.index');
    Route::post('/configuracion-update-correo', 'AdminController@settings_update_correo')->name('settings.update.correo');
    Route::post('/configuracion-update-key', 'AdminController@settings_update_key')->name('settings.update.key');

    Route::get('/comentarios', 'AdminController@comentarios_index')->name('comentarios.index');
    Route::get('/comentarios-show', 'AdminController@comentarios_get')->name('comentarios.get');
    Route::get('/comentarios/{review}', 'AdminController@see_review')->name('comentarios.see');
    Route::post('/comentarios/delete', 'AdminController@comentario_delete')->name('comentarios.delete');
    Route::post('/comentarios/delete/inAgency', 'AdminController@comentario_delete_inAgency')->name('comentarios.delete.inAgency');
    Route::post('/comentarios/save-respuesta', 'AdminController@comentarios_save_respuesta')->name('comentarios.save-respuesta');

    Route::get('/contacto-mensajes', 'AdminController@contacto_msj')->name('contacto.msj');

    Route::get('/groserias', 'AdminController@groserias')->name('groserias.index');
    Route::post('/groserias/add', 'AdminController@groserias_add')->name('groserias.add');
    Route::post('/groserias/update', 'AdminController@groserias_update')->name('groserias.update');
    Route::post('/groserias/delete', 'AdminController@groserias_delete')->name('groserias.delete');
    Route::get('/groserias/get', 'DataController@groserias_get')->name('groserias.get');

    Route::get('/papelera', 'AdminController@papelera_index')->name('papelera.agencia');
    Route::get('/papelera-marca', 'AdminController@papelera_marca')->name('papelera.marca');
    Route::get('/papelera-user', 'AdminController@papelera_user')->name('papelera.user');

    Route::get('/notificaciones', 'NotificationsController@index')->name('notifications.index');
    Route::patch('notificaciones/{id}','NotificationsController@read')->name('notifications.read');
    Route::delete('notificaciones/{id}','NotificationsController@destroy')->name('notifications.delete');
    Route::get('notificaciones/leer-todas','NotificationsController@read_all')->name('notifications.read_all');
    Route::get('notificaciones/leer/{id}','NotificationsController@read_noti')->name('notifications.read_noti');
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
