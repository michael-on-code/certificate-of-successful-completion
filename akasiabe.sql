-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Octobre 2019 à 14:49
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `akasiabe-new`
--

-- --------------------------------------------------------

--
-- Structure de la table `abe`
--

CREATE TABLE `abe` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `activity_area_id` tinyint(3) UNSIGNED NOT NULL,
  `sub_activity_area` varchar(100) NOT NULL,
  `signature_date` date NOT NULL,
  `customer_name` text NOT NULL,
  `currency` varchar(5) NOT NULL,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `amount_received` bigint(20) UNSIGNED NOT NULL,
  `internal_file_number` varchar(25) NOT NULL,
  `project_execution_start_date` date DEFAULT NULL,
  `project_execution_end_date` date DEFAULT NULL,
  `city` varchar(35) NOT NULL,
  `funding_source` varchar(100) DEFAULT NULL,
  `affiliate_company_id` tinyint(3) UNSIGNED NOT NULL,
  `project_awarded_date` date NOT NULL,
  `akasi_share` tinyint(3) UNSIGNED NOT NULL,
  `project_partner` text,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abe`
--

INSERT INTO `abe` (`id`, `title`, `slug`, `activity_area_id`, `sub_activity_area`, `signature_date`, `customer_name`, `currency`, `total_amount`, `amount_received`, `internal_file_number`, `project_execution_start_date`, `project_execution_end_date`, `city`, `funding_source`, `affiliate_company_id`, `project_awarded_date`, `akasi_share`, `project_partner`, `active`, `created_at`, `updated_at`, `user_id`) VALUES
(17, 'MISE EN PLACE D\'UN SYSTEME D\'INFORMATION D\'ENERGIE AU SEIN DE l\'UEMOA (SIE-UEMOA)', 'miseenplacedusysteme5db4c0245eec6', 3, 'SYSTEME D\'INFORMATION', '2017-10-05', 'INSTITUT DE LA FRANCOPHONIE POUR LE DEVELOPPEMENT DURABLE (IFDD/OIF)', '€', 1263281, 1135777, 'AKASI-BJ-1910001', '2017-10-26', '2019-12-31', 'QUEBEC', 'UEMOA', 2, '2017-10-26', 86, 'INTEC', 1, '2019-10-26 21:52:36', '2019-10-29 09:44:55', 6),
(18, 'PORTAIL WEB CLIENT POUR LA PLATEFORME JUICE DE PREPAIEMENT D\'ENERGIE DE LA SBEE', 'portailwebpourlaplat5db4cad047777', 3, 'SYSTEME D\'INFORMATION', '2012-11-13', 'SOCIETE BENINOISE D\'ENERGIE ELECTRIQUE (SBEE)', '€', 36453, 36453, 'AKASI-BJ-1910003', '2012-11-05', '2012-12-05', 'Cotonou', 'GIZ', 2, '2012-11-05', 100, 'Neant', 1, '2019-10-26 22:38:08', '2019-10-29 09:44:40', 6),
(19, 'DEVELOPPEMENT ET INTEGRATION DE LOGICIEL DE GESTION DU PREPAIEMENT ELECTRIQUE DU BENIN (SBEE)', 'dveloppementetintgra5db4cb4c2b078', 3, 'SYSTEME D\'INFORMATION', '2013-03-26', 'SOCIETE BENINOISE D\'ENERGIE ELECTRIQUE (SBEE)', '€', 282949, 282949, 'AKASI-BJ-1910002', '2012-07-03', '2013-02-21', 'Cotonou', 'GIZ', 2, '2013-03-08', 100, 'Néant', 1, '2019-10-26 22:40:12', '2019-10-29 09:44:29', 5),
(20, 'CONCEPTION ET REALISATION DU PORTAIL WEB DE LA COMMISSION NATIONAL DE L’INFORMATIQUE ET DES LIBERTES', 'conceptionetrealisat5db4d008464b9', 3, 'SYSTEME D\'INFORMATION', '2012-10-24', 'COMMISSION NATIONAL DE L’INFORMATIQUE ET DES LIBERTES (CNIL)', 'FCFA', 5595000, 5595000, 'AKASI-BJ-1910004', '2012-11-05', '2012-12-27', 'Cotonou', 'CNIL', 2, '2012-10-01', 100, 'Néant', 1, '2019-10-26 23:00:24', '2019-10-29 09:44:20', 5),
(21, 'FOURNITURE, INSTALLATION ET PARAMETRAGE D\'UNE SOLUTION EAI POUR LE PAC', 'fournitureinstallati5db4d0f60ba9a', 3, 'SYSTEME D\'INFORMATION (INTEGRATION)', '2014-10-22', 'PROJET CORIDOR', 'FCFA', 69989560, 69989560, 'AKASI-BJ-1910005', '2014-10-02', '2014-12-02', 'Cotonou', 'PROJET CORRIDOR (ABIDJAN - LAGOS)', 2, '2014-09-22', 100, 'Neant', 1, '2019-10-26 23:04:22', '2019-10-29 09:44:11', 6),
(22, 'MISE EN PLACE ET L’ADMINISTRATION D’UN SYSTEME D’INFORMATION SUR LES MARCHES DANS LES COMMUNES', 'miseenplaceetladmini5db4d49325b4d', 3, 'SYSTEME D\'INFORMATION', '2015-05-08', 'AGENCE BENINOISE DES SERVICES UNIVERSELLES DES COMMUNICATIONS ÉLECTRONIQUES ET DE LA POSTE', 'FCFA', 116839479, 116839479, 'AKASI-BJ-1910006', '2015-07-16', '2016-07-16', 'Cotonou', 'ABSU-CEP', 2, '2015-04-07', 100, 'Neant', 1, '2019-10-26 23:19:47', '2019-10-29 09:44:03', 5),
(23, 'REALISATION DE L’INTEGRATION DU SIGPAC ET DU GUICHET UNIQUE A TRAVERS L’EAI/ESB DU PAC', 'realisationdelintegr5db4dad745d34', 3, 'SYSTEME D\'INFORMATION (INTEGRATION)', '2016-04-05', 'PROJET CORRIDOR (ABIDJAN - LAGOS)', 'FCFA', 34887500, 34887500, 'AKASI-BJ-1910007', '2016-10-20', '2016-12-30', 'Cotonou', 'PROJET CORRIDOR (ABIDJAN - LAGOS)', 2, '2016-03-09', 100, 'NEANT', 1, '2019-10-26 23:46:31', '2019-10-29 09:43:53', 5),
(24, 'MISE EN PLACE ET LA CONFIGURATION D’UNE APPLICATION DE GESTION DES DOSSIERS', 'miseenplaceetlaconfi5db4de11a5fac', 3, 'SYSTEME D\'INFORMATION', '2015-03-20', 'UNITE DE GESTION DE LA REFORME DES FINANCES PUBLIQUES', 'FCFA', 7000000, 7000000, 'AKASI-BJ-1910008', '2015-03-24', '2015-05-29', 'Cotonou', 'UNION EUROPEENNE', 2, '2015-03-10', 100, 'Neant', 1, '2019-10-27 00:00:17', '2019-10-29 09:43:26', 5),
(25, 'MISE EN ŒUVRE DE L’ENTERPRISE APPLICATION INTEGRATION (EAI) PILOTE SOUS TALEND OPEN STUDIO', 'miseenuvredelenterpr5db4e0e5a9edd', 3, 'SYSTEME D\'INFORMATION (INTEGRATION)', '2014-03-07', 'MINISTERE DE L’ECONOMIE ET DES FINANCES', 'FCFA', 64334678, 64334678, 'AKASI-BJ-1910009', '2014-03-10', '2014-08-08', 'Cotonou', 'UNION EUROPEENNE (PROJET PESI N°A8)', 2, '2014-02-21', 100, 'Neant', 1, '2019-10-27 00:12:21', '2019-10-29 12:15:47', 5);

-- --------------------------------------------------------

--
-- Structure de la table `abe_country_groups`
--

CREATE TABLE `abe_country_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `abe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abe_country_groups`
--

