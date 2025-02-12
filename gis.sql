-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 03:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brandcode` varchar(4) NOT NULL,
  `brandname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `buildingcode` varchar(4) NOT NULL,
  `buildingname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `buildingcode`, `buildingname`) VALUES
(1, '0001', 'Building 1'),
(4, '0002', 'Building 2'),
(5, '0003', 'Building 3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categorycode` varchar(4) NOT NULL,
  `catdescription` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categorycode`, `catdescription`, `id`) VALUES
('0001', 'Lawn', 1),
('0002', 'Court', 2),
('0003', 'Garden', 3),
('0004', 'Terrace', 4),
('0005', 'Family', 5),
('0006', 'Chateau', 6),
('0007', 'Mansion', 7);

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `id` int(11) NOT NULL,
  `classcode` varchar(4) NOT NULL,
  `classname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`id`, `classcode`, `classname`) VALUES
(1, '0001', 'Regular'),
(2, '0002', 'Inner Walk'),
(3, '0003', 'Walk'),
(4, '0004', 'Inner-Drive'),
(5, '0005', 'Drive');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` varchar(7) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `address` varchar(80) NOT NULL,
  `landline` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `spouse` varchar(40) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `lname`, `fname`, `mi`, `isactive`, `address`, `landline`, `mobile`, `email`, `bday`, `gender`, `spouse`, `id`) VALUES
('CL00001', 'Jamandre', 'Markh', 'B', 1, 'Bacolod', '435-8183', '', '', '1976-10-14', 'Male', '', 1),
('CL00002', 'Pacheco', 'Rouel', 'P', 1, 'Canada', '707-4322', '', '', '1978-10-15', 'Male', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `empid` text NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `lname` text NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mi` text NOT NULL,
  `bday` date NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `idPos` int(11) NOT NULL,
  `sssno` text NOT NULL,
  `phino` text NOT NULL,
  `pagibig` text NOT NULL,
  `tin` text NOT NULL,
  `estatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `empid`, `isactive`, `lname`, `fname`, `mi`, `bday`, `gender`, `address`, `mobile`, `idPos`, `sssno`, `phino`, `pagibig`, `tin`, `estatus`) VALUES
(1, 'EM00001', 1, 'Jamandre', 'Markh', 'B', '1976-10-14', 'Male', '', '', 7, '', '', '', '', 'Contractual'),
(2, 'EM00002', 1, 'Buenaflor', 'Jeisyl', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(3, 'EM00003', 1, 'Remegio', 'Helleno', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(4, 'EM00004', 1, 'Vinson', 'Joelemar', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(5, 'EM00005', 1, 'Dumalaos', 'Kevin', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(6, 'EM00006', 1, 'Cañete', 'Rojane', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(7, 'EM00007', 1, 'Relativo', 'Andrew', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(8, 'EM00008', 1, 'Corpuz', 'Prince', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(9, 'EM00009', 1, 'Tuason', 'Mario', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(10, 'EM00010', 1, 'Parcon', 'Homer', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(11, 'EM00011', 1, 'Labto', 'Jongie', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(12, 'EM00012', 1, 'Espira', 'Johnny', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(13, 'EM00013', 1, 'Palabrica', 'Rey John', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(14, 'EM00014', 1, 'Carabuena', 'Joven', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(15, 'EM00015', 1, 'Jagocoy', 'Gil', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(16, 'EM00016', 1, 'Demi', 'Lemuel', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(17, 'EM00017', 1, 'Verdun', 'Ronald', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(18, 'EM00018', 1, 'Abrematea', 'Edmund', '', '0000-00-00', 'Male', '', '', 5, '', '', '', '', 'Regular'),
(19, 'EM00019', 1, 'Pacite', 'Melvert', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(20, 'EM00020', 1, 'Lebumfacil', 'Aldrin', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(21, 'EM00021', 1, 'Abizar', 'Joel', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(22, 'EM00022', 1, 'Cagalawan', 'Arnold', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(23, 'EM00023', 1, 'Marin', 'Timothy', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(24, 'EM00024', 1, 'Paguntalan', 'Angelo', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(25, 'EM00025', 1, 'Onas', 'Dunhill', '', '0000-00-00', 'Male', '', '', 9, '', '', '', '', 'Regular'),
(26, 'EM00026', 1, 'Zamora', 'Jerry', '', '0000-00-00', 'Male', '', '', 10, '', '', '', '', 'Regular'),
(27, 'EM00027', 1, 'Cartalla', 'John Rey', '', '0000-00-00', 'Male', '', '', 10, '', '', '', '', 'Regular'),
(28, 'EM00028', 1, 'Camero', 'Rodney', '', '0000-00-00', 'Male', '', '', 10, '', '', '', '', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `statdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`id`, `statdesc`) VALUES
(1, 'Regular'),
(2, 'Probationary'),
(3, 'Contractual');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gdesc`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `incoming`
--

CREATE TABLE `incoming` (
  `ponumber` varchar(15) NOT NULL,
  `deldate` date NOT NULL,
  `delstatus` varchar(10) NOT NULL,
  `inctype` varchar(7) NOT NULL,
  `iscode` varchar(15) NOT NULL,
  `delnumber` varchar(15) NOT NULL,
  `checkedby` varchar(7) NOT NULL,
  `deliveredby` varchar(35) NOT NULL,
  `postedby` varchar(7) NOT NULL,
  `remarks` varchar(60) NOT NULL,
  `amount` double(13,2) NOT NULL,
  `discount` float(9,2) NOT NULL,
  `netamount` double(13,2) NOT NULL,
  `productlist` text NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`ponumber`, `deldate`, `delstatus`, `inctype`, `iscode`, `delnumber`, `checkedby`, `deliveredby`, `postedby`, `remarks`, `amount`, `discount`, `netamount`, `productlist`, `id`) VALUES
('P00001', '2023-09-05', 'Posted', 'Invoice', '001', 'SD00001', 'EM00006', '', 'EM00001', '', 2500.00, 0.00, 2500.00, '[{\"qty\":\"3.00\",\"price\":\"300.00\",\"tamount\":\"900.00\",\"itemid\":\"P00325\"},{\"qty\":\"2.00\",\"price\":\"500.00\",\"tamount\":\"1000.00\",\"itemid\":\"P00326\"},{\"qty\":\"3.00\",\"price\":\"200.00\",\"tamount\":\"600.00\",\"itemid\":\"P00739\"}]', 1),
('P00002', '2023-09-05', 'Posted', 'Invoice', '001', 'SD00002', 'EM00006', '', 'EM00001', '', 3500.00, 0.00, 3500.00, '[{\"qty\":\"5.00\",\"price\":\"700.00\",\"tamount\":\"3500.00\",\"itemid\":\"P00432\"}]', 2),
('P00003', '2023-09-05', 'Posted', 'Invoice', '009', 'SD00003', 'EM00014', '', 'EM00001', '', 1500.00, 0.00, 1500.00, '[{\"qty\":\"12.00\",\"price\":\"100.00\",\"tamount\":\"1200.00\",\"itemid\":\"P00118\"},{\"qty\":\"10.00\",\"price\":\"30.00\",\"tamount\":\"300.00\",\"itemid\":\"P00270\"}]', 3),
('P00004', '2023-09-05', 'Posted', 'Invoice', '78835', 'SD00004', 'EM00001', '', 'EM00001', '', 1500.00, 0.00, 1500.00, '[{\"qty\":\"3.00\",\"price\":\"500.00\",\"tamount\":\"1500.00\",\"itemid\":\"P00325\"}]', 4);

-- --------------------------------------------------------

--
-- Table structure for table `incomingitems`
--

CREATE TABLE `incomingitems` (
  `delnumber` varchar(15) NOT NULL,
  `ponumber` varchar(15) NOT NULL,
  `qty` float(9,2) NOT NULL,
  `price` float(9,2) NOT NULL,
  `tamount` double(11,2) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomingitems`
--

INSERT INTO `incomingitems` (`delnumber`, `ponumber`, `qty`, `price`, `tamount`, `itemid`, `id`) VALUES
('SD00001', 'P00001', 3.00, 300.00, 900.00, 'P00325', 1),
('SD00001', 'P00001', 2.00, 500.00, 1000.00, 'P00326', 2),
('SD00001', 'P00001', 3.00, 200.00, 600.00, 'P00739', 3),
('SD00002', 'P00002', 5.00, 700.00, 3500.00, 'P00432', 4),
('SD00003', 'P00003', 12.00, 100.00, 1200.00, 'P00118', 5),
('SD00003', 'P00003', 10.00, 30.00, 300.00, 'P00270', 6),
('SD00004', 'P00004', 3.00, 500.00, 1500.00, 'P00325', 7);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `countedby` varchar(7) NOT NULL,
  `invstatus` varchar(10) NOT NULL,
  `invdate` date NOT NULL,
  `invnumber` varchar(10) NOT NULL,
  `postedby` varchar(7) NOT NULL,
  `remarks` text NOT NULL,
  `productlist` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`countedby`, `invstatus`, `invdate`, `invnumber`, `postedby`, `remarks`, `productlist`, `id`) VALUES
