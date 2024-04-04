<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;



//* Roles

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']);
Route::post('/create-roles', [RoleController::class, 'storeRole']);
