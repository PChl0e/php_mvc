<?php

namespace App\Model;

class Member
{
    private string $name;
    private string $email;
    private int $age;
    private Membership $membership;

    public function __construct($name, $email, $age, $membership)
    {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->membership = $membership;
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
