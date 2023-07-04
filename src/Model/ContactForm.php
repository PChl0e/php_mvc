<?php

namespace App\Model;

class ContactForm extends Form
{
    private string $name;
    private string $email;
    private string $age;
    private string $subscription;

    public function __construct($formData)
    {
        parent::__construct($formData);

        $this->name = isset($formData['name']) ? $formData['name'] : '';
        $this->email = isset($formData['email']) ? $formData['email'] : '';
        $this->age = isset($formData['age']) ? $formData['age'] : '';
        $this->subscription = isset($formData['subscription']) ? $formData['subscription'] : '';
    }

    public function getRequiredFields()
    {
        return ['name', 'email', 'age', 'subscription'];
    }

    public function getValidationRule($field)
    {
        switch ($field) {
            case 'email':
                return 'email';
            default:
                return null;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSubscription()
    {
        return $this->subscription;
    }

    public function sendContactMessage()
    {
        // Construction du contenu du message
        $subject = 'Nouveau message de contact';
        $body = "Nom : " . $this->getName() . "\n";
        $body .= "Email : " . $this->getEmail() . "\n";
        $body .= "Age : " . $this->getAge() . "\n";
        $body .= "Subscription : " . $this->getSubscription() . "\n";

        // Envoi du message par e-mail
        $to = 'votre-email@example.com';
        $headers = "From: " . $this->getEmail() . "\r\n";
        $headers .= "Reply-To: " . $this->getEmail() . "\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo 'Le message de contact a été envoyé avec succès.';
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi du message de contact.';
        }
    }
}
