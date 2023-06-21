<?php

namespace App\Model;

class Form
{

    private string $name;
    private string $email;
    private int $age;
    private $subscription;

    public function __construct($formData)
    {
        $this->name = isset($formData['name']) ? $formData['name'] : '';
        $this->email = isset($formData['email']) ? $formData['email'] : '';
        $this->age = isset($formData['age']) ? $formData['age'] : 0;
        $this->subscription = isset($formData['subscription']) ? $formData['subscription'] : '';
    }

    public function getValues()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'age' => $this->age,
            'subscription' => $this->subscription
        ];
    }
}
