<?php

Route::redirect('/', '/login');
Route::redirect('/dashboard', '/admin/dashboard');
Route::get('/demotest', 'DemoTestController@index');
Auth::routes();

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});

