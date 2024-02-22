<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//Admin Route
Route::view('/admin-login', 'admin.pages.login-page');
Route::view('/admin-dashboard', 'admin.components.dashboard');
Route::view('/admin-category-list', 'admin.pages.category-page')->name('admin-category');
Route::view('/admin-company', 'admin.pages.company-page')->name('admin-company');


Route::post('/adminLogin', [AdminController::class, 'AdminLogin']);
Route::post('/adminRegister', [AdminController::class, 'AdminRegister']);


//Category Route
Route::post('/categoryCreate', [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');
Route::post('/categoryUpdate', [CategoryController::class, 'CategoryUpdate'])->middleware('auth:sanctum');
Route::post('/categoryDelete', [CategoryController::class, 'CategoryDelete'])->middleware('auth:sanctum');
Route::get('/categoryList', [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');
Route::post('/categoryListByID', [CategoryController::class, 'CategoryListByID'])->middleware('auth:sanctum');

//Admin Company Route
Route::get('/admin-company-list', [AdminController::class, 'CompanyList'])->middleware('auth:sanctum');
Route::post('/admin-company-create', [AdminController::class, 'CompanyCreate'])->middleware('auth:sanctum');
Route::post('/admin-company-update', [AdminController::class, 'CompanyUpdate'])->middleware('auth:sanctum');
Route::post('/admin-company-by-id', [AdminController::class, 'CompanyByID'])->middleware('auth:sanctum');
Route::post('/admin-company-delete', [AdminController::class, 'CompanyDelete'])->middleware('auth:sanctum');

//Job Route
Route::view('/admin-job-list', 'admin.pages.job-page')->name('admin-job-list');
Route::get('/adminJobList', [AdminController::class, 'adminJobList'])->middleware('auth:sanctum');




//Company Route

Route::view('/company-login', 'company.pages.login-page');
Route::view('/company-dashboard', 'company.pages.dashboard')->name('company-dashboard');
Route::view('/company-profile', 'company.pages.profile-page')->name('company-profile');
Route::view('/company-job', 'company.pages.job-page')->name('company-job');

Route::post('/companyLogin', [CompanyController::class, 'CompanyLogin']);
Route::post('/companyRegister', [CompanyController::class, 'CompanyRegister']);
Route::get('/companyLogout', [CompanyController::class, 'CompanyLogout']);
Route::post('/companyOtp', [CompanyController::class, 'CompanyOtp']);
Route::post('/companyVerifyOtp', [CompanyController::class, 'CompanyVerifyOtp']);
Route::post('/companyPasswordReset', [CompanyController::class, 'CompanyPasswordReset'])->middleware('auth:sanctum');

Route::get('/companyProfile', [CompanyController::class, 'CompanyProfile'])->middleware('auth:sanctum');
Route::post('/companyProfileUpdate', [CompanyController::class, 'CompanyProfileUpdate'])->middleware('auth:sanctum');


//Job Route
Route::post('/jobCreate', [JobController::class, 'JobCreate'])->middleware('auth:sanctum');
Route::post('/jobUpdate', [JobController::class, 'JobUpdate'])->middleware('auth:sanctum');
Route::post('/jobDelete', [JobController::class, 'JobDelete'])->middleware('auth:sanctum');
Route::get('/jobList', [JobController::class, 'JobList'])->middleware('auth:sanctum');
Route::post('/jobListByID', [JobController::class, 'JobListByID'])->middleware('auth:sanctum');
Route::post('/jobApply', [JobController::class, 'JobApply'])->middleware('auth:sanctum');



//User Route
Route::post('/userRegister', [UserController::class, 'UserRegister']);
Route::post('/userLogin', [UserController::class, 'UserLogin']);
Route::post('/userLogout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');
Route::post('/sentOtp', [UserController::class, 'sentOtp']);
Route::post('/verifyOtp', [UserController::class, 'verifyOtp']);
Route::post('/userPasswordReset', [UserController::class, 'UserPasswordReset'])->middleware('auth:sanctum');



//User Profile Route
Route::post('/CreateUserProfile', [ProfileController::class, 'CreateUserProfile'])->middleware('auth:sanctum');
Route::post('/userProfileUpdate', [ProfileController::class, 'UserProfileUpdate'])->middleware('auth:sanctum');
Route::get('/userProfile', [ProfileController::class, 'UserProfile'])->middleware('auth:sanctum');
Route::post('/userProfileDelete', [ProfileController::class, 'UserProfileDelete'])->middleware('auth:sanctum');


//Job Apply Route
Route::post('/jobApply', [ApplyController::class, 'JobApply'])->middleware('auth:sanctum');
Route::get('/jobApplyList', [ApplyController::class, 'JobApplyList'])->middleware('auth:sanctum');




//user View Route
Route::view('/', 'user.pages.home');
Route::view('/found-job', 'user.pages.job-page')->name('found-job');



// Frontend Route
Route::get('/user_company_list', [UserController::class, 'UserCompanyList']);
Route::get('/user_job_list', [UserController::class, 'UserJobList']);
Route::get('/user_category_list', [UserController::class, 'UserCategoryList']);
Route::get('/user_single_job/{id}', [UserController::class, 'UserSingleJob']);


