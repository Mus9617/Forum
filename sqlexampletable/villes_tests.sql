-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 fév. 2024 à 14:17
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `villes_tests`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `bg_id` int(11) NOT NULL,
  `bg_parent_id` int(11) DEFAULT NULL,
  `bg_pseudo` varchar(255) NOT NULL,
  `bg_commentaire` text NOT NULL,
  `bg_validate` int(11) DEFAULT 0,
  `bg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`bg_id`, `bg_parent_id`, `bg_pseudo`, `bg_commentaire`, `bg_validate`, `bg_date`) VALUES
(9, 3, 'Roberto', 'Madre Mia', 1, '2024-02-09'),
(10, NULL, 'Roberto', 'Buenas', 1, '0000-00-00'),
(11, 3, 'Mario', 'asdasdasccx', 1, '2024-02-09'),
(12, NULL, 'Esteban', 'Buenas?', 1, '0000-00-00'),
(13, NULL, 'hola', 'asdaikjsdasdasd', 1, '0000-00-00'),
(14, NULL, 'Ok', 'Ok', 1, '0000-00-00'),
(15, NULL, 'asdasd', 'asdasd', 1, '0000-00-00'),
(16, NULL, 'Roberto', 'No Entiendo Nada', 1, '2024-02-10'),
(17, NULL, 'Aron', 'heyyy!!', 1, '0000-00-00'),
(18, NULL, 'Marior', 'ee', 1, '0000-00-00'),
(19, NULL, 'Mario', 'buenaaaassss', 1, '0000-00-00'),
(20, NULL, 'Roberto', 'Heyy que tal familia', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `respuestas`
--

CREATE TABLE `respuestas` (
  `gb_id` int(11) NOT NULL,
  `gb_id_publicacion` int(11) NOT NULL,
  `gb_pseudo` varchar(255) NOT NULL,
  `gb_comentario` text NOT NULL,
  `gb_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `gb_image_path` varchar(255) DEFAULT NULL,
  `gb_emoji` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `respuestas`
--

INSERT INTO `respuestas` (`gb_id`, `gb_id_publicacion`, `gb_pseudo`, `gb_comentario`, `gb_fecha`, `gb_image_path`, `gb_emoji`) VALUES
(1, 11, 'mario', 'assd', '2024-02-09 23:39:36', NULL, NULL),
(2, 11, 'zxczxcz', 'asdasda', '2024-02-09 23:51:23', NULL, NULL),
(3, 11, 'vaya ', 'hola ', '2024-02-09 23:52:14', NULL, NULL),
(4, 13, 'mario', 'que te den', '2024-02-09 23:54:51', NULL, NULL),
(5, 13, 'nano', 'ya ves', '2024-02-10 00:33:42', NULL, NULL),
(14, 14, 'asd', 'asd', '2024-02-10 00:58:52', NULL, NULL),
(15, 14, 'asd', 'asd', '2024-02-10 00:58:55', NULL, NULL),
(16, 15, 'mario', 'asdasdasd', '2024-02-10 01:56:34', NULL, NULL),
(17, 16, 'Manuel', 'Yo tampoco la verdad ', '2024-02-10 11:38:07', NULL, NULL),
(18, 16, 'Manu', 'heheheh', '2024-02-10 11:54:17', 'png-transparent-pepe-the-frog-batman-internet-meme-pepe-frog-comics-mammal-cat-like-mammal-thumbnail.png', ''),
(19, 16, 'ye', 'erww', '2024-02-10 11:59:18', 'png-transparent-pepe-the-frog-batman-internet-meme-pepe-frog-comics-mammal-cat-like-mammal-thumbnail.png', 'sadf'),
(21, 16, 'Manuel', 'aaa', '2024-02-10 12:18:47', 'png-transparent-pepe-the-frog-batman-internet-meme-pepe-frog-comics-mammal-cat-like-mammal-thumbnail.png', ''),
(22, 19, 'Roberto', 'aa', '2024-02-10 13:12:22', 'tuu.gif', ''),
(23, 20, 'Ghoul', 'Yooooo que pasoooooooooooo', '2024-02-10 13:13:55', 'tuu.gif', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bg_id`);

--
-- Index pour la table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`gb_id`),
  ADD KEY `id_publicacion` (`gb_id_publicacion`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `gb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`gb_id_publicacion`) REFERENCES `blog` (`bg_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
