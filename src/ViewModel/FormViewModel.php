<?php

namespace App\ViewModel;

abstract class FormViewModel
{
    protected $formModel;

    public function __construct($formData)
    {
        $this->formModel = $this->Form($formData);
    }

    public function processForm()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formData = $_POST;
            $errorMessage = $this->validateFormData($formData);

            if ($errorMessage === '') {
                $formModel = $this->Form($formData);

                echo 'Succès';
                return $formModel->getValues();
            } else {
                echo $errorMessage;
                exit;
            }
        }
    }

    protected abstract function Form($formData);

    protected abstract function validateFormData($formData);
}
