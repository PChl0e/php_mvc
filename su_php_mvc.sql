-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 juil. 2023 à 22:56
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `su_php_mvc`
--

-- --------------------------------------------------------
--
-- Structure de la table `class`
--

CREATE TABLE `class` (
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `instructor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `schedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `id_gym` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id`, `name`, `instructor`, `schedule`, `id_gym`)
VALUES (
        1,
        'Yoga',
        'Alice Johnson',
        'Lundi, Mercredi, Vendredi 8h00',
        1
    ),
    (
        2,
        'Zumba',
        'Bob Thompson',
        'Mardi, Jeudi 17h00',
        1
    );
-- --------------------------------------------------------
--
-- Structure de la table `gym`
--

CREATE TABLE `gym` (
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `opening_hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Déchargement des données de la table `gym`
--

INSERT INTO `gym` (`id`, `name`, `adress`, `opening_hours`)
VALUES (
        1,
        'Fitness Center',
        '123 rue de la liberté',
        '7h00 - 21h00'
    );
-- --------------------------------------------------------
--
-- Structure de la table `member`
--

CREATE TABLE `member` (
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `age` int(11) NOT NULL,
    `id_membership` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `age`, `id_membership`)
VALUES (5, 'Jean Ten', 'j.ten@gmail.com', 53, 11),
    (12, 'Marc Eur', 'm.eur@gmail.com', 26, 18),
    (14, 'Guy Tard', 'g.tard@gmail.com', 18, 20);
-- --------------------------------------------------------
--
-- Structure de la table `membership`
--

CREATE TABLE `membership` (
    `id` int(11) NOT NULL,
    `status` tinyint(1) NOT NULL,
    `price` float NOT NULL,
    `id_gym` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
--
-- Déchargement des données de la table `membership`
--

INSERT INTO `membership` (`id`, `status`, `price`, `id_gym`)
VALUES (11, 1, 45, 1),
    (18, 1, 45, 1),
    (19, 1, 25, 1),
    (20, 1, 25, 1),
    (21, 1, 25, 1);
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `class`
--
ALTER TABLE `class`
ADD PRIMARY KEY (`id`),
    ADD KEY `fk_gym_c` (`id_gym`);
--
-- Index pour la table `gym`
--
ALTER TABLE `gym`
ADD PRIMARY KEY (`id`);
--
-- Index pour la table `member`
--
ALTER TABLE `member`
ADD PRIMARY KEY (`id`),
    ADD KEY `fk_membership` (`id_membership`);
--
-- Index pour la table `membership`
--
ALTER TABLE `membership`
ADD PRIMARY KEY (`id`),
    ADD KEY `fk_gym_m` (`id_gym`);
--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 17;
--
-- AUTO_INCREMENT pour la table `gym`
--
ALTER TABLE `gym`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;
--
-- AUTO_INCREMENT pour la table `membership`
--
ALTER TABLE `membership`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 22;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
ADD CONSTRAINT `fk_gym_c` FOREIGN KEY (`id_gym`) REFERENCES `gym` (`id`);
--
-- Contraintes pour la table `member`
--
ALTER TABLE `member`
ADD CONSTRAINT `fk_membership` FOREIGN KEY (`id_membership`) REFERENCES `membership` (`id`);
--
-- Contraintes pour la table `membership`
--
ALTER TABLE `membership`
ADD CONSTRAINT `fk_gym_m` FOREIGN KEY (`id_gym`) REFERENCES `gym` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;