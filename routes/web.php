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
Route::get('/laravel', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', "LoginController@signup");
Route::get('/passwordrecover', function () {
    return view('recover');
});
Route::get('/login', "LoginController@loginPage");
Route::post('/login', "LoginController@login");

Route::get("/adminlogin", "AdminLoginController@loginPage");
Route::post("/adminlogin", "AdminLoginController@adminlogin");
Route::get('/adminloginpage', "AdminLoginController@index");
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/logout', "LoginController@logout");

Route::get('/order', "DonateController@index");
Route::post('/order', "DonateController@process");
Route::get('/confirm/receiver/{id}', "DonateController@confirmReceive");
Route::get('/confirm/donation/{id}', "DonateController@confirmDonate");