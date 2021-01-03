<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;

class GeneralFunction extends Model
{
    public static function redirect($log, $url, $values)
    {
        $_SESSION['REDIRECT'] = base64_encode(
            json_encode(
                [
                    'MESSAGE' => $log,
                    'URL' => $url,
                    'VALUES' => $values
                ]
            )
        );
        header('Location: ' . $url);
    }

    public static function checkSessionRedirect()
    {
        if (isset($_SESSION['REDIRECT']))
        {
            $data = json_decode(base64_decode($_SESSION['REDIRECT']));
            unset($_SESSION['REDIRECT']);

            return $data;
        }
        
        return [];
    }

    /**
     * Types: 
     * ALPHA - Alphanumeric
     * INT - Numeric
     * LETTERS - Just letters
     * SPECIAL - Alphanumeric with special chars
     */
    public static function newRandomString($type, $length)
    {
        if ($type == 'INT')
        {
            $characters = '0123456789';
        }
        else if ($type == 'LETTERS')
        {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        else if ($type == 'SPECIAL')
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*()_-+=';
        }
        else
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        
        $randstring = '';
        for ($i = 0; $i < $length; $i++) 
        {
            $randstring .= $characters[rand(0, strlen($characters))];
        }

        return $randstring;
    }

    public static function getUrlContent()
    {
        $content = explode('/', $_SERVER['PHP_SELF']);
        return $content[sizeof($content)-1];
    }
}
