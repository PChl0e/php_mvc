<?php

namespace App\Controller;

use App\ViewModel\GymViewModel;
use App\Model\Member;
use App\Model\Classe;

class GymController
{
    private $viewModel;

    public function __construct(GymViewModel $viewModel)
    {
        $this->viewModel = $viewModel;
    }

    public function addMember(Member $member)
    {
        $this->viewModel->addMember($member);
    }

    public function addClass(Classe $class)
    {
        $this->viewModel->addClass($class);
    }
}
