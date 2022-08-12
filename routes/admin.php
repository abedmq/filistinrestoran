<?php


Auth::routes();

Route::middleware("auth:admin", 'admin_lang')->group(function () {
    Route::post('images/upload/image-ckeditor', 'ImagesController@uploadImageCK')->name('images.upload.ckeditor');

    Route::get('profiles', 'ProfileController@index')->name('profiles.index');
    Route::post('profiles/update', 'ProfileController@update')->name('profiles.update');
    Route::get('/', "HomeController@index")->name('home');


    Route::resourceAdmin('categories', 'CategoriesController');
    Route::resourceAdmin('meals', 'MealsController');


    Route::resourceAdmin('areas', 'AreaController');
    Route::resourceAdmin('status', 'StatusController');
    Route::resourceAdmin('payments', 'PaymentMethodController');
    Route::resourceAdmin('cancels', 'CancelReasonController');
    Route::resourceAdmin('languages', 'LanguageController');
    Route::resource('orders', 'OrderController');
    Route::resource('messages', 'MessageController',['only'=>['show','index','destroy']]);

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::post('/settings', 'SettingsController@update')->name('settings.update');

});
