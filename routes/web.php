<?php

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
    return view('site.index');
});

Route::get('/about', function () {
    return view('site.about');
});
Route::get('/documentation', function () {
    return view('site.documentation');
});

// Route::get('/test', function () {
//     return view('test');
// });
//
// Route::get('/bladetest', function () {
//   $test_data = ['Michael','Katy','Ronan'];
//   return view('bladetest.index',compact('test_data'));
// });
//
// Route::get('/testform', 'SiteController@testform');
