<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function createUser($data)
    {
        if(trim($data['name']) ==='' || trim($data['password']) ==='' || trim($data['email']) ==='' || trim($data['country']) ==='') {
            throw new  \Exception("Все поля объязательны");
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Неверный email');
        }
        $id = (new User)->create($data);
        if($id) {
            session_start();
            $_SESSION['user_id'] = $id;
            header('Location: /account/');
        }
    }

    public function loginVerify($data)
    {
        if($data['password'] ==='' || $data['email'] ==='') {
            throw new  \Exception("Все поля объязательны");
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Неверный формат email');
        }
        $id = (new User)->login($data);
        if($id) {
            session_start();
            $_SESSION['user_id'] = $id;
            header('Location: /account/');
        } else {
            throw new \Exception('Неверный email или пароль');
        }
    }
}