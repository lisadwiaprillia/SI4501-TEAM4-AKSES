<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Drugs\ClassController;
use App\Http\Controllers\Drugs\PresentationController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\MedicalStaff\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Categories\CategoriesController;


//use App\Http\Controllers\MedicalStaff\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm']); //guest

Route::post('/register', [StaffController::class, 'store1']); //guest

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.loginPage');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', [CitizenController::class, 'index'])->name('index');

Route::get('/konsultasikan-sekarang', function () {return view('Citizen.Home.realtime-chatting');});

Route::get('/cari-obat', function () {return view('Citizen.Home.cari-obat');});

Route::get('/education-page', function () {return view('Citizen.Home.education-page');});

Route::get('/health-institution/request', [InstitutionController::class, 'showInstitutionForm'])->name('institution');

Route::get('/health-institution/verification', [InstitutionController::class, 'showVerificationInfo']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/check-status', [InstitutionController::class, 'showVerificationStatus']);
Route::post('/health-institution/status', [InstitutionController::class, 'VerificationStatus']);

Route::get('/health-institution/status', [InstitutionController::class, 'showVerificationStatus']);

Route::get('/employee-request', [StaffController::class, 'showRequestForm']);

Route::post('/employee-request', [StaffController::class, 'storeTicket']);

Route::post('/health-institution', [InstitutionController::class, 'store']);



//* Roles user

// Route::middleware([AuthMiddleware::class])->group(function () {

route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('admin.home');

Route::get('/roles', [RoleController::class, 'showRole']); //admin

Route::get('/roles/{role_id}/details', [RoleController::class, 'showDetailRole']); //admin

Route::get('/create-roles', [RoleController::class, 'showCreateRoleForm']); //admin
Route::post('/create-roles', [RoleController::class, 'storeRole']); //admin

Route::get('/update-roles/{role_id}/edit', [RoleController::class, 'showEditRoleForm']); //admin
Route::patch('/update-roles/{role_id}/update', [RoleController::class, 'updateForm']); //admin

Route::delete('/delete-role/{role_id}/delete', [RoleController::class, 'destoryRoleData']); //admin

//* Institution Routes

Route::get('/health-staff', [StaffController::class, 'showStaff']); #NEXT FEATURE
Route::post('/health-staff', [StaffController::class, 'store1']); #NEXT FEATURE

// * Categories of Post

Route::get('/add/categories', [CategoriesController::class, 'showCategoryForm'])->name('categories.showCategoryForm');
Route::post('/add/categories', [CategoriesController::class, 'storeCategoryData']);

Route::get('/list/categories', [CategoriesController::class, 'listCategories'])->name('categories.listCategories');

Route::get('/edit/categories/{id}', [CategoriesController::class, 'editCategoryForm'])->name('categories.editCategoryForm');
Route::put('/update/categories/{id}', [CategoriesController::class, 'updateCategoryData'])->name('categories.updateCategoryData');

// Route::delete('/delete/categories/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.deleteCategory');

// });


// * Restricted Access admin

// Route::middleware([AuthMiddleware::class, AdminMiddleware::class])->group(function () {
route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('admin.home');


Route::get('/verificaiton-request', [InstitutionController::class, 'showVerificationData']);

Route::get('/health-institution/{institution_id}/details', [InstitutionController::class, 'showInstitutionDetail']);

Route::patch('/verification-request/update-status/{institution_id}', [InstitutionController::class, 'updateStatus']);

Route::patch('/verification-request/reject/{institution_id}', [InstitutionController::class, 'rejectStatus']);

Route::get('/health-institution/{institution_id}/more-details', [InstitutionController::class, 'InstitutionMoreDetail']);

Route::get('/health-institution', [InstitutionController::class, 'showInstitutions']);

Route::get('/health-institution/{institution_id}/edit', [InstitutionController::class, 'showEditInstitutionForm']);
Route::patch('/health-institution/{institution_id}/update', [InstitutionController::class, 'updateInstitutionData']);

Route::delete('/health-institution/{institution_id}/delete', [InstitutionController::class, 'destroyInstitution']);

// CRUD Staff for Admin
Route::get('/health-staff/{user_id}/details', [StaffController::class, 'showStaffDetail']);
Route::get('/health-staff/{user_id}/edit', [StaffController::class, 'showEditStaffForm']);
Route::patch('/health-staff/{user_id}/update', [StaffController::class, 'updateStaffData']);

Route::delete('/health-staff/{user_id}/delete', [StaffController::class, 'burnStaff']);
// });

//quesionable mark
Route::get('/drugs/{presentation_id}/edit-presentation', [PresentationController::class, 'show_edit_presentation_form']);

Route::put('/drugs/{presentation_id}/update-presentation', [PresentationController::class, 'update_drug_presentation_data']);

Route::delete('/drugs/{presentation_id}/delete', [PresentationController::class, 'destroy_presentation0_data']);