INSERT INTO `abe_country_groups` (`id`, `country_code`, `abe_id`) VALUES
(245, 'BJ', 24),
(246, 'BJ', 23),
(247, 'BJ', 22),
(248, 'BJ', 21),
(249, 'BJ', 20),
(250, 'BJ', 19),
(251, 'BJ', 18),
(252, 'CA', 17),
(256, 'BJ', 25);

-- --------------------------------------------------------

--
-- Structure de la table `abe_meta`
--

CREATE TABLE `abe_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `abe_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abe_meta`
--

INSERT INTO `abe_meta` (`id`, `abe_id`, `key`, `value`) VALUES
(104, 17, 'customer_adress', '55 RUE SAINT-PIERRE 3EME ETAGE, QUEBEC, QUEBEC G1K4A1 - CANADA. TEL +1 418 692 5727'),
(105, 17, 'role', 'Chef de fil du groupement et executant principal de la mise en oeuvre et de l’implémentation de la solution'),
(106, 17, 'certificateFile', '596c4da636a64a71dd3da67e2b53b462.pdf'),
(107, 17, 'detailed_tasks', '<p class="MsoBodyText">Les\r\nprincipaux résultats attendus de ce livrable sont :</p><p></p><p class="MsoBodyText"><span style="font-size:4pt;"></span></p><p> </p><span style="text-indent:-.25in;letter-spacing:-.2px;">-</span><span style="text-indent:-.25in;letter-spacing:-.2px;font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span><span style="text-indent:-.25in;letter-spacing:-.2px;">un document de stratégie élaboré pour la survie du SIE-UEMOA ;</span><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;"></p><p></p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>le modèle fonctionnel des données énergétiques du SIE est définit et les\r\ntableaux des données sont présentés ;</p><p></p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>la stratégie de collecte, d’identification, de traitement, de la\r\nvalidation des données énergétiques est définie ;</p><p></p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>la remontée des données énergétiques vers l’entrepôt de données et\r\nvice-versa est présentée et son architecture fonctionnelle est discutée ;</p><p></p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>la stratégie de mise en œuvre de la plateforme du SIE-UEMOA est\r\nprésentée ;</p><p></p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>les aspects institutionnels et de gouvernance du SIE sont évoqués et\r\nélaborés ;</p><p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class="MsoBodyText" style="margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;text-indent:-.25in;line-height:115%;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">         \r\n</span>enfin l’accent est mis sur le transfert de compétences et les nécessités\r\nde formations à plusieurs niveaux.</p><p></p>'),
(108, 17, 'project_description', '<p class="MsoNormal" style="text-align:justify;line-height:150%;"><span style="font-family:\'Palatino Linotype\', serif;letter-spacing:-.2px;">Le projet de mise en place du\r\nSIE-UEMOA dans les différents États-membres de l’Union (Bénin, Burkina Faso, Côte\r\nd’Ivoire, Guinée-Bissau, Mali, Niger, Sénégal et Togo) tend à :</span><br /></p><p class="MsoListParagraphCxSpFirst" style="margin-top:6pt;margin-right:0in;margin-bottom:6pt;margin-left:.75in;text-align:justify;text-indent:-.25in;line-height:115%;"><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  \r\n</span></span><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;">renforcer les capacités des Ministères chargés de l’énergie des États\r\nmembres de l’UEMOA par le développement et la gestion des SIE nationaux ;</span></p><p></p><p class="MsoListParagraphCxSpMiddle" style="margin-top:6pt;margin-right:0in;margin-bottom:6pt;margin-left:.75in;text-align:justify;text-indent:-.25in;line-height:115%;"><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  \r\n</span></span><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;">mettre à la disposition des Ministères chargés de l’énergie des outils\r\nde planification énergétique ;</span></p><p></p><p class="MsoListParagraphCxSpMiddle" style="margin-top:6pt;margin-right:0in;margin-bottom:6pt;margin-left:.75in;text-align:justify;text-indent:-.25in;line-height:115%;"><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  \r\n</span></span><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;">doter les États membres de l’UEMOA d’un système d’information\r\nénergétique fonctionnel et pérenne ;</span></p><p></p><p class="MsoListParagraphCxSpMiddle" style="margin-top:6pt;margin-right:0in;margin-bottom:6pt;margin-left:.75in;text-align:justify;text-indent:-.25in;line-height:115%;"><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  \r\n</span></span><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;">valoriser et de renforcer l’expertise existante au sein des Etats\r\nmembres de l’espace UEMOA, notamment dans les Institutions de formation dans le\r\nsecteur de l’énergie ;</span></p><p></p><p class="MsoNormal" style="text-align:justify;line-height:150%;">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class="MsoListParagraphCxSpLast" style="margin-top:6pt;margin-right:0in;margin-bottom:6pt;margin-left:.75in;text-align:justify;text-indent:-.25in;line-height:115%;"><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  \r\n</span></span><span style="line-height:115%;font-family:\'Palatino Linotype\', serif;">doter la Commission de l’UEMOA d’outils lui permettant de suivre en\r\ntemps réel l’évolution des statistiques énergétique dans ses huit pays membres.</span></p><p></p><p class="MsoNormal" style="text-align:justify;line-height:150%;"><span lang="fr-be" style="line-height:150%;font-family:\'Arial Narrow\', sans-serif;" xml:lang="fr-be">Le\r\nSIE-UEMOA implémente notammen<b>t :</b></span></p><p><b></b></p><b></b><p class="MsoNormal" style="margin-top:.25pt;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:106%;"><span lang="fr-be" style="font-weight:bold;line-height:106%;font-family:\'Century Gothic\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">      </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Un entrepôt de données\r\ndécisionnelles (EDD) (« Enterprise data Warehouse » EDW) ;</span></p><p></p><p class="MsoNormal" style="margin-top:.25pt;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:106%;"><span lang="fr-be" style="line-height:106%;font-family:\'Century Gothic\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">      </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Une plateforme d’intégration de\r\ndonnées (PID) (« Enterprise service bus » - ESB) ;</span></p><p></p><p class="MsoNormal" style="margin-top:.25pt;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:106%;"><span lang="fr-be" style="line-height:106%;font-family:\'Century Gothic\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">      </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Des outils d’informatique\r\ndécisionnelle (ID) (« business intelligence » - BI) capables\r\nde générer des rapports ;</span></p><p></p><p class="MsoNormal" style="margin-top:.25pt;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:106%;"><span lang="fr-be" style="line-height:106%;font-family:\'Century Gothic\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">      </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Un portail web capables d’afficher\r\nles rapports. </span></p><p></p><p class="MsoNormal" style="margin-top:.25pt;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:0in;text-align:justify;"><span lang="fr-be" style="font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Et permettra de mettre à\r\ndisposition des pays membres :</span></p><p></p><p class="MsoNormal" style="margin-top:0in;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:34.5pt;text-align:justify;text-indent:-14.25pt;line-height:106%;"><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:-1.35pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Des bilans énergétiques détaillés\r\nau format AIE idéalement sur plus de dix ans ;</span></p><p></p><p class="MsoNormal" style="margin-top:0in;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:34.5pt;text-align:justify;text-indent:-14.25pt;line-height:106%;"><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:-1.35pt;" xml:lang="fr-be">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Des indicateurs énergétiques\r\n(sectoriels et de suivi de la politique énergétique) ;</span></p><p></p><p class="MsoNormal" style="margin-top:0in;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:34.5pt;text-align:justify;text-indent:-14.25pt;line-height:106%;"><span style="font-size:12pt;line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Des indicateurs environnementaux\r\net climatiques ; </span><span style="font-size:12pt;line-height:106%;font-family:\'Arial Narrow\', sans-serif;"></span></p><p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class="MsoNormal" style="margin-top:0in;margin-right:6.25pt;margin-bottom:.0001pt;margin-left:34.5pt;text-align:justify;text-indent:-14.25pt;line-height:106%;"><span style="font-size:12pt;line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:-1.35pt;">-<span style="font-size:7pt;line-height:normal;font-family:\'Times New Roman\';">  </span></span><span lang="fr-be" style="line-height:106%;font-family:\'Arial Narrow\', sans-serif;letter-spacing:.1pt;" xml:lang="fr-be">Des résultats d’analyse\r\nprospective de la demande d’énergie.</span><span style="font-weight:bold;font-size:12pt;line-height:106%;font-family:\'Arial Narrow\', sans-serif;"></span></p><p></p>'),
(109, 17, 'updated_by', '1'),
(110, 18, 'customer_adress', 'Rue , Avenue du Gouverneur PONTY'),
(111, 18, 'role', 'Entrepreneur / Executant'),
(112, 18, 'certificateFile', '5bbd9519e8c5f7b35502ef053a7d24ad.pdf'),
(113, 18, 'detailed_tasks', '<p style="letter-spacing:-.2px;">Conception de l\'architecture du portail Web</p><p style="letter-spacing:-.2px;">Elaboration du Design fonctionnel du Portail <br />Elaboration du Design Graphique<br />Implementation du Portail web<br />Installation et Implementation a l\'environnement Juice<br />Execution des tests de validation et mise ne production du portail<br />Formation des utilisateurs sur le portail<br />Formation des administrateurs du portail </p>'),
(114, 18, 'project_description', '<p>Mise en oeuvre du Portail Web client de la plateforme JUICE de la SBEE pour les payements de credit d\'energie electrique pre-payes</p>'),
(115, 18, 'updated_by', '1'),
(116, 19, 'customer_adress', 'Rue, Avenue du Gouverneur PONTY'),
(117, 19, 'role', 'ENTREPRENEUR / EXECUTANT'),
(118, 19, 'certificateFile', '808a8646af8baa8c1e34a72f6cdd9d21.pdf'),
(119, 19, 'contractFile', 'b50564c2c920aa821606a8520dbe80b3.pdf'),
(120, 19, 'detailed_tasks', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Elaboration et\r\nMise en Œuvre d’une Architecture d’Intégration et développement de la\r\nplateforme de gestion du système de pré-payement électrique de la SBEE (Benin).</span></li><li><span lang="fr" xml:lang="fr">Conception et\r\nSuivi technique des travaux de mise en Œuvre du réseau d’interconnexion de la\r\nSBEE.</span></li><li><span lang="fr" xml:lang="fr">Elaboration et\r\nmise en Œuvre d’un système d’exploitation et de maintenance du réseau et\r\nformation du staff et mise en place des dispositifs de surveillance du réseau.</span></li><li><span lang="fr" xml:lang="fr">Définition des\r\ncompétences requises de la main d\'œuvre dans l\'administration continue du\r\nréseau mis en place. </span></li><li><span lang="fr" xml:lang="fr">La SBEE est dotée\r\nd’un système de pré-payement électrique performant permettant aujourd’hui à la\r\nSBEE d’éliminer les queues dans toutes les agences sur l’étendue du territoire</span></li></ul>'),
(121, 19, 'project_description', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Elaboration et\r\nMise en Œuvre d’une Architecture d’Intégration et développement de la\r\nplateforme de gestion du système de pré-payement électrique de la SBEE (Benin)\r\n– Fourniture et installation de Matériels Informatiques et réseautique\r\n(Ordinateurs – Imprimante – Modem – Routeurs.)<span> \r\n</span></span></li><li><span lang="fr" xml:lang="fr">Mise en Œuvre de\r\nsystème Intégré de gestion des processus métiers pour le pré-payement\r\nélectrique</span></li><li><span lang="fr" xml:lang="fr">Intégration,\r\nAutomatisation et fiabilisation des fonctionnalités de payements d’électricité</span></li><li><span lang="fr" xml:lang="fr">Conception de la\r\nconvivialité (interfaces de l’existant, automatisation des taches laborieuses)</span></li><li><span lang="fr" xml:lang="fr">Portabilité,\r\névolutivité, interface usager, Base de données, Migration et sécurité réseaux </span></li><li><span lang="fr" xml:lang="fr">Vérification des\r\ninterfaces d’intégration des divers systèmes</span></li><li><span lang="fr" xml:lang="fr">Intégration au\r\nlogiciel de facturation GDOR </span></li><li><span lang="fr" xml:lang="fr">Fourniture et\r\ninstallation de Matériels Informatiques et réseautique (Ordinateurs –\r\nImprimante – Modem - Routeurs.)</span></li></ul>'),
(122, 19, 'updated_by', '1'),
(123, 20, 'customer_adress', 'Aidjedo, Cotonou, Bénin'),
(124, 20, 'role', 'ENTREPRENEUR / EXECUTANT'),
(125, 20, 'certificateFile', '8c1c237c29c1a96b515b593b4c6b1625.pdf'),
(126, 20, 'detailed_tasks', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Une base\r\nd’information de la CNIL du Bénin nécessaire pour le contenu du portail Web ;</span></li><li><span lang="fr" xml:lang="fr">Une architecture\r\ndu portail numérique pour la CNIL permettant l’intégration facile des\r\napplications futures de la CNIL du Bénin et l’ajout facile de menus et des\r\ncontenus additionnels.</span></li><li><span lang="fr" xml:lang="fr">Mise en place\r\nd’un point d’accès permettant aux employés de se connecter à travers le portail\r\npour accéder aux documents selon leur privilège et profil ;</span></li><li><span lang="fr" xml:lang="fr">Une interface\r\ngraphique intuitive avec des menus répondant aux besoins des usagers du site ;</span></li><li><span lang="fr" xml:lang="fr">Mise à\r\ndisponibilité d’interface permettant aux responsables d’administrer facilement\r\nleur site en toute autonomie (ajout de rubrique, contenu texte, image, vidéo) ;</span></li><li><span lang="fr" xml:lang="fr">Utilisation d’un\r\noutil CMS</span></li><li><span lang="fr" xml:lang="fr">Webmail : pour\r\nattribuer au personnel de la CNIL Bénin, une adresse électronique qui\r\nl’identifie au Bénin et à la CNIL ;</span></li><li><span lang="fr" xml:lang="fr">Forum de\r\ndiscussion : cham de débats, d’échanges, d’information, de formation et\r\nd’écoute réciproque. Permet d’avoir l’avis des internautes sur des sujets mis\r\nen débat ; </span></li><li><span lang="fr" xml:lang="fr">Foire aux\r\nquestions : une liste de questions réponses afin d’éclaircir les uns et les\r\nautres sur des préoccupations d’ordre général<span>   \r\n</span></span></li></ul>'),
(127, 20, 'project_description', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Elaboration du\r\ncontenu du portail</span></li><li><span lang="fr" xml:lang="fr">Réalisation de\r\nl’architecture du portail numérique</span></li><li><span lang="fr" xml:lang="fr">Mise en place\r\nd’un point d’accès au portail</span></li><li><span lang="fr" xml:lang="fr">Mise à\r\ndisposition d’interface (ajout de rubrique, contenu du texte, image, vidéo)</span></li><li><span lang="fr" xml:lang="fr">Conception et\r\nRéalisation du Portail Web de la Commission National de l’Informatique et des\r\nLibertés (CNIL)</span></li></ul>'),
(128, 20, 'updated_by', '1'),
(129, 21, 'customer_adress', 'Carefour SONEB - COTONOU'),
(130, 21, 'role', 'ENTREPRENEUR / EXECUTANT'),
(131, 21, 'certificateFile', '914e2bd8fd8e0120dc84741c8059ee06.pdf'),
(132, 21, 'detailed_tasks', '<p>Description des services réellement fournis par votre personnel :</p><p>Les services de consultation englobent les domaines suivants :</p><p>-<span style="white-space:pre;">	</span>Initiation, Clarification de la vision et des enjeux du projet</p><p>-<span style="white-space:pre;">	</span>Etude de l’environnement technologique existant</p><p>-<span style="white-space:pre;">	</span>Evaluation et définition des exigences pour l’EAI du PAC</p><p>-<span style="white-space:pre;">	</span>Analyse du GAP entre l’existant et le futur</p><p>-<span style="white-space:pre;">	</span>Conception de l’architecture d’intégration cible EAI du PAC</p><p>-<span style="white-space:pre;">	</span>Installation, Configuration et Paramétrage de l’outil EAI du PAC</p><p>-<span style="white-space:pre;">	</span>Mise en œuvre d’un pilote : Intégration entre deux applications métiers du PAC</p><p>-<span style="white-space:pre;">	</span>Sensibilisation et de Transfert de technologie   </p>'),
(133, 21, 'project_description', '<p>MISE EN PLACE D\'UNE PLATEFORME D\'INTEGRATION EAI ( ENTERPRISE APPLICATION INTEGRATION)<br /></p><p>-<span style="white-space:pre;">	</span>Installation configuration des serveurs et des baies de stockages </p><p>-<span style="white-space:pre;">	</span>Installation, configuration et paramétrage de l’Outil EAI.</p><p>-<span style="white-space:pre;">	</span>Interface des applications avec la plateforme EAI et paramétrages des échanges </p><p>-<span style="white-space:pre;">	</span>Formations de douze (12) informaticiens du PAC pour l’exploitation de L’EAI</p>'),
(134, 21, 'updated_by', '1'),
(135, 22, 'customer_adress', 'Immeuble BASSAM, Carré 908 Gbégamey'),
(136, 22, 'role', 'Entrepreneur / Exécutant'),
(137, 22, 'certificateFile', 'e61b1f24c96ac2355efda74fbc48e19e.pdf'),
(138, 22, 'contractFile', '05ddb5513a0a8ee3e1b1a875cb719aaf.pdf'),
(139, 22, 'detailed_tasks', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<div>Le contenu des taches executees se resume comme suite:</div><ul><li><span lang="fr" xml:lang="fr">Vision et\r\ninitialisation du projet</span></li><li><span lang="fr" xml:lang="fr">Réunion de\r\ncadrage </span></li><li><span lang="fr" xml:lang="fr">Analyse des\r\nbesoins des utilisateurs en matière de services</span></li><li><span lang="fr" xml:lang="fr">Développement des\r\ncontenus</span></li><li><span lang="fr" xml:lang="fr">Mise en place du\r\nsystème d’information</span></li><li><span lang="fr" xml:lang="fr">Formation et\r\ntransfert de technologies</span></li><li><span lang="fr" xml:lang="fr">Animation de la\r\nplateforme pendant 12 mois au moins</span></li><li>Définition des mesures d’accompagnement</li></ul>'),
(140, 22, 'project_description', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<div>L\'objectif de la mission consiste :</div><ul><li><span lang="fr" xml:lang="fr">Le système\r\ndevrait être capable de collecter et diffuser les prix sur au moins 10\r\nspéculations (produits de transformation) ;</span></li><li><span lang="fr" xml:lang="fr">Diffusion\r\nautomatique des prix sur les principales spéculations via SMS à des\r\npériodicités définies (périodicité des principaux marchés des communes\r\nconcernées) ;</span></li><li><span lang="fr" xml:lang="fr">Diffusion des\r\nalertes de prix par message vocale ;</span></li><li><span lang="fr" xml:lang="fr">Personnalisation\r\nde la langue de diffusion ;</span></li><li><span lang="fr" xml:lang="fr">Evolutif et\r\ncapable de servir des milliers de destinataires ;</span></li><li><span lang="fr" xml:lang="fr">Rapport sur la\r\ndiffusion (nombre SMS diffusé, Numéro des destinataires, type d’information\r\ndiffusée, c’est-à-dire risque sanitaire concerner, groupe menacé) ;</span></li><li><span lang="fr" xml:lang="fr">Diffusion des\r\noffres de matières premières</span></li></ul>'),
(141, 22, 'updated_by', '1'),
(142, 23, 'customer_adress', 'Carefour SONEB - COTONOU'),
(143, 23, 'role', 'ENTREPRENEUR / EXECUTANT'),
(144, 23, 'certificateFile', 'cd59d5e78daf560ea70e9cd72d4200db.pdf'),
(145, 23, 'contractFile', '92025827adb7b78d0b85642714830771.pdf'),
(146, 23, 'detailed_tasks', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Analyse du Cahier\r\ndes Charges et de l’Existant </span></li><li><span lang="fr" xml:lang="fr">Identification\r\ndes Contraintes des Points d’Intégration entre SIGPAC et SEGUB</span></li><li><span lang="fr" xml:lang="fr">Conception de\r\nl’Architecture Logique d’Intégration de SIGPAC au SEGUB</span></li><li><span lang="fr" xml:lang="fr">Conception des\r\nModèles de Données d’Intégration de SIGPAC au SEGUB</span></li><li><span lang="fr" xml:lang="fr">Implémentation\r\ndes Points d’Intégration</span></li><li><span lang="fr" xml:lang="fr">Tests de\r\nValidation et d’Acception</span></li><li><span lang="fr" xml:lang="fr">Mise en\r\nProduction</span></li><li><span lang="fr" xml:lang="fr">Transfert de\r\nCompétences et Production du Plan de Maintenance<span>    </span></span></li></ul>'),
(147, 23, 'project_description', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Architecture des\r\npoints d’intégration à mettre en place entre SIGPAC, l’ESB et la SEGUB</span></li><li><span lang="fr" xml:lang="fr">Implémentation\r\ndes points d’intégration </span></li><li><span lang="fr" xml:lang="fr">Tests et Mise en\r\n¨Production des Points d’Intégration </span></li><li><span lang="fr" xml:lang="fr">Formation de 12\r\nInformaticiens du Port pour la prise en main et les maintenances</span></li></ul>'),
(148, 23, 'updated_by', '1'),
(149, 24, 'customer_adress', 'Route de l\'aeroport'),
(150, 24, 'role', 'ENTREPRENEUR / EXECUTANT'),
(151, 24, 'certificateFile', '66f631c57989afd2cdeb3f137cc72008.pdf'),
(152, 24, 'contractFile', 'd542c7cd12db3eee50e609aeeb9d9882.pdf'),
(153, 24, 'detailed_tasks', '<p><span style="font-size:14px;line-height:107%;font-family:\'Arial Narrow\', sans-serif;color:#000000;" lang="fr" xml:lang="fr"></span></p>'),
(154, 24, 'project_description', '<ul><li><span style="font-size:18px;line-height:107%;font-family:\'Arial Narrow\', sans-serif;color:#000000;" lang="fr" xml:lang="fr">Mise en place et la configuration\r\nd’un logiciel de gestion des dossiers pour l’archivage</span></li></ul>'),
(155, 24, 'updated_by', '1'),
(156, 25, 'customer_adress', 'Route de l\'aeroport'),
(157, 25, 'role', 'ENTREPRENEUR / EXECUTANT'),
(158, 25, 'certificateFile', '2dc55e32acc2f600847eac23c4142a96.pdf'),
(159, 25, 'detailed_tasks', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Chargé de la mise\r\nen œuvre de l\'EAI du MEF (Ministère de l\'Economie et des Finances) et du Pilote\r\nde l\'EAI avec Talend</span></li><li><span lang="fr" xml:lang="fr">Étude des\r\ninterfaces, des applications, de l\'infrastructure réseau existantes</span></li><li><span lang="fr" xml:lang="fr">Analyse détaillée\r\ndes besoins</span></li><li><span lang="fr" xml:lang="fr">Rédaction du\r\nrapport initial (description de la description existante - des besoins exprimés\r\n- méthodologie pour le déploiement de l\'EAI et de l\'entrepôt de données -\r\nplanification détaillée des activités à mener dans le cadre de la mission)</span></li><li><span lang="fr" xml:lang="fr">Rédaction des\r\nspécifications fonctionnelles de l\'EAI et validation</span></li><li><span lang="fr" xml:lang="fr">Benchmark des\r\noutils EAI</span></li><li><span lang="fr" xml:lang="fr">Choix de la\r\nsolution technique et validation</span></li><li><span lang="fr" xml:lang="fr">Mise en œuvre de\r\nl\'EAI pilote</span></li><li><span lang="fr" xml:lang="fr">Transfert de\r\ncompétence</span></li><li><span lang="fr" xml:lang="fr">Animation d\'un\r\natelier de sensibilisation des décideurs sur les bénéfices de l\'EAI et\r\nprésentation des premiers résultats déjà obtenus<span>      </span></span></li></ul>'),
(160, 25, 'project_description', '<p>\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<ul><li><span lang="fr" xml:lang="fr">Elaboration du\r\ncahier de charges de la mise en place de l’EAI ;</span></li><li><span lang="fr" xml:lang="fr">Installation\r\nconfiguration et mise en place du serveur Talend Open Studio pour l’EAI ;</span></li><li><span lang="fr" xml:lang="fr">Conception et\r\nimplémentation du pilote choisi pour la mise en œuvre de l’EAI ;</span></li><li><span lang="fr" xml:lang="fr">Déploiement de\r\nl’EAI pilote </span></li><li><span lang="fr" xml:lang="fr">Formation et\r\ntransfert de technologies aux techniciens)</span></li></ul>'),
(161, 25, 'updated_by', '1');

-- --------------------------------------------------------

--
-- Structure de la table `activity_area`
--

CREATE TABLE `activity_area` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activity_area`
--

