<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    /* -----------------------------------------------
     FRONT-END ROUTES
    -------------------------------------------------*/
    // First Page Routes
    // Route::get('/', 'WelcomeController@index')->name('welcome.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Backend\Auth'], function () {
    /* -----------------------------------------------
     AUTH ROUTES
    -------------------------------------------------*/
    Route::middleware('guest')->group(function () {
        // Register Routes
        Route::get('/register', 'RegisterController@show')->name('register.show-form');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        // Login Routes
        Route::get('/', 'LoginController@show')->name('login.show-form');
        Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Backend\Dashboard'], function () {
    // Auth Middleware Route
    Route::middleware('auth')->group(function () {
        // Logout Route
        Route::get('/logout', 'LogoutController@perform')->name('logout');

        // Permission Middleware Routes
        Route::middleware('permission')->group(function () {
            // Dashboard Route
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.home');

            /* -----------------------------------------------
                 USER MANAGEMENT ROUTES
                 -------------------------------------------------*/
            // User Profile Routes
            Route::prefix('profile')
                ->name('profile.')
                ->group(function () {
                    Route::get('/', 'ProfileController@show')->name('show');
                    Route::get('/change-password', 'ProfileController@showChangePassword')->name('show-change-password');
                    Route::patch('/{profile}', 'ProfileController@update')->name('update');
                    Route::patch('/change-password/{profile}', 'ProfileController@changePassword')->name('change-password');
                });

            // Users Routes
            Route::resource('users', 'UserController');
            Route::delete('users/{user}/delete', 'UserController@forceDelete')->name('users.forceDelete');

            // Role and Permission Routes (using resourceful routing)
            Route::resource('roles', 'RoleController');
            Route::resource('permissions', 'PermissionController');

            /* -----------------------------------------------
                 SYSTEM MONITORING ROUTES
                 -------------------------------------------------*/
            // Logs Routes
            Route::prefix('logs')
                ->name('logs.')
                ->group(function () {
                    Route::get('/', 'LogController@index')->name('index');
                    Route::get('/{log}', 'LogController@show')->name('show');
                    Route::get('/user-details/{id}', 'LogController@getUserDetails')->name('user-details');
                    Route::get('/filter', 'LogController@filter')->name('filter');
                    Route::get('/logs-by-role/{role}', 'LogController@filter')->name('logsByRole');
                    Route::get('/logs-by-action/{action}', 'LogController@filter')->name('logsByAction');
                    Route::get('/logs-by-date-range/{daterange}', 'LogController@filter')->name('logsByDateRange');
                    Route::post('/handle-filter', 'LogController@handleFilter')->name('handleFilter');
                    Route::delete('/{log}', 'LogController@destroy')->name('destroy');
                    Route::delete('/{log}/delete', 'LogController@forceDelete')->name('forceDelete');
                });

            // Notification Routes
            Route::prefix('notifications')
                ->name('notifications.')
                ->group(function () {
                    Route::get('/get-unread', 'NotificationController@getUnreadNotifications')->name('get-unread');
                    Route::get('/{notification}', 'NotificationController@show')->name('show');
                    Route::post('/mark-as-read/{notification}', 'NotificationController@markAsRead')->name('mark-as-read');
                });
        });

        /* ----------------------------------------------------------------------------------------------
                CONTENT MANAGEMENT ROUTES (CM-R) (Note: This pages should be place in permission middleware)
                ---------------------------------------------------------------------------------------------*/
        // Sample Images Routes
        Route::get('/sample', 'SampleController@index')->name('page2.index');
        Route::get('/sample/create', 'SampleController@create')->name('page2.create');
        Route::post('/sample', 'SampleController@store')->name('page2.store');
        Route::get('/sample/{id}', 'SampleController@show')->name('page2.show');
        Route::get('/sample/{id}/edit', 'SampleController@edit')->name('page2.edit');
        Route::patch('/sample/{image}', 'SampleController@update')->name('page2.update');
        Route::delete('/sample/{image}', 'ImageController@destroy')->name('page2.destroy');
        Route::delete('/sample/{id}/delete', 'SampleController@forceDelete')->name('page2.forceDelete');
    });
});
