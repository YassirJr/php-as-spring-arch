<?php

namespace controllers;

use models\User;
use services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return array<User>
     */
    public function findAll(): array
    {
        return $this->userService->findAll();
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return $this->userService->findById($id);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->userService->findByEmail($email);
    }

    /**
     * @param string $username
     * @return User|null
     */
    public function findByUsername(string $username): ?User
    {
        return $this->userService->findByUsername($username);
    }

    /**
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        return $this->userService->save($user);
    }

    /**
     * @param int $id
     * @param User $user
     * @return User
     */
    public function update(int $id, User $user): User
    {
        return $this->userService->update($id, $user);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->userService->delete($id);
    }
}
