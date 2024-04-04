<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;



//* Roles

Route::get('/roles', [RoleController::class, 'showRole']);

Route::get('/roles/{role_id}/details', [RoleController::class, 'showDetailRole']);

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']);
Route::post('/create-roles', [RoleController::class, 'storeRole']);

Route::get('/update-roles/{role_id}/edit', [RoleController::class, 'showEditRoleForm']);
Route::patch('/update-roles/{role_id}/update', [RoleController::class, 'updateForm']);

Route::delete('/delete-role/{role_id}/delete', [RoleController::class, 'destoryRoleData']);
