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
        $gym = $this->viewModel->getGyms();

        echo $this->twig->render('gym_info.html.twig', [
            'gym' => $gym[0],
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
