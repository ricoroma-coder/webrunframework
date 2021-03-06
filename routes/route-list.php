<?php

use App\General\Route;
use App\General\GeneralFunction as Functions;

Route::get("/", "ViewController@index");

// auth
Route::get("/login", "AuthController@login");
Route::post("/login/auth", "AuthController@auth");
Route::get("/logout", "AuthController@logOut");
Route::get("/recuperar-senha", "AuthController@forgotPassword");
Route::post("/recuperar-senha/auth", "AuthController@recoveryPassword");
Route::get("/recuperar-senha/recuperar/{username}", "AuthController@recovery");
Route::get("/cadastrar", "AuthController@register");
Route::post("/cadastrar/auth", "AuthController@signin");

Route::get("/testando", function () 
{
	return view("teste");
});

Route::post("/testando/teste", 'ViewController@uploadImage');