('EM00018', 'Posted', '2023-09-04', 'I00001', 'EM00001', '', '[{\"qty\":\"5.00\",\"itemid\":\"P00325\"},{\"qty\":\"5.00\",\"itemid\":\"P00326\"},{\"qty\":\"30.00\",\"itemid\":\"P00739\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitems`
--

CREATE TABLE `inventoryitems` (
  `invnumber` varchar(10) NOT NULL,
  `qty` float(11,2) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventoryitems`
--

INSERT INTO `inventoryitems` (`invnumber`, `qty`, `itemid`, `id`) VALUES
('I00001', 5.00, 'P00325', 1),
('I00001', 5.00, 'P00326', 2),
('I00001', 30.00, 'P00739', 3);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `categorycode` varchar(4) NOT NULL,
  `purchaseitem` tinyint(4) NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `itemcode` varchar(30) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `pdesc` varchar(150) NOT NULL,
  `meas1` varchar(8) NOT NULL,
  `eqnum` float(10,2) NOT NULL,
  `meas2` varchar(8) NOT NULL,
  `ucost` float(9,2) NOT NULL,
  `reorder` float(10,2) NOT NULL,
  `remarks` varchar(80) NOT NULL,
  `onhand` float(9,2) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`categorycode`, `purchaseitem`, `isactive`, `itemcode`, `itemid`, `pdesc`, `meas1`, `eqnum`, `meas2`, `ucost`, `reorder`, `remarks`, `onhand`, `id`) VALUES
('0001', 1, 1, '', 'P00001', '15Kw 20Hp Hydraulic Pump Inverter, 3P 50Hz 60Hz 220V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 5.00, 1),
('0001', 1, 1, '', 'P00002', '30Kw 40Hp Electric Motor Inverter, 3P 50Hz 60Hz 220V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 5.00, 2),
('0001', 1, 1, '', 'P00003', 'Air Cylinder, Double Acting, SC50X125', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 4.00, 3),
('0001', 1, 1, '', 'P00004', 'Air Filter Regulator, Saw100', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 2.00, 4),
('0001', 1, 1, '', 'P00005', 'Allen Bolt 12X75', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 5.00, 5),
('0001', 1, 1, '', 'P00006', 'Allen Bolt 16X75', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 2.00, 6),
('0001', 1, 1, '', 'P00007', 'Allen Bolt 16X120', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 4.00, 7),
('0001', 1, 1, '', 'P00008', 'Allen Bolt 60X80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 8),
('0001', 1, 1, '', 'P00009', 'Allen Bolt 20X160', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 9),
('0001', 1, 1, '', 'P00010', 'Allen Bolt 30X90', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 10),
('0001', 1, 1, '', 'P00011', 'Analog Pressure Switch, Liyou 0225MPA 380V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 11),
('0001', 1, 1, '', 'P00012', 'Bearing NSK-6017', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 12),
('0001', 1, 1, '', 'P00013', 'Bearing SKF-6017', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 13),
('0001', 1, 1, '', 'P00014', 'Belt C125 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 14),
('0001', 1, 1, '', 'P00015', 'Belt C126', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 15),
('0001', 1, 1, '', 'P00016', 'Bladder Accumulator, NS GB/T20663', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 16),
('0001', 1, 1, '', 'P00017', 'Blower Fan, CZR-50mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 17),
('0001', 1, 1, '', 'P00018', 'Buffer Ring 1155X100X6.3', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 18),
('0001', 1, 1, '', 'P00019', 'Circlip 24.2X0X1.2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 19),
('0001', 1, 1, '', 'P00020', 'Circuit Breaker, 175amp, 3 Poles Bolt-On Type', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 20),
('0001', 1, 1, '', 'P00021', 'Circuit Breaker, 175amp, 3 Poles Plug-In Type', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 21),
('0001', 1, 1, '', 'P00022', 'Digital Pressure Switch, MD-S9282-4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 22),
('0001', 1, 1, '', 'P00023', 'Electric Motor, Gear Box, 3Okw, 40Hp, 220V, 3P- 60Hz-1180rpm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 23),
('0001', 1, 1, '', 'P00024', 'Electro Hydraulic Servo Valve, QDY6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 24),
('0001', 1, 1, '', 'P00025', 'Gate Valve, 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 25),
('0001', 1, 1, '', 'P00026', 'Gefran Sensor Model:LT-M-02005-XL02020', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 26),
('0001', 1, 1, '', 'P00027', 'Gefran Sensor Model:PY-2-F-025-SO1M-Xl0202', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 27),
('0001', 1, 1, '', 'P00028', 'Heater 150X85, 220V 1000W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 28),
('0001', 1, 1, '', 'P00029', 'Heater 235X90, 220V 1500W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 29),
('0001', 1, 1, '', 'P00030', 'Heater 248X100, 220V 1800W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 30),
('0001', 1, 1, '', 'P00031', 'Heater 320X100, 220V 2000W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 31),
('0001', 1, 1, '', 'P00032', 'Heater 320X165, 220V 3300W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 32),
('0001', 1, 1, '', 'P00033', 'Heater 320X80, 220V 2000W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 33),
('0001', 1, 1, '', 'P00034', 'Heater 338X75, 220V 1800W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 34),
('0001', 1, 1, '', 'P00035', 'Hex Bolt, 16X75', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 35),
('0001', 1, 1, '', 'P00036', 'Inverter, S/N GD200A-018G/022P-4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 36),
('0001', 1, 1, '', 'P00037', 'Light Curtain, Sensor, 30Lc0475-NE18S', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 37),
('0001', 1, 1, '', 'P00038', 'Light Curtain, Sensor, 30Lc0475-NR18S', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 38),
('0001', 1, 1, '', 'P00039', 'Limit Switch, Roller Lever, Omron D4V-8104Z', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 39),
('0001', 1, 1, '', 'P00040', 'Magic Eye, Photo Electric Switch E3JK-DS30M1', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 40),
('0001', 1, 1, '', 'P00041', 'Miniature Circuit Breaker, 25Amp, 2 Poles Plug-In Type', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 41),
('0001', 1, 1, '', 'P00042', 'Mininiature Circuit Breaker, 32Amp, 3 Poles DIN Rail', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 42),
('0001', 1, 1, '', 'P00043', 'Monoseal 20X15X3', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 43),
('0001', 1, 1, '', 'P00044', 'Monoseal 24/26X14X10.5 NBR+P A6 FAB Eu/K51', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 44),
('0001', 1, 1, '', 'P00045', 'Monoseal 35X25X5 PU Hallite IDI/ISI', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 45),
('0001', 1, 1, '', 'P00046', 'Monoseal 80X70X6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 46),
('0001', 1, 1, '', 'P00047', 'Monoseal 90X80X6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 47),
('0001', 1, 1, '', 'P00048', 'Oil Seal 45X25X11', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 48),
('0001', 1, 1, '', 'P00049', 'Oil Seal TC 110X85X12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 49),
('0001', 1, 1, '', 'P00050', 'Oring 2.62X17.86', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 50),
('0001', 1, 1, '', 'P00051', 'Oring 3X13', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 51),
('0001', 1, 1, '', 'P00052', 'Oring 3X85', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 52),
('0001', 1, 1, '', 'P00053', 'Oring 40X34X3mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 53),
('0001', 1, 1, '', 'P00054', 'Oring 4X93', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 54),
('0001', 1, 1, '', 'P00055', 'Oring 5.33X101.6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 55),
('0001', 1, 1, '', 'P00056', 'Oring 5.33X111.13', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 56),
('0001', 1, 1, '', 'P00057', 'Oring 5X205', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 57),
('0001', 1, 1, '', 'P00058', 'Oring 5X205 NBR70 GAPI-ITA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 58),
('0001', 1, 1, '', 'P00059', 'Output Relay, 17D198086', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 59),
('0001', 1, 1, '', 'P00060', 'Photo Electric Sensor, BEN300-DDT', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 60),
('0001', 1, 1, '', 'P00061', 'Proximity Switch, PSE 17-5DN', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 61),
('0001', 1, 1, '', 'P00062', 'Pump Motor, Hydraulic, Secondary, 2.2kw, 3Hp, 220V, 3P-4Poles- 60Hz-1430/1725rpm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 62),
('0001', 1, 1, '', 'P00063', 'Pump Motor, Hydraulic, Main, 15kw, 20Hp, 220V, 3P- 60hz-1760rpm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 63),
('0001', 1, 1, '', 'P00064', 'Pump Motor, Hydraulic, Wall Thickness, 3.75kw, 5Hp, 220/380V, 3P-50/60hz-1430/1730rpm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 64),
('0001', 1, 1, '', 'P00065', 'Push Button Switch', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 65),
('0001', 1, 1, '', 'P00066', 'Push In Fittings, SPC 10-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 66),
('0001', 1, 1, '', 'P00067', 'Push In Fittings, SPC 12-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 67),
('0001', 1, 1, '', 'P00068', 'Push In Fittings, SPL 10-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 68),
('0001', 1, 1, '', 'P00069', 'Push In Fittings, TEE 12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 69),
('0001', 1, 1, '', 'P00070', 'Schneider Electric Contactor, LC1 E09 10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 70),
('0001', 1, 1, '', 'P00071', 'Solenoid Valve, NP13-25A-12C-3', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 71),
('0001', 1, 1, '', 'P00072', 'Solenoid Valve, SVK 1220', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 72),
('0001', 1, 1, '', 'P00073', 'Solenoid Valve, VP342 -5GD1-02A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 73),
('0001', 1, 1, '', 'P00074', 'Solid State Relay, SSR-40DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 74),
('0001', 1, 1, '', 'P00075', 'Solid State Relay, SSR-80DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 75),
('0001', 1, 1, '', 'P00076', 'Wiferflex 110X100X6/8 PU Hallite DH', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 76),
('0001', 1, 1, '', 'P00077', 'Wiferflex 153X140X7/9.5', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 77),
('0001', 1, 1, '', 'P00078', 'Wiferflex 153X140X7/9.5', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 78),
('0001', 1, 1, '', 'P00079', 'Wiferflex 153X140X7/9.5 NBR FAB LBH', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 79),
('0001', 1, 1, '', 'P00080', 'Wiferflex 90X80X6/8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 80),
('0002', 1, 1, '', 'P00081', '2P40A Switch (Miniature Breaker) DZ47-63 C40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 81),
('0002', 1, 1, '', 'P00082', '2P6A Switch (Miniature Breaker) DZ47-63 C10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 82),
('0002', 1, 1, '', 'P00083', '2P6A Switch (Miniature Breaker) DZ47-63 C6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 83),
('0002', 1, 1, '', 'P00084', 'Air Cylinder 100X150', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 20.00, 84),
('0002', 1, 1, '', 'P00085', 'Air Cylinder 25X25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 85),
('0002', 1, 1, '', 'P00086', 'Air Cylinder 32X150', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 86),
('0002', 1, 1, '', 'P00087', 'Air Cylinder 32X25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 87),
('0002', 1, 1, '', 'P00088', 'Air Cylinder 63X600', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 88),
('0002', 1, 1, '', 'P00089', 'Air Cylinder 8DAU32125', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 89),
('0002', 1, 1, '', 'P00090', 'Air Cylinder 8DAU32150', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 90),
('0002', 1, 1, '', 'P00091', 'Air Cylinder 8DAU32175', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 91),
('0002', 1, 1, '', 'P00092', 'Air Cylinder 8FDA2525X', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 92),
('0002', 1, 1, '', 'P00093', 'Air Cylinder JD5030S', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 93),
('0002', 1, 1, '', 'P00094', 'Air Cylinder SC ZGXCL 40X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 94),
('0002', 1, 1, '', 'P00095', 'Air Cylinder SC32X150', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 95),
('0002', 1, 1, '', 'P00096', 'Air Cylinder SDA 20X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 96),
('0002', 1, 1, '', 'P00097', 'Air Cylinder SDA 32X20', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 97),
('0002', 1, 1, '', 'P00098', 'Air Cylinder TSDA 50X15-B', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 98),
('0002', 1, 1, '', 'P00099', 'Air Filter Regulator AR2000-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 99),
('0002', 1, 1, '', 'P00100', 'Air Filter Regulator Lubricator Combination Cylinder, AW3000-03 and AL3000-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 100),
('0002', 1, 1, '', 'P00101', 'Air Shaft Nozzle', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 101),
('0002', 1, 1, '', 'P00102', 'Allen Bolt 10X80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 102),
('0002', 1, 1, '', 'P00103', 'Allen Bolt 10X90', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 103),
('0002', 1, 1, '', 'P00104', 'Allen Bolt 6X20', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 104),
('0002', 1, 1, '', 'P00105', 'Allen Bolt 18X75', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 105),
('0002', 1, 1, '', 'P00106', 'Anti Static Device', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 106),
('0002', 1, 1, '', 'P00107', 'Anti Static Tube', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 107),
('0002', 1, 1, '', 'P00108', 'Automatic Proximity Switch PSE 17-5DN', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 108),
('0002', 1, 1, '', 'P00109', 'Bamboo Curtain 30cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 109),
('0002', 1, 1, '', 'P00110', 'Bamboo Curtain 42cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 110),
('0002', 1, 1, '', 'P00111', 'Bearing 1203', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 111),
('0002', 1, 1, '', 'P00112', 'Bearing 1204', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 112),
('0002', 1, 1, '', 'P00113', 'Bearing 1205', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 113),
('0002', 1, 1, '', 'P00114', 'Bearing 6001', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 114),
('0002', 1, 1, '', 'P00115', 'Bearing 6004', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 115),
('0002', 1, 1, '', 'P00116', 'Bearing 6005', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 116),
('0002', 1, 1, '', 'P00117', 'Bearing 6024', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 117),
('0002', 1, 1, '', 'P00118', 'Bearing 6203', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 12.00, 118),
('0002', 1, 1, '', 'P00119', 'Bearing 6204', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 119),
('0002', 1, 1, '', 'P00120', 'Bearing 6303', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 120),
('0002', 1, 1, '', 'P00121', 'Bearing 6306', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 121),
('0002', 1, 1, '', 'P00122', 'Bearing 6311', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 122),
('0002', 1, 1, '', 'P00123', 'Bearing 6904', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 123),
('0002', 1, 1, '', 'P00124', 'Bearing CSK-25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 124),
('0002', 1, 1, '', 'P00125', 'Bearing CSK-356218', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 125),
('0002', 1, 1, '', 'P00126', 'Bearing NK-130', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 126),
('0002', 1, 1, '', 'P00127', 'Belt 510L (Timing Belt Width: 25mm)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 127),
('0002', 1, 1, '', 'P00128', 'Belt 8M-25-6500 White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 128),
('0002', 1, 1, '', 'P00129', 'Belt 8M-6500-30 White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 129),
('0002', 1, 1, '', 'P00130', 'Belt A39 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 130),
('0002', 1, 1, '', 'P00131', 'Belt A42 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 131),
('0002', 1, 1, '', 'P00132', 'Belt A43 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 132),
('0002', 1, 1, '', 'P00133', 'Belt A44 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 133),
('0002', 1, 1, '', 'P00134', 'Belt A45 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 134),
('0002', 1, 1, '', 'P00135', 'Belt A53 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 135),
('0002', 1, 1, '', 'P00136', 'Belt B37 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 136),
('0002', 1, 1, '', 'P00137', 'Belt B42 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 137),
('0002', 1, 1, '', 'P00138', 'Belt B63 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 138),
('0002', 1, 1, '', 'P00139', 'Belt B65 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 139),
('0002', 1, 1, '', 'P00140', 'Belt C32 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 140),
('0002', 1, 1, '', 'P00141', 'Belt HTD 1200-8M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 141),
('0002', 1, 1, '', 'P00142', 'Belt HTD1000-8M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 142),
('0002', 1, 1, '', 'P00143', 'Belt HTD1288-14M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 143),
('0002', 1, 1, '', 'P00144', 'Belt HTD592-8M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 144),
('0002', 1, 1, '', 'P00145', 'Belt HTD880-8M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 145),
('0002', 1, 1, '', 'P00146', 'Bi Welding TEE 6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 146),
('0002', 1, 1, '', 'P00147', 'Black Aluminium Nylon Brush Strip 19in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 147),
('0002', 1, 1, '', 'P00148', 'Button Switch KCD4 15/30A 250V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 148),
('0002', 1, 1, '', 'P00149', 'Chopping Board, 22cm Small', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 149),
('0002', 1, 1, '', 'P00150', 'Chopping Board,40cm/405Mmx15Mm Big', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 150),
('0002', 1, 1, '', 'P00151', 'Cold Cutter 6Cmx.73M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 151),
('0002', 1, 1, '', 'P00152', 'Computer Punching Panel', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 152),
('0002', 1, 1, '', 'P00153', 'Copper Billet', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 153),
('0002', 1, 1, '', 'P00154', 'Cross Flow Fan', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 154),
('0002', 1, 1, '', 'P00155', 'Cross Flow Fan Motor CYF-06043/220V/45W/0.3A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 155),
('0002', 1, 1, '', 'P00156', 'Cutter Main Rubber Roller 76Cm Green', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 156),
('0002', 1, 1, '', 'P00157', 'Cylinder WWX-63-150-15E-3T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 157),
('0002', 1, 1, '', 'P00158', 'Die Cutter Large 170X170', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 158),
('0002', 1, 1, '', 'P00159', 'Die Cutter Medium 170X170', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 159),
('0002', 1, 1, '', 'P00160', 'Die Cutter Micro', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 160),
('0002', 1, 1, '', 'P00161', 'Die Cutter Mini', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 161),
('0002', 1, 1, '', 'P00162', 'Die Cutter Tiny', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 162),
('0002', 1, 1, '', 'P00163', 'Die Cutter X-Large', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 163),
('0002', 1, 1, '', 'P00164', 'DMSJ-20 Solid State Sensor 35.5Diameter', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 164),
('0002', 1, 1, '', 'P00165', 'Emergency Stop Button', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 165),
('0002', 1, 1, '', 'P00166', 'Excellence Electronic Speed Switch', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 166),
('0002', 1, 1, '', 'P00167', 'Gear Motor Magnetic Powder Brake FZ50A-1', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 167),
('0002', 1, 1, '', 'P00168', 'General Purpose Relay Idec RJIS CL-D24', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 168),
('0002', 1, 1, '', 'P00169', 'General Purpose Relay JQV-13FL Cygkcn', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 169),
('0002', 1, 1, '', 'P00170', 'General Purpose Relay JQX-13F (D)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 170),
('0002', 1, 1, '', 'P00171', 'General Purpose Relay JZX-22F (D)2Z', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 171),
('0002', 1, 1, '', 'P00172', 'Hand Lever Valve KMEPC 4Hv230-08', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 172),
('0002', 1, 1, '', 'P00173', 'Heat Bend Spring Silver 15X60', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 173),
('0002', 1, 1, '', 'P00174', 'Heat Bend Spring Yellow 20X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 174),
('0002', 1, 1, '', 'P00175', 'Heat Bend Spring Yellow 20X70', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 175),
('0002', 1, 1, '', 'P00176', 'Heat Bend Spring Yellow 25X80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 176),
('0002', 1, 1, '', 'P00177', 'Heat Spring Silver 20X80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 177),
('0002', 1, 1, '', 'P00178', 'Heater 1200X28 110V 1500W Rectangular', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 178),
('0002', 1, 1, '', 'P00179', 'Heater 12X140 220V 350W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 179),
('0002', 1, 1, '', 'P00180', 'Heater 12X40 220V 150W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 180),
('0002', 1, 1, '', 'P00181', 'Heater 12X615 220V 1200W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 181),
('0002', 1, 1, '', 'P00182', 'Heater 12X615 Gfq-600', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 182),
('0002', 1, 1, '', 'P00183', 'Heater 15.8X435 220V 2400W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 183),
('0002', 1, 1, '', 'P00184', 'Heater 15.8X470 220V 2000W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 184),
('0002', 1, 1, '', 'P00185', 'Heater 15.8X500 220V 2400W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 185),
('0002', 1, 1, '', 'P00186', 'Heater 15.8X780 220V 3500W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 186),
('0002', 1, 1, '', 'P00187', 'Heater 220V 100W 17/11', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 187),
('0002', 1, 1, '', 'P00188', 'Heater 420X30 110V 2100W Rectangular', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 188),
('0002', 1, 1, '', 'P00189', 'Heater 430X20 110V 600W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 189),
('0002', 1, 1, '', 'P00190', 'Heater 8X50 220V 100W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 190),
('0002', 1, 1, '', 'P00191', 'Intelligent Speed Controller XC0972012', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 191),
('0002', 1, 1, '', 'P00192', 'Inverter GD20-1R5G-S2 Power Output:1.5Kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 192),
('0002', 1, 1, '', 'P00193', 'Magic Eye (Reed Switch) CMSG-020', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 193),
('0002', 1, 1, '', 'P00194', 'Magic Eye (Sick Optex Sensor) Crd-300N', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 194),
('0002', 1, 1, '', 'P00195', 'Maong For Cuter Weights', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 195),
('0002', 1, 1, '', 'P00196', 'Nitoflon 0.08X13X10 Red', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 196),
('0002', 1, 1, '', 'P00197', 'Nitoflon 0.13X13X10 Green', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 197),
('0002', 1, 1, '', 'P00198', 'Photo Electric Sensor HP7-P11 Light On', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 198),
('0002', 1, 1, '', 'P00199', 'Photoelectric Sensor Ketai Z3J-DS-50E3', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 199),
('0002', 1, 1, '', 'P00200', 'Pneumatic Metal Connector, JSC 8-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 200),
('0002', 1, 1, '', 'P00201', 'Potentiometer 4.7K WXD3-13', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 201),
('0002', 1, 1, '', 'P00202', 'Power Supply 24Volts', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 202),
('0002', 1, 1, '', 'P00203', 'Power Supply 48 Volts', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 203),
('0002', 1, 1, '', 'P00204', 'Proximity Sensor Pl*05N Red', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 204),
('0002', 1, 1, '', 'P00205', 'Proximity Sensork M12-04N Red', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 205),
('0002', 1, 1, '', 'P00206', 'Proximity Switch KL-05N', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 206),
('0002', 1, 1, '', 'P00207', 'Push Button Green (Normally Open)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 207),
('0002', 1, 1, '', 'P00208', 'Push Button Red (Normally Close)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 208),
('0002', 1, 1, '', 'P00209', 'Push Button Yellow (Forward Reverse)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 209),
('0002', 1, 1, '', 'P00210', 'Robotic Arm -0 3.5 Diameter', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 210),
('0002', 1, 1, '', 'P00211', 'Rod Silver .60Mx13mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 211),
('0002', 1, 1, '', 'P00212', 'Rod Silver 38Cmx13mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 212),
('0002', 1, 1, '', 'P00213', 'Rubber For Robotic Arm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 213),
('0002', 1, 1, '', 'P00214', 'Rubber Guide -Oil', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 214),
('0002', 1, 1, '', 'P00215', 'Rubber Roller 50cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 215),
('0002', 1, 1, '', 'P00216', 'Sealing Bar 50Cmx7cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 216),
('0002', 1, 1, '', 'P00217', 'Sealing Bar 78Cmx7cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 217),
('0002', 1, 1, '', 'P00218', 'Sealing Cutter Thin Blade/Perfiration Blade L.39.7, W.3.0,Thickness:3mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 218),
('0002', 1, 1, '', 'P00219', 'Sensor CS1Uo20', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 219),
('0002', 1, 1, '', 'P00220', 'Sensor YK-500 2A 20mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 220),
('0002', 1, 1, '', 'P00221', 'Servo Motor MS 1H1-75B30Cb 0.75Kw 220V 3000R/Min 2.39N.M 250Hz 4.8A Motor Code:14101 Sn:011108344N503253', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 221),
('0002', 1, 1, '', 'P00222', 'Servo Motor SGD7S-200 A00 B202', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 222),
('0002', 1, 1, '', 'P00223', 'Silicon Rubber', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 223),
('0002', 1, 1, '', 'P00224', 'Silicon Rubber /Squeeze Rubber 17in X45Mmx8mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 224),
('0002', 1, 1, '', 'P00225', 'Silicon Rubber 17in Rollbag', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 225),
('0002', 1, 1, '', 'P00226', 'Slide Bearing 30UU', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 226),
('0002', 1, 1, '', 'P00227', 'Solenoid Valve 4V210-08', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 227),
('0002', 1, 1, '', 'P00228', 'Solenoid Valve SW-6102', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 228),
('0002', 1, 1, '', 'P00229', 'Solid State Module KSR 25DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 229),
('0002', 1, 1, '', 'P00230', 'Solid State Module KSR-40 VA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 230),
('0002', 1, 1, '', 'P00231', 'Solid State Relay KSR-40 DAE', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 231),
('0002', 1, 1, '', 'P00232', 'Solid State Relay SSR-25DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 232),
('0002', 1, 1, '', 'P00233', 'Solid State Relay SSR-40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 233),
('0002', 1, 1, '', 'P00234', 'Solid State Relay SSR-40DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 234),
('0002', 1, 1, '', 'P00235', 'Solid State Relay SSR-80DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 235),
('0002', 1, 1, '', 'P00236', 'Solid State Relay SSVR XMD-R40A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 236),
('0002', 1, 1, '', 'P00237', 'Spc Fittings 6-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 237),
('0002', 1, 1, '', 'P00238', 'Speed Control Motor 5GU-60-RGU-CF', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 238),
('0002', 1, 1, '', 'P00239', 'Speed Controller', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 239),
('0002', 1, 1, '', 'P00240', 'Tamper Guide Circle', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 240),
('0002', 1, 1, '', 'P00241', 'Tamper Guide Rod', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 241),
('0002', 1, 1, '', 'P00242', 'Teflon Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 242),
('0002', 1, 1, '', 'P00243', 'Temperature Control 1912-6348 ETC-20-V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 243),
('0002', 1, 1, '', 'P00244', 'Temperature Controller 100-240 VAC', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 244),
('0002', 1, 1, '', 'P00245', 'Temperature Controller ETC-20 SSR 30MA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 245),
('0002', 1, 1, '', 'P00246', 'Terminal Block 10P 20A 500V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 246),
('0002', 1, 1, '', 'P00247', 'Terminal Block 4P 25A 600V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 247),
('0002', 1, 1, '', 'P00248', 'Thermocouple 20CMK SS Insulation', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 248),
('0002', 1, 1, '', 'P00249', 'Thermocouple 2MK WRN-02 Cloth Insulation', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 249),
('0002', 1, 1, '', 'P00250', 'Thermocouple WRN-01 5000mm w/o Cloth Insulation', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 250),
('0002', 1, 1, '', 'P00251', 'Thermocouple WRN-M6 4000mm w/o Cloth Insulation', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 251),
('0002', 1, 1, '', 'P00252', 'Torque Motor/Speed Control Motor 5RK120Gn-SFM 10 5GU-120-K 120W 0.70A 1550R/min', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 252),
('0002', 1, 1, '', 'P00253', 'Wood With Bearing Lme12UU', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 253),
('0003', 1, 1, '', 'P00254', 'Bearing 6002', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 254),
('0003', 1, 1, '', 'P00255', 'Coupling 1/2in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 255),
('0003', 1, 1, '', 'P00256', 'Elbow 1/2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 256),
('0003', 1, 1, '', 'P00257', 'Filament Hallogen Heater Long', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 257),
('0003', 1, 1, '', 'P00258', 'Filament Hallogen Heater Short', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 258),
('0003', 1, 1, '', 'P00259', 'FX3Sa-20MR-CM, Programmable Controller', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 259),
('0003', 1, 1, '', 'P00260', 'Heater 14X515 220V 1400W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 260),
('0003', 1, 1, '', 'P00261', 'Hex Bolt 6X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 261),
('0003', 1, 1, '', 'P00262', 'Magic Eye, Photo Electric Switch E3JK-DS30M1', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 262),
('0003', 1, 1, '', 'P00263', 'Oil Seal TC 110X85X12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 263),
('0003', 1, 1, '', 'P00264', 'Oil Seal 25X15X8 THO-TT TC/TF', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 264),
('0003', 1, 1, '', 'P00265', 'Oil Seal Wiper Metal 50X40X5', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 265),
('0003', 1, 1, '', 'P00266', 'Oil Seal Wiper Metal 50X40X7/10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 266),
('0003', 1, 1, '', 'P00267', 'Solenoid Valve, VF5120K-5GD1-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 267),
('0003', 1, 1, '', 'P00268', 'Solenoid Valve, 4966K0Q120', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 268),
('0003', 1, 1, '', 'P00269', 'Push In Fittings, SPL 8-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 269),
('0004', 1, 1, '', 'P00270', 'Bearing 6202', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 10.00, 270),
('0004', 1, 1, '', 'P00271', 'Bearing 6313', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 271),
('0004', 1, 1, '', 'P00272', 'Bearing UCFl208-FYH', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 272),
('0004', 1, 1, '', 'P00273', 'Belt B52', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 273),
('0004', 1, 1, '', 'P00274', 'Belt B54 (Pix)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 274),
('0004', 1, 1, '', 'P00275', 'Belt B70 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 275),
('0004', 1, 1, '', 'P00276', 'Belt B71', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 276),
('0004', 1, 1, '', 'P00277', 'Belt B73 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 277),
('0004', 1, 1, '', 'P00278', 'Belt C71', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 278),
('0004', 1, 1, '', 'P00279', 'Belt C85 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 279),
('0004', 1, 1, '', 'P00280', 'Belt C97 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 280),
('0004', 1, 1, '', 'P00281', 'Belt, 1372 LI', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 281),
('0004', 1, 1, '', 'P00282', 'Elbow GI 1in HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 282),
('0004', 1, 1, '', 'P00283', 'Gate Valve 1-1/2in Brass', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 283),
('0004', 1, 1, '', 'P00284', 'Heater Ø134X120, 220V 1200W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 284),
('0004', 1, 1, '', 'P00285', 'Heater Ø134X90, 220V 990W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 285),
('0004', 1, 1, '', 'P00286', 'Heater Ø135X100, 220V 1500W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 286),
('0004', 1, 1, '', 'P00287', 'Heater Ø135X100, 220V 1500W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 287),
('0004', 1, 1, '', 'P00288', 'Heater Ø135X135, 220V 1500W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 288),
('0004', 1, 1, '', 'P00289', 'Heater Ø135X135, 220V 1500W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 289),
('0004', 1, 1, '', 'P00290', 'Heater Ø135X80, 220V 1500W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 290),
('0004', 1, 1, '', 'P00291', 'Heater Ø135X80, 220V 1500W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 291),
('0004', 1, 1, '', 'P00292', 'Heater Ø14X515 220V 1400W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 292),
('0004', 1, 1, '', 'P00293', 'Heater Ø17.5X100 220V 350W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 293),
('0004', 1, 1, '', 'P00294', 'Heater Ø17.5X140 220V 400W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 294),
('0004', 1, 1, '', 'P00295', 'Heater Ø17.5X150 220V 500W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 295),
('0004', 1, 1, '', 'P00296', 'Heater Ø17.5X150 220V 600W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 296),
('0004', 1, 1, '', 'P00297', 'Heater Ø17.5X180 220V 500W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 297),
('0004', 1, 1, '', 'P00298', 'Heater Ø17.5X80 220V 300W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 298),
('0004', 1, 1, '', 'P00299', 'Heater Ø180X120 220V 1800W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 299),
('0004', 1, 1, '', 'P00300', 'Heater Ø260X38, 220V 300W Mica (Rec/Flat)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 300),
('0004', 1, 1, '', 'P00301', 'Heater Ø340X110 220V 1300W Mica (Rec/Flat)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 301),
('0004', 1, 1, '', 'P00302', 'Heater Ø340X290, 220V/2100W Mica Square', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 302),
('0004', 1, 1, '', 'P00303', 'Heater Ø470X25, 220V 700W Ceramic Rectangular', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 303),
('0004', 1, 1, '', 'P00304', 'Heater Ø490X135 2600W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 304),
('0004', 1, 1, '', 'P00305', 'Heater Ø495X130, 220V 2600W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 305),
('0004', 1, 1, '', 'P00306', 'Heater Ø557X120, 220V 2600W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 306),
('0004', 1, 1, '', 'P00307', 'Heater Ø82X110, 220V 1000W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 307),
('0004', 1, 1, '', 'P00308', 'Hydraulic Hose 1/2X350cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 308),
('0004', 1, 1, '', 'P00309', 'Inverter, AC900-Key-1', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 309),
('0004', 1, 1, '', 'P00310', 'Inverter, GD200A-030G/037P-4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 310),
('0004', 1, 1, '', 'P00311', 'Magnet Hopper', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 311),
('0004', 1, 1, '', 'P00312', 'Miniature Breaker 63A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 312),
('0004', 1, 1, '', 'P00313', 'Oil Seal 105X130X12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 313),
('0004', 1, 1, '', 'P00314', 'Oil Seal 85X110X12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 314),
('0004', 1, 1, '', 'P00315', 'PVC Blue Elbow 63mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 315),
('0004', 1, 1, '', 'P00316', 'PVC Coupling Connector 1-1/4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 316),
('0004', 1, 1, '', 'P00317', 'PVC Female Adapter 32mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 317),
('0004', 1, 1, '', 'P00318', 'Screw & Barrel, 82X98cm Dia (Pel 1)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 318),
('0004', 1, 1, '', 'P00319', 'Screw & Barrel, 95mm X 2072mm (Pel 2)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 319),
('0004', 1, 1, '', 'P00320', 'Silicon Sealant Joinsil 600', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 320),
('0004', 1, 1, '', 'P00321', 'Straight Elbow 1in Gi Hd Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 321),
('0004', 1, 1, '', 'P00322', 'Tee 1/2in Gi Hd Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 322),
('0004', 1, 1, '', 'P00323', 'Temperature Meter Relay+(Almx1), TCE3-H Rit-2-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 323),
('0004', 1, 1, '', 'P00324', 'Water Pump RS 885', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 324),
('0005', 1, 1, '', 'P00325', 'Air Blower 1.5kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 9.00, 325),
('0005', 1, 1, '', 'P00326', 'Air Blower 2.2kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 7.00, 326),
('0005', 1, 1, '', 'P00327', 'Allen Bolt 12X45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 327),
('0005', 1, 1, '', 'P00328', 'Allen Bolt 16X55', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 328),
('0005', 1, 1, '', 'P00329', 'Allen Bolt 20X60', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 329),
('0005', 1, 1, '', 'P00330', 'Allen Bolt 16X50', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 330),
('0005', 1, 1, '', 'P00331', 'Allen Bolt 16X90', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 331),
('0005', 1, 1, '', 'P00332', 'Bearing 6006', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 332),
('0005', 1, 1, '', 'P00333', 'Bearing 6010', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 333),
('0005', 1, 1, '', 'P00334', 'Bearing 6205', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 334),
('0005', 1, 1, '', 'P00335', 'Bearing 6206', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 335),
('0005', 1, 1, '', 'P00336', 'Bearing 6207', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 336),
('0005', 1, 1, '', 'P00337', 'Bearing 6301', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 337),
('0005', 1, 1, '', 'P00338', 'Bearing UCF207-FYH', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 338),
('0005', 1, 1, '', 'P00339', 'Belt B90 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 339),
('0005', 1, 1, '', 'P00340', 'Belt B94 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 340),
('0005', 1, 1, '', 'P00341', 'Belt B95 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 341),
('0005', 1, 1, '', 'P00342', 'Blower Motor MDYA-380 220V/380V 50hz', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 342),
('0005', 1, 1, '', 'P00343', 'Blowing Machine Automatic Ventilation Controller', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 343),
('0005', 1, 1, '', 'P00344', 'Extruder Die Head 30.5cmx15cmx33cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 344),
('0005', 1, 1, '', 'P00345', 'Fan Motor Blower .25kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 345),
('0005', 1, 1, '', 'P00346', 'Heater 100X120 220V 350W Mica Rec/Flat', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 346),
('0005', 1, 1, '', 'P00347', 'Heater 120X100 220V 2500W Mica Rec/Flat', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 347),
('0005', 1, 1, '', 'P00348', 'Heater 150X125 220V 1400W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 348),
('0005', 1, 1, '', 'P00349', 'Heater 150X150 220V 1700W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 349),
('0005', 1, 1, '', 'P00350', 'Heater 150X76 220V 1000W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 350),
('0005', 1, 1, '', 'P00351', 'Heater 150X85 220V 1200W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 351),
('0005', 1, 1, '', 'P00352', 'Heater 180X120 220V 1800W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 352),
('0005', 1, 1, '', 'P00353', 'Heater 180X130 220V 1400W Mica Curved', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 353),
('0005', 1, 1, '', 'P00354', 'Heater 200X90 220V 1600W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 354),
('0005', 1, 1, '', 'P00355', 'Heater 200X90 220V 1700W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 355),
('0005', 1, 1, '', 'P00356', 'Heater 220X150 Ac220V Mica Curved', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 356),
('0005', 1, 1, '', 'P00357', 'Heater 225X90 220V 1800W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 357),
('0005', 1, 1, '', 'P00358', 'Heater 225X90 220V 1900W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 358),
('0005', 1, 1, '', 'P00359', 'Heater 280X80 220V 2000W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 359),
('0005', 1, 1, '', 'P00360', 'Heater 60X80 AC220V Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 360),
('0005', 1, 1, '', 'P00361', 'Heater 60X90 AC220V Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 361),
('0005', 1, 1, '', 'P00362', 'Heater 90X160 220V 1400W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 362),
('0005', 1, 1, '', 'P00363', 'Heater 95X100 AC220V Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 363),
('0005', 1, 1, '', 'P00364', 'Heater 95X150 AC220V Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 364),
('0005', 1, 1, '', 'P00365', 'Inverter EN600-2T0015 Source 3PH 220V 50/60hz Output 1.5kw 7A SN:6527AYOB170', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 365),
('0005', 1, 1, '', 'P00366', 'Inverter, 200A-018G 022P-4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 366),
('0005', 1, 1, '', 'P00367', 'Inverter, GD200A-022G 030P-4 Po: 22kw 30kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 367),
('0005', 1, 1, '', 'P00368', 'Magnet Hopper', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 368),
('0005', 1, 1, '', 'P00369', 'Magnetic Contactor CJX2-1810', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 369),
('0005', 1, 1, '', 'P00370', 'Magnetic Contactor CJX2-1810', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 370),
('0005', 1, 1, '', 'P00371', 'Magnetic Contactor SP21', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 371),
('0005', 1, 1, '', 'P00372', 'Magnetic Contactor SP21', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 372),
('0005', 1, 1, '', 'P00373', 'Magnetic Contactor SP40T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 373),
('0005', 1, 1, '', 'P00374', 'Magnetic Contactor S-P80T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 374),
('0005', 1, 1, '', 'P00375', 'Magnetic Contactor S-P80T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 375),
('0005', 1, 1, '', 'P00376', 'Magnetic Contractor 40Amps SP40T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 376),
('0005', 1, 1, '', 'P00377', 'Main Motor 11kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 377),
('0005', 1, 1, '', 'P00378', 'Main Motor 15kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 378),
('0005', 1, 1, '', 'P00379', 'Panel Meter AL 48-30A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 379),
('0005', 1, 1, '', 'P00380', 'Panel Meter SD-50/10A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 380),
('0005', 1, 1, '', 'P00381', 'Panel Meter SD-50/15A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 381),
('0005', 1, 1, '', 'P00382', 'Panel Meter SD-50/20A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 382),
('0005', 1, 1, '', 'P00383', 'Panel Meter SD-50/30A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 383),
('0005', 1, 1, '', 'P00384', 'Panel Meter SD-50/5A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 384),
('0005', 1, 1, '', 'P00385', 'Potentiometer (118 470K-2W)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 385),
('0005', 1, 1, '', 'P00386', 'Proximeter Wth\' 118 470K-2W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 386),
('0005', 1, 1, '', 'P00387', 'Roller Chain RC 60-2R 10 Feet', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 387),
('0005', 1, 1, '', 'P00388', 'Silicon Roller 37Cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 388),
('0005', 1, 1, '', 'P00389', 'Solid State Module KSR 25DA', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 389),
('0005', 1, 1, '', 'P00390', 'Solid State SSR-10DD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 390),
('0005', 1, 1, '', 'P00391', 'Push In Fittings, SPC 10-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 391),
('0005', 1, 1, '', 'P00392', 'Take Up Motor 2.2 kw', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 392),
('0005', 1, 1, '', 'P00393', 'Temperature Controller NGG 5411-1(1615) / NGG-5000', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 393),
('0005', 1, 1, '', 'P00394', 'Temperature Controller XMTE-34109(N)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 394),
('0005', 1, 1, '', 'P00395', 'Temporary Controller PN-821K-R', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 395),
('0005', 1, 1, '', 'P00396', 'Thermal Hose 2in Black (Blower Black Hose) 50mm/4m', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 396),
('0005', 1, 1, '', 'P00397', 'Thermocouple WRNT-01 (4000Mm) W/ Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 397),
('0005', 1, 1, '', 'P00398', 'Thermocouple-WRNT-01 3000Mm W/ Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 398),
('0005', 1, 1, '', 'P00399', 'Thermocouple-WRNT-01 3000Mm W/ Out Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 399),
('0005', 1, 1, '', 'P00400', 'Thermocouple-WRNT-01 4000Mm W/O Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 400),
('0005', 1, 1, '', 'P00401', 'Thermocouple-WRNT-01 5000Mm W/O Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 401),
('0005', 1, 1, '', 'P00402', 'Thermocouple-WRNT-01 500Mm W/O Cloth', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 402),
('0005', 1, 1, '', 'P00403', 'Torque Motor Controller/Volt Panel Meter (YTC-8A 220V)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 403),
('0005', 1, 1, '', 'P00404', 'Winder Motor Y2LJ90-6 1.4A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 404),
('0006', 1, 1, '', 'P00405', 'Bearing 51104', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 405),
('0006', 1, 1, '', 'P00406', 'Bearing 51105', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 406),
('0006', 1, 1, '', 'P00407', 'Bearing 6800', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 407),
('0006', 1, 1, '', 'P00408', 'Belt C103 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 408),
('0006', 1, 1, '', 'P00409', 'Belt C78 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 409),
('0006', 1, 1, '', 'P00410', 'Belt C95 Bando', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 410),
('0006', 1, 1, '', 'P00411', 'Cylinder Sc32X250', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 411),
('0006', 1, 1, '', 'P00412', 'Directional Valve DSG-01-3C2-D24-N1-51T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 412),
('0006', 1, 1, '', 'P00413', 'Directional Valve DSG-03-3C2-B24-N1-51T', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 413),
('0006', 1, 1, '', 'P00414', 'Heater 200X120 220V Mica Square', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 414),
('0006', 1, 1, '', 'P00415', 'Heater 115X50 220V 450W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 415),
('0006', 1, 1, '', 'P00416', 'Heater 210X60 220V 1000W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 416),
('0006', 1, 1, '', 'P00417', 'Heater 26X318 220V 200W Ceramic', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 417),
('0006', 1, 1, '', 'P00418', 'Heater 56X40 220V 180W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 418),
('0006', 1, 1, '', 'P00419', 'Heater 600X30 220V Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 419),
('0006', 1, 1, '', 'P00420', 'Heater 96X102 220V 900W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 420),
('0006', 1, 1, '', 'P00421', 'Heater 98X100 220V 800W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 421),
('0006', 1, 1, '', 'P00422', 'Heater Cutter Blade', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 422),
('0006', 1, 1, '', 'P00423', 'Hydraulic Cylinder Deli, H0B40*420', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 423),
('0006', 1, 1, '', 'P00424', 'Hydraulic Hose 1/2inX220cm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 424),
('0006', 1, 1, '', 'P00425', 'Hydraulic Hose 3/4X190cm 21.5mpa 90-ST', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 425),
('0006', 1, 1, '', 'P00426', 'Hydraulic Hose 3/4X190cm 21.5mpa ST-ST', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 426),
('0006', 1, 1, '', 'P00427', 'Monoseal 40X30X6 PU Hallite UN', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 427),
('0006', 1, 1, '', 'P00428', 'Peanut Butter Jar Blade', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 428),
('0006', 1, 1, '', 'P00429', 'Solenoid Valve VF5120-5GD1 SMC', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 429),
('0006', 1, 1, '', 'P00430', 'Solenoid Valve VF5120K-5GDI-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 430),
('0006', 1, 1, '', 'P00431', 'Trimmer Holder', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 431),
('0007', 1, 1, '', 'P00432', '10oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 5.00, 432),
('0007', 1, 1, '', 'P00433', '10oz w/o Logo Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 1.00, 433),
('0007', 1, 1, '', 'P00434', '12oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 434),
('0007', 1, 1, '', 'P00435', '12oz w/o Logo Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 2.00, 435),
('0007', 1, 1, '', 'P00436', '16oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 436),
('0007', 1, 1, '', 'P00437', '3oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 437),
('0007', 1, 1, '', 'P00438', '5oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 438),
('0007', 1, 1, '', 'P00439', '6oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 439),
('0007', 1, 1, '', 'P00440', '7oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 440),
('0007', 1, 1, '', 'P00441', '8oz Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 441),
('0007', 1, 1, '', 'P00442', '8oz w/o Logo Knock Out Mold', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 442),
('0007', 1, 1, '', 'P00443', 'Bearing 6317', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 443),
('0007', 1, 1, '', 'P00444', 'Chain 40-2R X 10FT ANSI', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 444),
('0007', 1, 1, '', 'P00445', 'Chain with Spikes', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 445),
('0007', 1, 1, '', 'P00446', 'Frequency Inverter 2/2, EM600-2R2-2B', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 446),
('0007', 1, 1, '', 'P00447', 'Frequency Inverter, 4Kw 1/2, EM600-4RO-2B', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 447),
('0007', 1, 1, '', 'P00448', 'Heater 15.75X270 220V 600W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 448),
('0007', 1, 1, '', 'P00449', 'Heater 15.8X270 220V 600W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 449),
('0007', 1, 1, '', 'P00450', 'Hydraulic Pump Plastic Connector', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 450),
('0007', 1, 1, '', 'P00451', 'Magnetic Contactor SP50T 220V 3Phase', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 451),
('0007', 1, 1, '', 'P00452', 'Mould Arm Bossing', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 452),
('0007', 1, 1, '', 'P00453', 'Oil Fittings NKL 1/8-41', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 453),
('0007', 1, 1, '', 'P00454', 'Oil Seal Wiper Metal 50X40X5', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 454),
('0007', 1, 1, '', 'P00455', 'Oring 2X25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 455),
('0007', 1, 1, '', 'P00456', 'Plastic Belt Pulley (No Specs)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 456),
('0007', 1, 1, '', 'P00457', 'Polyurethane Belt 10mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 457),
('0007', 1, 1, '', 'P00458', 'Polyurethane Belt 4mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 458),
('0007', 1, 1, '', 'P00459', 'Polyurethane Belt 8mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 459),
('0007', 1, 1, '', 'P00460', 'Roller Feeder Guide', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 460),
('0007', 1, 1, '', 'P00461', 'Solenoid Valve FDS SXW3160-5G-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 461),
('0007', 1, 1, '', 'P00462', 'Solenoid Valve SMC VFS5110 Seb 06 0.1-1.0mpa (Offer:Ypc 3/4in Thread,5/2 Way 24vdc SIV511-24VDC', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 462),
('0007', 1, 1, '', 'P00463', 'Solenoid Valve, 4R210-08', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 463),
('0007', 1, 1, '', 'P00464', 'Solenoid Valve, SXW3160-5G-04 2-Way', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 464),
('0007', 1, 1, '', 'P00465', 'Spool Roller', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 465),
('0007', 1, 1, '', 'P00466', 'Stretching Cylinder (No Specs)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 466),
('0007', 1, 1, '', 'P00467', 'Traction Fan Motor', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 467),
('0008', 1, 1, '', 'P00468', 'Allen Bolt, 6X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 468),
('0008', 1, 1, '', 'P00469', 'Conveyor Belt 330mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 469),
('0008', 1, 1, '', 'P00470', 'Conveyor Belt 80mmx2800mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 470),
('0008', 1, 1, '', 'P00471', 'Heater 118X25 230V 500W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 471),
('0008', 1, 1, '', 'P00472', 'Heater 127X38 220V 700W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 472);
INSERT INTO `items` (`categorycode`, `purchaseitem`, `isactive`, `itemcode`, `itemid`, `pdesc`, `meas1`, `eqnum`, `meas2`, `ucost`, `reorder`, `remarks`, `onhand`, `id`) VALUES
('0008', 1, 1, '', 'P00473', 'Heater 128X35 220V 700W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 473),
('0008', 1, 1, '', 'P00474', 'Heater 128X65 220V 700W Mica', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 474),
('0008', 1, 1, '', 'P00475', 'Heater 12X160 220V 300W Cartridge', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 475),
('0008', 1, 1, '', 'P00476', 'Heater 88X38 230V 500W', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 476),
('0008', 1, 1, '', 'P00477', 'Hex Bolt 5X45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 477),
('0008', 1, 1, '', 'P00478', 'Hex Bolt 10X40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 478),
('0008', 1, 1, '', 'P00479', 'MX Sprocket', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 479),
('0008', 1, 1, '', 'P00480', 'Push In Fitting, SPC 8-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 480),
('0008', 1, 1, '', 'P00481', 'Push In Fittings, SPC 12-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 481),
('0008', 1, 1, '', 'P00482', 'Push In Fittings, SPL 8-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 482),
('0008', 1, 1, '', 'P00483', 'Push In Fittings, SPY 10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 483),
('0008', 1, 1, '', 'P00484', 'Push In Fittings, SPY 8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 484),
('0008', 1, 1, '', 'P00485', 'Straw Cutter Blade', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 485),
('0008', 1, 1, '', 'P00486', 'Temperature Controller PXE4TAY1-1Y-C', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 486),
('0008', 1, 1, '', 'P00487', 'Thermocouples WRNT-M6 (2000mm)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 487),
('0009', 1, 1, '', 'P00488', '52 Teeth Printing Gear King', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 488),
('0009', 1, 1, '', 'P00489', '55 Teeth Printing Gear Jumbo', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 489),
('0009', 1, 1, '', 'P00490', '65 Teeth Main Gear Cylinder Printing Gear Cylinder', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 490),
('0009', 1, 1, '', 'P00491', 'Bearing UCFC211', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 491),
('0009', 1, 1, '', 'P00492', 'Diplomer', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 492),
('0009', 1, 1, '', 'P00493', 'Plate Mounting Tape 52330-00001-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 493),
('0009', 1, 1, '', 'P00494', 'Push In Fitting, SPC 8-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 494),
('0009', 1, 1, '', 'P00495', 'Push In Fittings, SPC 12-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 495),
('0010', 1, 1, '', 'P00496', 'Allen Bolt 8X75', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 496),
('0010', 1, 1, '', 'P00497', 'Allen Bolt 8X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 497),
('0010', 1, 1, '', 'P00498', 'Bearing 6305ZZCM 5K', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 498),
('0010', 1, 1, '', 'P00499', 'Circlip 25X0X1.2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 499),
('0010', 1, 1, '', 'P00500', 'Circlip 57.8X2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 500),
('0010', 1, 1, '', 'P00501', 'Corrosion Preventive Spray, 450MI', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 501),
('0010', 1, 1, '', 'P00502', 'Hex Bolt 12X30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 502),
('0010', 1, 1, '', 'P00503', 'Hex Bolt 8X45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 503),
('0010', 1, 1, '', 'P00504', 'Hot Runner MD198', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 504),
('0010', 1, 1, '', 'P00505', 'Mould Clean Spray 450ml TOKU-98', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 505),
('0010', 1, 1, '', 'P00506', 'Mould Release Spray 500ml Prosspray', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 506),
('0010', 1, 1, '', 'P00507', 'Oring Viton 2X7', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 507),
('0010', 1, 1, '', 'P00508', 'Pneumatic Filter Regulator AFR2000', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 508),
('0010', 1, 1, '', 'P00509', 'Push In Fitttings, SPL 12-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 509),
('0010', 1, 1, '', 'P00510', 'Push In Fittings, SPY 8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 510),
('0010', 1, 1, '', 'P00511', 'Push In Fittings, SPC 8-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 511),
('0010', 1, 1, '', 'P00512', 'Push In Fittings, SPC 10-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 512),
('0010', 1, 1, '', 'P00513', 'Push In Fittings, SPC 10-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 513),
('0010', 1, 1, '', 'P00514', 'Push In Fittings, SPC 12-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 514),
('0010', 1, 1, '', 'P00515', 'Push In Fittings, SPC 12-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 515),
('0010', 1, 1, '', 'P00516', 'Push In Fittings, SPL 12-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 516),
('0010', 1, 1, '', 'P00517', 'Push In Fittings, SPL 8-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 517),
('0010', 1, 1, '', 'P00518', 'Push In Fittings, SPL 10-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 518),
('0010', 1, 1, '', 'P00519', 'Push In Fittings, SPL 12-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 519),
('0010', 1, 1, '', 'P00520', 'Push In Fittings, SPL 6-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 520),
('0010', 1, 1, '', 'P00521', 'Push In Fittings, SPY 10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 521),
('0010', 1, 1, '', 'P00522', 'Push In Fittings, SPY 12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 522),
('0011', 1, 1, '', 'P00523', 'Allen Bolt 12X40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 523),
('0011', 1, 1, '', 'P00524', 'Allen Bolt 12X50', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 524),
('0011', 1, 1, '', 'P00525', 'Bearing 6215', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 525),
('0011', 1, 1, '', 'P00526', 'Bearing Nu2215Ec2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 526),
('0011', 1, 1, '', 'P00527', 'Granulator Blade Circle', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 527),
('0011', 1, 1, '', 'P00528', 'Granulator Blade Flat', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 528),
('0011', 1, 1, '', 'P00529', 'Hex Bolt 10x15', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 529),
('0011', 1, 1, '', 'P00530', 'Hex Bolt 12x30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 530),
('0011', 1, 1, '', 'P00531', 'Oil Seal 95X75x10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 531),
('0011', 1, 1, '', 'P00532', 'Overload Relay TH-P60 ETA 67A(54A-80A)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 532),
('0011', 1, 1, '', 'P00533', 'Push In Fittings, SPC 8-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 533),
('0011', 1, 1, '', 'P00534', 'Push In Fittings, SPC 10-04', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 534),
('0011', 1, 1, '', 'P00535', 'Push In Fittings, SPL 10-02', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 535),
('0011', 1, 1, '', 'P00536', 'Push In Fittings, SPL 8-03', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 536),
('0011', 1, 1, '', 'P00537', 'Push In Fittings, SPY 10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 537),
('0011', 1, 1, '', 'P00538', 'Push In Fittings, SPL 8-01', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 538),
('0012', 1, 1, '', 'P00539', 'Belt A26', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 539),
('0012', 1, 1, '', 'P00540', 'Belt M25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 540),
('0012', 1, 1, '', 'P00541', 'Belt M26', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 541),
('0012', 1, 1, '', 'P00542', 'Capacitor 108-130Uf 250vac', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 542),
('0012', 1, 1, '', 'P00543', 'Capacitor 88-106 Uf 250V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 543),
('0012', 1, 1, '', 'P00544', 'Capacitor 108-130', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 544),
('0012', 1, 1, '', 'P00545', 'Capacitor10Uf 250V', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 545),
('0013', 1, 1, '', 'P00546', 'Belt A42', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 546),
('0013', 1, 1, '', 'P00547', 'Belt B84', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 547),
('0013', 1, 1, '', 'P00548', 'Three Phase Asynchronuos Motor, 3kw, 380V, 50Hz-1410rpm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 548),
('0014', 1, 1, '', 'P00549', 'Foot Valve 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 549),
('0014', 1, 1, '', 'P00550', 'Pressure Gauge 0-350PSI', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 550),
('0015', 1, 1, '', 'P00551', 'Allen Bolt, 12X25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 551),
('0015', 1, 1, '', 'P00552', 'Anly Twin Timer (Type ATDV-NC)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 552),
('0015', 1, 1, '', 'P00553', 'Bearing 6003', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 553),
('0015', 1, 1, '', 'P00554', 'Belt C79', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 554),
('0015', 1, 1, '', 'P00555', 'Belt HTD 880-8M', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 555),
('0015', 1, 1, '', 'P00556', 'Compressor Oil VDL68 Caltex (Cont.)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 556),
('0015', 1, 1, '', 'P00557', 'Corena S4 R Air Compresor Oil (20 ltr/pail)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 557),
('0015', 1, 1, '', 'P00558', 'Filter Ring', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 558),
('0015', 1, 1, '', 'P00559', 'Hex Bolt 6X35', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 559),
('0015', 1, 1, '', 'P00560', 'High Pressure Compressor Air Filter', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 560),
('0015', 1, 1, '', 'P00561', 'Hydraulic Oil AW68 Petron (200L/drum)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 561),
('0015', 1, 1, '', 'P00562', 'Oil Filter WD962', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 562),
('0016', 1, 1, '', 'P00563', 'Allen 10x50', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 563),
('0016', 1, 1, '', 'P00564', 'Allen Bolt 12x50', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 564),
('0016', 1, 1, '', 'P00565', 'Allen Bolt 6x45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 565),
('0016', 1, 1, '', 'P00566', 'Crusher Blade - SKD 11 400 (Long Blade)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 566),
('0016', 1, 1, '', 'P00567', 'Crusher Blade - SKD 11 400 (Short Blade)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 567),
('0016', 1, 1, '', 'P00568', 'Crusher Blade - SKD 11 500 (Long Blade)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 568),
('0016', 1, 1, '', 'P00569', 'Crusher Blade - SKD 11 500 (Short Blade)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 569),
('0016', 1, 1, '', 'P00570', 'Hex Bolt 10x40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 570),
('0016', 1, 1, '', 'P00571', 'Hex Bolt 12x30', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 571),
('0016', 1, 1, '', 'P00572', 'Hex Bolt 16x45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 572),
('0016', 1, 1, '', 'P00573', 'Hex Bolt 16x55', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 573),
('0016', 1, 1, '', 'P00574', 'Hex Bolt 8x45', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 574),
('0016', 1, 1, '', 'P00575', 'Oil Seal 95x75x10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 575),
('0016', 1, 1, '', 'P00576', 'Overload Relay TH-P60 ETA 67A(54A-80A) (Shihlin Brand)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 576),
('0017', 1, 1, '', 'P00577', 'American Brand Board', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 577),
('0017', 1, 1, '', 'P00578', 'American Circuit Enclosure Nema 1Mam Box 2 Pole Bolt-On', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 578),
('0017', 1, 1, '', 'P00579', 'Anchor Bolt 16mmx13ft', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 579),
('0017', 1, 1, '', 'P00580', 'Ball Valve 1in Creston', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 580),
('0017', 1, 1, '', 'P00581', 'Ball Valve 1/2 Creston', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 581),
('0017', 1, 1, '', 'P00582', 'Blind Rivets 1/8X3/4 - 1000Pc/S Forx', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 582),
('0017', 1, 1, '', 'P00583', 'Breaker w/ Enclosure 100A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 583),
('0017', 1, 1, '', 'P00584', 'Breaker w/ Enclosure 125A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 584),
('0017', 1, 1, '', 'P00585', 'Breaker w/ Enclosure 200A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 585),
('0017', 1, 1, '', 'P00586', 'Breaker w/ Enclosure 40A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 586),
('0017', 1, 1, '', 'P00587', 'Brushes & Brooms Red', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 587),
('0017', 1, 1, '', 'P00588', 'Butane', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 588),
('0017', 1, 1, '', 'P00589', 'Cable Tie 14in (8x350mm)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 589),
('0017', 1, 1, '', 'P00590', 'Cable Tie 4x200', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 590),
('0017', 1, 1, '', 'P00591', 'Cable Tie 9x550', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 591),
('0017', 1, 1, '', 'P00592', 'Cable Ties 3x150', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 592),
('0017', 1, 1, '', 'P00593', 'Cable Ties 430x9mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 593),
('0017', 1, 1, '', 'P00594', 'Cable Ties 4x250', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 594),
('0017', 1, 1, '', 'P00595', 'Cable Ties 6in (4x150mm)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 595),
('0017', 1, 1, '', 'P00596', 'Carbitips 3/8in Center', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 596),
('0017', 1, 1, '', 'P00597', 'Carbitips 3/8in Left Hand', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 597),
('0017', 1, 1, '', 'P00598', 'Carbitips 3/8in Right Hand', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 598),
('0017', 1, 1, '', 'P00599', 'Carbon Brush CB-51A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 599),
('0017', 1, 1, '', 'P00600', 'Ceiling Mounted Exhaust Fan Model: XLF-300', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 600),
('0017', 1, 1, '', 'P00601', 'Ceiling Receptacle', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 601),
('0017', 1, 1, '', 'P00602', 'Circuit Breaker Enclosure 1Main Box 2 Pole Bolt-On', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 602),
('0017', 1, 1, '', 'P00603', 'Circuit Breaker Thermal-Magnetic 3P-100A-10Ka/415V Model: EZC100F3100', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 603),
('0017', 1, 1, '', 'P00604', 'Conduit C Clamp 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 604),
('0017', 1, 1, '', 'P00605', 'Conduit C Clamp Surefit 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 605),
('0017', 1, 1, '', 'P00606', 'Conduit Coupling 3in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 606),
('0017', 1, 1, '', 'P00607', 'Conduit Fittings 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 607),
('0017', 1, 1, '', 'P00608', 'Conduit Fittings 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 608),
('0017', 1, 1, '', 'P00609', 'Conduit Fittings 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 609),
('0017', 1, 1, '', 'P00610', 'Coupling 1 1/2in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 610),
('0017', 1, 1, '', 'P00611', 'Coupling 1/2in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 611),
('0017', 1, 1, '', 'P00612', 'Coupling 3/4in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 612),
('0017', 1, 1, '', 'P00613', 'Coupling Threaded 1-1/2in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 613),
('0017', 1, 1, '', 'P00614', 'Coupling Threaded Female 1in x 1 1/2 (France)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 614),
('0017', 1, 1, '', 'P00615', 'Coupling Threaded Female 1in x 1 1/2 (France)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 615),
('0017', 1, 1, '', 'P00616', 'Diamond Cutting Disc 4in Bosun', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 616),
('0017', 1, 1, '', 'P00617', 'Drill Bit 1/4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 617),
('0017', 1, 1, '', 'P00618', 'Drill Bit 3/16 Dormer', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 618),
('0017', 1, 1, '', 'P00619', 'Drill Bit 3/4in Creston Titanium Coated', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 619),
('0017', 1, 1, '', 'P00620', 'Elbow 1 1/2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 620),
('0017', 1, 1, '', 'P00621', 'Elbow 1/2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 621),
('0017', 1, 1, '', 'P00622', 'Elbow GI 1in HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 622),
('0017', 1, 1, '', 'P00623', 'Electrical Tape 3M Big', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 623),
('0017', 1, 1, '', 'P00624', 'Emt Adaptor Connector 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 624),
('0017', 1, 1, '', 'P00625', 'Emt Body Type 32mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 625),
('0017', 1, 1, '', 'P00626', 'Emt Connector 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 626),
('0017', 1, 1, '', 'P00627', 'Emt Connector 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 627),
('0017', 1, 1, '', 'P00628', 'Emt Connector 1-1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 628),
('0017', 1, 1, '', 'P00629', 'Emt Connector 1-1/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 629),
('0017', 1, 1, '', 'P00630', 'Emt Connector 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 630),
('0017', 1, 1, '', 'P00631', 'Emt Connector 3/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 631),
('0017', 1, 1, '', 'P00632', 'Emt Coupling 1-1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 632),
('0017', 1, 1, '', 'P00633', 'Emt Coupling Adaptor 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 633),
('0017', 1, 1, '', 'P00634', 'Emt Coupling Adaptor Screw Typr 1 1/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 634),
('0017', 1, 1, '', 'P00635', 'Emt Coupling Screw Type 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 635),
('0017', 1, 1, '', 'P00636', 'Emt Elbow 1 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 636),
('0017', 1, 1, '', 'P00637', 'Emt Elbow 1 1/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 637),
('0017', 1, 1, '', 'P00638', 'Emt Elbow 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 638),
('0017', 1, 1, '', 'P00639', 'Emt Elbow 1/2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 639),
('0017', 1, 1, '', 'P00640', 'Emt Elbow 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 640),
('0017', 1, 1, '', 'P00641', 'Emt Straight Connector 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 641),
('0017', 1, 1, '', 'P00642', 'Enclosure 100A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 642),
('0017', 1, 1, '', 'P00643', 'Enclosure From 100A Circuit Breaker', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 643),
('0017', 1, 1, '', 'P00644', 'Enclosure From 200A Circuit Breaker', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 644),
('0017', 1, 1, '', 'P00645', 'Enclosure N-3R Bolt On Circuit Breaker', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 645),
('0017', 1, 1, '', 'P00646', 'Enclosure Nema 3R 3P Arrow', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 646),
('0017', 1, 1, '', 'P00647', 'End Cup 1in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 647),
('0017', 1, 1, '', 'P00648', 'End Cup 1-1/2in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 648),
('0017', 1, 1, '', 'P00649', 'End Cup 3/4in GI HD', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 649),
('0017', 1, 1, '', 'P00650', 'Expansion Bolt 3/8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 650),
('0017', 1, 1, '', 'P00651', 'Eye Lugs 8-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 651),
('0017', 1, 1, '', 'P00652', 'Eye Terminal 3.5-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 652),
('0017', 1, 1, '', 'P00653', 'Eye Terminal Lug 38-12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 653),
('0017', 1, 1, '', 'P00654', 'Eye Terminal Lugs 14-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 654),
('0017', 1, 1, '', 'P00655', 'Eye Terminal Lugs 22-8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 655),
('0017', 1, 1, '', 'P00656', 'Eyelugs 14-8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 656),
('0017', 1, 1, '', 'P00657', 'Eyelugs 200-12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 657),
('0017', 1, 1, '', 'P00658', 'Eyelugs 22-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 658),
('0017', 1, 1, '', 'P00659', 'Eyelugs 22-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 659),
('0017', 1, 1, '', 'P00660', 'Eyelugs 2-4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 660),
('0017', 1, 1, '', 'P00661', 'Eyelugs 38-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 661),
('0017', 1, 1, '', 'P00662', 'Eyelugs 38-8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 662),
('0017', 1, 1, '', 'P00663', 'Eyelugs 50-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 663),
('0017', 1, 1, '', 'P00664', 'Eyelugs 60-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 664),
('0017', 1, 1, '', 'P00665', 'Eyelugs 70-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 665),
('0017', 1, 1, '', 'P00666', 'Eyelugs 80-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 666),
('0017', 1, 1, '', 'P00667', 'Eyelugs 80-12', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 667),
('0017', 1, 1, '', 'P00668', 'Eyelugs 8-5', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 668),
('0017', 1, 1, '', 'P00669', 'Eyelugs 8-8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 669),
('0017', 1, 1, '', 'P00670', 'Fan Exhaus 12in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 670),
('0017', 1, 1, '', 'P00671', 'Faucet 3/4in Brass', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 671),
('0017', 1, 1, '', 'P00672', 'Faucet Brass 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 672),
('0017', 1, 1, '', 'P00673', 'Fixture Downlight Model: Sdlhii-63-GU10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 673),
('0017', 1, 1, '', 'P00674', 'Flap Disc 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 674),
('0017', 1, 1, '', 'P00675', 'Foot Valve 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 675),
('0017', 1, 1, '', 'P00676', 'Fuse Link 15K', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 676),
('0017', 1, 1, '', 'P00677', 'Fuse Link 20K', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 677),
('0017', 1, 1, '', 'P00678', 'Fuse Link 40K', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 678),
('0017', 1, 1, '', 'P00679', 'Fuse Link 65K', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 679),
('0017', 1, 1, '', 'P00680', 'Gate Valve 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 680),
('0017', 1, 1, '', 'P00681', 'Gate Valve 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 681),
('0017', 1, 1, '', 'P00682', 'Gate Valve 1-1/2in Brass', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 682),
('0017', 1, 1, '', 'P00683', 'Ge Breaker TQC 60A 3P 240V Bolt-On', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 683),
('0017', 1, 1, '', 'P00684', 'Gi Steel Utility Box', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 684),
('0017', 1, 1, '', 'P00685', 'Gi Wire #16', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 685),
('0017', 1, 1, '', 'P00686', 'Grinding Stone 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 686),
('0017', 1, 1, '', 'P00687', 'Ground Tool Bits 1/2 (Cleveland)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 687),
('0017', 1, 1, '', 'P00688', 'Ground Tool Bits 3/8 (Clevland)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 688),
('0017', 1, 1, '', 'P00689', 'Hacksaw Blade 12in/300Mm 18Tpi/8D Sandflex Small', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 689),
('0017', 1, 1, '', 'P00690', 'Hose Clip 40-55', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 690),
('0017', 1, 1, '', 'P00691', 'Hose Clip 40-60', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 691),
('0017', 1, 1, '', 'P00692', 'Hose Clip 40-63', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 692),
('0017', 1, 1, '', 'P00693', 'Hose Clip 40-64', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 693),
('0017', 1, 1, '', 'P00694', 'Hose Clip 45-60', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 694),
('0017', 1, 1, '', 'P00695', 'Hose Clip 50-70', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 695),
('0017', 1, 1, '', 'P00696', 'Hose Clip 60-80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 696),
('0017', 1, 1, '', 'P00697', 'Hose Clip 60-83', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 697),
('0017', 1, 1, '', 'P00698', 'Hydraulic Adaptor Fitting 3/8X1/6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 698),
('0017', 1, 1, '', 'P00699', 'Hydraulic Hose Adaptor 3/8X1/2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 699),
('0017', 1, 1, '', 'P00700', 'Insolator 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 700),
('0017', 1, 1, '', 'P00701', 'Junction Box', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 701),
('0017', 1, 1, '', 'P00702', 'Junction Box Cover', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 702),
('0017', 1, 1, '', 'P00703', 'Led 100W (Firefly)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 703),
('0017', 1, 1, '', 'P00704', 'Led 65W (Eurolux)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 704),
('0017', 1, 1, '', 'P00705', 'Led 7W (Landlite)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 705),
('0017', 1, 1, '', 'P00706', 'Led Bulb 13W Philips', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 706),
('0017', 1, 1, '', 'P00707', 'Led T5 Linestra Fixture Set (Eurolux)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 707),
('0017', 1, 1, '', 'P00708', 'Locknut 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 708),
('0017', 1, 1, '', 'P00709', 'Locknut 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 709),
('0017', 1, 1, '', 'P00710', 'Locknut 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 710),
('0017', 1, 1, '', 'P00711', 'Locknut 3in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 711),
('0017', 1, 1, '', 'P00712', 'Lq St. Connector 3/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 712),
('0017', 1, 1, '', 'P00713', 'Male Plug WRP002', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 713),
('0017', 1, 1, '', 'P00714', 'Masking Tape', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 714),
('0017', 1, 1, '', 'P00715', 'Mechanical Bracket or Terminal Holder 3 Bolts', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 715),
('0017', 1, 1, '', 'P00716', 'Mesh Screen 304 #40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 716),
('0017', 1, 1, '', 'P00717', 'Mesh Screen 304 #80', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 717),
('0017', 1, 1, '', 'P00718', 'Mesh Screen 304 #100', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 718),
('0017', 1, 1, '', 'P00719', 'Metal Screw 1 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 719),
('0017', 1, 1, '', 'P00720', 'Metal Screw 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 720),
('0017', 1, 1, '', 'P00721', 'Mighty Gasket Silicone 85G (Pioneer)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 721),
('0017', 1, 1, '', 'P00722', 'Miniature Breaker 32A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 722),
('0017', 1, 1, '', 'P00723', 'Miniature Breaker 32A 3P Chint', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 723),
('0017', 1, 1, '', 'P00724', 'Miniature Breaker 63A', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 724),
('0017', 1, 1, '', 'P00725', 'Miniature Circuit Breaker 63A 3P Chint', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 725),
('0017', 1, 1, '', 'P00726', 'Ordinary Switch 10A (Omni)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 726),
('0017', 1, 1, '', 'P00727', 'Outlet 2 Gang', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 727),
('0017', 1, 1, '', 'P00728', 'Outlet 3 Gang (Royu)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 728),
('0017', 1, 1, '', 'P00729', 'Overload Relay TH-P12 15A(12A-18A)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 729),
('0017', 1, 1, '', 'P00730', 'Overload Relay TH-P60 Eta 67A(54A-80A) (Shihlin Brand)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 730),
('0017', 1, 1, '', 'P00731', 'Paint Brush 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 731),
('0017', 1, 1, '', 'P00732', 'Paint Brush 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 732),
('0017', 1, 1, '', 'P00733', 'Paint Brush 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 733),
('0017', 1, 1, '', 'P00734', 'Paint Roller 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 734),
('0017', 1, 1, '', 'P00735', 'Plastic Steel Epoxy 57G (Devcon)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 735),
('0017', 1, 1, '', 'P00736', 'Polyurethane Hose, 10mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 736),
('0017', 1, 1, '', 'P00737', 'Polyurethane Hose, 12mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 737),
('0017', 1, 1, '', 'P00738', 'Polyurethane Hose, 6mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 738),
('0017', 1, 1, '', 'P00739', 'Polyurethane Hose, 8mm', 'roll', 30.00, 'mtr', 0.00, 0.00, '', 120.00, 739),
('0017', 1, 1, '', 'P00740', 'Powder Soap 800G', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 740),
('0017', 1, 1, '', 'P00741', 'Power Hacksaw Blade 10Teeth 350-25-1.25', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 741),
('0017', 1, 1, '', 'P00742', 'Push Button Emergency', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 742),
('0017', 1, 1, '', 'P00743', 'Push Button Green (Normally Open)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 743),
('0017', 1, 1, '', 'P00744', 'Push Button Red (Normally Close)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 744),
('0017', 1, 1, '', 'P00745', 'PVC Blue Elbow 63mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 745),
('0017', 1, 1, '', 'P00746', 'PVC Coupling 1-1/2 White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 746),
('0017', 1, 1, '', 'P00747', 'PVC Coupling Blue 32mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 747),
('0017', 1, 1, '', 'P00748', 'PVC Coupling Connector 1-1/4', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 748),
('0017', 1, 1, '', 'P00749', 'PVC Coupling Reducer 50X40', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 749),
('0017', 1, 1, '', 'P00750', 'PVC Elbow 20mm Blue', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 750),
('0017', 1, 1, '', 'P00751', 'PVC Elbow 32mm Blue', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 751),
('0017', 1, 1, '', 'P00752', 'PVC Elbow 63Dn White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 752),
('0017', 1, 1, '', 'P00753', 'PVC Elbow L40 White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 753),
('0017', 1, 1, '', 'P00754', 'PVC Elbow White 32DN', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 754),
('0017', 1, 1, '', 'P00755', 'PVC Female Adapter 32mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 755),
('0017', 1, 1, '', 'P00756', 'PVC Male Adapter Threaded 3/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 756),
('0017', 1, 1, '', 'P00757', 'PVC Male Adapter w/ Locknut 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 757),
('0017', 1, 1, '', 'P00758', 'PVC Male Adapter w/ Locknut 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 758),
('0017', 1, 1, '', 'P00759', 'PVC Spring Hose 1 1/2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 759),
('0017', 1, 1, '', 'P00760', 'PVC Spring Hose 1in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 760),
('0017', 1, 1, '', 'P00761', 'PVC Tee Blue 63mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 761),
('0017', 1, 1, '', 'P00762', 'PVC Tee White T63', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 762),
('0017', 1, 1, '', 'P00763', 'PVC Union 50Dn White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 763),
('0017', 1, 1, '', 'P00764', 'PVC Union 63Dn White', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 764),
('0017', 1, 1, '', 'P00765', 'Receptaple 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 765),
('0017', 1, 1, '', 'P00766', 'Rubber Plug 15A (Eagle)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 766),
('0017', 1, 1, '', 'P00767', 'Rubber Tape No15', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 767),
('0017', 1, 1, '', 'P00768', 'Rugby Bostik 300ml', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 768),
('0017', 1, 1, '', 'P00769', 'Saddle Clamp Conduit C Clamp 3/4in (One Eye)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 769),
('0017', 1, 1, '', 'P00770', 'Saddle Clamp/GI Clamp 1 1/4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 770),
('0017', 1, 1, '', 'P00771', 'Sanding Pad 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 771),
('0017', 1, 1, '', 'P00772', 'Sandpaper #120 (3M)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 772),
('0017', 1, 1, '', 'P00773', 'Sandpaper #60', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 773),
('0017', 1, 1, '', 'P00774', 'Sandpaper 1000 Eagle', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 774),
('0017', 1, 1, '', 'P00775', 'Selector Switch XB2-BD21', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 775),
('0017', 1, 1, '', 'P00776', 'Shilin Overload Relay TH-P20 ETA 28A (22-34A)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 776),
('0017', 1, 1, '', 'P00777', 'Shrink Tube 10mm', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 777),
('0017', 1, 1, '', 'P00778', 'Silicon Sealant Joinsil 600', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 778),
('0017', 1, 1, '', 'P00779', 'Spatula 2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 779),
('0017', 1, 1, '', 'P00780', 'Spatula 4in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 780),
('0017', 1, 1, '', 'P00781', 'Stainless Welding Rod 1/8in AWS E-308-16', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 781),
('0017', 1, 1, '', 'P00782', 'Steel Brush', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 782),
('0017', 1, 1, '', 'P00783', 'Steel Coupling 1/2in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 783),
('0017', 1, 1, '', 'P00784', 'Steel Drillbit 1/2', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 784),
('0017', 1, 1, '', 'P00785', 'Steel Drillbit 1/8', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 785),
('0017', 1, 1, '', 'P00786', 'Straight Elbow 1in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 786),
('0017', 1, 1, '', 'P00787', 'Switch Box', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 787),
('0017', 1, 1, '', 'P00788', 'Tailin Cutting Disc 4in Superthin', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 788),
('0017', 1, 1, '', 'P00789', 'Tee 1/2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 789),
('0017', 1, 1, '', 'P00790', 'Tee 2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 790),
('0017', 1, 1, '', 'P00791', 'Teflon Tape 3/4in (Sugi)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 791),
('0017', 1, 1, '', 'P00792', 'Terminal Eye 1.25-4 Insulated Fork Type', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 792),
('0017', 1, 1, '', 'P00793', 'Terminal Eye 1.25-4 Non-Insulated', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 793),
('0017', 1, 1, '', 'P00794', 'Terminal Lug 12-10', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 794),
('0017', 1, 1, '', 'P00795', 'Terminal Lug 5.5-6', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 795),
('0017', 1, 1, '', 'P00796', 'Thread Lock Permanent Heavy Duty Bolt Lock & Bearing 6277 6Ml', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 796),
('0017', 1, 1, '', 'P00797', 'Tool Bit 5/16 Cleveland', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 797),
('0017', 1, 1, '', 'P00798', 'Union 1/2in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 798),
('0017', 1, 1, '', 'P00799', 'Union 3/4in GI HD Fittings', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 799),
('0017', 1, 1, '', 'P00800', 'Used Clothes/Trapo/Rags', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 800),
('0017', 1, 1, '', 'P00801', 'Vital Shellac 10Ml Vt183 59ml (Shellac)', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 801),
('0017', 1, 1, '', 'P00802', 'Vulcaseal 75ml', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 802),
('0017', 1, 1, '', 'P00803', 'WD-40 418ml', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 803),
('0017', 1, 1, '', 'P00804', 'Welding Glass', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 804),
('0017', 1, 1, '', 'P00805', 'Welding Rod 6013', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 805),
('0017', 1, 1, '', 'P00806', 'Wipweld Citocordlll Cast Iron Hot 3.2mm 1/8in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 806),
('0017', 1, 1, '', 'P00807', 'Wipweld Ni Nickel Electrode With Machinable Weld Deposit For Cast Iron 3.2mm 1/8in', 'pcs', 1.00, 'pcs', 0.00, 0.00, '', 0.00, 807);

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `classcode` varchar(4) NOT NULL,
  `machtype` varchar(10) NOT NULL,
  `machabbr` varchar(10) NOT NULL,
  `machinedesc` varchar(35) NOT NULL,
  `buildingcode` varchar(4) NOT NULL,
  `isactive` int(11) NOT NULL,
  `machineid` varchar(4) NOT NULL,
  `machstatus` varchar(15) NOT NULL,
  `image` text NOT NULL,
  `attributelist` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`classcode`, `machtype`, `machabbr`, `machinedesc`, `buildingcode`, `isactive`, `machineid`, `machstatus`, `image`, `attributelist`, `id`) VALUES
('0001', 'Primary', 'BM1', 'Blowing Machine 1', '0001', 1, '0001', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 1),
('0001', 'Primary', 'BM2', 'Blowing Machine 2', '0001', 1, '0002', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 2),
('0001', 'Primary', 'BM3', 'Blowing Machine 3', '0001', 1, '0003', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 3),
('0001', 'Primary', 'BM4', 'Blowing Machine 4', '0001', 1, '0004', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 4),
('0001', 'Primary', 'BM5', 'Blowing Machine 5', '0001', 1, '0005', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 5),
('0001', 'Primary', 'BM6', 'Blowing Machine 6', '0001', 1, '0006', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 6),
('0002', 'Primary', 'PET1', 'Pet 1', '0001', 1, '0007', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 7),
('0002', 'Primary', 'PETM1', 'Pet Moulding 1', '0001', 1, '0008', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 8),
('0002', 'Primary', 'PETM2', 'Pet Moulding 2', '0001', 1, '0009', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 9),
('0002', 'Primary', 'PET2', 'Pet 2', '0001', 1, '0010', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 10),
('0002', 'Primary', 'PETM3', 'Pet Moulding 3', '0001', 1, '0011', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 11),
('0002', 'Primary', 'PETM4', 'Pet Moulding 4', '0001', 1, '0012', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 12),
('0002', 'Primary', 'PET3', 'Pet 3', '0001', 1, '0013', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 13),
('0002', 'Primary', 'PETM5', 'Pet Moulding 5', '0001', 1, '0014', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 14),
('0003', 'Primary', 'MBIG', 'Mixer Big', '0001', 1, '0015', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 15),
('0004', 'Primary', 'CRUS1', 'Crusher 1 (Carbouys)', '0001', 1, '0016', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 16),
('0004', 'Primary', 'CRUS2', 'Crusher 2 (Carbouys', '0001', 1, '0017', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 17),
('0004', 'Primary', 'CRUS3', 'Crusher 3 (Pighole)', '0001', 1, '0018', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 18),
('0004', 'Primary', 'CRUS4', 'Crusher 4 (Water Container)', '0001', 1, '0019', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 19),
('0004', 'Primary', 'INDCH', 'Industrial Chiller', '0001', 1, '0020', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 20),
('0004', 'Primary', 'COMP1', '10 HP Compressor 1', '0001', 1, '0021', 'Operational', 'views/img/machine/10hpcompressor1.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 21),
('0004', 'Primary', 'COMP2', '10 HP Compressor 2', '0001', 1, '0022', 'Operational', 'views/img/machine/10hpcompressor2.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 22),
('0004', 'Primary', 'COMP3', '10 HP Compressor 3', '0001', 1, '0023', 'Operational', 'views/img/machine/10hpcompressor3.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 23),
('0004', 'Primary', 'COMP4', '15 HP Compressor 4 (Low)', '0001', 1, '0024', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 24),
('0004', 'Primary', 'COMP5', '20 HP Compressor 5 (High)', '0001', 1, '0025', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 25),
('0004', 'Primary', '5WPUM1', '5 HP Water Pump 1', '0001', 1, '0026', 'Operational', 'views/img/machine/5hpwaterpump1.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 26),
('0004', 'Primary', '5WPUM2', '5 HP Water Pump 2', '0001', 1, '0027', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 27),
('0004', 'Primary', '1WPUM', '1 HP Water Pump', '0001', 1, '0028', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 28),
('0004', 'Primary', 'ADRYER', 'Air Dryer (For Aux)', '0001', 1, '0029', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 29),
('0004', 'Primary', 'CTFAN1', 'Cooling Tower Fan', '0001', 1, '0030', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 30),
('0004', 'Primary', 'ADRYER2', 'Air Dryer 2 (Pet)', '0001', 1, '0031', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 31),
('0004', 'Primary', '5CPUMP', '5 HP Cooling Pump', '0001', 1, '0032', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 32),
('0005', 'Primary', '', 'Pelletizer 1', '0001', 1, '0033', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 33),
('0005', 'Primary', '', 'Pelletizer 2', '0001', 1, '0034', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 34),
('0005', 'Primary', '', 'Washer (Pelletizer 2)', '0001', 1, '0035', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 35),
('0004', 'Primary', '', '10 HP Water Pump', '0001', 1, '0036', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 36),
('0004', 'Primary', 'GRAN1', 'Granulator (Straw)', '0001', 1, '0037', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 37),
('0005', 'Primary', '', 'Mixer Pelletizer 2', '0001', 1, '0038', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 38),
('0005', 'Primary', '', 'Vibrator Pelletizer 2', '0001', 1, '0039', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 39),
('0005', 'Primary', '', 'Conveyor Pelletizer 2', '0001', 1, '0040', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 40),
('0006', 'Primary', 'EXT1', 'Extruder 1', '0002', 1, '0041', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 41),
('0006', 'Primary', 'EXT2', 'Extruder 2', '0002', 1, '0042', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 42),
('0006', 'Primary', 'EXT3', 'Extruder 3', '0002', 1, '0043', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 43),
('0006', 'Primary', 'EXT4', 'Extruder 4', '0002', 1, '0044', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 44),
('0006', 'Primary', 'EXT5', 'Extruder 5', '0002', 1, '0045', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 45),
('0006', 'Primary', 'EXT6', 'Extruder 6', '0002', 1, '0046', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 46),
('0006', 'Primary', 'EXT7', 'Extruder 7', '0002', 1, '0047', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 47),
('0006', 'Primary', 'EXT8', 'Extruder 8', '0002', 1, '0048', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 48),
('0006', 'Primary', 'EXT9', 'Extruder 9', '0002', 1, '0049', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 49),
('0006', 'Primary', 'EXT10', 'Extruder 10', '0002', 1, '0050', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 50),
('0006', 'Primary', 'EXTBIG', 'Extruder Big', '0002', 1, '0051', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 51),
('0006', 'Primary', 'EXT11A', 'Extruder 11A', '0002', 1, '0052', 'Operational', 'views/img/machine/default/machine.jpg', '', 52),
('0006', 'Primary', 'EXT11B', 'Extruder 11B', '0002', 1, '0053', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 53),
('0006', 'Primary', 'EXT12A', 'Extruder 12A', '0002', 1, '0054', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 54),
('0006', 'Primary', 'EXT12B', 'Extruder 12B', '0002', 1, '0055', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 55),
('0006', 'Primary', 'EXT13A', 'Extruder 13A', '0002', 1, '0056', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 56),
('0006', 'Primary', 'EXT13B', 'Extruder 13B', '0002', 1, '0057', 'Operational', 'views/img/machine/default/machine.jpg', '', 57),
('0006', 'Primary', 'EXT14A', 'Extruder 14A', '0002', 1, '0058', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 58),
('0006', 'Primary', 'EXT14B', 'Extruder 14B', '0002', 1, '0059', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 59),
('0006', 'Primary', 'EXT15A', 'Extruder 15A', '0002', 1, '0060', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 60),
('0006', 'Primary', 'EXT15B', 'Extruder 15B', '0002', 1, '0061', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 61),
('0007', 'Primary', 'PP1', 'PP 1', '0002', 1, '0062', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 62),
('0007', 'Primary', 'PP2', 'PP 2', '0002', 1, '0063', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 63),
('0005', 'Primary', 'PELLET3', 'Pelletizer 3', '0002', 1, '0064', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 64),
('0004', 'Primary', 'PSDIM', 'PSD Incision Machine', '0002', 1, '0065', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 65),
('0008', 'Primary', 'INJMAC', 'Injection Machine', '0002', 1, '0066', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 66),
('0004', 'Primary', 'CRUS5', 'Crusher (Injection)', '0002', 1, '0067', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 67),
('0004', 'Primary', 'ICHIL1', 'Industrial Chiller (Injection)', '0002', 1, '0068', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 68),
('0004', 'Primary', 'COMP6', '10 HP Compressor 1', '0002', 1, '0069', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 69),
('0004', 'Primary', 'COMP7', '10 HP Compressor 2', '0002', 1, '0070', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 70),
('0004', 'Primary', '5WPUM3', '5 HP Water Pump 1', '0002', 1, '0071', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 71),
('0004', 'Primary', '7.5WPUM1', '7.5 HP Water Pump 2', '0002', 1, '0072', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 72),
('0004', 'Primary', '5WPUM4', '5 HP Water Pump 3', '0002', 1, '0073', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 73),
('0004', 'Primary', '2WPUM1', '2 HP Water Pump 4', '0002', 1, '0074', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 74),
('0004', 'Primary', 'CTFAN2', 'Cooling Tower Fan', '0002', 1, '0075', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 75),
('0004', 'Primary', 'FPUM1', 'Fire Pump', '0002', 1, '0076', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 76),
('0009', 'Primary', 'CUT1', 'Cutter 1', '0003', 1, '0077', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 77),
('0009', 'Primary', 'CUT2', 'Cutter 2', '0003', 1, '0078', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 78),
('0009', 'Primary', 'CUT3', 'Cutter 3', '0003', 1, '0079', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 79),
('0009', 'Primary', 'CUT4', 'Cutter 4', '0003', 1, '0080', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 80),
('0009', 'Primary', 'CUT5', 'Cutter 5', '0003', 1, '0081', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 81),
('0009', 'Primary', 'CUT6', 'Cutter 6', '0003', 1, '0082', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 82),
('0009', 'Primary', 'CUT7', 'Cutter 7', '0003', 1, '0083', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 83),
('0009', 'Primary', 'CUT8', 'Cutter 8', '0003', 1, '0084', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 84),
('0009', 'Primary', 'CUT9', 'Cutter 9', '0003', 1, '0085', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 85),
('0009', 'Primary', 'CUT10', 'Cutter 10 (Printing)', '0003', 1, '0086', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 86),
('0009', 'Primary', 'PCUT1', 'Packaging Cutter 1', '0003', 1, '0087', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 87),
('0009', 'Primary', 'PCUT2', 'Packaging Cutter 2', '0003', 1, '0088', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 88),
('0009', 'Primary', 'RCUT1', 'Rollbag Cutter 1', '0003', 1, '0089', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 89),
('0009', 'Primary', 'RCUT2', 'Rollbag Cutter 2', '0003', 1, '0090', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 90),
('0009', 'Primary', 'RCUT3', 'Rollbag Cutter 3', '0003', 1, '0091', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 91),
('0010', 'Primary', 'PBJ1', 'PBJ 1', '0003', 1, '0092', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 92),
('0010', 'Primary', 'PBJ2', 'PBJ 2', '0003', 1, '0093', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 93),
('0011', 'Primary', 'GMAC1', 'Gallon Machine', '0003', 1, '0094', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 94),
('0012', 'Primary', 'SMAC1', 'Straw Machine 1', '0003', 1, '0095', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 95),
('0012', 'Primary', 'SMAC2', 'Straw Machine 2', '0003', 1, '0096', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 96),
('0012', 'Primary', 'SMAC3', 'Straw Machine 3', '0003', 1, '0097', 'Operational', 'views/img/machine/default/machine.jpg', '[{\"attribute\":\"Model/Type\",\"detail\":\"N/A\"}]', 97);

-- --------------------------------------------------------

--
-- Table structure for table `machineattributes`
--

CREATE TABLE `machineattributes` (
  `machineid` varchar(4) NOT NULL,
  `attribute` varchar(60) NOT NULL,
  `detail` varchar(180) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machineattributes`
--

INSERT INTO `machineattributes` (`machineid`, `attribute`, `detail`, `id`) VALUES
('0001', 'Model/Type', 'N/A', 1),
('0002', 'Model/Type', 'N/A', 2),
('0003', 'Model/Type', 'N/A', 3),
('0004', 'Model/Type', 'N/A', 4),
('0005', 'Model/Type', 'N/A', 5),
('0006', 'Model/Type', 'N/A', 6),
('0007', 'Model/Type', 'N/A', 7),
('0008', 'Model/Type', 'N/A', 8),
('0009', 'Model/Type', 'N/A', 9),
('0010', 'Model/Type', 'N/A', 10),
('0011', 'Model/Type', 'N/A', 11),
('0012', 'Model/Type', 'N/A', 12),
('0013', 'Model/Type', 'N/A', 13),
('0014', 'Model/Type', 'N/A', 14),
('0015', 'Model/Type', 'N/A', 15),
('0016', 'Model/Type', 'N/A', 16),
('0017', 'Model/Type', 'N/A', 17),
('0018', 'Model/Type', 'N/A', 18),
('0019', 'Model/Type', 'N/A', 19),
('0020', 'Model/Type', 'N/A', 20),
('0021', 'Model/Type', 'N/A', 21),
('0022', 'Model/Type', 'N/A', 22),
('0023', 'Model/Type', 'N/A', 23),
('0024', 'Model/Type', 'N/A', 24),
('0025', 'Model/Type', 'N/A', 25),
('0026', 'Model/Type', 'N/A', 26),
('0027', 'Model/Type', 'N/A', 27),
('0028', 'Model/Type', 'N/A', 28),
('0029', 'Model/Type', 'N/A', 29),
('0030', 'Model/Type', 'N/A', 30),
('0031', 'Model/Type', 'N/A', 31),
('0032', 'Model/Type', 'N/A', 32),
('0033', 'Model/Type', 'N/A', 33),
('0034', 'Model/Type', 'N/A', 34),
('0035', 'Model/Type', 'N/A', 35),
('0036', 'Model/Type', 'N/A', 36),
('0037', 'Model/Type', 'N/A', 37),
('0038', 'Model/Type', 'N/A', 38),
('0039', 'Model/Type', 'N/A', 39),
('0040', 'Model/Type', 'N/A', 40),
('0041', 'Model/Type', 'N/A', 41),
('0042', 'Model/Type', 'N/A', 42),
('0043', 'Model/Type', 'N/A', 43),
('0044', 'Model/Type', 'N/A', 44),
('0045', 'Model/Type', 'N/A', 45),
('0046', 'Model/Type', 'N/A', 46),
('0047', 'Model/Type', 'N/A', 47),
('0048', 'Model/Type', 'N/A', 48),
('0049', 'Model/Type', 'N/A', 49),
('0050', 'Model/Type', 'N/A', 50),
('0051', 'Model/Type', 'N/A', 51),
('0053', 'Model/Type', 'N/A', 52),
('0054', 'Model/Type', 'N/A', 53),
('0055', 'Model/Type', 'N/A', 54),
('0056', 'Model/Type', 'N/A', 55),
('0058', 'Model/Type', 'N/A', 56),
('0059', 'Model/Type', 'N/A', 57),
('0060', 'Model/Type', 'N/A', 58),
('0061', 'Model/Type', 'N/A', 59),
('0062', 'Model/Type', 'N/A', 60),
('0063', 'Model/Type', 'N/A', 61),
('0064', 'Model/Type', 'N/A', 62),
('0065', 'Model/Type', 'N/A', 63),
('0066', 'Model/Type', 'N/A', 64),
('0067', 'Model/Type', 'N/A', 65),
('0068', 'Model/Type', 'N/A', 66),
('0069', 'Model/Type', 'N/A', 67),
('0070', 'Model/Type', 'N/A', 68),
('0071', 'Model/Type', 'N/A', 69),
('0072', 'Model/Type', 'N/A', 70),
('0073', 'Model/Type', 'N/A', 71),
('0074', 'Model/Type', 'N/A', 72),
('0075', 'Model/Type', 'N/A', 73),
('0076', 'Model/Type', 'N/A', 74),
('0077', 'Model/Type', 'N/A', 75),
('0078', 'Model/Type', 'N/A', 76),
('0079', 'Model/Type', 'N/A', 77),
('0080', 'Model/Type', 'N/A', 78),
('0081', 'Model/Type', 'N/A', 79),
('0082', 'Model/Type', 'N/A', 80),
('0083', 'Model/Type', 'N/A', 81),
('0084', 'Model/Type', 'N/A', 82),
('0085', 'Model/Type', 'N/A', 83),
('0086', 'Model/Type', 'N/A', 84),
('0087', 'Model/Type', 'N/A', 85),
('0088', 'Model/Type', 'N/A', 86),
('0089', 'Model/Type', 'N/A', 87),
('0090', 'Model/Type', 'N/A', 88),
('0091', 'Model/Type', 'N/A', 89),
('0092', 'Model/Type', 'N/A', 90),
('0093', 'Model/Type', 'N/A', 91),
('0094', 'Model/Type', 'N/A', 92),
('0095', 'Model/Type', 'N/A', 93),
('0096', 'Model/Type', 'N/A', 94),
('0097', 'Model/Type', 'N/A', 95);

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `mdesc` text NOT NULL,
  `mexpound` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `measure`
--

INSERT INTO `measure` (`id`, `mdesc`, `mexpound`) VALUES
(1, 'box', 'Box'),
(2, 'cs', 'Case'),
(3, 'pcs', 'Pieces'),
(4, 'btl', 'Bottle'),
(5, 'gal', 'Galloon'),
(6, 'con', 'Container'),
(7, 'can', 'Can'),
(8, 'dzn', 'Dozen'),
(9, 'pail', 'Pail'),
(10, 'tub', 'Tub'),
(11, 'roll', 'Roll'),
(12, 'ltr', 'Litres'),
(13, 'set', 'Set'),
(14, 'tnk', 'Tank'),
(15, 'qrt', 'Quart'),
(16, 'kg', 'Kilogram'),
(17, 'sht', 'Sheet'),
(18, 'ft', 'Feet'),
(19, 'lgth', 'Length'),
(20, 'mtr', 'Meter'),
(21, 'slb', 'Slab'),
(22, 'tube', 'Tube'),
(23, 'yrd', 'Yards'),
(24, 'cyl', 'Cylinder'),
(25, 'tire', 'Tire'),
(26, 'pck', 'Pack'),
(27, 'inch', 'Inches'),
(28, 'bag', 'Bag'),
(29, 'bndl', 'Bundle'),
(30, 'rm', 'Ream'),
(31, 'tray', 'Tray'),
(32, 'crate', 'Crate'),
(33, 'sck', 'Sack'),
(34, 'm', 'Thousand');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positioncode` varchar(4) NOT NULL COMMENT 'Needs confirmation',
  `positiondesc` varchar(30) NOT NULL COMMENT 'Needs confirmation',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positioncode`, `positiondesc`, `id`) VALUES
('P001', 'Accountant', 1),
('P002', 'Clerk', 2),
('P003', 'Manager', 3),
('P004', 'Officer-In-Charge', 4),
('P005', 'Operator', 5),
('P006', 'Proprietor', 6),
('P007', 'Software Engineer', 7),
('P008', 'Supervisor', 8),
('P009', 'Technical Staff', 9),
('P010', 'Warehouse Clerk', 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitems`
--

CREATE TABLE `purchaseitems` (
  `ponumber` varchar(15) NOT NULL,
  `qty` float(9,2) NOT NULL,
  `price` float(9,2) NOT NULL,
  `tamount` double(9,2) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseitems`
--

INSERT INTO `purchaseitems` (`ponumber`, `qty`, `price`, `tamount`, `itemid`, `id`) VALUES
('P00001', 3.00, 300.00, 900.00, 'P00325', 4),
('P00001', 2.00, 500.00, 1000.00, 'P00326', 5),
('P00001', 3.00, 200.00, 600.00, 'P00739', 6),
('P00002', 5.00, 700.00, 3500.00, 'P00432', 7),
('P00003', 12.00, 100.00, 1200.00, 'P00118', 8),
('P00003', 10.00, 30.00, 300.00, 'P00270', 9),
('P00004', 10.00, 500.00, 5000.00, 'P00325', 13),
('P00005', 2.00, 212.00, 424.00, 'P00111', 14),
('P00005', 1.00, 221.00, 221.00, 'P00113', 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `suppliercode` varchar(6) NOT NULL,
  `podate` date NOT NULL,
  `postatus` varchar(10) NOT NULL,
  `ponumber` varchar(15) NOT NULL,
  `orderedby` varchar(7) NOT NULL,
  `machineid` varchar(4) NOT NULL,
  `preparedby` varchar(7) NOT NULL,
  `remarks` varchar(60) NOT NULL,
  `amount` double(13,2) NOT NULL,
  `discount` double(9,2) NOT NULL,
  `netamount` double(13,2) NOT NULL,
  `productlist` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`suppliercode`, `podate`, `postatus`, `ponumber`, `orderedby`, `machineid`, `preparedby`, `remarks`, `amount`, `discount`, `netamount`, `productlist`, `id`) VALUES
('S00011', '2023-09-04', 'Completed', 'P00001', 'EM00014', '0023', 'EM00001', '', 2500.00, 0.00, 2500.00, '[{\"qty\":\"3.00\",\"price\":\"300.00\",\"tamount\":\"900.00\",\"itemid\":\"P00325\"},{\"qty\":\"2.00\",\"price\":\"500.00\",\"tamount\":\"1000.00\",\"itemid\":\"P00326\"},{\"qty\":\"3.00\",\"price\":\"200.00\",\"tamount\":\"600.00\",\"itemid\":\"P00739\"}]', 1),
('S00007', '2023-09-05', 'Completed', 'P00002', 'EM00028', '', 'EM00001', '', 3500.00, 0.00, 3500.00, '[{\"qty\":\"5.00\",\"price\":\"700.00\",\"tamount\":\"3500.00\",\"itemid\":\"P00432\"}]', 2),
('S00005', '2023-09-05', 'Completed', 'P00003', 'EM00006', '0001', 'EM00001', '', 1500.00, 0.00, 1500.00, '[{\"qty\":\"12.00\",\"price\":\"100.00\",\"tamount\":\"1200.00\",\"itemid\":\"P00118\"},{\"qty\":\"10.00\",\"price\":\"30.00\",\"tamount\":\"300.00\",\"itemid\":\"P00270\"}]', 3),
('S00007', '2023-09-05', 'Partial', 'P00004', 'EM00014', '0023', 'EM00001', '', 5000.00, 0.00, 5000.00, '[{\"qty\":\"10.00\",\"price\":\"500.00\",\"tamount\":\"5000.00\",\"itemid\":\"P00325\"}]', 4),
('S00013', '2023-09-11', 'Pending', 'P00005', 'EM00028', '0023', 'EM00001', '', 645.00, 0.00, 645.00, '[{\"qty\":\"2.00\",\"price\":\"212.00\",\"tamount\":\"424.00\",\"itemid\":\"P00111\"},{\"qty\":\"1.00\",\"price\":\"221.00\",\"tamount\":\"221.00\",\"itemid\":\"P00113\"}]', 5);

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE `returned` (
  `returnby` varchar(7) NOT NULL,
  `retstatus` varchar(10) NOT NULL,
  `retdate` date NOT NULL,
  `retnumber` varchar(10) NOT NULL,
  `postedby` varchar(7) NOT NULL,
  `remarks` text NOT NULL,
  `productlist` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returned`
--

INSERT INTO `returned` (`returnby`, `retstatus`, `retdate`, `retnumber`, `postedby`, `remarks`, `productlist`, `id`) VALUES
('EM00018', '', '0000-00-00', '', '', '', '', 1),
('EM00022', 'Posted', '2023-09-09', '', '', '', '', 2),
('EM00002', 'Posted', '2023-09-09', 'R00003', '', '', '', 3),
('EM00002', 'Posted', '2023-09-09', 'R00004', '', '', '', 4),
('EM00028', 'Posted', '2023-09-09', 'R00005', '', '', '', 5),
('EM00002', 'Posted', '2023-09-09', 'R00006', 'EM00001', '', '[{\"qty\":\"2.00\",\"itemid\":\"P00435\"},{\"qty\":\"1.00\",\"itemid\":\"P00001\"}]', 6);

-- --------------------------------------------------------

--
-- Table structure for table `returnitems`
--

CREATE TABLE `returnitems` (
  `retnumber` varchar(10) NOT NULL,
  `qty` float(11,2) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returnitems`
--

INSERT INTO `returnitems` (`retnumber`, `qty`, `itemid`, `id`) VALUES
('R00006', 2.00, 'P00435', 1),
('R00006', 1.00, 'P00001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `requestby` varchar(7) NOT NULL,
  `reqstatus` varchar(10) NOT NULL,
  `reqdate` date NOT NULL,
  `reqnumber` varchar(10) NOT NULL,
  `postedby` varchar(7) NOT NULL,
  `machineid` varchar(4) NOT NULL,
  `remarks` text NOT NULL,
  `productlist` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`requestby`, `reqstatus`, `reqdate`, `reqnumber`, `postedby`, `machineid`, `remarks`, `productlist`, `id`) VALUES
('EM00002', 'Posted', '2023-09-05', 'W00001', 'EM00001', '0069', '', '[{\"qty\":\"2.00\",\"itemid\":\"P00325\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockoutitems`
--

CREATE TABLE `stockoutitems` (
  `reqnumber` varchar(10) NOT NULL,
  `qty` float(11,2) NOT NULL,
  `itemid` varchar(6) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockoutitems`
--

INSERT INTO `stockoutitems` (`reqnumber`, `qty`, `itemid`, `id`) VALUES
('W00001', 2.00, 'P00325', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `suppliercode` varchar(6) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tin` varchar(15) NOT NULL,
  `vatdesc` varchar(7) NOT NULL,
  `description` varchar(50) NOT NULL,
  `mobile` varchar(26) NOT NULL,
  `landline` varchar(25) NOT NULL,
  `faxnum` varchar(25) NOT NULL,
  `website` varchar(25) NOT NULL,
  `contactperson` varchar(35) NOT NULL,
  `country` varchar(2) NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `address` varchar(60) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`suppliercode`, `name`, `tin`, `vatdesc`, `description`, `mobile`, `landline`, `faxnum`, `website`, `contactperson`, `country`, `isactive`, `address`, `id`) VALUES
('S00001', 'Food Sun Spices', '', '', '', '', '034431-1080', '', '', 'Verlin', 'PH', 1, 'Door#2  Quendy\'s Bldg. Amelia Ave. Libertad Bacolod City', 1),
('S00002', 'MCR Bles Foods Trading Corp.', '', '', '', '', '034432-0377', '034433-6516', '', '', 'PH', 1, 'Bangga Guanzon Mansilingan Bacolod City', 2),
('S00003', 'Verhel Peanut Store', '', '', '', '', '', '', '', 'Carmelina Deguit', 'PH', 1, '#6 Teresita J. Cokin Bldg. Margarita St. Libertad Brgy. 40 B', 3),
('S00004', 'rTL Janelle Commercial', '', '', '', '', '', '', '', '', 'PH', 1, 'DAALCO Bldg. Margarita St. Libertad Brgy.40 Bacolod City', 4),
('S00005', 'E.T.G. (eddie Guillen) Corp. ', '', '', '', '', '', '', '', '', 'PH', 1, 'Dr#5 Cadiz Bldg. Amelia Ave. Brgy. 40 Bacolod City ', 5),
('S00006', 'Rivson Goldplast Manufacturing Corp. ', '', '', '', '09338258382-09060927566', '', '', '', '', 'PH', 1, 'Purok Paho Brgy, Felisa Bacolod City', 6),
('S00007', 'Bacolod La Wynona Trading Corp. ', '', 'Non-VAT', '', '', '0344476680-0344466942', '', '', '', 'PH', 1, 'Purok Paho Brgy. Felisa Bacolod City', 7),
('S00008', 'mitu Visaayan Dairy Ventures', '', '', '', '', '09175220237', '', '', '', 'PH', 1, '1902 Malaspina Brgy. Villamonte Bacolod City', 8),
('S00009', 'Happy Baker Inc. ', '', '', '', '', '09369442767', '', '', '', 'PH', 1, 'Lot 26-28 Taurus Street. Sharina Heights Brgy. Taculing Baco', 9),
('S00010', 'Mariano Go', '', '', '', '09176335564', '', '', '', 'Jennet Go', 'PH', 1, '', 10),
('S00011', 'Jan Fred Doroteo', '', '', '', '09126564732', '', '', '', '', 'PH', 1, '', 11),
('S00012', 'Tay Tay', '', '', '', '09209000036', '', '', '', 'Cenon Chua', 'PH', 1, '', 12),
('S00013', 'Central Foods Processes ', '', '', '', '09175350482', '', '', '', 'Richard Juansing', 'PH', 1, 'Manila', 13),
('S00014', 'Rivson Green Harvest', '', '', '', '09752063716', '', '', '', 'Janice', 'PH', 1, 'Nueva Ecija', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `empid` varchar(7) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `override` text NOT NULL,
  `utype` text NOT NULL,
  `photo` text NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `userid` varchar(4) NOT NULL,
  `mt` tinyint(4) NOT NULL,
  `ins` tinyint(4) NOT NULL,
  `po` tinyint(4) NOT NULL,
  `inc` tinyint(4) NOT NULL,
  `rel` tinyint(4) NOT NULL,
  `ret` tinyint(4) NOT NULL,
  `adj` tinyint(4) NOT NULL,
  `inv` tinyint(4) NOT NULL,
  `rep` tinyint(4) NOT NULL,
  `su` tinyint(4) NOT NULL,
  `em` tinyint(4) NOT NULL,
  `bd` tinyint(4) NOT NULL,
  `prt` tinyint(4) NOT NULL,
  `cat` tinyint(4) NOT NULL,
  `bnd` tinyint(4) NOT NULL,
  `mac` tinyint(4) NOT NULL,
  `cls` tinyint(4) NOT NULL,
  `ac` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `empid`, `user`, `password`, `override`, `utype`, `photo`, `isactive`, `userid`, `mt`, `ins`, `po`, `inc`, `rel`, `ret`, `adj`, `inv`, `rep`, `su`, `em`, `bd`, `prt`, `cat`, `bnd`, `mac`, `cls`, `ac`) VALUES
(1, 'EM00001', 'magnetar', '$2a$07$asxx54ahjppf45sd87a5auoA0DoIFl9Jr6qG7bwafIZ4OZMiqAo2C', 'uyscuti', 'Super Administrator', 'views/img/users/U23/385.jpg', 1, 'U001', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utype`
--

CREATE TABLE `utype` (
  `id` int(11) NOT NULL,
  `utypedesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utype`
--

INSERT INTO `utype` (`id`, `utypedesc`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brandcode` (`brandcode`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buildingcode` (`buildingcode`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classcode` (`classcode`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientid` (`clientid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoming`
--
ALTER TABLE `incoming`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delnumber` (`delnumber`),
  ADD KEY `ponumber` (`ponumber`);

--
-- Indexes for table `incomingitems`
--
ALTER TABLE `incomingitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delnumber` (`delnumber`),
  ADD KEY `ponumber` (`ponumber`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invnumber` (`invnumber`);

--
-- Indexes for table `inventoryitems`
--
ALTER TABLE `inventoryitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `invnumber` (`invnumber`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorycode` (`categorycode`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machineid` (`machineid`),
  ADD KEY `classcode` (`classcode`);

--
-- Indexes for table `machineattributes`
--
ALTER TABLE `machineattributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machineid` (`machineid`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positioncode` (`positioncode`);

--
-- Indexes for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ponumber` (`ponumber`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliercode` (`suppliercode`) USING BTREE,
  ADD KEY `machineid` (`machineid`);

--
-- Indexes for table `returned`
--
ALTER TABLE `returned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returnitems`
--
ALTER TABLE `returnitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retnumber` (`retnumber`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reqnumber` (`reqnumber`),
  ADD KEY `machineid` (`machineid`);

--
-- Indexes for table `stockoutitems`
--
ALTER TABLE `stockoutitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `reqnumber` (`reqnumber`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliercode` (`suppliercode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `utype`
--
ALTER TABLE `utype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incomingitems`
--
ALTER TABLE `incomingitems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventoryitems`
--
ALTER TABLE `inventoryitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=808;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `machineattributes`
--
ALTER TABLE `machineattributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchaseitems`
--
ALTER TABLE `purchaseitems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `returned`
--
ALTER TABLE `returned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `returnitems`
--
ALTER TABLE `returnitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockoutitems`
--
ALTER TABLE `stockoutitems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utype`
--
ALTER TABLE `utype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
