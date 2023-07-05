<?php

namespace App\ViewModel;

use App\Model\MemberForm;

class MemberFormViewModel extends AbstractFormViewModel
{
    protected function Form($formData)
    {
        return new MemberForm($formData);
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

        if ($errorMessage === '') {
            if (!is_numeric($formData['age']) || $formData['age'] <= 0) {
                $errorMessage = 'L\'âge doit être un nombre positif.';
            }elseif($formData['age'] < 16){
                $errorMessage = 'Désolé, vous devez au moins avoir 16 ans pour pouvoir vous inscrire.';
            }
        }

        return $errorMessage;
    }
}