INSERT INTO `activity_area` (`id`, `name`, `description`, `image`) VALUES
(1, 'AKASI - TELECOMS', 'DOMAINE DES TELECOMS', NULL),
(2, 'AKASI - ENERGIES', 'DOMAINE DE L\'ENERGIE', NULL),
(3, 'AKASI - INFORMATIQUE', 'SECTEUR DE L\'INFORMATIQUE ', NULL),
(4, 'AKASI - BTP', 'DOMAINE DES BATIMENTS ET TRAVAUX PUBLICS', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `affiliate_companies`
--

CREATE TABLE `affiliate_companies` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affiliate_companies`
--

INSERT INTO `affiliate_companies` (`id`, `name`, `adress`) VALUES
(1, 'AKASI-TOGO', 'FILLIALE DU TOGO\r\nImmeuble Face Plan TOGO - Lomé - Togo'),
(2, 'AKASI-BÉNIN', 'AKASI GROUP SARL \r\nLot 308 T - Rue Gaza Formation, Agla \r\nCOTONOU - BENIN\r\nTEL : + 229 94 58 3999\r\nEMAIL: AKASI-GROUP@AKASIGROUP.COM'),
(3, 'AKASI-IVOIRE', 'FILLIALE DE LA COTE D\'IVOIRE\r\nRiviera Palmeraie” les Rosiers Programme #2, Villa 95 - CI\r\nTel: (+225) 59 26 40 41 / 77 08 05 34'),
(4, 'AKASI-RWANDA', 'BUREAU DU RWANDA\r\nCentenary House, Bureau #1, 4eme etage,Kigali - Rwanda\r\nTel: (+250) 78 50 22 308,'),
(5, 'AKASI-CANADA', 'BUREAU DU CANADA\r\n13 Rue Des Rosiers,  L\'ile Perrot,  QC    J7V 8S7\r\nCANADA'),
(6, 'AKASI-USA', 'BUREAU DES USA\r\n131 Daniel Webster Hwy #311,Nashua, NH 03060 - USA\r\nTel: +1 781 454 9893, Main Fax: (603) 594 3180,');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(3) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(2, 'AF', 'Afghanistan'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia'),
(28, 'BA', 'Bosnia and Herzegovina'),
(29, 'BW', 'Botswana'),
(30, 'BV', 'Bouvet Island'),
(31, 'BR', 'Brazil'),
(32, 'IO', 'British Indian Ocean Territory'),
(33, 'BN', 'Brunei Darussalam'),
(34, 'BG', 'Bulgaria'),
(35, 'BF', 'Burkina Faso'),
(36, 'BI', 'Burundi'),
(37, 'KH', 'Cambodia'),
(38, 'CM', 'Cameroon'),
(39, 'CA', 'Canada'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'CX', 'Christmas Island'),
(47, 'CC', 'Cocos (Keeling) Islands'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CD', 'Congo, the Democratic Republic of t'),
(52, 'CK', 'Cook Islands'),
(53, 'CR', 'Costa Rica'),
(54, 'CI', 'Cote D\'Ivoire'),
(55, 'HR', 'Croatia'),
(56, 'CU', 'Cuba'),
(57, 'CY', 'Cyprus'),
(58, 'CZ', 'Czech Republic'),
(59, 'DK', 'Denmark'),
(60, 'DJ', 'Djibouti'),
(61, 'DM', 'Dominica'),
(62, 'DO', 'Dominican Republic'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'FK', 'Falkland Islands (Malvinas)'),
(71, 'FO', 'Faroe Islands'),
(72, 'FJ', 'Fiji'),
(73, 'FI', 'Finland'),
(74, 'FR', 'France'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard Island and Mcdonald Islands'),
(95, 'VA', 'Holy See (Vatican City State)'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran, Islamic Republic of'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People\'s Republic'),
(114, 'KR', 'Korea, Republic of'),
(115, 'KW', 'Kuwait'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'LA', 'Lao People\'s Democratic Republic'),
(118, 'LV', 'Latvia'),
(119, 'LB', 'Lebanon'),
(120, 'LS', 'Lesotho'),
(121, 'LR', 'Liberia'),
(122, 'LY', 'Libyan Arab Jamahiriya'),
(123, 'LI', 'Liechtenstein'),
(124, 'LT', 'Lithuania'),
(125, 'LU', 'Luxembourg'),
(126, 'MO', 'Macao'),
(127, 'MK', 'Macedonia, the Former Yugoslav Repu'),
(128, 'MG', 'Madagascar'),
(129, 'MW', 'Malawi'),
(130, 'MY', 'Malaysia'),
(131, 'MV', 'Maldives'),
(132, 'ML', 'Mali'),
(133, 'MT', 'Malta'),
(134, 'MH', 'Marshall Islands'),
(135, 'MQ', 'Martinique'),
(136, 'MR', 'Mauritania'),
(137, 'MU', 'Mauritius'),
(138, 'YT', 'Mayotte'),
(139, 'MX', 'Mexico'),
(140, 'FM', 'Micronesia, Federated States of'),
(141, 'MD', 'Moldova, Republic of'),
(142, 'MC', 'Monaco'),
(143, 'MN', 'Mongolia'),
(144, 'MS', 'Montserrat'),
(145, 'MA', 'Morocco'),
(146, 'MZ', 'Mozambique'),
(147, 'MM', 'Myanmar'),
(148, 'NA', 'Namibia'),
(149, 'NR', 'Nauru'),
(150, 'NP', 'Nepal'),
(151, 'NL', 'Netherlands'),
(152, 'AN', 'Netherlands Antilles'),
(153, 'NC', 'New Caledonia'),
(154, 'NZ', 'New Zealand'),
(155, 'NI', 'Nicaragua'),
(156, 'NE', 'Niger'),
(157, 'NG', 'Nigeria'),
(158, 'NU', 'Niue'),
(159, 'NF', 'Norfolk Island'),
(160, 'MP', 'Northern Mariana Islands'),
(161, 'NO', 'Norway'),
(162, 'OM', 'Oman'),
(163, 'PK', 'Pakistan'),
(164, 'PW', 'Palau'),
(165, 'PS', 'Palestinian Territory, Occupied'),
(166, 'PA', 'Panama'),
(167, 'PG', 'Papua New Guinea'),
(168, 'PY', 'Paraguay'),
(169, 'PE', 'Peru'),
(170, 'PH', 'Philippines'),
(171, 'PN', 'Pitcairn'),
(172, 'PL', 'Poland'),
(173, 'PT', 'Portugal'),
(174, 'PR', 'Puerto Rico'),
(175, 'QA', 'Qatar'),
(176, 'RE', 'Reunion'),
(177, 'RO', 'Romania'),
(178, 'RU', 'Russian Federation'),
(179, 'RW', 'Rwanda'),
(180, 'SH', 'Saint Helena'),
(181, 'KN', 'Saint Kitts and Nevis'),
(182, 'LC', 'Saint Lucia'),
(183, 'PM', 'Saint Pierre and Miquelon'),
(184, 'VC', 'Saint Vincent and the Grenadines'),
(185, 'WS', 'Samoa'),
(186, 'SM', 'San Marino'),
(187, 'ST', 'Sao Tome and Principe'),
(188, 'SA', 'Saudi Arabia'),
(189, 'SN', 'Senegal'),
(190, 'CS', 'Serbia and Montenegro'),
(191, 'SC', 'Seychelles'),
(192, 'SL', 'Sierra Leone'),
(193, 'SG', 'Singapore'),
(194, 'SK', 'Slovakia'),
(195, 'SI', 'Slovenia'),
(196, 'SB', 'Solomon Islands'),
(197, 'SO', 'Somalia'),
(198, 'ZA', 'South Africa'),
(199, 'GS', 'South Georgia and the South Sandwic'),
(200, 'ES', 'Spain'),
(201, 'LK', 'Sri Lanka'),
(202, 'SD', 'Sudan'),
(203, 'SR', 'Suriname'),
(204, 'SJ', 'Svalbard and Jan Mayen'),
(205, 'SZ', 'Swaziland'),
(206, 'SE', 'Sweden'),
(207, 'CH', 'Switzerland'),
(208, 'SY', 'Syrian Arab Republic'),
(209, 'TW', 'Taiwan, Province of China'),
(210, 'TJ', 'Tajikistan'),
(211, 'TZ', 'Tanzania, United Republic of'),
(212, 'TH', 'Thailand'),
(213, 'TL', 'Timor-Leste'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinidad and Tobago'),
(218, 'TN', 'Tunisia'),
(219, 'TR', 'Turkey'),
(220, 'TM', 'Turkmenistan'),
(221, 'TC', 'Turks and Caicos Islands'),
(222, 'TV', 'Tuvalu'),
(223, 'UG', 'Uganda'),
(224, 'UA', 'Ukraine'),
(225, 'AE', 'United Arab Emirates'),
(226, 'GB', 'United Kingdom'),
(227, 'US', 'United States'),
(228, 'UM', 'United States Minor Outlying Island'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistan'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Viet Nam'),
(234, 'VG', 'Virgin Islands, British'),
(235, 'VI', 'Virgin Islands, U.s.'),
(236, 'WF', 'Wallis and Futuna'),
(237, 'EH', 'Western Sahara'),
(238, 'YE', 'Yemen'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrateur'),
(2, 'members', 'Modérateur');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'siteName', 'AkasiABE'),
(2, 'siteFooterDescription', '<span>&copy; 2019 AKASI ABE | </span>\r\n        <span>Propulsé par <a target="_blank" href="http://akasigroup.com/">AKASI Group</a></span>'),
(3, 'googleRecaptchaPublicKey', '6Lc6F7sUAAAAAN6_3HU4Fz8SWPNaQ0QtBRU01-zE'),
(4, 'googleRecaptchaSecretKey', '6Lc6F7sUAAAAAJsg5R8L5cs8k1BlF4u1Fg7-ywA1'),
(5, 'siteDescription', 'Plateforme propulsée par AKASI Group pour la Gestion de ses Attestations de Bonne Fin d\'Exécution'),
(6, 'notificationEmails', 'michaeloncode@gmail.com'),
(7, 'siteFavicon', 'ec28843842a1211f0fc91eef0a60014d.png'),
(8, 'siteDefaultAvatar', '5e14291bc0a98a7143bdade351a306dc.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(5, '76.28.46.184', 'toudonoualine5db4ab01a43f8', '$2y$08$TEbFdZpm9mPbQjHZFjuirerLlpy5UQw2LUfvdRTHZFZbdzjBJHtUi', NULL, 'aline.toudonou@akasigroup.com', NULL, NULL, NULL, 'P8ZSllHOxorBqTUW7TYKi.', 1572121345, 1572121541, 1, 'Aline', 'Toudonou', NULL, NULL),
(6, '76.28.46.184', 'houdagbapierre5db4ab5f82fe2', '$2y$08$/TZkXM2CUAJ4Z4GysaL9BOfesBTe7QxN9Sm2FnEb14wPjmOAU5Umy', NULL, 'phoudagba@akasigroup.com', NULL, NULL, NULL, 'OlWUxhip1GtXqM2lNp5qkO', 1572121439, 1572134666, 1, 'PIERRE', 'HOUDAGBA', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(9, 5, 1),
(10, 5, 2),
(11, 6, 1),
(12, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `key`, `value`) VALUES
(9, 5, 'added_by', '1'),
(10, 6, 'added_by', '1'),
(11, 5, 'completionToken', '296aa1a702554fba0dee1e312839975c'),
(12, 6, 'completionToken', '17449382cd84f818564221c3cbd6e94a');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abe`
--
ALTER TABLE `abe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_area_id` (`activity_area_id`),
  ADD KEY `affiliate_company_id` (`affiliate_company_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slug` (`slug`);

--
-- Index pour la table `abe_country_groups`
--
ALTER TABLE `abe_country_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_code`),
  ADD KEY `abe_id` (`abe_id`);

--
-- Index pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abe_id` (`abe_id`);

--
-- Index pour la table `activity_area`
--
ALTER TABLE `activity_area`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affiliate_companies`
--
ALTER TABLE `affiliate_companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Index pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abe`
--
ALTER TABLE `abe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `abe_country_groups`
--
ALTER TABLE `abe_country_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT pour la table `activity_area`
--
ALTER TABLE `activity_area`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `affiliate_companies`
--
ALTER TABLE `affiliate_companies`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  ADD CONSTRAINT `abe_meta_ibfk_1` FOREIGN KEY (`abe_id`) REFERENCES `abe` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
