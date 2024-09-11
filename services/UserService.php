<?php

namespace services;

use models\User;

interface UserService
{
    /**
     * @return array<User>|null
     */
    public function findAll() : ?array;

    /**
     * @param string $email
     * @return User|null
     */
    public function findById(string $email) : ?User ;

    /**
     * @param string $username
     * @return User|null
     */
    public function findByUsername(string $username) : ?User;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email) : ?User;

    /**
     * @param User $user
     * @return User|null
     */
    public function save(User $user): ?User;

    /**
     * @param User $user
     * @param int $id
     * @return User|null
     */
    public function update(int $id , User $user): ?User;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

}
