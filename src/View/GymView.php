<?php

namespace App\View;

use App\ViewModel\GymViewModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class GymView
{
    private $viewModel;
    private $twig;

    public function __construct(GymViewModel $viewModel)
    {
        $this->viewModel = $viewModel;
        $loader = new FilesystemLoader('templates/');
        $this->twig = new Environment($loader);
    }

    public function displayGymInfo()
    {
        $gymName = $this->viewModel->getGymName();
        $address = $this->viewModel->getAddress();
        $openingHours = $this->viewModel->getOpeningHours();

        echo $this->twig->render('gym_info.html.twig', [
            'gymName' => $gymName,
            'address' => $address,
            'openingHours' => $openingHours,
        ]);
    }

    public function displayMembers()
    {
        $members = $this->viewModel->getMembers();

        echo $this->twig->render('members.html.twig', [
            'members' => $members,
        ]);
    }

    public function displayClasses()
    {
        $classes = $this->viewModel->getClasses();

        echo $this->twig->render('classes.html.twig', [
            'classes' => $classes,
        ]);
    }
}

/*class GymView
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

        echo "<div>";
        echo "<p>Gym : <strong>$gymName </strong>";
        echo " - $address - ";
        echo "<i> $openingHours </i></p>";
        echo "</div>";
    }

    public function displayMembers()
    {
        $members = $this->viewModel->getMembers();

        echo "<div>";
        echo "<strong>Members:</strong>";
        echo "<ul>";
        foreach ($members as $member) {
            echo "<li>";
            echo "<p>" . $member->getName() . " - " . $member->getEmail() . " - " . $member->getAge() . "</p>";
            echo "<p>" . ($member->getMembership()->getStatus() ? 'Active' : 'Inactive') . " - " . $member->getMembership()->getPrice() . "</p>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    public function displayClasses()
    {
        $classes = $this->viewModel->getClasses();

        echo "<div>";
        echo "<strong>Classes:</strong>";
        echo "<ul>";
        foreach ($classes as $class) {
            echo "<li>";
            echo "<p>" . $class->getName() . " - " . $class->getInstructor() . " - " . $class->getSchedule() . "</p>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}
*/