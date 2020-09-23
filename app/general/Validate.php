<?php

namespace App\General;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

class Validate extends Model {

    public function validate($array) {
        $messages = [];
        foreach($array as $key => $value) {
            $rules = explode('|', $value);
            foreach($rules as $value) {
                $aux = explode(':',$value);
                switch ($aux[0]) {
                    case 'require':
                        if (!isset($this->$key) || empty($this->$key))
                            $messages['error'][$key][] = 'Campo obrigatório';
                    break;
                    case 'email':
                        if (!strpos($this->$key,'@'))
                            $messages['error'][$key][] = 'Digite um e-mail válido';
                    break;
                    case 'min':
                        if (strlen($this->$key) < $aux[1])
                            $messages['error'][$key][] = 'Digite ao menos '.$aux[1].' caracteres';
                    break;
                    case 'max':
                        if (strlen($this->$key) > $aux[1])
                            $messages['error'][$key][] = 'Digite no máximo '.$aux[1].' caracteres';
                    break;
                    case 'unique':
                        $obj = DB::table($aux[1])->where($key, $this->$key)->get();
                        if (!$obj->isEmpty())
                            $messages['error'][$key][] = 'Tente outro valor para o campo '.$key;
                    break;
                }
            }
        }

        return $messages;
    }

}