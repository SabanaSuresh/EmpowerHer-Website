-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 mai 2025 à 06:39
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `empowerher_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_evenements`
--

DROP TABLE IF EXISTS `commentaires_evenements`;
CREATE TABLE IF NOT EXISTS `commentaires_evenements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_evenement` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires_evenements`
--

INSERT INTO `commentaires_evenements` (`id`, `id_evenement`, `pseudo`, `contenu`, `date_creation`, `user_id`) VALUES
(5, 'event71', 'Anonyme', 'll', '2025-04-30 10:52:13', NULL),
(4, 'event1', 'Utilisateur_test', 'test2', '2025-04-28 08:10:53', NULL),
(6, 'event1', '', 'Super explication !', '2025-04-30 18:25:40', 4);

-- --------------------------------------------------------

--
-- Structure de la table `devine_mot`
--

DROP TABLE IF EXISTS `devine_mot`;
CREATE TABLE IF NOT EXISTS `devine_mot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `definition` text NOT NULL,
  `reponse_correcte` varchar(255) NOT NULL,
  `faux1` varchar(255) NOT NULL,
  `faux2` varchar(255) NOT NULL,
  `faux3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `devine_mot`
--

INSERT INTO `devine_mot` (`id`, `definition`, `reponse_correcte`, `faux1`, `faux2`, `faux3`) VALUES
(1, 'Doctrine politique, sociale et culturelle visant à améliorer et à promouvoir les droits des femmes', 'Féminisme', 'Socialisme', 'Libéralisme', 'Capitalisme'),
(2, 'Accord de 1979 adopté par l’ONU pour lutter contre les discriminations envers les femmes', 'CEDAW', 'PACTE', 'ONU-FEMMES', 'DUDH'),
(3, 'Droit pour les femmes à disposer de leur corps et de leur fertilité', 'Droits reproductifs', 'Droits civiques', 'Droits syndicaux', 'Droits de succession'),
(4, 'Première femme à avoir reçu deux prix Nobel dans deux disciplines différentes', 'Marie Curie', 'Simone Veil', 'Angela Davis', 'Malala Yousafzai'),
(5, 'Loi française de 1975 ayant légalisé l’avortement', 'Loi Veil', 'Loi Neuwirth', 'Loi Simone', 'Loi Aubry'),
(6, 'Date d’obtention du droit de vote des femmes en France', '1944', '1936', '1958', '1922'),
(7, 'Mouvement qui lutte pour l’égalité des sexes dans l’espace numérique', 'Cyberféminisme', 'Techno-humanisme', 'Post-féminisme', 'Digitalisme'),
(8, 'Première femme à avoir obtenu le droit de vote au niveau national dans un pays', 'Nouvelle-Zélande', 'France', 'Royaume-Uni', 'États-Unis'),
(9, 'Le nom de l’amendement américain garantissant le droit de vote aux femmes', '19e amendement', '18e amendement', '21e amendement', '16e amendement'),
(10, 'Nom du traité fondateur garantissant l’égalité des sexes dans la Constitution allemande', 'Loi fondamentale', 'Grundgesetz', 'Code civil', 'Pacte de Bonn'),
(11, 'Femme française connue pour son rôle dans la légalisation de la contraception en 1967', 'Lucien Neuwirth', 'Simone de Beauvoir', 'Gisèle Halimi', 'Louise Michel'),
(12, 'Nom du mouvement de dénonciation des violences sexuelles en ligne né après 2017', '#MeToo', '#BalanceTonPorc', '#NowYouKnow', '#StopViolence'),
(13, 'Droit reconnu en 2018 en Arabie Saoudite, longtemps interdit aux femmes', 'Conduire', 'Voter', 'Travailler', 'Se marier sans tuteur'),
(14, 'Constitution adoptée en Afrique du Sud en 1996, garantissant l’égalité de genre', 'Constitution sud-africaine', 'Loi sur l’unité', 'Charte de Soweto', 'Acte fondateur'),
(15, 'Nom de la loi ayant inscrit le droit à l’IVG dans la Constitution française en 2024', 'Révision constitutionnelle 2024', 'Loi Veil', 'Loi bioéthique', 'Charte pour la liberté'),
(16, 'Philosophe française connue pour \"Le Deuxième Sexe\"', 'Simone de Beauvoir', 'Gisèle Halimi', 'Angela Davis', 'Olympe de Gouges'),
(17, 'Femme politique française à l’origine de la loi légalisant l’avortement en 1975', 'Simone Veil', 'Françoise Giroud', 'Edith Cresson', 'Christiane Taubira'),
(18, 'Mouvement féministe dénonçant le sexisme systémique à partir de 2017', '#BalanceTonPorc', '#ShePersisted', '#NiUnaMenos', '#TimeIsNow'),
(19, 'Première femme élue à l’Académie française', 'Marguerite Yourcenar', 'Louise Michel', 'George Sand', 'Marie Curie'),
(20, 'Ancienne esclave devenue militante antiesclavagiste et féministe aux États-Unis', 'Sojourner Truth', 'Harriet Tubman', 'Rosa Parks', 'Angela Davis'),
(21, 'Fondatrice de l’ONG Femmes Solidaires, figure majeure du féminisme français', 'Gisèle Halimi', 'Simone de Beauvoir', 'Louise Weiss', 'Catherine Deneuve'),
(22, 'Pétition historique signée par 343 femmes réclamant le droit à l’avortement', 'Manifeste des 343', 'Charte de la liberté', 'Déclaration de 1971', 'Lettre ouverte féministe'),
(23, 'Journal féministe fondé par Hubertine Auclert en 1881', 'La Citoyenne', 'La Suffragette', 'L’Égalité', 'Voix des femmes'),
(24, 'Première femme présidente en Afrique', 'Ellen Johnson Sirleaf', 'Wangari Maathai', 'Ngozi Okonjo-Iweala', 'Ameenah Gurib-Fakim'),
(25, 'Concept désignant la double discrimination subie par les femmes racisées', 'Intersectionnalité', 'Parité', 'Oppression sociale', 'Discrimination genrée'),
(26, 'Femme française guillotinée pour ses idées féministes pendant la Révolution', 'Olympe de Gouges', 'Charlotte Corday', 'Louise Michel', 'Marie-Antoinette'),
(27, 'Nom de la convention européenne contre les violences faites aux femmes', 'Convention d’Istanbul', 'Traité de Lisbonne', 'Pacte d’Athènes', 'Charte d’Amsterdam'),
(28, 'Nom de la marche de 2019 contre les féminicides en France', 'Nous Toutes', 'Libres Ensemble', 'Marche des Femmes', 'Solidarité Rose'),
(29, 'Concept défendant que les femmes doivent être libres dans l’espace public', 'Droit à la ville', 'Marche libre', 'Espace égalitaire', 'Urbafem'),
(30, 'Fondatrice du Mouvement de libération des femmes (MLF)', 'Antoinette Fouque', 'Gisèle Halimi', 'Élisabeth Badinter', 'Françoise Héritier'),
(31, 'Nom du rapport de 1995 sur les droits des femmes à la Conférence de Pékin', 'Plateforme de Pékin', 'Charte universelle', 'Agenda 2030 femmes', 'Déclaration de Nairobi'),
(32, 'Concept désignant la charge mentale assumée par les femmes dans la sphère domestique', 'Charge mentale', 'Charge logistique', 'Pression familiale', 'Responsabilité invisible'),
(33, 'Mouvement militant qui lutte pour le respect des droits des travailleuses du sexe', 'Strass', 'Abolifem', 'Travail Sans Peur', 'RespectXX'),
(34, 'Slogan féministe dénonçant les violences policières envers les femmes racisées', 'Pas une de moins', 'Justice pour elles', 'Assez !', 'Ni oubli, ni pardon'),
(35, 'Activiste pakistanaise et plus jeune lauréate du prix Nobel de la paix', 'Malala Yousafzai', 'Greta Thunberg', 'Angela Davis', 'Leymah Gbowee'),
(36, 'Femme afro-américaine refusant de céder sa place dans un bus en 1955', 'Rosa Parks', 'Angela Davis', 'Shirley Chisholm', 'Sojourner Truth'),
(37, 'Féministe algérienne connue pour ses écrits sur la guerre et les femmes', 'Assia Djebar', 'Taslima Nasreen', 'Leïla Slimani', 'Wassyla Tamzali'),
(38, 'Concept selon lequel les normes de genre sont imposées par la société', 'Construction sociale du genre', 'Sexisme naturel', 'Éducation binaire', 'Genrisation historique'),
(39, 'Organisation mondiale féministe fondée par des femmes africaines', 'FEMNET', 'ONU Femmes', 'WILPF', 'CEDAW'),
(40, 'Phénomène d’invisibilisation des femmes dans l’histoire ou les sciences', 'Effacement des femmes', 'Sexisme passif', 'Domination cognitive', 'Oubli genré'),
(41, 'Nom du mouvement féministe radical apparu dans les années 60-70', 'Radical feminism', 'Femmes en action', 'Power Girls', 'Purple Revolution'),
(42, 'Terme qui désigne la peur ou la haine des femmes', 'Misogynie', 'Androphobie', 'Gynophobie', 'Sexophobie'),
(43, 'Campagne mondiale pour mettre fin aux violences faites aux femmes lancée par ONU Femmes', 'Orange the World', 'Women Forward', 'Stop Rape Now', 'Red for Justice'),
(44, 'Premier État américain à légaliser l’avortement', 'Colorado', 'Texas', 'New York', 'California'),
(45, 'Déclaration adoptée à l’ONU en 1993 reconnaissant que les droits des femmes sont des droits humains', 'Déclaration de Vienne', 'Charte de Pékin', 'Code des femmes', 'Pacte de Genève'),
(46, 'Prix international récompensant les femmes journalistes courageuses', 'Courage in Journalism Award', 'Prix Clarisse', 'Voix de la Résistance', 'FemPress Prize'),
(47, 'Premier pays à imposer la parité hommes-femmes au Parlement', 'Rwanda', 'Suède', 'Islande', 'Norvège'),
(48, 'Femme ayant dirigé le combat pour les droits des femmes en Iran dans les années 2000', 'Shirin Ebadi', 'Nawal El Saadawi', 'Asma Jahangir', 'Taslima Nasreen'),
(49, 'Concept qui désigne l’appropriation et la marchandisation du féminisme', 'Féminisme washing', 'Féminisme marketing', 'Fake feminism', 'Féminisme rose'),
(50, 'Auteur·rice de la citation \"On ne naît pas femme : on le devient\"', 'Simone de Beauvoir', 'Judith Butler', 'Virginia Woolf', 'Bourdieu'),
(51, 'Forme de violence consistant à partager des photos intimes sans consentement', 'Revenge porn', 'Ghosting', 'Body shaming', 'Catfishing'),
(52, 'Mouvement féministe indien contre les violences domestiques et le patriarcat', 'Gulabi Gang', 'Pink Power', 'She Warriors', 'Sari Force'),
(53, 'Terme décrivant le fait que les femmes sont interrogées sur leurs enfants mais pas les hommes', 'Double standard parental', 'Charge maternelle', 'Sexisme parental', 'Parenting bias'),
(54, 'Figure féministe du Burkina Faso et fondatrice de l’association Song Taaba', 'Mariama Barry', 'Yennenga Traoré', 'Clémentine Darlé', 'Salamata Sawadogo'),
(55, 'Slogan féministe célèbre : \"Le privé est...\"', 'politique', 'intime', 'légal', 'familial');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `annee` varchar(50) DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `description` text,
  `lien` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `type_favori` varchar(50) NOT NULL,
  `id_favori` varchar(255) NOT NULL,
  `date_ajout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `utilisateur_id`, `type_favori`, `id_favori`, `date_ajout`) VALUES
