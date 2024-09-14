<?php

namespace App\Utils\validations;

use App\DTO\UsuarioDTO;
use App\Exceptions\CustomException;
use App\Models\User;

class UserValidation{

    public static function validateUser(UsuarioDTO $user, $isUpdate = false){
        if($isUpdate){
            $userFound = User::find($user->id);

            if(is_null($userFound)){
                throw new CustomException('User not found', 404);
            }
            
            if(!is_null($user->dni) && GeneralValidation::validateDni($user->dni) == false){
                throw new CustomException('Dni is invalid', 400);
            } 
        }else{
            if(GeneralValidation::validateDni($user->dni) == false){
                throw new CustomException('Dni is invalid', 400);
            } 
        }
       
    }
    public static function validateDeleteUser($id){
        $userFound = User::find($id);

        if(is_null($userFound)){
            throw new CustomException('User not found', 404);
        }
    }


}
