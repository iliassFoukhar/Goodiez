-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Janvier 2020 à 02:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `goodiez`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id_user` int(70) NOT NULL,
  `id_product` int(70) NOT NULL,
  `quantity` int(70) NOT NULL,
  `nvm` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nvm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `cart`
--

INSERT INTO `cart` (`id_user`, `id_product`, `quantity`, `nvm`) VALUES
(1, 10, 4, 67);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `id_catalogue` int(70) NOT NULL AUTO_INCREMENT,
  `lib_catalogue` varchar(70) NOT NULL,
  `id_market` int(70) NOT NULL,
  PRIMARY KEY (`id_catalogue`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `catalogue`
--

INSERT INTO `catalogue` (`id_catalogue`, `lib_catalogue`, `id_market`) VALUES
(1, 'Tvs', 1),
(2, 'second', 3),
(3, '2020', 3),
(4, 'Fun', 2),
(5, 'haha', 4),
(13, 'tv', 2),
(14, 'technology', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `quantity` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_livreur` int(11) DEFAULT NULL,
  `command_state` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nvm` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nvm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`quantity`, `id_client`, `id_livreur`, `command_state`, `id_commande`, `id_produit`, `nvm`) VALUES
(6, 1, 15, 3, 1, 3, 60),
(2, 1, NULL, 0, 2, 3, 61),
(3, 1, NULL, 0, 3, 7, 62),
(2, 1, 15, 3, 1, 4, 63),
(4, 1, 15, 3, 2, 4, 64);

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `id_user` int(11) NOT NULL,
  `id_market` int(11) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id_user`, `id_market`, `added_by`) VALUES
