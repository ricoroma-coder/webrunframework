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
}
