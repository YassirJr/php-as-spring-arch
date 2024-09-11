<?php

namespace repo;

use models\User;

interface UserRepository
{
    /**
     * @return array<User>
     */
    public function findAll() : array;

    /**
     * @param int $id
     * @return User|null
     */
    public function findById(int $id) : ?User;

    /**
     * @param string $username
     * @return User|null
     */
    public function findByUserName(string $username): ?User;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * @param User $user
     * @return User|null
     */
    public function save(User $user) : ?User;


    /**
     * @param int $id
     * @param User $user
     * @return User|null
     */
    public function update(int $id , User $user) : ?User;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool;


}


