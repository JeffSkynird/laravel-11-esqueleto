<?php

namespace App\DTO;

class UsuarioDTO
{
    public ?int $id;
    public ?string $name;
    public ?string $email;
    public ?string $password;
    public ?string $dni;
    public ?string $birth_date;
    public ?float $salary;

    public function __construct(?int $id, ?string $name, ?string $email, ?string $password, ?string $dni, ?string $birth_date, ?float $salary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->dni = $dni;
        $this->birth_date = $birth_date;
        $this->salary = $salary;
    }

}