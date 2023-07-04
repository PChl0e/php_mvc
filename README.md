# Projet PHP

## Modèle MVVM

La première fonctionnalité que nous avons décidé de faire et la restructuration du modèle MVC. Nous avons décidé de baser de projet sur un modèle MVVM (Model - View - ViewModel), celui-ci permet la séparation claire des différentes couches. Le modèle gère les données et la logique métier, la vue se concentre sur l'interface utilisateur, tandis que le VueModèle agit comme un lien entre les deux. De plus, ce modèle permet de faciliter la réutilisation du code, le VueModèle peut être développé indépendamment et être associé à d'autres interfaces utilisateurs.

### Première problématique

Le premier problème rencontré est la compréhension du modèle MVVM, en effet Michaël connait bien ce modèle car il l'utilise dans son travail en entreprise. Cependant Chloé n'avait jamais développé sur ce modèle. Elle a donc du se documenter sur le principe afin de la comprendre et de pouvoir réalisé le travail demandé.

## Notre base d'implémentation

On a choisit de développer ce modèle sur la notion de salle de sport. Nous avons implémenté un modèle représentant une salle de sport qui porte ces attributs qui la définit. Puis nous avons ajouter une Vue et une VueModèle, notre VueModèle porte un attribut de notre Modèle Gym, et c'est notre Vue qui va porter la VueModèle pour ensuite afficher les infos nécessaires. On a ensuite ajouter d'autre modèle afin de faire vivre notre salle de sport, nous avons mis en place des membres, des abonnements ainsi que des cours. Nous partons du principe que nous gérer une et une seule salle de sport mais notre implémentation peut s'adapter pour la gestion de plusieurs salles

### Seconde problématique

Nous ne savions pas trop où placer notre gestion des données afin d'ajouter une nouveau membre, d'afficher les informations concernant la salle, etc. Pour cela nous avons d'abord créer une extension de nos Model mais cela ammener vite à la confusion. En effet nous avions une classe Gym qui est une représentation de la table gym en BDD et une classe GymModel qui permettait de manipuler les données. Cependant nous nous sommes vite perdu, nous avons décidé de créer une couche supplémentaire qui est la couche Repository. Cette couche permet de faire le lien entre notre Model et notre ViewModel, c'est la couche qui permet de manipuler les données.
Notre structure d'implementation ressemble maintenant à ça : Model -> Repository -> ViewModel -> View

## La gestion de formulaire

## L'affichage

Pour gérer les différentes vues nous avons utiliser twig, qui est un moteur de template qui permet d'insérer des variables, des boucles, des conditions et d'autres fonctionnalités logiques dans les modèles. Il facilite la création de modèles HTML dynamiques et réutilisables. Nous avons dons créer 3 templates pour les différentes informations que nous avons à afficher.

## Conclusion

### A FAIRE

-Gestion BDD -> en cours
-Utiliser twig pour les templates -> ok
-class abstraite form puis faire des classe spécifique qui étendent de cette classe -> en cours
