<?php

namespace App\View;

class FormView
{

    function renderForm($errorMessage = '')
    {
        echo '
        <form action="" method="post">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required><br><br>
            
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br><br>
            
            <label for="age">Âge :</label>
            <input type="number" name="age" id="age" required><br><br>
            
            <label for="abo1">
                <input type="radio" name="subscription" id="abo1" value="25" required>
                Formule à 25$
            </label><br>
            
            <label for="abo2">
                <input type="radio" name="subscription" id="abo2" value="45" required>
                Formule à 45$
            </label><br><br>
            
            <input type="submit" value="Envoyer">
        </form>';

        if ($errorMessage) {
            echo "<p>{$errorMessage}</p>";
        }
    }
}
