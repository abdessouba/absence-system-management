<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\StagiairesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['checkIfLoggedIn'])->group(function () {
    Route::get("/", [AbsenceController::class, "index"])->name("home");
    Route::get("/show/{id}", [AbsenceController::class, "show"])->name("show");
    Route::get("/seances", [SeancesController::class, "index"])->name("seances");
});

// admin
Route::middleware(["checkIfLoggedIn", "isAdmin"])->group(function(){
    Route::get("/admin/home", [AdminController::class, "index"])->name("admin.home");
    Route::get("/admin/stagiaires", [StagiairesController::class, "index"])->name("admin.stagiaires");
    Route::get("/admin/formateurs", [FormateurController::class, "index"])->name("admin.formateur");
    Route::get("/admin/groupes", [GroupesController::class, "create"])->name("admin.groupes");
    Route::get("/admin/formateurs/{utilisateur}", [FormateurController::class, "show"])->name("admin.formateur.show");
});

Route::get("/login/create", [AuthController::class, "create"])->name("login.create");
Route::post("/login", [AuthController::class, "store"])->name("login.store");
Route::get("/login/logout", [AuthController::class, "logout"])->name("logout");