(12, 4, 'definition', 'Activisme', '2025-04-28 04:32:08'),
(13, 4, 'definition', 'Activisme', '2025-04-28 04:32:09'),
(14, 4, 'evenement', 'event1', '2025-04-28 04:32:15'),
(15, 4, 'heroine', 'pers108', '2025-04-28 04:32:24'),
(16, 4, 'loi', 'Loi sur la dépénalisation de l’homosexualité', '2025-04-28 04:32:29');

-- --------------------------------------------------------

--
-- Structure de la table `forum_messages`
--

DROP TABLE IF EXISTS `forum_messages`;
CREATE TABLE IF NOT EXISTS `forum_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sujet` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_message` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`id_sujet`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `forum_messages`
--

INSERT INTO `forum_messages` (`id`, `id_sujet`, `pseudo`, `contenu`, `date_message`, `user_id`) VALUES
(1, 1, 'Utilisateur_test', 'test', '2025-04-27 14:14:45', NULL),
(2, 8, 'Utilisateur_test', 'test1', '2025-04-28 08:09:27', NULL),
(3, 8, 'Utilisateur_test', 'test', '2025-04-30 10:57:22', NULL),
(4, 8, '', 'Quel master de droit faut-il faire pour devenir avocate spécialisée en droit des femmes ?', '2025-04-30 18:24:04', 4);

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

DROP TABLE IF EXISTS `forum_reponses`;
CREATE TABLE IF NOT EXISTS `forum_reponses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sujet` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_reponse` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`id_sujet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

DROP TABLE IF EXISTS `forum_sujets`;
CREATE TABLE IF NOT EXISTS `forum_sujets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `forum` varchar(100) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`id`, `titre`, `forum`, `date_creation`) VALUES
(1, 'Test', 'Général', '2025-04-27 13:59:03'),
(2, 'Essai', 'Général', '2025-04-27 15:18:32'),
(3, 'Discussions libres', 'general', '2025-04-27 17:12:44'),
(4, 'Santé mentale', 'sante', '2025-04-27 17:12:44'),
(5, 'Bien-être et forme physique', 'sante', '2025-04-27 17:12:44'),
(6, 'Conseils pour entreprendre', 'carriere', '2025-04-27 17:12:44'),
(7, 'Trouver un mentor', 'carriere', '2025-04-27 17:12:44'),
(8, 'Parcours universitaire', 'education', '2025-04-27 17:12:44'),
(9, 'Formations professionnelles', 'education', '2025-04-27 17:12:44'),
(10, 'Participer aux campagnes', 'activisme', '2025-04-27 17:12:44'),
(11, 'Partager une initiative', 'activisme', '2025-04-27 17:12:44'),
(12, 'Maladie', 'Santé', '2025-04-30 10:56:46'),
(13, '??', 'general', '2025-04-30 10:56:55');

