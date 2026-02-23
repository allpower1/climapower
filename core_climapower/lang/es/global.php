<?php

return [

	'user-management' => [
		'title' => 'Gestión de usuarios',
		'created_at' => 'Time',
		'fields' => [
		],
	],

	'permissions' => [
		'title' => 'Permisos',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombres',
		],
	],

	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombres',
			'permission' => 'Permisos',
		],
	],

	'users' => [
		'title' => 'Usuarios',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombres',
			'last_name' => 'Apellido Paterno',
			'mothers_last_name' => 'Apellido Materno',
			'email' => 'Email',
			'phone' => 'Teléfono',
			'identify_card' => 'Rut Usuario',
			'password' => 'Password',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
	],
	'app_create' => 'Crear',
	'app_save' => 'Guardar',
	'app_edit' => 'Editar',
	'app_view' => 'Ver',
	'app_update' => 'Editar',
	'app_list' => 'Lista',
	'app_no_entries_in_table' => 'No hay entradas en la tabla',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Cerrar sesión',
	'app_add_new' => 'Añadir nuevo',
	'app_are_you_sure' => '¿Estás seguro?',
	'app_back_to_list' => 'Back to list',
	'app_dashboard' => 'Tablero',
	'app_delete' => 'Eliminar',
	'global_title' => env('APP_NAME'),
	'current_password' => 'contraseña actual',
	'new_password' => 'nueva contraseña',
	'new_password_confirmation' => 'confirmacion de contraseña',
];
