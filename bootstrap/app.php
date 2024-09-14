<?php

use App\DTO\GenericErrorResponse;
use App\Exceptions\CustomException;
use App\Http\Middleware\CheckSalary;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
    })
    ->withExceptions(function (Exceptions $exceptions) {
         // Para manejar excepciones personalizadas
         $exceptions->render(function (CustomException $e, Request $request) {
            Log::info('CUSTOM ERROR');
            Log::info($e->getMessage());
            $errorResponse = new GenericErrorResponse(
                'Error occurred',
                (string) $e->getCode() ?: '500',  // Convertir el código en string o usar 500 por defecto
                [$e->getMessage()]  // Pasar el mensaje de error en un array
            );
            
            return response()->json($errorResponse, 500);
        });

        // Para manejar excepciones globales
        $exceptions->render(function (Throwable $e, Request $request) {
            Log::info('GLOBAL ERROR');
            Log::info($e->getMessage());
            $errorResponse = new GenericErrorResponse(
                'Internal server error',
                '500',  // Convertir el código en string o usar 500 por defecto
                [$e->getMessage()]  // Pasar el mensaje de error en un array
            );

            return response()->json($errorResponse, 500);  // Si no hay código, usar 500 por defecto
        });
    })->create();
