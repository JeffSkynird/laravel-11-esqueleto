<?php

namespace App\Services;

use App\DTO\UsuarioDTO;
use App\Http\Requests\UserRequest;
use App\Mappers\UserMapper;
use App\Models\User;
use App\Utils\validations\UserValidation;

class UserService
{
    public function create(UserRequest $userRequest): UsuarioDTO
    {
        $usuarioDTO = UserMapper::fromRequestToDTO($userRequest);

        UserValidation::validateUser($usuarioDTO, false);

        $user = UserMapper::dtoToModel($usuarioDTO);
        $user->save();

        return UserMapper::fromModelToDTO($user);
    }

    public function update(UserRequest $userRequest, int $id): UsuarioDTO
    {
        $usuarioDTO = UserMapper::fromRequestToDTO($userRequest);
        $usuarioDTO->id = $id;

        UserValidation::validateUser($usuarioDTO, true);

        $user = User::find($id);
        $user->fill(array_filter((array)  $usuarioDTO));
        $user->save();

        return UserMapper::fromModelToDTO($user);
    }

    public function findAll(): array
    {
        $users = User::all();
        $usersDTO = [];
        return $users->map(function ($user) {
            return UserMapper::fromModelToDTO($user);
        })->toArray();
        return $usersDTO;
    }

    public function findByPage(int $perPage = 10)
    {
        // Paginar los usuarios
        $users = User::paginate($perPage);

        // Mapear los usuarios a DTO
        $usersDTO = $users->getCollection()->map(function ($user) {
            return UserMapper::fromModelToDTO($user);
        });

        // Retornar la paginación con los DTOs
        return [
            'data' => $usersDTO->toArray(),
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'next_page_url' => $users->nextPageUrl(),
                'prev_page_url' => $users->previousPageUrl(),
            ],
        ];
    }

    public function delete($id){
        UserValidation::validateDeleteUser($id);
        User::destroy($id);
    }
}
