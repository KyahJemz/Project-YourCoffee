-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 10:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Database: `FinalsDB`
--

-- --------------------------------------------------------

CREATE TABLE `tbl_accounts` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

CREATE TABLE `tbl_items` (
  `ItemId` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemCategory` varchar(50) NOT NULL,
  `ItemPrice` varchar(50) NOT NULL,
  `ItemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_items` (`ItemId`, `ItemName`, `ItemDescription`, `ItemCategory`, `ItemPrice`, `ItemImage`) VALUES
(1, 'Coffee', 'Classic pick-me-up', 'Coffee', '125', 'Coffee.jpg'),
(2, 'Espresso', 'Bold shot of pure energy', 'Coffee', '100', 'Espresso.jpg'),
(3, 'Cappuccino', 'Rich espresso with foamy delight', 'Coffee', '150', 'Cappuccino.jpg'),
(4, 'Latte', 'Smooth espresso swirled with steamed milk', 'Coffee', '175', 'Latte.jpg'),
(5, 'Mocha', 'Espresso meets decadent chocolate', 'Coffee', '200', 'Mocha.jpg'),
(6, 'Americano', 'Strong coffee with a mellow finish', 'Coffee', '137', 'Americano.jpg'),
(7, 'Hot Chocolate', 'Velvety cocoa warmth', 'Coffee', '200', 'HotChocolate.jpg'),
(8, 'Tea (Herbal)', 'Soothing sips for every mood', 'Coffee', '112', 'TeaHerbal.jpg'),
(9, 'Iced Coffee', 'Cool coffee perfection', 'Cold Drinks', '150', 'IcedCoffee.jpg'),
(10, 'Iced Latte', 'Cold and creamy refreshment', 'Cold Drinks', '175', 'IcedLatte.jpg'),
(11, 'Cold Brew', 'Smooth, chilled coffee', 'Cold Drinks', '200', 'ColdBrew.jpg'),
(12, 'Iced Tea', 'Crisp and cool revitalization', 'Cold Drinks', '112', 'IcedTea.jpg'),
(13, 'Smoothies', 'Fruity blends of pure refreshment', 'Cold Drinks', '225', 'Smoothies.jpg'),
(14, 'Croissants', 'Buttery, flaky indulgence', 'Pastries', '112', 'Croissants.jpg'),
(15, 'Muffins', 'Soft, sweet bites of comfort', 'Pastries', '100', 'Muffins.jpg'),
(16, 'Donuts', 'Irresistibly glazed temptation', 'Pastries', '87', 'Donuts.jpg'),
(17, 'Cookies', 'Chewy, delightful treats', 'Pastries', '75', 'Cookies.jpg'),
(18, 'Turkey & Cheese', 'Savory, satisfying bites', 'Sandwiches', '275', 'TurkeyCheese.jpg'),
(19, 'Ham & Swiss', 'Classic, cheesy goodness', 'Sandwiches', '275', 'HamSwiss.jpg'),
(20, 'Veggie Wrap', 'Fresh, wholesome goodness', 'Sandwiches', '300', 'VeggieWrap.jpg'),
(21, 'Fruit Cup', 'Fresh, colorful fruit medley', 'Healthy Options', '175', 'FruitCup.jpg'),
(22, 'Yogurt Parfait', 'Creamy, fruity goodness', 'Healthy Options', '200', 'YogurtParfait.jpg'),
(23, 'Oatmeal', 'Warm, comforting grains', 'Healthy Options', '150', 'Oatmeal.jpg');

-- --------------------------------------------------------

CREATE TABLE `tbl_messages` (
  `MessageId` int(11) NOT NULL,
  `MessageName` varchar(50) NOT NULL,
  `MessageEmail` varchar(50) NOT NULL,
  `MessageContent` text NOT NULL,
  `MessageTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

CREATE TABLE `tbl_transactions` (
  `TransactionId` int(11) NOT NULL,
  `TransactionAccount` int(11) NOT NULL,
  `TransactionAddress` text NOT NULL,
  `TransactionTell` varchar(20) NOT NULL,
  `TransactionName` varchar(255) NOT NULL,
  `TransactionItems` text NOT NULL,
  `TransactionAmount` varchar(10) NOT NULL,
  `TransactionTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`ItemId`);

ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`MessageId`);

ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`TransactionId`);

-- --------------------------------------------------------

ALTER TABLE `tbl_accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `tbl_items`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `tbl_messages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `tbl_transactions`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

COMMIT;

