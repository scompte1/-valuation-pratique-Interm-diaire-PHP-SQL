-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 déc. 2020 à 16:21
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'T3 vaise, proche grandes écoles', '33 Avenue Joannes Masset', 'Lyon', 69009, 60, 766, 'immo1.jpg', 'Location', 'Appartement très lumineux. Récemment rénové en concernant le charme de l\'ancien.\r\nSitué proche des transports et grandes écoles.'),
(2, 'Maison 90m2 + garage', 'impasse du tacot', 'Balbigny', 42510, 90, 750, 'immo2.jpg', 'Location', 'Au rdc, pièce à vivre de 40m2 avec cuisine équipée (plaque de cuisson, four, lave-vaisselle et rangements) + toilettes. (l\'électroménager n\'est pas visible sur les photos)\r\nA l\'étage, 3 chambres (dont 2 avec placard et 1 placard dans le couloir) et salle de bains (avec 2ème toilettes).\r\nChauffage au sol électrique au RDC + poêle à bois\r\nChauffage électrique à l\'étage par panneaux...'),
(3, 'Appartement 4 pièces à louer', 'métro Gare de Vaise', 'Vaise', 69009, 91, 1150, 'immo3.jpg', 'Location', 'Dans belle résidence de 2005, spacieux T4 de 91m² entièrement repeint, belle pièce de vie carrelée sur grande loggia, cuisine toute équipée, 3 chambres dont une suite, sdb. \r\nChauffage gaz. GARAGE'),
(4, 'Maison individuelle 4 pièces', 'Chemin des Fayes', 'Saint Didier de Formans', 1600, 148, 490000, 'immo4.jpg', 'Vente', 'Grande pièce de vie de 71m², 3 chambres spacieuses, 1 salle de bain avec baignoire, double vasques et douche à l\'italienne, cellier de 15m², garage de 55m².\r\nChauffage au sol par Géothermie et radiateur électrique dans les chambres.\r\nMenuiseries extérieures et volets roulants aluminium.\r\nPlacards intégrés et aménagés dans toutes les pièces.\r\n3 Terrasses dont une de 21m² au Sud, une au Nord Ouest de 52m² partiellement couverte et une entourant la piscine. Local à piscine et rangement maçonné de 20m²'),
(5, 'Maison St Martin en Vercors', 'La Giraude et Côte', 'St Martin en Vercors', 26420, 155, 310000, 'immo5.jpg', 'Vente', 'Vaste entrée avec dressing. Pièce de vie salon, SAM, cuisine équipée de 45 m2 avec accès terrasse. SDB WC, Chambre parents 12 m2 avec placard et accès terrasse. Cellier.\r\nEtage:\r\nSéjour bureau 34 m2. Trois chambres avec placards 10,5 et 11 m2. SDB. WC.\r\nTerrain arboré 1360 m2.\r\nGarage 2 voitures 50 m2.\r\nCave 20 m2.\r\nDouble vitrage sur toutes les ouvertures.\r\nChauffage central gaz.\r\nPoêle à bois 17 kW au RDC.\r\nMaison raccordée au tout à l\'égout.'),
(6, 'Maison jumelée sur les hauteurs de Collonges sous Salève', '381 route des Manessières', 'Collonges sous Salève.', 74160, 87, 478000, 'immo6.jpg', 'Vente', 'Maison duplex jumelée avec 3 chambres et 2 salles de bains.\r\nTravaux en cours, Livraison dans 14 mois.\r\nLe prix comprend un garage et un parking privé.\r\nChoix couleurs carrelages faïences possible.'),
(14, 'Maison d’architecte de 176 m² / 1000 m² de terrain ', '16 Impasse des Chaux à FRANCHEVILLE LE HAUT.', 'Francheville le haut', 69340, 176, 2700, 'immo7.jpg', 'Location', 'Ce bien est au calme, sans vis à vis, dans un secteur résidentiel.\r\nIl vous offre une pièce à vivre lumineuse de 47 m² avec vue sur la forêt, une cuisine ouverte entièrement aménagée et équipée (four, plaque, hotte), 4 chambres dont 1 belle suite parentale de 25 m² au RDC avec dressing et SDB, 3 chambres à l’étage de 12, 13 et 20 m² avec salle d’eau et placard.'),
(15, 'Appartement 3 pièces', 'Avenue du Chater', 'Francheville', 69340, 79, 917, 'immo8.jpg', 'Location', '3 pièces d\'une superficie de 79 m² situé au 3e étage avec ascenseur, composé d\'un séjour, d\'une cuisine fermée, de deux chambres, d\'un balcon exposé plein sud, d\'un parking collectif, d\'une cave, dans un parc arboré fermé et sécurisé, très calme. Détail loyer 657EUR charges 260EUR (chauffage, eau froide et eau chaude inclus dans les charges). Disponible au 31/12.'),
(23, 'Villa a 100 mètres de la mer', 'chemin du Tamisier', 'Antibes Juan les Pins', 6160, 149, 2500000, 'immo9.jpg', 'Vente', 'A 100 mètres de la mer, dans une baie idyllique, avec hôtels *****et restaurants renommés. VILLA dans son écrin de verdure, de 149 m², au calme, et aperçu mer, avec piscine chauffée par échangeur thermique. Construction mixte pierre et traditionnelle de type provençal. sur un terrain plat de 600 m², clôturé avec dans sa plus grande partie des murs de 2 m à 2,5 m de haut, sécurisé par circuit vidéo interne.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
