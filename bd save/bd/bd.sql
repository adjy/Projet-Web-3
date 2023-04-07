
DROP DATABASE IF EXISTS recetteCuisine;
-- Creation de la base de donnee
CREATE DATABASE recetteCuisine;
use recetteCuisine;

--
-- Table structure for recette
--
DROP TABLE IF EXISTS recette;
CREATE TABLE recette (
  ID_recette INT NOT NULL,
  titre VARCHAR(100) NOT NULL,
  -- listes_ingredients VARCHAR(20),
  -- description VARCHAR(40) NOT NULL,
  photo VARCHAR(100) NOT NULL
  -- tag VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for ingredient
--
DROP TABLE IF EXISTS ingredient;
CREATE TABLE ingredient (
  ID_ingredient INT NOT NULL,
  nom VARCHAR(20) NOT NULL,
  photo VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --
-- Table structure for tag
--
DROP TABLE IF EXISTS tag;
CREATE TABLE tag (
  ID_tag INT NOT NULL,
  nom VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --
-- Table structure for liste Ingredient
-- --
DROP TABLE IF EXISTS listesIngredients;
CREATE TABLE listesIngredients ( 
  ID_ingredient INT NOT NULL,
  ID_recette INT NOT NULL,
  Qte VARCHAR(10),
  mesure VARCHAR(30)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for liste tag
--
DROP TABLE IF EXISTS listesTag;
CREATE TABLE listesTag (
  ID_tag INT NOT NULL,
  ID_recette INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- CONTRAINTES
-- 

ALTER TABLE recette
  ADD CONSTRAINT pk_recette PRIMARY KEY (ID_recette);
-- ALTER TABLE recette AUTO_INCREMENT=100;

ALTER TABLE ingredient
  ADD CONSTRAINT pk_ingredient PRIMARY KEY (ID_ingredient);

ALTER TABLE tag
  ADD CONSTRAINT pk_tag PRIMARY KEY (ID_tag);

ALTER TABLE listesIngredients
  ADD CONSTRAINT fk_ingredient_listesIngredients FOREIGN KEY (ID_ingredient) REFERENCES ingredient (ID_ingredient),
  ADD CONSTRAINT fk_recette_listesIngredients FOREIGN KEY (ID_recette) REFERENCES recette (ID_recette);

ALTER TABLE listesTag
  ADD CONSTRAINT fk_tag_listesTag FOREIGN KEY (ID_tag) REFERENCES tag (ID_tag),
  ADD CONSTRAINT fk_recette_listesTag FOREIGN KEY (ID_recette) REFERENCES recette (ID_recette);
   

-- show tables;
LOAD DATA INFILE 'E:/wampserver/tmp/recette.csv' -- windows
INTO TABLE recette
FIELDS TERMINATED BY ','
 ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;


-- show tables;
LOAD DATA INFILE 'E:/wampserver/tmp/ingredient.csv' -- windows
INTO TABLE ingredient
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;


--  show tables;
LOAD DATA INFILE 'E:/wampserver/tmp/tag.csv' -- windows
INTO TABLE tag
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE 'E:/wampserver/tmp/listesIngredients.csv' -- windows
INTO TABLE listesIngredients
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE 'E:/wampserver/tmp/listesTag.csv' -- windows
INTO TABLE listesTag
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;



select * from recette;
select * from ingredient;
select * from tag;
select * from listesIngredients;
select * from listesTag;

select nom from recette A inner join listesIngredients B using(ID_recette) inner join ingredient using(ID_ingredient)  where B.ID_recette=2;
select nom from recette A inner join listesIngredients B using(ID_recette) inner join ingredient using(ID_ingredient)  where B.ID_recette=1;








