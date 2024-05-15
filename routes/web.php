<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Drugs\ClassController;
use App\Http\Controllers\Drugs\PresentationController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Auth\AuthController;
//use App\Http\Controllers\MedicalStaff\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [CitizenController::class, 'index'])->name('index');

//* Roles
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/roles', [RoleController::class, 'showRole']);

Route::get('/roles/{role_id}/details', [RoleController::class, 'showDetailRole']);

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']);
Route::post('/create-roles', [RoleController::class, 'storeRole']);

Route::get('/update-roles/{role_id}/edit', [RoleController::class, 'showEditRoleForm']);
Route::patch('/update-roles/{role_id}/update', [RoleController::class, 'updateForm']);

Route::delete('/delete-role/{role_id}/delete', [RoleController::class, 'destoryRoleData']);

//* Institution Routes

Route::get('/health-institution/request', [InstitutionController::class, 'showInstitutionForm'])->name('institution');

Route::get('/health-institution/verification', [InstitutionController::class, 'showVerificationInfo']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/status', [InstitutionController::class, 'showVerificationStatus']);

Route::post('/health-institution', [InstitutionController::class, 'store']);

Route::get('/employee-request', [StaffController::class, 'showRequestForm']);

Route::post('/employee-request', [StaffController::class, 'storeTicket']);

Route::get('/health-staff', [StaffController::class, 'showStaff']); #NEXT FEATURE
Route::post('/health-staff', [StaffController::class, 'store1']); #NEXT FEATURE

Route::get('/health-staff/{user_id}/details', [StaffController::class, 'showStaffDetail']);
Route::get('/health-staff/{user_id}/edit', [StaffController::class, 'showEditStaffForm']);
Route::patch('/health-staff/{user_id}/update', [StaffController::class, 'updateStaffData']);

Route::delete('/health-staff/{user_id}/delete', [StaffController::class, 'burnStaff']);
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

