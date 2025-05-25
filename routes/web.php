<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckUserLoggedIn;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::get("/", [ProductController::class, "index"])-> name("public.home");
Route::get("/ponuda", [ProductController::class, "ponuda"])-> name("public.ponuda");
Route::get("/kontakt", [ProductController::class, "kontakt"])-> name("public.kontakt");
Route::get('/single-product/{id}', [ProductController::class, 'single'])->name("public.single");


Route::middleware(CheckUserLoggedIn::class)->group(function() {
    Route::get('/login', [AuthController::class, "login"])->name("login");
    Route::post('/login', [AuthController::class, "storeLogin"])->name("storeLogin");

});
Route::get('/logout', [AuthController::class, "logout"])->name("logout");
Route::get("/not-auth", [AuthController::class, "notAuth"])->name("not-auth");
Route::middleware(AuthMiddleware::class)->group(function() {

    Route::get("/admin-main", [ProductController::class, "main"])-> name("admin.main");

    Route::get("/admin-products", [ProductController::class, "products"])-> name("admin.products");

    Route::get('/admin-add', [ProductController::class, 'create'])->name("admin.addproduct");
    Route::post('/admin-add', [ProductController::class, 'store'])->name("admin.store");

    Route::get('/admin-delete/{id}', [ProductController::class, "delete"])->name("admin.delete");
    Route::post('/admin-delete/{id}', [ProductController::class, "destroy"])->name("admin.destroy");

    Route::get('/admin-edit/{id}', [ProductController::class, 'edit'])->name("admin.edit");
    Route::post('/admin-edit/{id}', [ProductController::class, 'update'])->name("admin.update");

    Route::get('/admin-categories', [CategoryController::class, 'categories'])->name("admin.categories");

    Route::get('/admin-addcategory', [CategoryController::class, 'createCategory'])->name("admin.addcategory");
    Route::post('/admin-addcategory', [CategoryController::class, 'storeCategory'])->name("admin.addcategory");

    Route::get('/admin-deletecategory/{id}', [CategoryController::class, "deleteCategory"])->name("admin.deletecategory");
    Route::post('/admin-deletecategory/{id}', [CategoryController::class, "destroyCategory"])->name("admin.deletecategory");

    Route::get('/admin-editcategory/{id}', [CategoryController::class, 'editCategory'])->name("admin.editcategory");
    Route::post('/admin-editcategory/{id}', [CategoryController::class, 'updateCategory'])->name("admin.editcategory");

    Route::get("/admin-users", [UserController::class, 'users'])->name("admin.users");

    Route::get('/register', [AuthController::class, "register"])->name("register");
    Route::post('/register', [AuthController::class, "storeRegister"])->name("storeRegister");

    Route::get('/admin-deleteuser/{id}', [UserController::class, "deleteUser"])->name("admin.deleteuser");
    Route::post('/admin-deleteuser/{id}', [UserController::class, "destroyUser"])->name("admin.deleteuser");

    Route::get('/admin-edituser/{id}', [UserController::class, 'editUser'])->name("admin.edituser");
    Route::post('/admin-edituser/{id}', [UserController::class, 'updateUser'])->name("admin.edituser");
});
Route::middleware(UserMiddleware::class)->group(function() {
    
    Route::get('/nalog', [UserController::class, 'profile'])->name("public.profile");

    Route::get('/narudzbina', [OrderController::class, 'createPublic'])->name('public.order');
    Route::post('/narudzbina', [OrderController::class, 'storePublic'])->name('public.order');

    Route::post('orders-delete{id}', [OrderController::class, 'destroy'])->name('public.delete');

});