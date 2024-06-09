<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\EducationController;
use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Institution\InstitutionController;
use App\Http\Controllers\Drugs\ClassController;
use App\Http\Controllers\Drugs\PresentationController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Drugs\DataController;
use App\Http\Controllers\Post\CategoryController;


Route::middleware([GuestMiddleware::class,])->group(function () {

    Route::get('/register', [AuthController::class, 'showRegisterForm']); //guest

    Route::post('/register', [AuthController::class, 'register']); //guest

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.loginPage');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/', [CitizenController::class, 'index'])->name('index');

    Route::get('/health-institution/request', [InstitutionController::class, 'showInstitutionForm'])->name('institution');


    Route::get('/konsultasikan-sekarang', function () {
        return view('Citizen.Home.realtime-chatting');
    });
    Route::get('/konsultasikan-sekarang', function () {
        return view('Citizen.Home.realtime-chatting');
    });

    Route::get('/cari-obat', function () {
        return view('Citizen.Home.cari-obat');
    });
    Route::get('/cari-obat', function () {
        return view('Citizen.Home.cari-obat');
    });

    Route::get('/education-page', function () {
        return view('Citizen.Home.education-page');
    });
    Route::get('/education-page', function () {
        return view('Citizen.Home.education-page');
    });

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
});



//* Roles user

Route::middleware([AuthMiddleware::class])->group(function () {

    // Start Of Drug Data

    Route::get('/drugs/create-drug-data', [DataController::class, 'show_create_data_form']);

    Route::post('/drugs/create-drug-data', [DataController::class, 'store_drug_data_data']);


    Route::get('/drugs/{drug_id}/edit-data', [DataController::class, 'show_edit_data_form']);
    Route::patch('/drugs/{drug_id}/update-data', [DataController::class, 'update_drug_data_data']);


    Route::delete('/drugs/{drug_id}/delete', [DataController::class, 'destroy_drug_data']);

    // End of Drug Data


    // Start Of Drug Classification

    Route::get('/drugs/classes', [ClassController::class, 'showDrugClasses']);

    Route::get('/drug/class/{class_id}', [ClassController::class, 'showDetailDrugClass']);

    Route::get('/drugs/class/create-form', [ClassController::class, 'showCreateClassForm']);
    Route::post('/drugs/class/store', [ClassController::class, 'storeDrugClassData']);

    Route::get('/drugs/class/{class_id}/edit-form', [ClassController::class, 'showEditClassForm']);
    Route::patch('/drugs/class/{class_id}/update-form', [ClassController::class, 'updateDrugClass']);

    Route::delete('/drugs/classes/{class_id}/delete', [ClassController::class, 'destroyDrugClass']);

    // End of Drug Classification Section


    // Start Of Drug Presentation

    Route::get('/drug/presentations', [PresentationController::class,  'show_drug_presentation']);

    Route::get('/drug/presentations/{presentation_id}', [PresentationController::class, 'show_detail_presentation']);

    Route::get('/drugs/create-drug-presentation', [PresentationController::class, 'show_create_presentation_form']);

    Route::post('/drugs/create-drug-presentation', [PresentationController::class, 'store_drug_presentation_data']);

    Route::get('/drugs/{presentation_id}/edit-presentation', [PresentationController::class, 'show_edit_presentation_form']);

    Route::put('/drugs/{presentation_id}/update-presentation', [PresentationController::class, 'update_drug_presentation_data']);

    Route::delete('/drugs/{presentation_id}/delete', [PresentationController::class, 'destroy_presentation_data']);

    // End of Drug Presentation Section

    //* Logout
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/staff-dashboard', [DashboardController::class, 'getDashboard'])->name('admin.home');

    // Educational Data 

    Route::get('/create-post', [EducationController::class, 'show_education_create_form']);
    Route::post('/send-post', [EducationController::class, 'store_education_data']);

    Route::get('/education/edit/{post_id}', [EducationController::class, 'show_edit_education_form']);

    Route::patch('/education/edit/{post_id}', [EducationController::class, 'update_post_data']);

    Route::delete('/education/delete/{post_id}', [EduCationController::class, 'delete_post']);

    // End of Educational Data Section


});




// * Restricted Access admin

