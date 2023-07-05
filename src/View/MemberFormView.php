<?php

namespace App\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MemberFormView
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('templates/');
        $this->twig = new Environment($loader);
    }

    function renderForm($errorMessage = '')
    {
        echo $this->twig->render('member_form.html.twig', [
            'errorMessage' => $errorMessage,
        ]);
    }
}
