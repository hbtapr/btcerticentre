<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Certificates
    Route::post('certificates/media', 'CertificatesApiController@storeMedia')->name('certificates.storeMedia');
    Route::resource('certificates', 'CertificatesApiController');

    // Partners
    Route::resource('partners', 'PartnerApiController');

    // Clients
    Route::resource('clients', 'ClientApiController');

    // Questions
    Route::resource('questions', 'QuestionsApiController');

    // Themes
    Route::resource('themes', 'ThemeApiController');

    // Attempts
    Route::resource('attempts', 'AttemptsApiController');

    // Demos
    Route::resource('demos', 'DemoApiController');

    // Alternatives
    Route::resource('alternatives', 'AlternativeApiController');
});
