-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 19 avr. 2020 à 19:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ptut`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `pass_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ADMIN`
--

INSERT INTO `ADMIN` (`id_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'yazidkherrati@gmail.Com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `INSTALLER`
--

CREATE TABLE `INSTALLER` (
  `id` int(11) NOT NULL,
  `Id_log` int(11) NOT NULL,
  `Id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `INSTALLER`
--

INSERT INTO `INSTALLER` (`id`, `Id_log`, `Id_salle`) VALUES
(2, 3, 4),
(3, 3, 5),
(4, 27, 4),
(5, 27, 5),
(6, 28, 4),
(7, 28, 5),
(8, 29, 4),
(9, 29, 5),
(10, 30, 4),
(11, 31, 4),
(12, 31, 5),
(13, 0, 4),
(14, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `LOGICIEL`
--

CREATE TABLE `LOGICIEL` (
  `Id_log` int(11) NOT NULL,
  `Web_log` varchar(50) DEFAULT NULL,
  `Nom_log` varchar(50) DEFAULT NULL,
  `Dev_log` varchar(50) DEFAULT NULL,
  `type_log` varchar(50) DEFAULT NULL,
  `Lic_log` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LOGICIEL`
--

INSERT INTO `LOGICIEL` (`Id_log`, `Web_log`, `Nom_log`, `Dev_log`, `type_log`, `Lic_log`) VALUES
(6, 'https://acrobat.adobe.com/', 'Test', 'Adobe', 'Logiciel', 'Propriétaire'),
(7, 'http://developer.android.com/sdk/', 'Androïd Studio', 'Google', 'Logiciel', 'Apache 2.0'),
(8, 'http://chrome.com/', 'Google Chrome', 'Google', 'Logiciel', 'Propriétaire'),
(29, 'dsqdqsdqs', 'PTUT', 'dsqd', 'Plugin', 'dsqd'),
(31, 'https://acrobat.adobe.com/', 'Blender', 'dqsdqsd', 'Plugin', 'GPU');

-- --------------------------------------------------------

--
-- Structure de la table `SALLE`
--

CREATE TABLE `SALLE` (
  `id_salle` int(11) NOT NULL,
  `Nom_salle` varchar(50) DEFAULT NULL,
  `Type_salle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `SALLE`
--

INSERT INTO `SALLE` (`id_salle`, `Nom_salle`, `Type_salle`) VALUES
(5, 'TP2', 'tp'),
(8, 'TDM3', 'tdm');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `id_usr` int(11) NOT NULL,
  `nom_usr` varchar(50) DEFAULT NULL,
  `prnm_usr` varchar(50) DEFAULT NULL,
  `statut_usr` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`id_usr`, `nom_usr`, `prnm_usr`, `statut_usr`) VALUES
(4, 'yazid', 'kherrati', ''),
(5, 'jhon', 'doe', ''),
(6, 'test', 'test2', ''),
(7, 'kkljj', 'ljlkjk', 'Enseignant'),
(8, 'dsqd', 'dsqdqs', 'Enseignant'),
(9, 'cqsc', 'dsqdqsd', NULL),
(10, 'dsqd', 'dsqdqs', 'Chercheur'),
(11, 'dqsd', 'dsqdqsd', 'Chercheur');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISER`
--

CREATE TABLE `UTILISER` (
  `id` int(11) NOT NULL,
  `Id_usr` int(11) NOT NULL,
  `Id_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `UTILISER`
--

INSERT INTO `UTILISER` (`id`, `Id_usr`, `Id_log`) VALUES
(1, 4, 9),
(2, 5, 9),
(3, 4, 30),
(4, 5, 30),
(5, 4, 31),
(6, 5, 31),
(7, 4, 0),
(8, 5, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `INSTALLER`
--
ALTER TABLE `INSTALLER`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `LOGICIEL`
--
ALTER TABLE `LOGICIEL`
  ADD PRIMARY KEY (`Id_log`);

--
-- Index pour la table `SALLE`
--
ALTER TABLE `SALLE`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  ADD PRIMARY KEY (`id_usr`);

--
-- Index pour la table `UTILISER`
--
ALTER TABLE `UTILISER`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `INSTALLER`
--
ALTER TABLE `INSTALLER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `LOGICIEL`
--
ALTER TABLE `LOGICIEL`
  MODIFY `Id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `SALLE`
--
ALTER TABLE `SALLE`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `UTILISATEUR`
--
ALTER TABLE `UTILISATEUR`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `UTILISER`
--
ALTER TABLE `UTILISER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
