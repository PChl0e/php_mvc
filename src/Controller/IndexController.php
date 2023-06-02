<?php

namespace App\Controller;

use App\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function home()
    {
        echo $this->twig->render('index.html.twig');
    }
}
