<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Drugs\ClassController;
use App\Http\Controllers\Drugs\PresentationController;

Route::get('/', [CitizenController::class, 'index']);

//* Roles

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


// * Restricted Access


Route::get('/home', function () {
  return view('Admin.home');
});

Route::get('/verificaiton-request', [InstitutionController::class, 'showVerificationData']);

Route::get('/health-institution/{institution_id}/details', [InstitutionController::class, 'showInstitutionDetail']);

Route::patch('/verification-request/update-status/{institution_id}', [InstitutionController::class, 'updateStatus']);

Route::patch('/verification-request/reject/{institution_id}', [InstitutionController::class, 'rejectStatus']);

Route::get('/health-institution/{institution_id}/more-details', [InstitutionController::class, 'InstitutionMoreDetail']);

Route::get('/health-institution', [InstitutionController::class, 'showInstitutions']);

Route::get('/health-institution/{institution_id}/edit', [InstitutionController::class, 'showEditInstitutionForm']);
Route::patch('/health-institution/{institution_id}/update', [InstitutionController::class, 'updateInstitutionData']);

Route::delete('/health-institution/{institution_id}/delete', [InstitutionController::class, 'destroyInstitution']);


// * Drug Class
Route::get('/drugs/classes', [ClassController::class, 'showDrugClasses']);

Route::get('/drug/class/{class_id}', [ClassController::class, 'showDetailDrugClass']);

Route::get('/drugs/class/create-form', [ClassController::class, 'showCreateClassForm']);
Route::post('/drugs/class/store', [ClassController::class, 'storeDrugClassData']);

Route::get('/drugs/class/{class_id}/edit-form', [ClassController::class, 'showEditClassForm']);
Route::patch('/drugs/class/{class_id}/update-form', [ClassController::class, 'updateDrugClass']);

Route::delete('/drugs/classes/{class_id}/delete', [ClassController::class, 'destroyDrugClass']);

// * Drug Presentation 

Route::get('/drug/presentations', [PresentationController::class,  'show_drug_presentation']);

Route::get('/drug/presentations/{presentation_id}', [PresentationController::class, 'show_detail_presentation']);

Route::get('/drugs/create-drug=presentation', [PresentationController::class, 'show_create_presentation_form']);

Route::post('/drugs/create-drug=presentation', [PresentationController::class, 'store_drug_presentation_data']);

Route::get('/drugs/{presentation_id}/edit-presentation', [PresentationController::class, 'show_edit_presentation_form']);
Route::put('/drugs/{presentation_id}/update-presentation', [PresentationController::class, 'update_drug_presentation_data']);

Route::delete('/drugs/{presentation_id}/delete', [PresentationController::class, 'destroy_presentation0_data']);
