<?php

namespace models;

class User
{
    private string $username;
    private string $email;
    private int $age;

    public function __construct(string $name, string $email, int $age){
        $this->username = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

}
