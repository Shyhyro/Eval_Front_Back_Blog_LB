<?php

class UserController
{

    /**
     * Search a User in table user
     * @param $username
     * @return User
     */
    public function logUser($username): ?User
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM user  WHERE username = '$username' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password'], $userData['email'], $userData['role_fk']);
        }
        else {
            $user = null;
        }
        return $user;
    }

    /**
     * Search a User in table user
     * @param $id
     * @return User
     */
    public function searchUser($id): ?User
    {
        $stmt = DB::getInstance()->prepare("SELECT * FROM user  WHERE id = '$id' LIMIT 1");
        $state = $stmt->execute();
        if($state) {
            $userData = $stmt->fetch();
            $user = new User($userData['id'], $userData['username'], $userData['password'], $userData['email'], $userData['role_fk']);
        }
        else {
            $user = null;
        }
        return $user;
    }

    /*
     * Add a new user in table user
     */
    public function addUser($username, $password, $email) :bool
    {
        $stmt = DB::getInstance()->prepare("INSERT INTO user (username, password, email, role_fk) VALUES ('$username', '$password', '$email', '2')");
        return $stmt->execute();
    }

}
