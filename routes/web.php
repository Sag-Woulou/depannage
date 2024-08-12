<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurRoleController;
use App\Http\Controllers\DroitAccessController;
use App\Http\Controllers\DroitAdminController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;




Route::resource('roles', RoleController::class);

Route::resource('utilisateurs', UtilisateurController::class);

Route::resource('services', ServiceController::class);

Route::resource('zones', ZoneController::class);

Route::resource('droitAdmin', DroitAdminController::class);

Route::resource('droitAcces', DroitAccessController::class);

Route::resource('utilisateurRoles', UtilisateurRoleController::class);


