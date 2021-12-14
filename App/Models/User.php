<?php

namespace App\Models;

use App\Database\DB;

class User
{
    private string $name;
    private string $email;
    private string $country;
    private string $password;

    public function login($data)
    {
        $connection = (new DB)->getConnection();
        $query = "select email, password, id from users where email=:email limit 1";
        $stmt = $connection->prepare($query);

        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->password = htmlspecialchars(strip_tags($data['password']));

        $stmt->bindParam(":email", $this->email);

        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($result && password_verify($this->password, $result['password'])) {
            return $result['id'];
        }
        return false;
    }

    public function create($data)
    {
        $connection = (new DB)->getConnection();

        $query = "INSERT INTO users(name, email, password, country)
            VALUES(:name, :email, :password, :country);";

        $stmt = $connection->prepare($query);

        $this->name = htmlspecialchars(strip_tags($data['name']));
        $this->email = htmlspecialchars(strip_tags($data['email']));
        $this->password = htmlspecialchars(strip_tags($data['password']));
        $this->country = htmlspecialchars(strip_tags($data['country']));

        $this->password =  password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":country", $this->country);

        if ($stmt->execute()) {
            return $connection->lastInsertId();
        }
        return false;
    }

    public function select($id)
    {
        $connection = (new DB)->getConnection();
        $query = "SELECT name, country, email FROM users WHERE id=:id LIMIT 1";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":id", $id);      
        if ($stmt->execute()) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }
}
