<?php 

namespace App\DTO;

class GenericBasicResponse
{
    public string $message;
    public string $status;
    public ?Object $data;

    public function __construct(string $message, string $status, ?Object $data)
    {
        $this->message = $message;
        $this->status = $status;
        $this->data = $data;
    }
}