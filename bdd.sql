
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_5HDS_gestion_stock`
--
DROP DATABASE IF EXISTS `api_5HDS_gestion_stock`;
CREATE DATABASE IF NOT EXISTS `api_5HDS_gestion_stock` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `api_5HDS_gestion_stock`;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NULL,
  `description` text NULL,
  `token` text NULL,
  `stock` int NULL,
  `price` float NULL,
  `refNum` text NULL,
  `created_at` datetime NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) NULL,
  `lastname` varchar(256) NULL,
  `token` text NULL,
  `role` text NULL,
  `created_at` datetime NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;