Route::middleware([AuthMiddleware::class, AdminMiddleware::class])->group(function () {

    Route::get('/admin-dashboard', [StaffController::class, 'show_admin_dashboard']);

    // Start Of Role Section

    Route::get('/roles', [RoleController::class, 'showRole']);

    Route::get('/roles/{role_id}/details', [RoleController::class, 'showDetailRole']);

    Route::get('/create-roles-form', [RoleController::class, 'showCreateRoleForm']);
    Route::post('/create-roles', [RoleController::class, 'storeRole']);
    Route::get('/update-roles/{role_id}/edit', [RoleController::class, 'showEditRoleForm']);
    Route::patch('/update-roles/{role_id}/update', [RoleController::class, 'updateForm']);

    Route::delete('/delete-role/{role_id}/delete', [RoleController::class, 'destoryRoleData']);

    // End of Role Section


    //! Categories of Post

    Route::get('/list/categories', [CategoriesController::class, 'listCategories'])->name('categories.listCategories');

    Route::get('/add/categories', [CategoriesController::class, 'showCategoryForm'])->name('categories.showCategoryForm');
    Route::post('/add/categories', [CategoriesController::class, 'storeCategoryData']);

    Route::get('/edit/categories/{id}', [CategoriesController::class, 'editCategoryForm'])->name('categories.editCategoryForm');
    Route::put('/update/categories/{id}', [CategoriesController::class, 'updateCategoryData'])->name('categories.updateCategoryData');

    Route::delete('/delete/categories/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.deleteCategory');

    //! End Of Categories of Post


    // Categories Of Post
    Route::get('/categories', [CategoryController::class, 'show_categories'])->name('categories');

    Route::get('/categories/{category_id}', [CategoryController::class, 'show_detail_category']);

    Route::get('/categories/create', [CategoryController::class, 'show_category_form']);
    Route::post('/categories/create', [CategoryController::class, 'store_category_data']);

    Route::get('/categories/edit/{category_id}', [CategoryController::class,  'show_edit_category_form']);
    Route::patch('/categories/edit/{category_id}', [CategoryController::class, 'update_category']);

    Route::delete('categories/{category_id}/delete', [CategoryController::class, 'delete_category']);

    // End Of categories section

    // Start Of Insitution Data

    Route::get('/verificaiton-request', [InstitutionController::class, 'showVerificationData']);

    Route::get('/health-institution/{institution_id}/details', [InstitutionController::class, 'showInstitutionDetail']);

    Route::patch('/verification-request/update-status/{institution_id}', [InstitutionController::class, 'updateStatus']);

    Route::patch('/verification-request/reject/{institution_id}', [InstitutionController::class, 'rejectStatus']);

    Route::get('/health-institution/{institution_id}/more-details', [InstitutionController::class, 'InstitutionMoreDetail']);

    Route::get('/health-institution', [InstitutionController::class, 'showInstitutions']);

    Route::get('/health-institution/{institution_id}/edit', [InstitutionController::class, 'showEditInstitutionForm']);
    Route::patch('/health-institution/{institution_id}/update', [InstitutionController::class, 'updateInstitutionData']);

    Route::delete('/health-inzcvxstitution/{institution_id}/delete', [InstitutionController::class, 'destroyInstitution']);

    // End Of Insitution Data


    // Start Of Staff Data

    Route::get('/health-staff/{user_id}/details', [StaffController::class, 'showStaffDetail']);


    Route::get('/health-staff', [StaffController::class, 'showStaff']);
    Route::post('/health-staff', [StaffController::class, 'store1']);

    // Accept
    Route::patch('/health-staff/accept/{user_id}', [StaffController::class, 'accept_staff']);

    Route::get('/health-staff/{user_id}/edit', [StaffController::class, 'showEditStaffForm']);
    Route::patch('/health-staff/{user_id}/update', [StaffController::class, 'updateStaffData']);

    Route::delete('/health-staff/{user_id}/delete', [StaffController::class, 'burnStaff']);

    // End OfStart Of Staff Data
});


Route::get('/drug/data', [DataController::class,  'show_drug_data']);

Route::get('/drug/data/{drug_id}', [DataController::class, 'show_detail_data']);



Route::get('/education', [EducationController::class, 'show_education']);

Route::get('/education/{post_id}', [EDucationController::class, 'show_detail_post']);
