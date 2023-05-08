use recettecuisine;

-- recette et categorie
INSERT INTO  listescategorie (ID_recette, ID_categorie ) VALUES(1,2);


-- rectte et ingredient ( unite qute)

INSERT INTO listesingredients (ID_ingredient, ID_recette, Qte, mesure) VALUES (1, 1, "15" , "litre" );

-- recette et tag ;


INSERT INTO listestag (ID_tag, ID_recette) VALUES (1, 1);
