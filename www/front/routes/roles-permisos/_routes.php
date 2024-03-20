<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//////////  USERS
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/getusers', [UserController::class, 'getUsers'])->name('users.getusers');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/store', [UserController::class, 'store'])->name('users.store');
Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::post('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');


//////////  ROLES
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('roles/getroles', [RoleController::class, 'getRoles'])->name('roles.getroles');
Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');

//////////  PERMISSION
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('permissions/getpermissions', [PermissionController::class, 'getPermissions'])->name('permissions.getpermission');
Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('permissions/edit/{permission}', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::post('permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