-- --------------------------------------------------------

--
-- Structure de la table `heroine_commentaires`
--

DROP TABLE IF EXISTS `heroine_commentaires`;
CREATE TABLE IF NOT EXISTS `heroine_commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_heroine` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `heroine_commentaires`
--

INSERT INTO `heroine_commentaires` (`id`, `id_heroine`, `pseudo`, `contenu`, `date_commentaire`, `user_id`) VALUES
(1, 'pers124', 'Anonyme', 'test\r\n', '2025-04-27 18:13:43', NULL),
(5, 'pers108', '', 'Test', '2025-04-30 18:25:19', 4);

-- --------------------------------------------------------

--
-- Structure de la table `lois`
--

DROP TABLE IF EXISTS `lois`;
CREATE TABLE IF NOT EXISTS `lois` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `date_loi` varchar(50) DEFAULT NULL,
  `description` text,
  `impact` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `loi_commentaires`
--

DROP TABLE IF EXISTS `loi_commentaires`;
CREATE TABLE IF NOT EXISTS `loi_commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre_loi` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `loi_commentaires`
--

INSERT INTO `loi_commentaires` (`id`, `titre_loi`, `pseudo`, `contenu`, `date_commentaire`, `user_id`) VALUES
(3, 'Loi sur la dépénalisation de l’homosexualité', 'Utilisateur_test', 'test4', '2025-04-28 06:11:35', NULL),
(4, 'Loi sur la dépénalisation de l’homosexualité', '', 'Intéressant', '2025-04-30 16:26:24', 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `contenu` text,
  `date_envoi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

DROP TABLE IF EXISTS `mots`;
CREATE TABLE IF NOT EXISTS `mots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot` varchar(255) NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id`, `mot`, `date_ajout`) VALUES
(1, 'Femme', '2025-04-30 21:19:56'),
(2, 'Femme', '2025-04-30 21:20:28'),
(3, 'Femme', '2025-04-30 21:26:54');

