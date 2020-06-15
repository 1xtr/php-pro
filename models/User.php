<?php


namespace app\models;

class User extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $email;

    public function getTableName(): string
    {
        return 'users';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): User
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): User
    {
        $this->email = $email;
        return $this;
    }

}