<?php

class User
{
    private ?int $id;
    private ?string $username;
    private ?string $password;
    private ?string $email;
    private ?int $role;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $username
     * @param string|null $password
     * @param string|null $email
     * @param string|null $role
     */
    public function __construct(int $id = null, string $username = null, string $password = null, string $email = null, int $role = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return username
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the username of User
     * @param string|null $username
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;
        return $this;
    }


    /**
     * Return password
     * @return false|string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param false|string|null $password
     */
    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Return email
     * @return false|string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the email of User
     * @param false|string|null $email
     */
    public function setEmail($email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Return role
     * @return false|string|null
     */
    public function getRole(): ?int
    {
        return $this->role;
    }

    /**
     * Set the role of User
     * @param false|string|null $role
     */
    public function setRole($role): User
    {
        $this->role = $role;
        return $this;
    }

}