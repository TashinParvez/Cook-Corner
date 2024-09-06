-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cook_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `name` varchar(30) DEFAULT NULL,
  `total_time` time NOT NULL,
  `dishes_you_need` varchar(50) NOT NULL,
  `story` varchar(100) NOT NULL,
  `how_you_learn` varchar(100) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `when_to_cook` varchar(50) NOT NULL,
  `used_as` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `nutrition_info` varchar(250) NOT NULL,
  `location_where_it_famous` varchar(50) NOT NULL,
  `for_how_many_person` int(11) NOT NULL,
  `review` varchar(100) NOT NULL,
  `recipe_type` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `skill_level` int(11) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
