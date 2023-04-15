-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 avr. 2023 à 21:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recettecuisine`
--
-- DROP DATABASE IF EXISTS lrandria;
-- -- Creation de la base de donnee
-- CREATE DATABASE lrandria;
-- use lrandria;

DROP DATABASE IF EXISTS recettecuisine;
-- Creation de la base de donnee
CREATE DATABASE recettecuisine;
use recettecuisine;
-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `ID_ingredient` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`ID_ingredient`, `nom`, `photo`) VALUES
(1, 'eggs', 'eggs.png'),
(2, 'chocolat', 'eggs.png'),
(3, 'unsweetened powder', ''),
(4, 'sugar', ''),
(5, 'salt', ''),
(6, 'butter', ''),
(7, 'Corn syrup', ''),
(8, 'Vanilla', ''),
(9, 'Cream cheese', ''),
(10, ' Heavy cream', ''),
(11, 'Banana', '');

-- --------------------------------------------------------

--
-- Structure de la table `listesingredients`
--

DROP TABLE IF EXISTS `listesingredients`;
CREATE TABLE IF NOT EXISTS `listesingredients` (
  `ID_ingredient` int NOT NULL,
  `ID_recette` int NOT NULL,
  `Qte` varchar(10) DEFAULT NULL,
  `mesure` varchar(10) DEFAULT NULL,
  KEY `fk_ingredient_listesIngredients` (`ID_ingredient`),
  KEY `fk_recette_listesIngredients` (`ID_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listesingredients`
--

INSERT INTO `listesingredients` (`ID_ingredient`, `ID_recette`, `Qte`, `mesure`) VALUES
(1, 1, '4', ''),
(7, 1, '2', 'tbsp'),
(2, 1, '16', 'oz'),
(3, 1, '1/3', 'cup'),
(4, 1, '1 1/2', 'cup'),
(5, 1, '1/2', 'tsp'),
(8, 1, '1', 'tbsp'),
(6, 1, '8', 'tbsp'),
(9, 1, '24', 'oz'),
(10, 1, '3/4', 'cup'),
(8, 2, '2', 'cup'),
(4, 2, '2', 'tablespoon'),
(6, 2, '2', 'tablespoon'),
(9, 2, '', ''),
(11, 2, '2', 'large');

-- --------------------------------------------------------

--
-- Structure de la table `listestag`
--

DROP TABLE IF EXISTS `listestag`;
CREATE TABLE IF NOT EXISTS `listestag` (
  `ID_tag` int NOT NULL,
  `ID_recette` int NOT NULL,
  KEY `fk_tag_listesTag` (`ID_tag`),
  KEY `fk_recette_listesTag` (`ID_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listestag`
--

INSERT INTO `listestag` (`ID_recette`,`ID_tag`) VALUES
(1, 1),(1, 4),(2,1),(2,4),(3,1),(3,4),(4,1),(4,4),(5,1),
(5,4),(6, 2),(6, 3),(7, 2),(7, 3),(8,2),(8,3),(9, 2),(9, 3),(10,2),
(10,3),(11,2),(12, 4),(12, 1),(13, 4),(14, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ID_recette` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,

  PRIMARY KEY (`ID_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`ID_recette`, `titre`, `photo`) VALUES
-- LES DESSERTS --
(1, 'Ttriple Chocolate Cheesecake', 'Triple_Chocolate_Cheesecake.jpeg'),
(2, 'Banana Pudding Dessert', 'Banana_Pudding_Dessert.png'),
(3, 'Ultimate Fudgy Chocolate Brownies', 'ultimate-fudgy-chocolate-brownies.jpg'),
(4, 'NO BAKE DARK CHOCOLATE TART', 'no-bake-chocolate-tart-1.jpg'),
(5, 'Pudding Layer', 'pudding.jpg'),

-- LES PLATS CHAUDS  --
(6, 'Petits croustillants chèvres et olives', 'petits_croustillants.png'),
(7, 'Marlyzen, cuisine revisitée', 'marlyzen.jpg'),
(8, 'Blanquette de filet mignon aux petits légumes', 'Blanquette_de_filet_mignon.png'),
(9, 'Filet mignon de porc caramélisé à la sauce soja - Les Délices Légers de Zabou', 'Filet_mignon_de_porc.jpg'),

-- LES ENTREES SUCREES/SALEES --
(10, 'Cheesecake au saumon fumé - Les Gourmandises de Lou', 'Cheesecake_au_saumon.jpg'),
(11, 'Cookies salés aux tomates séchées et chorizo - Amandine Cooking', 'Cookies-sales.jpg'),
(12, 'CROUSTILLANT CHOCO NOISETTE', 'CROUSTILLANT-CHOCO-NOISETTE.jpg'),
(13, 'Recette tropézienne vanille et framboises', 'tropezienne-vanille-framboises.jpg'),
(14, 'Bavarois Poire, Sablé breton et Sauce caramel onctueuse', 'Bavarois-Poire.jpg');


-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `ID_tag` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`ID_tag`, `nom`) VALUES
(1, 'Dessert'),
(2, 'Salé'),
(3, 'Chaud'),
(4, 'Sucré');


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `listesingredients`
--
ALTER TABLE `listesingredients`
  ADD CONSTRAINT `fk_ingredient_listesIngredients` FOREIGN KEY (`ID_ingredient`) REFERENCES `ingredient` (`ID_ingredient`),
  ADD CONSTRAINT `fk_recette_listesIngredients` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID_recette`);

--
-- Contraintes pour la table `listestag`
--
ALTER TABLE `listestag`
  ADD CONSTRAINT `fk_recette_listesTag` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID_recette`),
  ADD CONSTRAINT `fk_tag_listesTag` FOREIGN KEY (`ID_tag`) REFERENCES `tag` (`ID_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
