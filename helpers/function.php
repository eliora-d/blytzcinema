<?php

if (!function_exists('dd')) {
	function dd($variable){
		print_r($variable);
		die();
	}
}

if (!function_exists('url')) {
    function url($url){
        if ($url[0] != '/')
            $url = "/$url";
        return sprintf(
            "%s://%s:%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
			$_SERVER['SERVER_PORT'],
            $url
        );
    }
}

if (!function_exists('root')) {
    function root($root = 'public')
    {
        return explode($root, $_SERVER['DOCUMENT_ROOT'])[0] . "/";
    }
}

if (!function_exists('component')) {
	function component($path)
	{
		return require_once(root() . "components/$path.php");
	}
}

if (!function_exists('config')) {
    function config($path)
    {
        return require_once(root() . "config/$path.php");
    }
}

if (!function_exists('controller')) {
	function controller($path)
    {
        return require_once(root() . "controller/$path.php");
    }
}

if (!function_exists('back')) {
    function back()
    {
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url");
        die();
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        $url = url($url);
        header("Location: $url");
        die();
    }
}

if (!function_exists('asset')) {
    function asset($path) 
    {
        return url("$path");
    }
}

if (!function_exists('get_error')) {
    function get_error()
    {
        $error = $_GET['error'];
        unset($_GET['error']);
        return $error;
    }
}