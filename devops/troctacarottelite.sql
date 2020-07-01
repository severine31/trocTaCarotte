INSERT INTO `carotte` VALUES (1,1,'Carotte','carotte_flat.png'),(2,1,'Aubergine','aubergine_flat.png'),(3,1,'Courgette','courgette_flat.png'),(4,1,'Patate','patate_flat.png'),(5,1,'Tomate','tomate_flat.png'),(6,2,'Abricot','abricot_flat.png'),(7,2,'Banane','banane_flat.png'),(8,2,'Cerise','cerise_flat.png'),(9,2,'Citron','citron_flat.png'),(10,2,'Fraise','fraise_flat.png'),(11,2,'Framboise','framboise_flat.png'),(12,2,'Kiwi','kiwi_flat.png'),(13,2,'Mûre','mure_flat.png'),(14,2,'Pêche','peche_flat.png'),(15,2,'Poire','poire_flat.png'),(16,2,'Pomme','pomme_flat.png'),(17,2,'Raisin','raisin_flat.png');
INSERT INTO `categorie` VALUES (1,'Légume'),(2,'Fruit'),(3,'Autre');

INSERT INTO `mon_annonce` VALUES (1,1,1,1,2,7,'2020-06-30 00:00:00',NULL,NULL,2,5,'Oui','Kg','Kg',NULL);

INSERT INTO `statut` VALUES (1,'En cours'),(2,'Terminé');

INSERT INTO `user` VALUES (1,1,'Cantaloube','Séverine','F','femme_flat.png','severine.cantaloube@gmail.com'),(2,1,'Pellissier','Thibaud','H','homme_flat.png','thibaudpellissier.com');

INSERT INTO `ville` VALUES (1,'Toulouse',31000),(2,'Nantes',44000),(3,'Rennes',35000),(4,'Paris',75000),(5,'Albi',81000);
CREATE INDEX "idx_mon_annonce_IDX_A3B5C2E9A76ED395" ON "mon_annonce" (`user_id`);
CREATE INDEX "idx_mon_annonce_IDX_A3B5C2E9A73F0036" ON "mon_annonce" (`ville_id`);
CREATE INDEX "idx_mon_annonce_IDX_A3B5C2E9F6203804" ON "mon_annonce" (`statut_id`);
CREATE INDEX "idx_mon_annonce_IDX_A3B5C2E99ECACE58" ON "mon_annonce" (`carotte_atroquer_id`);
CREATE INDEX "idx_mon_annonce_IDX_A3B5C2E968F01FC9" ON "mon_annonce" (`contre_carotte_id`);
CREATE INDEX "idx_user_IDX_8D93D649A73F0036" ON "user" (`ville_id`);
CREATE INDEX "idx_carotte_IDX_21BEE8AABCF5E72D" ON "carotte" (`categorie_id`);