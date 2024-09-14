<?php

namespace App\Mappers;

use App\DTO\UsuarioDTO;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserMapper{
    public static function dtoToModel(UsuarioDTO $usuarioDTO): User
    {
        $user = new User();
        $user->name = $usuarioDTO->name;
        $user->email = $usuarioDTO->email;
        $user->password = $usuarioDTO->password;
        $user->dni = $usuarioDTO->dni;
        $user->birth_date = $usuarioDTO->birth_date;
        $user->salary = $usuarioDTO->salary;
        return $user;
    }
    public static function fromRequestToDTO(UserRequest $userRequest): UsuarioDTO
    {
        return new UsuarioDTO(
            $userRequest->input('id', null),
            $userRequest->input('name', null),
            $userRequest->input('email', null),
            $userRequest->input('password', null),
            $userRequest->input('dni', null),
            $userRequest->input('birth_date', null),
            $userRequest->input('salary', null)
        );
    }

    public static function fromModelToDTO(User $user): UsuarioDTO
    {
        return new UsuarioDTO(
            $user->id,
            $user->name,
            $user->email,
            null,
            $user->dni,
            $user->birth_date,
            $user->salary
        );
    }

}