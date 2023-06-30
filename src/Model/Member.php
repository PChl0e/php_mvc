<?php

namespace App\Model;

class Member
{
    private int $id;
    private string $name;
    private string $email;
    private int $age;
    private Membership $membership;

    public function __construct($name, $email, $age)
    {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        return $this->email = $email;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        return $this->age = $age;
    }

    public function setMembership(Membership $membership)
    {
        $this->membership = $membership;
    }

    public function getMembership()
    {
        return $this->membership;
    }
}
