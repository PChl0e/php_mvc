# Projet PHP

## Modèle MVVM

La première fonctionnalité que nous avons décidé de faire et la restructuration du modèle MVC. Nous avons décidé de baser de projet sur un modèle MVVM (Model - View - ViewModel), celui-ci permet la séparation claire des différentes couches. Le modèle gère les données et la logique métier, la vue se concentre sur l'interface utilisateur, tandis que le VueModèle agit comme un lien entre les deux. De plus, ce modèle permet de faciliter la réutilisation du code, le VueModèle peut être développé indépendamment et être associé à d'autres interfaces utilisateurs.

### Première problématique

Le premier problème rencontré est la compréhension du modèle MVVM, en effet Michaël connait bien ce modèle car il l'utilise dans son travail en entreprise. Cependant Chloé n'avait jamais développé sur ce modèle. Elle a donc du se documenter sur le principe afin de la comprendre et de pouvoir réalisé le travail demandé.

## Notre implémentation

On a choisit de développer ce modèle sur la notion de salle de sport. Nous avons implémenté un modèle représentant une salle de sport qui porte ces attributs qui la définit. Puis nous avons ajouter une Vue et une VueModèle, notre VueModèle porte un attribut de notre Modèle Gym, et c'est notre Vue qui va porter la VueModèle pour ensuite afficher les infos nécessaires
