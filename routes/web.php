<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Statistical as AdminStatistical;
use App\Http\Controllers\Admin\Users\ForgetPasswordHandle;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Management\BooksMain;
use App\Http\Controllers\Management\TypeBooks;
use App\Http\Controllers\statistical;
use App\Http\Controllers\Management\ReadersController;
use App\Http\Controllers\Management\ReborrowController;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\RotatingFileHandler;

//Admin
Route::group(['prefix' => '/'], function () {
    Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
    Route::get('admin/users/register', [RegisterController::class, 'index1'])->name('showRegister');
    Route::post('admin/users/register/create', [RegisterController::class, 'register'])->name('admin.register');
    Route::post('admin/users/login/store', [LoginController::class, 'store'])->name('admin.users.store');
});

//middleware
Route::middleware(['auth'])->group(function () {
    Route::get('admin/main', [MainController::class, 'index'])->name('admin');
    Route::get('/contact', function () {
        return view('admin.Contact');
    })->name('contact');
    //Management Books
    Route::group(['prefix' => 'ManagementBooks'], function () {
        Route::get('index', [BooksMain::class, 'index'])->name('managementBooks.index');
        Route::get('/create', [BooksMain::class, 'create'])->name('managementBooks.create');
        Route::post('/store', [BooksMain::class, 'storeBooks'])->name('managementBooks.store');
        Route::delete('/delete/{id}', [BooksMain::class, 'deleteBooks'])->name('managementBooks.delete');
        Route::get('/edit/{id}', [BooksMain::class, 'edit'])->name('managementBooks.edit');
        Route::put('/update/{id}', [BooksMain::class, 'update'])->name('managementBooks.update');
        Route::post('/show', [BooksMain::class, 'show'])->name('managementBooks.show');
    });

    //Management Readers
    Route::group(['prefix' => '/ManagementReaders'], function () {
        Route::get('/index', [ReadersController::class, 'index'])->name('managementReaders.index');
        Route::get('/create', [ReadersController::class, 'create'])->name('managementReaders.create');
        Route::post('/store', [ReadersController::class, 'store'])->name('managementReaders.store');
        Route::delete('/delete/{id}', [ReadersController::class, 'delete'])->name('managementReaders.delete');
        Route::get('/edit/{id}', [ReadersController::class, 'edit'])->name('managementReaders.edit');
        Route::put('/update/{id}', [ReadersController::class, 'update'])->name('managementReaders.update');
        Route::post('/show', [ReadersController::class, 'show'])->name('managementReaders.show');
    });

    //Management Reborrows
    Route::group(['prefix' => '/ManagementReborrow'], function () {
        Route::get('/index', [ReborrowController::class, 'index'])->name('managementReborrow.index');
        Route::get('/create', [ReborrowController::class, 'create'])->name('managementReborrow.create');
        Route::post('/store', [ReborrowController::class, 'store'])->name('managementReborrow.store');
        Route::delete('/delete/{id}', [ReborrowController::class, 'delete'])->name('managementReborrow.delete');
        Route::get('/edit/{id}', [ReborrowController::class, 'edit'])->name('managementReborrow.edit');
        Route::put('/update/{id}', [ReborrowController::class, 'update'])->name('managementReborrow.update');
        Route::post('/show', [ReborrowController::class, 'show'])->name('managementReborrow.show');
    });

    //Type of books
    Route::group(['prefix' => '/ManagementType'], function () {
        Route::get('/create', [TypeBooks::class, 'create'])->name('managementType.create');
        Route::get('/index', [TypeBooks::class, 'index'])->name('managementType.listType');
        Route::post('/store', [TypeBooks::class, 'store'])->name('managementType.store');
    });
    Route::group(['prefix' => '/statistical'], function () {
        Route::get('/', [AdminStatistical::class, 'index'])->name('statistical');
        Route::get('/inventory', function () {
            return view('management.inventory.')->name('statistical.inventory');
        });
    });
});
Route::group(['prefix' => '/GetPassword'], function () {
    Route::get('testMail', [ForgetPasswordHandle::class, 'testMail']);
    Route::get('/', [ForgetPasswordHandle::class, 'forgetPass'])->name('GetPassword.moveViewer');
    Route::post('/forgetPassword', [ForgetPasswordHandle::class, 'postForgetPass'])->name('postForgetPass');
    Route::get('getPass/{user}/{token}', [ForgetPasswordHandle::class, 'getPass'])->name('getPass');
    Route::post('getPass/{user}/{token}', [ForgetPasswordHandle::class, 'postGetPass'])->name('postGetPass');
});
