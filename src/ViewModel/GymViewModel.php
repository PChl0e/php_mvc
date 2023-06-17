<?php

namespace App\ViewModel;

use App\Model\Gym;

class GymViewModel
{
    private $gymModel;

    public function __construct(Gym $gymModel)
    {
        $this->gymModel = $gymModel;
    }

    public function getGymName()
    {
        return $this->gymModel->getName();
    }

    public function getAddress()
    {
        return $this->gymModel->getAddress();
    }

    public function getOpeningHours()
    {
        return $this->gymModel->getOpeningHours();
    }

    public function addMember($member)
    {
        $this->gymModel->addMember($member);
    }

    public function getMembers()
    {
        return $this->gymModel->getMembers();
    }

    public function addClass($class)
    {
        $this->gymModel->addClass($class);
    }

    public function getClasses()
    {
        return $this->gymModel->getClasses();
    }
}