(16, 2, 2),
(17, 0, 0),
(18, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE IF NOT EXISTS `livreur` (
  `id_user` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livreur`
--

INSERT INTO `livreur` (`id_user`, `state`) VALUES
(15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `id_market` int(70) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `adress` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(70) NOT NULL,
  `addedBy` int(70) DEFAULT NULL,
  `valider` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id_market`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `market`
--

INSERT INTO `market` (`id_market`, `name`, `adress`, `description`, `image`, `addedBy`, `valider`) VALUES
(1, 'marjane', '  Marjane is a super market that sells literally anything, from nutricial products to eletronics, Sports, health, education, styling and clothing and anything else. Marjane Gain in quality and prices. ', '  Marjane is a super market that sells literally anything, from nutricial products to eletronics, Sports, health, education, styling and clothing and anything else. Marjane Gain in quality and prices.', 'marjane.png', 0, b'1'),
(2, 'carrefour', '55-57 Rue Moulay Abdellah, Kénitra 14000', 'Carrefour is a super market that has shown up lately. It has a diverse selection of high quality products for a low price.', 'carrefour.png', 0, b'1'),
(3, 'decathlon', ' Decathlon kénitra, Route Sidi Allal Bahraoui, Kénitra 11160', 'Decathlon is one of the most popular markets that are dedicated to sell clothings and stylish products.\r\n', 'decathlon.png', 0, b'1'),
(4, 'atacadao', '14 Avenue Zarbia, Salé 11000', 'Grand super marché trouveras tout ce que tu cherches , Des prix a la porté', 'atacadao.png', 0, b'1'),
(5, 'Marwa', 'Avenue Mohamed V, Kénitra', 'Chez Marwa 2 Mars, le personnel est accueillant et souriant, les articles ont un bon rapport qualité prix, la disponibilité des produits est plus ou moins à jour!\r\n\r\nEn général les boutiques Marwa ont une bonne réputation!', 'Marwa.png', 0, b'1'),
(6, 'Fnac', '     Très bon service. Les prix sont les mêmes que dans une librairie du coin, même si on est impressionné par les rayonnages. ', '     Très bon service. Les prix sont les mêmes que dans une librairie du coin, même si on est impressionné par les rayonnages.', 'Fnac.png', 0, b'1');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_Product` int(70) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `unit_price` float NOT NULL,
  `id_market` int(70) DEFAULT NULL,
  `image` varchar(70) NOT NULL,
  `id_rubrique` int(70) DEFAULT NULL,
  `id_catalogue` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id_Product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_Product`, `name`, `description`, `unit_price`, `id_market`, `image`, `id_rubrique`, `id_catalogue`, `stock`) VALUES
(1, 'Roku TV', 'Roku Tv is a smart Tv to buy from here, testing testing testing whatever Lol', 1399.99, 3, '1.jpg', 1, 2, 10),
(2, 'Redmi Phone', 'smart phone test test test test test test test test test test test test test test test test test test test test test test test test test test test', 799.99, 6, '2.jpg', 3, 1, 0),
(3, 'Redmi 2', ' test test test test test test test test test test test test test test test', 699.99, 2, '3.jpg', 2, 2, 0),
(4, 'product 3', 'testing testingtestingtestingtestingtestingtesting', 599.99, 1, '4.jpg', 4, 3, 9),
(5, 'testing', 'testingtestingtestingtesting', 1999.99, 5, '5.jpg', 3, 4, 10),
(6, 'Product 6', 'testing testing testing testing testing', 299.99, 4, '6.jpg', 2, 1, 10),
(7, 'Product Lool', 'testing testing testing testing testing testing testing', 999.99, 2, '7.jpg', 4, 4, 2),
(8, 'product 8', 'kdlfznfljfmzfmzrzmlrjmrkjmlklj', 1299.99, 1, '8.jpg', 1, 1, 10),
(9, 'product9', 'lknlnmlknmlknmljkhoinmzfmrlgkzmaglrgam', 199.99, 2, '9.jpg', 2, 3, 9),
(10, 'product10', 'lknlnmlknmlknmljkhoinmzfmrlgkzmaglrgam', 199.99, 2, '10.jpg', 3, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `pourcentage` float NOT NULL,
  `commentaire` text NOT NULL,
  `id_catalogue` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `pourcentage`, `commentaire`, `id_catalogue`, `added_by`) VALUES
(3, 0.5, '50', 4, 16),
(4, 2, 'no 50', 4, 16);

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE IF NOT EXISTS `rubrique` (
  `id_rubrique` int(70) NOT NULL AUTO_INCREMENT,
  `lib_rubrique` varchar(70) NOT NULL,
  `id_catalogue` int(70) DEFAULT NULL,
  PRIMARY KEY (`id_rubrique`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`id_rubrique`, `lib_rubrique`, `id_catalogue`) VALUES
(1, 'Televisions', 1),
(2, 'watches', 2),
(3, 'technology', 1),
(4, 'nature', 4),
(5, 'Clothing', 3),
(6, 'test category', 14),
(7, 'lll', 13);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(70) NOT NULL AUTO_INCREMENT,
  `type` int(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `adress` mediumtext NOT NULL,
  `evaluation` int(70) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `type`, `username`, `password`, `email`, `firstName`, `lastName`, `phone`, `adress`, `evaluation`) VALUES
(1, 0, 'Black_Rose', 'azerty', 'nextgendevelopement@gmail.com', 'Iliass', 'Foukhar', 212700029411, 'Salee 122 rue something', 7),
(2, 1, 'administrator', '12121212', 'admin@goodiez.com', 'moul', 'chi', 66622661, 'I reside in the website', 10),
(15, 3, 'emballage', 'azerty', 'something@gmail.com', 'moul', 'emballage', 63312212, 'Somewhere in kenitra  ', NULL),
(16, 2, 'gestionnaire', 'azerty', 'gestion@gmail.com', 'moul', 'souq', 993311221, 'sakn fl marche        lll ', NULL),
(17, 2, 'seller', 'seller', 'hh@gmail.com', 'gestionaire2', 'salam2', 9939484, 'kkk', NULL),
(18, 2, 'kkkk', 'kkkkk', 'kkk@kkk.Com', 'ismael', 'kkk', 0, 'kkkkkkkk', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
