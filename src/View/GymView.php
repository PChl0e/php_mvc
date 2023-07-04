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
        $gym = $this->viewModel->getGym(1);

        echo $this->twig->render('gym_info.html.twig', [
            'gym' => $gym,
        ]);
    }

    public function displayMembers()
    {
        $members = $this->viewModel->getMembers(1);

        echo $this->twig->render('members.html.twig', [
            'members' => $members,
        ]);
    }

    public function displayClasses()
    {
        $classes = $this->viewModel->getClasses(1);

        echo $this->twig->render('classes.html.twig', [
            'classes' => $classes,
        ]);
    }
}
