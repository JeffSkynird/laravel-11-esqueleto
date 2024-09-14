<?php 

namespace App\DTO;

class GenericErrorResponse
{
    public string $message;
    public string $status;
    public array $errors; 

    public function __construct(string $message, string $status, array $errors)
    {
        $this->message = $message;
        $this->status = $status;
        $this->errors = $errors;
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'status' => $this->status,
            'errors' => $this->errors,
        ];
    }
}
