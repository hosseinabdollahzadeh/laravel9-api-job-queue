<?php
Route::group([],function ($router){
    $router->get('/api/json', 'ApiController@getJsonResponse')->name('getJsonResponse');
    $router->get('/api/xml', 'ApiController@getXmlResponse')->name('getXmlResponse');
});
