-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 03:17 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surya`
--

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `train` varchar(10) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`train`, `seats`) VALUES
('Corba', 58),
('Raptisagar', 52),
('Seshadri', 50),
('Tata', 60),
('Tutak', 64),
('Howrah', 56),
('Dhanbad', 58),
('Suvidha', 59),
('Kundan', 54),
('Chalthan', 58),
('Kuchta', 55),
('Chennai', 58),
('Mysoore', 58),
('Bang exp', 58);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `source` varchar(20) DEFAULT NULL,
  `dest` varchar(20) DEFAULT NULL,
  `train1` varchar(10) DEFAULT NULL,
  `train2` varchar(10) DEFAULT NULL,
  `train3` varchar(10) DEFAULT NULL,
  `train4` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`source`, `dest`, `train1`, `train2`, `train3`, `train4`) VALUES
('vijayawada', 'rajahmundry', 'Corba', 'Raptisagar', 'Seshadri', 'Tata'),
('katpadi', 'rajahmundry', 'Seshadri', 'Raptisagar', 'Dhanbad', 'Suvidha'),
('hyderabad', 'vijayawada', 'Howrah', 'Tutak', 'Kundan', 'Chalthan'),
('katpadi', 'bangloore', 'Kuchta', 'Chennai', 'Mysoore', 'Bang exp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`) VALUES
('123456', 'Sravan', '654321', 'ksravan605@gmail.com'),
('143341', 'gopal', 'gopal', 'gopal@gmail.com'),
('143143', 'krishna', 'krishna', 'krishnanagireddy12345@gmail.com'),
('122221', 'rabada', 'mahesh', 'bms.b1996@gmail.com'),
('12345', 'pradeep', 'reddy', 'phpex22@gmail.com'),
('85555', 'akhilreddy', 'akhil', 'akhilreddy080@gmail.com'),
('12345', 'Sravani', 'sravan', 'ksrava@gfmail.com'),
('56349', 'shravya', '12345', 'shivanisravya82@gmail.com'),
('56349', 'shruthi', '9876', 'gowdshruthi1997@gmail.com'),
('56349', 'abita', '123', 'abitajeslin580@gmail.com'),
('56349', 'mangayarkarasi', '1234', 'gowdshruthi1997@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
