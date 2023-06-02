<?php

namespace App\Routing;

use Exception;

class RouteNotFoundException extends Exception
{

    public function _construct(string $uri, string $method)
    {
        $this->message . "La route pour l'url $uri (methode $method) n'a pas été trouvé";
    }
}