-- --------------------------------------------------------

--
-- Structure de la table `propositions_mots`
--

DROP TABLE IF EXISTS `propositions_mots`;
CREATE TABLE IF NOT EXISTS `propositions_mots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot` varchar(255) NOT NULL,
  `date_proposition` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('en_attente','accepte','refuse') DEFAULT 'en_attente',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `propositions_mots`
--

INSERT INTO `propositions_mots` (`id`, `mot`, `date_proposition`, `statut`) VALUES
(5, 'Test', '2025-05-01 05:45:46', 'en_attente'),
(2, 'ijsins', '2025-04-27 03:51:13', 'en_attente'),
(6, 'Droit de la Femme', '2025-05-01 05:45:57', 'en_attente'),
(7, 'VSS', '2025-05-01 05:46:00', 'en_attente');

-- --------------------------------------------------------

--
-- Structure de la table `propositions_ressources`
--

DROP TABLE IF EXISTS `propositions_ressources`;
CREATE TABLE IF NOT EXISTS `propositions_ressources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `texte` text,
  `date_proposition` datetime DEFAULT CURRENT_TIMESTAMP,
  `valide` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `propositions_ressources`
--

INSERT INTO `propositions_ressources` (`id`, `texte`, `date_proposition`, `valide`) VALUES
(10, '« Une héroïne féministe » : comment Gisèle Pelicot est devenue une « icône internationale » | https://www.parismatch.com/actu/faits-divers/une-icone-internationale-comment-gisele-pelicot-est-devenue-une-heroine-pour-les-femmes-du-monde-entier-244778', '2025-05-01 07:47:12', 0);

-- --------------------------------------------------------

--
-- Structure de la table `proposition_evenement`
--

DROP TABLE IF EXISTS `proposition_evenement`;
CREATE TABLE IF NOT EXISTS `proposition_evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `date_proposition` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `proposition_evenement`
--

