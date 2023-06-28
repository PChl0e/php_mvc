<?php

namespace App\Model;

use App\Model\Member;
use App\Model\Classe;

class Gym
{
    private $gymName;
    private $address;
    private $openingHours;
    private $members;
    private $classes;

    public function __construct($gymName, $address, $openingHours)
    {
        $this->gymName = $gymName;
        $this->address = $address;
        $this->openingHours = $openingHours;
        $this->members = [];
        $this->classes = [];
    }

    public function getName()
    {
        return $this->gymName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    public function addMember(Member $member)
    {
        $this->members[] = $member;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function addClass(Classe $class)
    {
        $this->classes[] = $class;
    }

    public function getClasses()
    {
        return $this->classes;
    }
}
