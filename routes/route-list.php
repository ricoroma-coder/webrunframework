<?php

use App\General\Route;

Route::get("/", "ViewController@index");

// auth
Route::get("/login", "AuthController@login");
Route::post("/login/auth", "AuthController@auth");
Route::get("/logout", "AuthController@logOut");
Route::get("/recuperar-senha", "AuthController@forgotPassword");
Route::get("/cadastrar", "AuthController@register");
Route::post("/cadastrar/auth", "AuthController@signin");

Route::get("/testando", function () {
	return view("teste");
});