INSERT INTO `proposition_evenement` (`id`, `texte`, `date_proposition`) VALUES
(7, 'Marche des femmes en Pologne contre la régression du droit à l’avortement', '2025-05-01 06:38:30');

-- --------------------------------------------------------

--
-- Structure de la table `proposition_loi`
--

DROP TABLE IF EXISTS `proposition_loi`;
CREATE TABLE IF NOT EXISTS `proposition_loi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `date_proposition` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `proposition_loi`
--

INSERT INTO `proposition_loi` (`id`, `texte`, `date_proposition`) VALUES
(2, 'test_loi', '2025-04-27 03:50:46'),
(5, 'Loi en vue d’ordonner le bien et d’interdire le mal » (n° 1452) en Afghanistan', '2025-05-01 06:14:21');

-- --------------------------------------------------------

--
-- Structure de la table `qui_est_ce`
--

DROP TABLE IF EXISTS `qui_est_ce`;
CREATE TABLE IF NOT EXISTS `qui_est_ce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `indice1` text NOT NULL,
  `indice2` text NOT NULL,
  `indice3` text NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `faux1` varchar(255) NOT NULL,
  `faux2` varchar(255) NOT NULL,
  `faux3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qui_est_ce`
--

INSERT INTO `qui_est_ce` (`id`, `indice1`, `indice2`, `indice3`, `reponse`, `faux1`, `faux2`, `faux3`) VALUES
(1, 'Je suis née en Pologne', 'J’ai reçu deux prix Nobel', 'Je suis une scientifique pionnière', 'Marie Curie', 'Simone Veil', 'Angela Davis', 'Malala Yousafzai'),
(2, 'Je suis une figure de la Révolution française', 'J’ai écrit la Déclaration des droits de la femme', 'J’ai été guillotinée', 'Olympe de Gouges', 'Simone de Beauvoir', 'Louise Michel', 'Élisabeth Badinter'),
(3, 'Je suis née en Pologne', 'J’ai reçu deux prix Nobel', 'Je suis célèbre pour mes recherches sur la radioactivité', 'Marie Curie', 'Sojourner Truth', 'Kamala Harris', 'Louise Michel'),
(4, 'Je suis philosophe française', 'J\'ai écrit \'Le Deuxième Sexe\'', 'J’ai marqué le féminisme du XXe siècle', 'Simone de Beauvoir', 'Louise Michel', 'Nawal El Saadawi', 'Florence Nightingale'),
(5, 'Je suis américaine', 'Militante pour les droits civiques', 'J’ai été membre du Parti communiste', 'Angela Davis', 'Kamala Harris', 'Clara Zetkin', 'Aung San Suu Kyi'),
(6, 'Je suis pakistanaise', 'J’ai reçu le prix Nobel de la paix', 'J’ai été attaquée pour avoir défendu l\'éducation', 'Malala Yousafzai', 'Ruth Bader Ginsburg', 'Nawal El Saadawi', 'Frida Kahlo'),
(7, 'Je suis britannique', 'J’ai travaillé avec Charles Babbage', 'Je suis considérée comme la première programmeuse', 'Ada Lovelace', 'Frida Kahlo', 'Clara Zetkin', 'Ruth Bader Ginsburg'),
(8, 'Je suis française', 'J’ai écrit la Déclaration des droits de la femme', 'J’ai été guillotinée pendant la Révolution', 'Olympe de Gouges', 'Ruth Bader Ginsburg', 'Frida Kahlo', 'Nawal El Saadawi'),
(9, 'Je suis afro-américaine', 'J’ai refusé de céder ma place dans un bus', 'Je suis une figure de la lutte contre la ségrégation', 'Rosa Parks', 'Louise Michel', 'Marguerite Duras', 'Nawal El Saadawi'),
(10, 'Je suis française', 'J’ai porté la loi sur l’IVG', 'J’ai été déportée à Auschwitz', 'Simone Veil', 'Marguerite Duras', 'Frida Kahlo', 'Maya Angelou'),
(11, 'Je suis avocate', 'J’ai défendu Djamila Boupacha', 'J’ai milité pour les droits des femmes', 'Gisèle Halimi', 'Nawal El Saadawi', 'Sojourner Truth', 'Florence Nightingale'),
(12, 'Je suis britannique', 'J’ai écrit \'Mrs Dalloway\'', 'Je suis une icône littéraire féministe', 'Virginia Woolf', 'Louise Michel', 'Clara Zetkin', 'Ruth Bader Ginsburg'),
(13, 'Je suis française', 'J’ai été la première femme médecin diplômée en France', 'J’ai exercé au XIXe siècle', 'Madeleine Brès', 'Irène Frachon', 'Marie Curie', 'Elizabeth Blackwell'),
(14, 'Je suis américaine', 'J’ai codé les trajectoires de la NASA', 'J’ai inspiré le film Hidden Figures', 'Katherine Johnson', 'Rita Levi-Montalcini', 'Rosalind Franklin', 'Ada Lovelace'),
(15, 'Je suis nigériane', 'J’ai écrit \"We Should All Be Feminists\"', 'Je suis aussi une romancière célèbre', 'Chimamanda Ngozi Adichie', 'Oprah Winfrey', 'Rokhaya Diallo', 'Marguerite Duras'),
(16, 'Je suis indienne', 'Je suis physicienne et militante écologiste', 'Je lutte contre les OGM', 'Vandana Shiva', 'Greta Thunberg', 'Marie Toussaint', 'Julia Butterfly Hill'),
(17, 'Je suis suédoise', 'Je suis jeune activiste', 'J’ai lancé les grèves scolaires pour le climat', 'Greta Thunberg', 'Malala Yousafzai', 'Nora Ephron', 'Michelle Bachelet'),
(18, 'Je suis américaine', 'J’ai cofondé le mouvement #MeToo', 'Je suis également autrice et militante', 'Tarana Burke', 'Assa Traoré', 'Mona Chollet', 'Soledad O’Brien'),
(19, 'Je suis française', 'J’ai travaillé sur les neutrinos', 'Je suis la petite-fille de Marie Curie', 'Hélène Langevin-Joliot', 'Marie Curie', 'Irène Joliot-Curie', 'Nicole-Reine Lepaute'),
(20, 'Je suis britannique', 'Je suis infirmière pionnière', 'On me surnomme \"la dame à la lampe\"', 'Florence Nightingale', 'Elizabeth Blackwell', 'Mary Ainsworth', 'Sara Josephine Baker'),
(21, 'Je suis française', 'Je suis connue pour \"Sorcières\"', 'Je suis essayiste et journaliste féministe', 'Mona Chollet', 'Simone de Beauvoir', 'Rokhaya Diallo', 'Marguerite Duras'),
(22, 'Je suis libérienne', 'J’ai été la première femme élue présidente en Afrique', 'J’ai reçu le prix Nobel de la paix', 'Ellen Johnson Sirleaf', 'Ngozi Okonjo-Iweala', 'Aung San Suu Kyi', 'Michelle Bachelet'),
(23, 'Je suis française', 'J’ai cofondé le Mouvement de Libération des Femmes', 'Je suis psychanalyste et éditrice', 'Antoinette Fouque', 'Gisèle Halimi', 'Louise Michel', 'Simone de Beauvoir'),
(24, 'Je suis née au Pakistan', 'J’ai survécu à une attaque pour être allée à l’école', 'Je suis la plus jeune prix Nobel de la paix', 'Malala Yousafzai', 'Marie Curie', 'Assa Traoré', 'Ruth Bader Ginsburg'),
(25, 'Je suis algérienne', 'J’ai milité pour les droits des femmes et écrit en français', 'Mon roman \"L’Amour, la Fantasia\" est célèbre', 'Assia Djebar', 'Fatou Diome', 'Amrita Sher-Gil', 'Zineb El Rhazoui'),
(26, 'Je suis française', 'Je suis connue pour la \"charge mentale\"', 'Je suis sociologue et dessinatrice', 'Emma (la dessinatrice)', 'Mona Chollet', 'Marguerite Duras', 'Caroline Fourest'),
(27, 'Je suis britannique', 'Je suis mathématicienne du XIXe siècle', 'Je suis considérée comme la première programmeuse informatique', 'Ada Lovelace', 'Radia Perlman', 'Katherine Johnson', 'Susan Wojcicki'),
(28, 'Je suis noire américaine', 'J’ai refusé de céder ma place dans un bus', 'Je suis devenue un symbole des droits civiques', 'Rosa Parks', 'Angela Davis', 'Sojourner Truth', 'Harriet Tubman'),
(29, 'Je suis française', 'J’ai coécrit \"Le Deuxième Sexe\"', 'J’ai eu une relation avec Sartre', 'Simone de Beauvoir', 'Marguerite Yourcenar', 'Christine Delphy', 'Christiane Taubira'),
(30, 'Je suis mexicaine', 'Je suis poétesse et penseuse du XVIIe siècle', 'Je suis considérée comme une des premières féministes du continent', 'Sor Juana Inés de la Cruz', 'Frida Kahlo', 'Rosa Luxemburg', 'Rigoberta Menchú'),
(31, 'Je suis égyptienne', 'Je suis médecin, écrivaine et militante', 'J’ai dénoncé les mutilations génitales féminines', 'Nawal El Saadawi', 'Fatima Mernissi', 'Wangari Maathai', 'Maryam Mirzakhani'),
(32, 'Je suis française', 'J’ai défendu les travailleuses du sexe', 'J’ai fondé l’association STRASS', 'Maud Giraud', 'Assa Traoré', 'Najat Vallaud-Belkacem', 'Caroline De Haas');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

