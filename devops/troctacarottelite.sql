LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO
  `categorie`
VALUES
  (1, 'Légume'),(2, 'Fruit'),(3, 'Autre');
  /*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;
LOCK TABLES `carotte` WRITE;
  /*!40000 ALTER TABLE `carotte` DISABLE KEYS */;
INSERT INTO
  `carotte`
VALUES
  (1, 1, 'Carotte', 'carotte_flat.png'),(2, 1, 'Aubergine', 'aubergine_flat.png'),(3, 1, 'Courgette', 'courgette_flat.png'),(4, 1, 'Patate', 'patate_flat.png'),(5, 1, 'Tomate', 'tomate_flat.png'),(6, 2, 'Abricot', 'abricot_flat.png'),(7, 2, 'Banane', 'banane_flat.png'),(8, 2, 'Cerise', 'cerise_flat.png'),(9, 2, 'Citron', 'citron_flat.png'),(10, 2, 'Fraise', 'fraise_flat.png'),(11, 2, 'Framboise', 'framboise_flat.png'),(12, 2, 'Kiwi', 'kiwi_flat.png'),(13, 2, 'Mûre', 'mure_flat.png'),(14, 2, 'Pêche', 'peche_flat.png'),(15, 2, 'Poire', 'poire_flat.png'),(16, 2, 'Pomme', 'pomme_flat.png'),(17, 2, 'Raisin', 'raisin_flat.png');
  /*!40000 ALTER TABLE `carotte` ENABLE KEYS */;
UNLOCK TABLES;
LOCK TABLES `ville` WRITE;
  /*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO
  `ville`
VALUES
  (1, 'Toulouse', 31000),(2, 'Nantes', 44000),(3, 'Rennes', 35000),(4, 'Paris', 75000),(5, 'Albi', 81000);
  /*!40000 ALTER TABLE `ville` ENABLE KEYS */;
UNLOCK TABLES;
LOCK TABLES `statut` WRITE;
  /*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO
  `statut`
VALUES
  (1, 'En cours'),(2, 'Terminé');
  /*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;
LOCK TABLES `user` WRITE;
  /*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO
  `user`
VALUES
  (
    5,
    1,
    'Pellissier',
    'Thibaud',
    'H',
    'homme_flat.png',
    'thibaudpellissier@gmail.com',
    '[\"ROLE_USER\"]',
    '$argon2id$v=19$m=65536,t=4,p=1$M3hoS3J2dWF0T1BObUMvTw$9k0AuqN21WSkzltygT4zK1MIHdDKPRTd4iXAXaCOtZc'
  ),(
    7,
    1,
    'Cantaloube',
    'Séverine',
    'F',
    'femme_flat.png',
    'severine.cantaloube@gmail.com',
    '[\"ROLE_USER\"]',
    '$argon2id$v=19$m=65536,t=4,p=1$SHdRclBuVGtEUkxvaS5vZA$9Qc7wYqlUkVw7DmDVzTecwlzAyWJTSsWFP2sz2s5F44'
  );
  /*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
LOCK TABLES `mon_annonce` WRITE;
  /*!40000 ALTER TABLE `mon_annonce` DISABLE KEYS */;
INSERT INTO
  `mon_annonce`
VALUES
  (
    10,
    5,
    1,
    1,
    11,
    5,
    '2020-07-18 13:21:29',
    'test',
    'N;',
    3,
    5,
    'Oui',
    'Kg',
    'Kg',
    'Non'
  ),(
    11,
    7,
    1,
    1,
    14,
    2,
    '2020-07-20 14:05:12',
    'Je troque des pêches contre des Kiwis :) c''est fou ce que ça produit cette année les pêchers!!',
    'N;',
    10,
    2,
    'Oui',
    'Kg',
    'Kg',
    'Peu importe'
  ),(
    12,
    7,
    1,
    1,
    16,
    2,
    '2020-07-21 20:48:32',
    'Echange pommes contre aubergines.',
    'N;',
    4,
    1,
    'Oui',
    'Kg',
    'Kg',
    'Peu importe'
  );
  /*!40000 ALTER TABLE `mon_annonce` ENABLE KEYS */;
UNLOCK TABLES;