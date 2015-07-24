<?php

Route::group(['prefix' => config('socialist.api_root')], function() {

    Route::get('session/{provider}/create', 'AuthController@login');

});
