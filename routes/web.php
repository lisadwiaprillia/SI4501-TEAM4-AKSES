<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Staff\StaffController;

Route::get('/', [CitizenController::class, 'index']);

//* Authentication Routes

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// * Medical Staff

Route::get('/employee-request', [StaffController::class, 'showRequestForm']);
Route::post('/employee-request', [StaffController::class, 'storeTicket']);

Route::get('/medical-staffs', [StaffController::class, 'showStaffRequest']);



//* Institution Routes

Route::get('/health-institution/request', [InstitutionController::class, 'showInstitutionForm'])->name('institution');

Route::get('/health-institution/verification', [InstitutionController::class, 'showVerificationInfo']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/status', [InstitutionController::class, 'showVerificationStatus']);

Route::post('/health-institution', [InstitutionController::class, 'store']);


// * Restricted Access

Route::get('/verificaiton-request', [InstitutionController::class, 'showVerificationData']);

Route::get('/health-institution/{institution_id}/details', [InstitutionController::class, 'showInstitutionDetail']);

Route::patch('/verification-request/update-status/{institution_id}', [InstitutionController::class, 'updateStatus']);

Route::patch('/verification-request/reject/{institution_id}', [InstitutionController::class, 'rejectStatus']);

Route::get('/health-institution/{institution_id}/more-details', [InstitutionController::class, 'InstitutionMoreDetail']);

Route::get('/health-institution', [InstitutionController::class, 'showInstitutions']);

Route::get('/health-institution/{institution_id}/edit', [InstitutionController::class, 'showEditInstitutionForm']);
Route::patch('/health-institution/{institution_id}/update', [InstitutionController::class, 'updateInstitutionData']);

Route::delete('/health-institution/{institution_id}/delete', [InstitutionController::class, 'destroyInstitution']);


//* Roles

Route::get('/roles', [RoleController::class, 'showRole']);

Route::get('/roles/{role_id}/details', [RoleController::class, 'showDetailRole']);

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']);
Route::post('/create-roles', [RoleController::class, 'storeRole']);

Route::get('/update-roles/{role_id}/edit', [RoleController::class, 'showEditRoleForm']);
Route::patch('/update-roles/{role_id}/update', [RoleController::class, 'updateForm']);

Route::delete('/delete-role/{role_id}/delete', [RoleController::class, 'destoryRoleData']);

//* Staff

Route::get('/staff-dashboard', [StaffController::class, 'getStaffDashboard']);
Route::get('/consultation', [StaffController::class, 'consultationNow']);

