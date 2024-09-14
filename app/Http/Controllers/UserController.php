<?php

namespace App\Http\Controllers;

use App\DTO\GenericBasicResponse;
use App\DTO\GenericListResponse;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create(UserRequest $userRequest): JsonResponse
    {
        $userDTO = $this->userService->create($userRequest);

        $responseDTO = new GenericBasicResponse(
            __('response.created',['entity'=>'User']), // message
            'success',                   // status
            $userDTO                     // UsuarioDTO object
        );
        return response()->json($responseDTO, 201);
    }

    public function update(UserRequest $userRequest, int $id): JsonResponse
    {
        Log::info('REQUEST');
        Log::info($userRequest);
        $userDTO = $this->userService->update($userRequest, $id);

        $responseDTO = new GenericBasicResponse(
            __('response.updated',['entity'=>'User']), // message
            'success',                   // status
            $userDTO                     // UsuarioDTO object
        );
        return response()->json($responseDTO, 200);
    }

    public function index(): JsonResponse
    {
        $responseDTO = new GenericListResponse(
            __('response.found',['entity'=>'Users']), // message
            'success',                   // status
            $this->userService->findAll()                     // UsuarioDTO object
        );
        return response()->json($responseDTO, 200);
    }

    public function paginate(Request $request): JsonResponse
    {
        $perPage = $request->query('perPage', 10);
        $responseDTO = new GenericListResponse(
            __('response.found',['entity'=>'Users']), // message
            'success',                   // status
            $this->userService->findByPage($perPage)                  
        );
        return response()->json($responseDTO, 200);
    }


    public function delete($id): JsonResponse
    {
        $this->userService->delete($id);
        $responseDTO = new GenericBasicResponse(
            __('response.deleted',['entity'=>'User']), // message
            'success',                   // status
            null                     // UsuarioDTO object
        );
        return response()->json($responseDTO, 200);
    }
}
