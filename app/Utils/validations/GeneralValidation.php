<?php 

namespace App\Utils\validations;

use App\Exceptions\CustomException;

class GeneralValidation
{
    public static function validateDni($dni){
        $isValid = true;
        $lenght = strlen($dni);
        if($lenght != 8){
            $isValid = false;
        }
        return $isValid;
    }
}