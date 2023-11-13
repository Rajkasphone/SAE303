-- Création de la base de données s'il n'existe pas
CREATE DATABASE IF NOT EXISTS sae303;

-- Sélection de la base de données
USE sae303;

-- Table pour les utilisateurs (intervenants et spectateurs)
CREATE TABLE `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table pour les intervenants
CREATE TABLE `intervenant` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `horaire` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table pour les spectateurs
CREATE TABLE `spectateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tribune` enum('haut', 'bas') NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
