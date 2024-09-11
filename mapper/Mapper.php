<?php

namespace mapper;

use models\User;
use PDOStatement;
class Mapper
{

    /**
     * @param $record
     * @return User
     */
    public static function recordToUser($record) : User{
        return new User(
            $record['username'] ?? null,
            $record['email'] ?? null,
            $record['age'] ?? null,
        );
    }
}
