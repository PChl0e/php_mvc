# Projet PHP
PISCERI Chloé, YAROMISHYAN Michael

## Modèle MVVM

La première fonctionnalité que nous avons décidé de mettre en place dans notre projet est la restructuration du modèle MVC existant. Nous avons opté pour l'adoption du modèle MVVM (Modèle - Vue - VueModèle) qui offre une séparation claire des différentes couches.

Dans ce nouveau modèle, le rôle du modèle est de gérer les données et d'implémenter la logique métier de notre application. Il s'agit de la couche qui interagit avec la base de données et effectue les opérations nécessaires sur les données. La vue, quant à elle, est chargée de l'interface utilisateur, de l'affichage des données et de la réception des actions de l'utilisateur. Son objectif principal est de présenter les informations de manière claire et conviviale. Le VueModèle agit comme un intermédiaire entre le modèle et la vue. Il sert de lien entre ces deux parties et permet de gérer les interactions entre elles. Il expose les données et les fonctionnalités nécessaires à l'affichage et à la modification des données, tout en évitant un couplage trop fort entre la vue et le modèle.

L'un des avantages majeurs de l'utilisation du modèle MVVM est sa capacité à faciliter la réutilisation du code. En effet, le VueModèle peut être développé indépendamment et associé à différentes interfaces utilisateur, offrant ainsi une grande flexibilité dans la conception de l'application.

### Première problématique

Lorsque nous avons abordé la restructuration du modèle MVC vers le modèle MVVM, nous avons été confrontés à une première problémtique : la compréhension de ce dernier. Michaël possédait une expérience avec le modèle MVVM grâce à son travail en entreprise, tandis que Chloé n'était pas familière avec ce modèle. 

Par conséquent, Chloé a dû se documenter et se familiariser avec les principes du modèle MVVM afin de pouvoir effectuer le travail demandé. Elle a pris le temps de lire des ressources en ligne, des articles et des tutoriels pour comprendre les concepts et les mécanismes de ce modèle spécifique. Cela lui a permis d'acquérir les connaissances nécessaires pour aborder le développement selon le modèle MVVM. Au fur et à mesure de sa recherche et de sa compréhension, Chloé a pu appliquer les principes du modèle MVVM de manière appropriée dans notre projet. Notre équipe a pu travailler ensemble de manière efficace et réaliser avec succès la transition vers ce nouveau modèle.

## Notre base d'implémentation

Nous avons décidé de développer un modèle basé sur le sport, en utilisant la notion de salle de sport comme concept central. Nous avons commencé par implémenter un modèle "Gym" qui représente une salle de sport et qui contient les attributs qui la définissent, tels que le nom de la salle, l'adresse, etc. Ensuite, nous avons créé une Vue et un VueModèle pour notre application. Le VueModèle est lié à notre modèle "Gym" et la Vue est responsable de l'affichage des informations nécessaires en utilisant le VueModèle.

Par la suite, nous avons étendu notre implémentation en ajoutant d'autres modèles pour enrichir notre salle de sport. Nous avons introduit des modèles pour représenter les membres de la salle de sport, les abonnements disponibles ainsi que les cours proposés. Ces modèles complémentaires nous permettent de gérer les différentes entités présentes dans une salle de sport.

Il est important de souligner que notre implémentation actuelle suppose la gestion d'une seule salle de sport. Cependant, notre architecture peut facilement être adaptée pour prendre en charge la gestion de plusieurs salles de sport si nécessaire. Nous avons pris en compte cette possibilité lors de la conception de notre modèle afin de garantir une évolutivité future, on pourrait créer d'autres formulaires pour gérer la création de salle de sport, de cours.

### Seconde problématique

Initialement, nous étions incertains quant à l'emplacement approprié pour gérer nos données, que ce soit l'ajout d'un nouveau membre ou l'affichage des informations relatives à la salle de sport. Dans nos premières tentatives, nous avons créé une extension de nos modèles existants, mais cela a rapidement conduit à de la confusion. Nous avions une classe "Gym" qui représentait la table "gym" dans notre base de données, et une classe "GymModel" qui permettait de manipuler les données correspondantes. Cependant, cette approche nous a rapidement perdus.

