<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//------------------------------------------------------------------------------------------------------

Route::group(['middleware' => 'auth'], function () {

    // Route ---for postes ---------------------------------------------------------------------------------
    Route::get('/postes/create', [App\Http\Controllers\PostController::class, 'create'])->name('postes.create');
    Route::post('/postes/store', [App\Http\Controllers\PostController::class, 'store'])->name('postes.store');
    Route::get('/postes/index', [App\Http\Controllers\PostController::class, 'index'])->name('postes.index');
    Route::get('/postes/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('postes.delete');
    Route::get('/postes/trashed', [App\Http\Controllers\PostController::class, 'trashed'])->name('postes.trashed');
    Route::get('/postes/hdelete/{id}', [App\Http\Controllers\PostController::class, 'hdelete'])->name('postes.hdelete');
    Route::get('/postes/restore/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('postes.restore');
    Route::get('/postes/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('postes.edit');
    Route::post('/postes/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('postes.update');


    // Route ---for Categories ---------------------------------------------------------------------------------
    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/index', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.delete');
    Route::post('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');


    // Route ---for Tags ---------------------------------------------------------------------------------
    Route::get('/tags/create', [App\Http\Controllers\TagController::class, 'create'])->name('tags.create');
    Route::post('/tags/store', [App\Http\Controllers\TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/index', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tags.edit');
    Route::get('/tags/delete/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.delete');
    Route::post('/tags/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');

    // Route ---for users ---------------------------------------------------------------------------------
    Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::get('/users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/admin/{id}', [App\Http\Controllers\UsersController::class, 'admin'])->name('users.admin');
    Route::get('/users/notadmin/{id}', [App\Http\Controllers\UsersController::class, 'notadmin'])->name('users.notadmin');
    Route::get('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');

    //route for user profile
    Route::get('/users/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('users.profile');
    Route::post('/users/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('users.profile.update');
    Route::get('/users/profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('users.profile.create');


    //route for Settings
    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::post('/settings/update', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');


    //route for admin dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


});



// just for test ------------------------------------------------------------

Route::get('/anas', function () {
    // return App\Models\Category::find(7)->posts;
    // return App\Models\Post::find(8)->category  ;
    // return App\Models\Tag::find(5)->posts  ;
    // return App\Models\Post::find(10)->tags  ;
    // return App\Models\User::find(1)->profile  ;
    // return App\Models\Post::find(7)->category    ;
})->name('anas');
