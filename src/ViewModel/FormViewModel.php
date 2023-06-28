<?php

namespace App\ViewModel;

use App\Model\Form;
use App\View\FormView;

class FormViewModel
{
    private $formModel;

    public function __construct($formData)
    {
        $this->formModel = new Form($formData);
    }

    public function processForm()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formData = $_POST;
            $errorMessage = $this->validateFormData($formData);

            if ($errorMessage === '') {
                $formModel = new Form($formData);

                echo 'Succès';
                return $formModel->getValues();
            } else {
                echo $errorMessage;
                exit;
            }
        }
    }

    private function validateFormData($formData)
    {
        $errorMessage = '';

        if (empty($formData['name']) || empty($formData['email']) || empty($formData['age']) || empty($formData['subscription'])) {
            $errorMessage = 'Veuillez remplir tous les champs obligatoires.';
        }

        if (!is_numeric($formData['age']) || $formData['age'] <= 0) {
            $errorMessage = 'L\'âge doit être un nombre positif.';
        }

        return $errorMessage;
    }
}
