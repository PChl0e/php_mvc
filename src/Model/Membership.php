<?php

namespace App\Model;

use DateTime;

class Membership
{
    private bool $status;
    private string $price;

    public function __construct($status, $price)
    {
        $this->status = $status;
        $this->price = $price;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(bool $status)
    {
        return $this->status = $status;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(string $price)
    {
        return $this->price = $price;
    }
}
