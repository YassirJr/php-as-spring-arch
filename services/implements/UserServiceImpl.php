<?php

namespace services\implements;

use models\User;
use repo\implements\UserRepositoryImpl;
use services\UserService;

class UserServiceImpl implements UserService
{
    private UserRepositoryImpl $userRepository;

    public function __construct(UserRepositoryImpl $userRepository){
        $this->userRepository = $userRepository;
    }

    /**
     * @return array|User[]|null
     */
    public function findAll(): ?array
    {
        return $this->userRepository->findAll();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findById(string $email): ?User
    {
        return $this->userRepository->findById($email);
    }

    /**
     * @param string $username
     * @return User|null
     */
    public function findByUsername(string $username): ?User
    {
        return $this->userRepository->findByUsername($username);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function save(User $user): ?User
    {
        return $this->userRepository->save($user);
    }

    /**
     * @param int $id
     * @param User $user
     * @return User|null
     */
    public function update(int $id , User $user): ?User
    {
        return $this->userRepository->update($id , $user);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

}
