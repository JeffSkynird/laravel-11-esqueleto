<?php 

namespace App\DTO;

class GenericListResponse
{
    public string $message;
    public string $status;
    public array $data;

    public function __construct(string $message, string $status, array $data)
    {
        $this->message = $message;
        $this->status = $status;
        $this->data = $data;
    }
}