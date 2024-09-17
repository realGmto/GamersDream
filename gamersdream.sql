-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 01:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamersdream`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `price` float NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `details`, `price`, `genre`) VALUES
(1, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2358720/header.jpg?t=1725007201', 'Black Myth: Wukong', 'Black Myth: Wukong is an action RPG rooted in Chinese mythology. You shall set out as the Destined One to venture into the challenges and marvels ahead, to uncover the obscured truth beneath the veil of a glorious legend from the past.', 59.99, 'rpg'),
(2, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2215430/header.jpg?t=1717622497', 'Ghost of Tsushima DIRECTORS CUT', 'A storm is coming. Venture into the complete Ghost of Tsushima DIRECTORS CUT on PC; forge your own path through this open-world action adventure and uncover its hidden wonders. Brought to you by Sucker Punch Productions, Nixxes Software and PlayStation Studios.', 49.99, 'action'),
(3, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/2183900/header.jpg?t=1725898901', 'Warhammer 40,000: Space Marine 2', 'Embody the superhuman skill and brutality of a Space Marine. Unleash deadly abilities and devastating weaponry to obliterate the relentless Tyranid swarms. Defend the Imperium in spectacular third-person action in solo or multiplayer modes.', 59.99, 'action'),
(4, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/294100/header.jpg?t=1725405670', 'RimWorld', 'A sci-fi colony sim driven by an intelligent AI storyteller. Generates stories by simulating psychology, ecology, gunplay, melee combat, climate, biomes, diplomacy, interpersonal relationships, art, medicine, trade, and more.', 31.99, 'Strategy'),
(5, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1601580/header_alt_assets_1.jpg?t=1726594469', 'Frostpunk 2', 'Develop, expand, and advance your city in a society survival game set 30 years after an apocalyptic blizzard ravaged Earth. In Frostpunk 2, you face not only the perils of never-ending winter, but also the powerful factions that watch your every step inside the Council Hall.', 44.99, 'Strategy'),
(6, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1364780/header.jpg?t=1724735913', 'Street Fighter 6', 'Here comes Capcom’s newest challenger! Street Fighter™ 6 launches worldwide on June 2nd, 2023 and represents the next evolution of the Street Fighter™ series! Street Fighter 6 spans three distinct game modes, including World Tour, Fighting Ground and Battle Hub.', 59.99, 'Fighting'),
(7, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/601150/header.jpg?t=1701395090', 'Devil May Cry 5', 'The ultimate Devil Hunter is back in style, in the game action fans have been waiting for.', 29.99, 'Action'),
(8, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1817190/header.jpg?t=1725991497', 'Marvels Spider-Man: Miles Morales', 'After the events of Marvels Spider-Man Remastered, teenage Miles Morales is adjusting to his new home while following in the footsteps of his mentor, Peter Parker, as a new Spider-Man. When a fierce power struggle threatens to destroy his home, Miles must take up the mantle of Spider-Man and own it', 49.99, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$a6msoEjOEYhDb/.88.vr1e4/XtX3tqJByqyIf1/AP0o9N.K.YznYO', 'admin'),
(2, 'test', 'test@gmail.com', '$2y$10$LCtnQPPE2XUZW3SXI60dh.XffM8Xsc0mKRNi/8Onh5F6Aagj2DeqS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
