<?php

require 'vendor/autoload.php';


use controllers\UserController;
use database\Database;
use models\User;
use repo\implements\UserRepositoryImpl;
use services\implements\UserServiceImpl;

$database = Database::getInstance();
//$database->setConnectionInfo(host: '127.0.0.1', port: '3306', user: 'root', pass: '', dbname: 'my_db');
$userRepository = new UserRepositoryImpl($database);
$userService = new UserServiceImpl($userRepository);
$userController = new UserController($userService);

$user = new User("yacer", "yacer@gmail.com", 20);
print_r($userController->findAll());
print_r($userController->findById(2));
print_r($userController->findByUsername('yacer'));
print_r($userController->findByEmail('yacer@gmail.com'));
$userController->save($user);
$userController->update(1, $user);
$userController->delete(1);

