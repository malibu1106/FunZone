-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 30 mai 2024 à 07:18
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `pseudo`, `email`, `password`, `date_of_birth`, `date_of_registration`) VALUES
(12, 'Roberto', 'De Sousa', 'Malibu', 'malibu1106@gmail.com', '$2y$10$809fdtezvkIJJvWOL4cQUeELM51J0YqTIByVk3FJBo8m/XiZ4J8PS', '1992-11-06', '2024-05-29'),
(13, 'Morgane', 'Encrenaz', 'Momo', 'morgane@gmail.com', '$2y$10$wJhMdDaprGe.m5A8NN0P0ulWXovJAmKORL.EhuUr5tiFrmEmLMrGW', '1925-10-21', '2024-05-29'),
(14, 'fezfez', 'fezfez', 'fezfez', 'morganeencrenaz@gmail.com', '$2y$10$Hwz3v4Em3Q7G98K8bkUcMui9O3vGXVmDNlNXxwyDvs.mhk/ENPxsG', '2024-05-01', '2024-05-29'),
(15, 'Françoise', 'Chiracjhgjhg', 'gtrgrtgtr', 'Array', '$2y$10$sdZclZQl4qGWHEEWPsaReuDLvzTKna./nDh5LjNzyv1Jho5ZBmbRe', '2024-05-24', '2024-05-30'),
(16, 'Françoise', 'Chiracjhgjhg', 'gtrgrtgtr', 'Array', '$2y$10$/KqYdd/q7.ratsEQgl6yE.7BiP7e8JoSZ0cv3xKczCdM0hLl/KQp6', '2024-05-24', '2024-05-30'),
(17, 'Françoise', 'Chiracjhgjhg', 'gtrgrtgtr', 'malibu12424106@gmail.com', '$2y$10$PihbInLIyXWcHk569EZzS.HRf6qt8DZ92H17aiZ04T4NdwxBgy3ji', '2024-05-24', '2024-05-30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
