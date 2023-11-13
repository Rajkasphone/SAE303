-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 nov. 2023 à 14:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae303`
--

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `id` int(255) NOT NULL,
  `id_utilisateur` int(255) NOT NULL,
  `horaire` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`id`, `id_utilisateur`, `horaire`) VALUES
(3, 51, '2025-05-15 19:49:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `spectateur`
--

CREATE TABLE `spectateur` (
  `id` int(255) NOT NULL,
  `id_utilisateur` int(255) NOT NULL,
  `tribune` enum('haut','bas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spectateur`
--

INSERT INTO `spectateur` (`id`, `id_utilisateur`, `tribune`) VALUES
(7, 52, 'bas'),
(8, 53, 'bas'),
(11, 56, 'haut');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `uid` int(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `type_utilisateur` enum('intervenant','spectateur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`uid`, `nom_utilisateur`, `mot_de_passe`, `uemail`, `type_utilisateur`) VALUES
(51, 'caca', '$2y$10$HT3mRSlQe3htIE.U4pvxiu3BDXf.XEY3WXdXOl8Ct2/oEYVr86mMm', 'cacac@mail.fr', 'intervenant'),
(52, 'spzcrgreg', '$2y$10$YUtymjdQA6V.J854PIt9gO5ELEC4fUEDQoVVGwCP8WOqzEPL3MoD.', 'spec@mail.fr', 'spectateur'),
(53, 'caaca', '$2y$10$HSfhIyzZVlBgQ8RUz22igu6KEuaHZOpmt4ejd.jkEGm017pZbwVnS', 'quincygregoire@gmail.com', 'spectateur'),
(56, 'rgfrgf', '$2y$10$GQsqe6hazS1Hx5K3eYqLMuAUmxY4kB8And22SFnk0.RJkestrKvAO', 'quincygregoire@gmail.com', 'spectateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intervenant_ibfk_1` (`id_utilisateur`);

--
-- Index pour la table `spectateur`
--
ALTER TABLE `spectateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spectateur_ibfk_1` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `spectateur`
--
ALTER TABLE `spectateur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD CONSTRAINT `intervenant_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `spectateur`
--
ALTER TABLE `spectateur`
  ADD CONSTRAINT `spectateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
