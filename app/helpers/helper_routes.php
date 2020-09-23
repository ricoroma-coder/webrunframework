<?php

use App\General\Route;
use App\General\Request;
 
function request() 
{
    return new Request;
}
 
function view($view, $data = []) 
{
    require __DIR__.'/../../resources/views/' . $view . '.php';
}

function resolve($base = '', $data = [], $files = []) 
{
    $request = new Request($base, $data, $files);
    return Route::resolve($request);
}

function redirect($base, $data = [], $files = []) 
{
    if (!empty($data))
        setcookie("_DATA", json_encode($data));

    if (!empty($files))
        setcookie("_FILES", json_encode($files));

    return header("Location: " . $base);
}

// Cookies treatment

function hasCookieData() 
{
    return isset($_COOKIE['_DATA']) && !empty($_COOKIE['_DATA']);
}

function hasCookieFiles()
{
    return isset($_COOKIE['files']) && !empty($_COOKIE['files']);
}

function cookieGetData() 
{
    $aux = json_decode($_COOKIE['_DATA']);
    return $aux;
}

function cookieGetFiles() 
{
    $aux = json_decode($_COOKIE['files']);
    return $aux;
}

// end Cookies treatment
 
function route($name, $params = null) 
{
    return Route::translate($name, $params);
}

function asset($path) 
{
    $url = toAbsolute('../../public/'.$path,__FILE__);

    if (strpos($url, '/') !== 0)
        $url = $path;

	return $url;
}

function toAbsolute($relative_url, $path)
{
    $r = str_replace("\\","/",$relative_url);
    $r = dirname($path,substr_count($r,"../")+1)."/".$r;
    $r = str_replace("\\","/",$r);
    $r = str_replace("../","",$r);
    $r = str_replace($_SERVER["DOCUMENT_ROOT"],"",$r);
    return $r;
}

function toRoot($relative_url, $path)
{
    return $_SERVER['DOCUMENT_ROOT'].toAbsolute($relative_url, $path);
}

function routeIs($path) 
{
    $req = new Request();
    return $req->base() === $path;
}

function component($path, $data = []) 
{
    require __DIR__.'/../../resources/' . $path . '.php';
}

function hasSession() 
{
    return isset($_SESSION['obj']) && !empty($_SESSION['obj']);
}

function getSessionValue($key) 
{
    return $_SESSION[$key];
}

?>