DROP TABLE IF EXISTS `ressources`;
CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `lien` text NOT NULL,
  `description` text,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `lien`, `description`, `date_ajout`) VALUES
(1, '', '', '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan', '2025-05-01 06:21:12'),
(2, '', '', '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan', '2025-05-01 06:25:54'),
(3, '', '', '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan', '2025-05-01 06:37:29'),
(4, '', '', '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan', '2025-05-01 06:48:56'),
(5, '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan', 'https://www.rts.ch/info/monde/2024/article/je-suis-une-femme-totalement-detruite-dit-gisele-pelicot-au-proces-des-viols-de-mazan-28671567.html', '\"Je suis une femme totalement détruite\", dit Gisèle Pelicot au procès des viols de Mazan | https://www.rts.ch/info/monde/2024/article/je-suis-une-femme-totalement-detruite-dit-gisele-pelicot-au-proces-des-viols-de-mazan-28671567.html', '2025-05-01 07:45:17');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `forum` varchar(100) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `username`, `email`, `telephone`, `sexe`, `pays`, `profession`, `password`) VALUES
(1, 'Sabana', 'Suresh', 'Admin', 'sabana.suresh@dauphine.eu', '0769089817', 'Femme', 'France', 'Étudiant', '$2y$10$AeN/8LM9I40g.YyTvjBOdud.NRzcuaJmqMINdQYUho3NpOYIk5vtO'),
(2, 'Sabana', 'Suresh', 'SabanaSuresh', 'sabana.suresh@dauphine.eu', '0769089817', 'Femme', 'France', 'Étudiant', '$2y$10$w4hU6PG9Jzo1MmA5goMm/.i7kIyiEs6hEztnIeua6bWE2zvfrwsNO'),
(3, 'Sabana', 'Suresh', 'Utilisateur1', 'srs.sabana@gmail.com', '0769089817', 'Femme', 'France', 'Étudiant', '$2y$10$Ji893CC801.Uzf/YEnt1GuyS3263Rt0mXrm5QmDr.w50GNNSbDsga'),
(4, 'Utilisateur', 'Test', 'Utilisateur_test', 'sabanalavraie@gmail.com', '0669089817', 'Femme', 'France', 'Étudiant', '$2y$10$tfatrmKvMQAPsvRSx4sIueeZNgP9k0VHOXenTlVnPgFdp7B5p2MEe'),
(5, 'arthur', 'jacques', 'aj', 'testmail@gmail.com', '0234567899', 'Homme', 'Belgique', 'Sécurité et Défense', '$2y$10$c1bcmwPxu0UWIHyyT0uK6uLl.K9TUq6YfyL0Fz0FRqsAcQ4fW1ofq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
