<?php

namespace App\View;

use App\ViewModel\GymViewModel;

class GymView
{
    private $viewModel;

    public function __construct(GymViewModel $viewModel)
    {
        $this->viewModel = $viewModel;
    }

    public function displayGymInfo()
    {
        $gymName = $this->viewModel->getGymName();
        $address = $this->viewModel->getAddress();
        $openingHours = $this->viewModel->getOpeningHours();

        echo "Gym Name: $gymName\n";
        echo "Address: $address\n";
        echo "Opening Hours: $openingHours\n";
        echo "\n";
    }

    public function displayMembers()
    {
        $members = $this->viewModel->getMembers();

        echo "Members:\n";
        foreach ($members as $member) {
            echo "- Name: " . $member->getName() . "\n";
            echo "  Email: " . $member->getEmail() . "\n";
            echo "  Age: " . $member->getAge() . "\n";
            echo "  Membership Status: " . ($member->getMembership()->getStatus() ? 'Active' : 'Inactive') . "\n";
            echo "  Membership Price: " . $member->getMembership()->getPrice() . "\n";
            echo "\n";
        }
    }

    public function displayClasses()
    {
        $classes = $this->viewModel->getClasses();

        echo "Classes:\n";
        foreach ($classes as $class) {
            echo "- Name: " . $class->getName() . "\n";
            echo "  Instructor: " . $class->getInstructor() . "\n";
            echo "  Schedule: " . $class->getSchedule() . "\n";
            echo "\n";
        }
    }
}
