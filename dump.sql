-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Avril 2017 à 21:34
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `enigma`
--

-- --------------------------------------------------------

--
-- Structure de la table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `skills` text,
  `pwd` varchar(50) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `applicant`
--

INSERT INTO `applicant` (`id`, `firstname`, `lastname`, `email`, `phoneNumber`, `address`, `skills`, `pwd`, `dateNaissance`, `gender`, `admin`) VALUES
(1, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-28', NULL, NULL),
(2, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-28', NULL, NULL),
(3, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-28', NULL, NULL),
(4, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-28', NULL, NULL),
(5, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-27', NULL, NULL),
(6, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-27', NULL, NULL),
(7, NULL, NULL, 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '12233', '2017-04-20', NULL, NULL),
(8, NULL, '', 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '12233', '2017-04-20', NULL, NULL),
(9, NULL, '', 'sanaebelhaj1@gmail.com', NULL, NULL, NULL, '1234', '2017-04-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `wording` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enigme`
--

CREATE TABLE `enigme` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `idDomain` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jobadvert`
--

CREATE TABLE `jobadvert` (
  `id` int(11) NOT NULL,
  `wording` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `skills` text NOT NULL,
  `idDomain` int(11) NOT NULL,
  `idEnigme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jobadvert`
--

INSERT INTO `jobadvert` (`id`, `wording`, `description`, `skills`, `idDomain`, `idEnigme`) VALUES
(1, 'Ingénieur PHP', 'Post d\'ingénieur PHP à pourvoir. 5 ans d\'expérience minimum.', 'php, hmtl, css, sql, cakephp', 0, 0),
(2, 'Ingénieur Symfony', 'Ingénieur Symfony avec 3 ans d\'ancienneté recherché pour maintenir et développer des applications.', 'symfony, php, html, css', 0, 0),
(3, 'Community manager', 'Recherche CM afin d\'animer nos pages Facebook, twitter, instagram et autres RS.', 'html, css, facebook, management, marketing', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enigme`
--
ALTER TABLE `enigme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDomain` (`idDomain`);

--
-- Index pour la table `jobadvert`
--
ALTER TABLE `jobadvert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDomain` (`idDomain`),
  ADD KEY `idEnigme` (`idEnigme`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `enigme`
--
ALTER TABLE `enigme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jobadvert`
--
ALTER TABLE `jobadvert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
