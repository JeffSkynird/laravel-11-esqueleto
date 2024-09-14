<?php

namespace App\Services;

use App\DTO\UsuarioDTO;
use App\Events\UserEvent;
use App\Http\Requests\UserRequest;
use App\Mappers\UserMapper;
use App\Models\User;
use App\Utils\validations\UserValidation;
use Illuminate\Http\JsonResponse;

class SinglentonService
{
    public function callAPI(): JsonResponse
    {
        event(new UserEvent(['name' => 'John Doe']));
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($response->getBody()->getContents());
        return response()->json($posts);
    }
}
