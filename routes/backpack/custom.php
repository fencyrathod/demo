<?php

use Illuminate\Support\Facades\Route;


// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),

        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('test', 'TestCrudController');
    Route::crud('User_demo', 'UserCrudController');

Route::get('demo','TestCrudController@demo');
Route::get('create','DemoCrudController@create');
Route::post('demo', 'DemoCrudController@store')->name('demo.store');

    Route::crud('tag', 'TagCrudController');
    Route::get('reports','DemoCrudController@report');
    Route::get('google','DemoCrudController@google');
    Route::get('pdf','DemoCrudController@pdf');
});