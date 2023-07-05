<?php

namespace App\ViewModel;

use App\Model\Form;

class AbsFormViewModel extends FormViewModel 
{
    protected function Form($formData)
    {
        return new Form($formData);
    }

    protected function validateFormData($formData)
    {
        $errorMessage = '';

        // Récupérer la liste des champs requis à partir du modèle de formulaire
        $requiredFields = $this->formModel->getRequiredFields();

        // Vérifier si tous les champs requis sont présents dans les données du formulaire
        foreach ($requiredFields as $field) {
            if (empty($formData[$field])) {
                $errorMessage = 'Veuillez remplir tous les champs obligatoires.';
                break;
            }
        }

        // Vérifier des règles de validation spécifiques pour chaque champ
        if ($errorMessage === '') {
            foreach ($formData as $field => $value) {
                $validationRule = $this->formModel->getValidationRule($field);

                if ($validationRule === 'numeric' && (!is_numeric($value) || $value <= 0)) {
                    $errorMessage = 'L\'âge doit être un nombre positif.';
                    break;
                }
            }
        }

        return $errorMessage;
    }
}


// Utilisation de la classe MyFormViewModel
$myFormViewModel = new AbsFormViewModel($formData);
$myFormViewModel->processForm();
