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
  $parsedown = new \Parsedown();

  $markdown =  trim($parsedown->line('Emphasis, aka italics, with *asterisks* or _underscores_.'));
  
  return view('site.about',compact('markdown'));
});

Route::get('/documentation', function () {

  return view('site.documentation');
});

Route::get('/blog', function () {
  return view('site.blog');
});
