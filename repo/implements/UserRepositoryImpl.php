<?php

namespace repo\implements;

use database\Database;
use mapper\Mapper;
use models\User;
use PDO;
use repo\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    private Database $db;
    private PDO $pdo;

    public function __construct(Database $db){
        $this->db = $db::getInstance();
        $this->pdo = $this->db->connect();
    }

    /**
     * @return User[]
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? Mapper::recordToUser($row) : null;
    }

    /**
     * @param string $username
     * @return User|null
     */
    public function findByUserName(string $username): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? Mapper::recordToUser($row) : null;
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? Mapper::recordToUser($row) : null;
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function save(User $user): ?User
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, age) VALUES (:username, :email, :age)");
        $result = $stmt->execute([
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':age' => $user->getAge()
        ]);

        return $result && $stmt->rowCount() > 0 ? $user : null;
    }

    /**
     * @param int $id
     * @param User $user
     * @return User|null
     */
    public function update(int $id, User $user): ?User
    {
        $stmt = $this->pdo->prepare("UPDATE users SET username = :username, email = :email, age = :age WHERE id = :id");
        $result = $stmt->execute([
            ':id' => $id,
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':age' => $user->getAge()
        ]);

        return $result && $stmt->rowCount() > 0 ? $user : null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $result = $stmt->execute([":id" => $id]);
        return $result && $stmt->rowCount() > 0;
    }
}