Pour améliorer à cette situation, nous avons décidé de mettre en place une couche supplémentaire appelée "Repository". Cette couche agit comme un lien entre notre modèle et notre ViewModel, et c'est elle qui est responsable de la manipulation des données.
La structure de notre implémentation a donc évolué pour ressembler à ceci : Model -> Repository -> ViewModel -> View.

Maintenant, le modèle est responsable de la représentation des données et de la logique métier. Le repository, quant à lui, sert d'intermédiaire entre le modèle et le ViewModel, en fournissant des méthodes pour récupérer, enregistrer et manipuler les données. Le ViewModel utilise les fonctionnalités du repository pour obtenir les données nécessaires et les préparer pour l'affichage dans la vue.

Cette nouvelle structure nous a permis de mieux organiser notre code et de clarifier les responsabilités de chaque couche. Elle nous a également offert une meilleure séparation des préoccupations et une meilleure maintenabilité. Nous avons revisité le modèle MVVM.

#### Base de données

Vous trouverez un fichier sql "su_php_mvc.sql" qui est le code pour le création de notre base de données.

## La gestion de formulaire (troisième problématique)

La deuxième fonctionnalité que nous avons implémentée est la gestion des formulaires, dans le but de rendre notre gestion de salle de sport plus dynamique. Initialement, nous avons créé trois fichiers : FormViewModel, FormView et FormModel. Cependant, cette structure ne correspondait pas pleinement à notre objectif, car notre formulaire était spécifique à la gestion des membres.

Pour rendre nos formulaires plus génériques, nous avons créé des classes abstraites qui contiennent des méthodes abstraites. Cela permet à chaque classe qui hérite de ces classes abstraites de fournir sa propre implémentation spécifique. Cette approche nous permet de généraliser la gestion des formulaires, de sorte que chaque entité puisse avoir son propre code spécifique.

Ainsi, nous avons introduit une structure de classe générique pour la gestion des formulaires, permettant une meilleure réutilisabilité. Chaque formulaire hérite de la classe abstraite correspondante et fournit ses propres implémentations pour les méthodes abstraites.

Cette méthode nous permet de centraliser la logique de traitement des formulaires tout en conservant une flexibilité suffisante pour personnaliser le comportement en fonction des besoins spécifiques de chaque formulaire. Nous avons ainsi pu rendre notre gestion des formulaires plus efficace et maintenable, en évitant la duplication de code et en facilitant la gestion des différents formulaires de notre application de salle de sport.

## L'affichage

Nous avons choisi d'utiliser Twig pour gérer nos différentes vues. Twig est un moteur de template qui offre de nombreuses fonctionnalités, telles que l'insertion de variables, de boucles et de conditions, ce qui facilite la création de modèles HTML dynamiques et réutilisables. Avec Twig, nous avons pu développer nos modèles de manière plus efficace et modulaire. Nous avons créé trois templates distincts pour afficher les différentes informations requises. Chaque template correspond à une vue spécifique de notre application. Grâce à Twig, nous pouvons insérer facilement des variables dynamiques dans nos templates, ce qui nous permet de rendre les vues plus flexibles et adaptées aux données.

Nous avons pu créer des modèles HTML dynamiques et réutilisables, en insérant des variables, des boucles et des conditions selon nos besoins. Par exemple, pour le vue concernant les membres d'une salle de sport, nous donnons notre tableau qui contient la list des membres de la salle, nous effectuons une boucle sur tout nos éléments et pour chacun d'eux on affiche les données lui correspondant.

## Conclusion

En conclusion, la transition vers le modèle MVVM dans notre projet PHP a apporté une meilleure séparation des responsabilités, une réutilisabilité du code et une flexibilité dans la conception de l'application. Malgré quelques problématiques, nous avons réussi à s'adapter et à travailler efficacement avec ce modèle. L'utilisation de la couche Repository a facilité la gestion des données, tandis que l'approche générique des formulaires a rendu leur gestion plus efficace. L'utilisation de Twig comme moteur de template a permis un affichage flexible et réutilisable. Dans l'ensemble, l'utilisation du modèle MVVM a contribué au succès de notre projet de gestion de salle de sport et nous a aidé dans notre apprentissage du PHP.