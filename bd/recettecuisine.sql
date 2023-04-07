-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 avr. 2023 à 13:12
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
DROP DATABASE IF EXISTS recettecuisine;
create database recettecuisine;
use recettecuisine;
-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `ID_ingredient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ingredient`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`ID_ingredient`, `nom`, `photo`) VALUES
(1, 'eggs', 'eggs.png'),
(2, 'chocolat', 'chocolate.png'),
(3, 'unsweetened powder', 'unsweetened powder.p'),
(4, 'sugar', 'sugar.png'),
(5, 'salt', 'salt.png'),
(6, 'butter', 'butter.png'),
(7, 'Corn syrup', 'cornsyrop.png'),
(8, 'Vanilla', 'vanilla.png'),
(9, 'Cream cheese', 'creamcheese.png'),
(10, ' Heavy cream', ' Heavy cream.png'),
(11, 'Banana', 'banana.png'),
(12, 'butter', 'tablespoons butter m'),
(13, 'cream thawed', 'tub whipped cream th'),
(14, 'Pudding Layer', 'Pudding Layer.png'),
(15, 'milk', 'milk.png'),
(16, 'cornstarch', 'cup cornstarch.png'),
(17, 'graham crackers', 'graham crackercrumbs'),
(18, 'all-purpose flour', 'all-purpose flour.pn'),
(19, 'baking powder', 'tsp baking powder.pn'),
(20, 'cocoa powder', 'unsweetened cocoa po'),
(21, 'Oreo cookies', 'oreo.png'),
(22, 'Pinch of Salt', 'Pinch of Salt.png'),
(23, 'coffee powder', 'coffeepowder.png'),
(24, 'olive oil', 'oliveoil.png');

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
(1, 1, '', ''),
(1, 2, '2', ''),
(2, 1, '', ''),
(2, 2, '8', 'oz'),
(3, 1, '', ''),
(4, 2, '2', 'tablespoon'),
(4, 3, '3/4', 'oz'),
(4, 4, '75', 'grams'),
(5, 1, ' 1/2', 'tsp'),
(5, 2, ' 1/2', ''),
(5, 3, ' 1/8', 'tsp'),
(5, 4, ' pinch', 'tsp'),
(6, 1, '8', 'tbsp'),
(6, 2, '2', ''),
(6, 3, '5', 'oz'),
(6, 4, '50', 'grams'),
(7, 3, '3/4', 'oz'),
(7, 3, '50', 'gram'),
(8, 1, '1', 'tbsp'),
(8, 2, '1', 'cup'),
(8, 4, '2', 'teaspoon'),
(9, 1, '24', 'oz'),
(9, 2, '8', 'oz'),
(10, 1, '3/4', 'cup'),
(10, 4, '500', 'ml'),
(11, 2, '2', 'cup'),
(12, 2, '8', 'oz'),
(13, 2, '', ''),
(14, 2, '2', 'cup'),
(14, 4, '60', 'ml'),
(15, 2, '1/4', 'cup'),
(15, 4, '25', 'gram'),
(16, 2, '1/2', 'cup'),
(17, 3, '1/4', 'oz'),
(18, 2, '2', 'tablespoon'),
(19, 1, '1/3', 'cup'),
(19, 3, '3/4', 'oz'),
(19, 4, '50', 'grams'),
(20, 1, '1/2', 'cups'),
(20, 4, '28', ''),
(22, 4, ' ', ''),
(23, 4, ' 2', 'teaspoon'),
(24, 4, ' 2', 'teasponn');

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

INSERT INTO `listestag` (`ID_tag`, `ID_recette`) VALUES
(1, 1),
(4, 1),
(1, 2),
(4, 2),
(1, 3),
(4, 3),
(1, 4),
(4, 4),
(1, 5),
(4, 5),
(2, 6),
(3, 6),
(2, 7),
(3, 7),
(2, 8),
(3, 8),
(2, 9),
(3, 9),
(2, 10),
(3, 10),
(2, 11),
(4, 12),
(1, 12),
(4, 13),
(4, 14);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ID_recette` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_recette`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`ID_recette`, `titre`, `photo`) VALUES
(1, 'Triple Chocolate Cheesecake', 'Triple_Chocolate_Cheesecake.jpeg'),
(2, 'Banana Pudding Dessert', 'Banana_Pudding_Dessert.png'),
(3, 'Ultimate Fudgy Chocolate Brownies', 'ultimate-fudgy-chocolate-brownies.jpg'),
(4, 'NO BAKE DARK CHOCOLATE TART', 'no-bake-chocolate-tart-1.jpg'),
(5, 'Pudding Layer', 'pudding.jpg'),
(6, 'Petits croustillants chèvres et olives', 'petits_croustillants.png'),
(7, 'Marlyzen, cuisine revisitée', 'marlyzen.jpg'),
(8, 'Blanquette de filet mignon aux petits légumes', 'Blanquette_de_filet_mignon.png'),
(9, 'Filet mignon de porc caramélisé à la sauce soja - Les Délices Légers de Zabou', 'Filet_mignon_de_porc.jpg'),
(10, 'Cheesecake au saumon fumé - Les Gourmandises de Lou', 'Cheesecake_au_saumon.jpg'),
(11, 'Cookies salés aux tomates séchées et chorizo - Amandine Cooking', 'Cookies-sales.jpg'),
(12, 'CROUSTILLANT CHOCO NOISETTE', 'CROUSTILLANT-CHOCO-NOISETTE.jpg'),
(13, 'Recette tropézienne vanille et framboises', 'tropezienne-vanille-framboises.jpg'),
(14, 'Bavarois Poire, Sablé breton et Sauce caramel onctueuse', 'Bavarois-Poire.jpg'),
(15, 'test2', 'texts');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `ID_tag` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`ID_tag`, `nom`) VALUES
(1, 'Dessert'),
(2, 'Salé'),
(3, 'Chaud'),
(4, 'Sucré'),
(5, 'tagTest');

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

/*
select titre, photo from recette where ID_recette in (
    select ID_recette from recette where titre like "%sugar%"
    UNION
    select ID_recette from listesingredients inner join ingredient A using (ID_ingredient) where A.nom like "%sugar%"
    );
*/





















