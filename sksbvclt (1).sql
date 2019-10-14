-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2018 at 03:14 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sksbvclt`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `ads` varchar(150) NOT NULL,
  `mob` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `class`, `unit`, `range`, `zone`, `ads`, `mob`) VALUES
(1, 'AJWAD JUMAN PC', '12 or completed', 'SIRAJUL HUDA', 'ELETTIL', 'THAMARASSERY', 'Parachalil (H), Elettil PO,\r\nKoduvally\r\nCalicut. 673572', '7025033413');

-- --------------------------------------------------------

--
-- Table structure for table `rcdetails`
--

CREATE TABLE IF NOT EXISTS `rcdetails` (
  `zone` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `preid` varchar(10) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `preads` varchar(150) NOT NULL,
  `premob` varchar(15) NOT NULL,
  `secid` varchar(10) NOT NULL,
  `secname` varchar(50) NOT NULL,
  `secads` varchar(150) NOT NULL,
  `secmob` varchar(15) NOT NULL,
  `tresid` varchar(10) NOT NULL,
  `tresname` varchar(50) NOT NULL,
  `tresads` varchar(150) NOT NULL,
  `tresmob` varchar(15) NOT NULL,
  `vpre1id` varchar(10) NOT NULL,
  `vpre1name` varchar(50) NOT NULL,
  `vpre1mob` varchar(15) NOT NULL,
  `vpre2id` varchar(10) NOT NULL,
  `vpre2name` varchar(50) NOT NULL,
  `vpre2mob` varchar(15) NOT NULL,
  `vpre3id` varchar(10) NOT NULL,
  `vpre3name` varchar(50) NOT NULL,
  `vpre3mob` varchar(15) NOT NULL,
  `jsec1id` varchar(10) NOT NULL,
  `jsec1name` varchar(50) NOT NULL,
  `jsec1mob` varchar(15) NOT NULL,
  `jsec2id` varchar(10) NOT NULL,
  `jsec2name` varchar(50) NOT NULL,
  `jsec2mob` varchar(15) NOT NULL,
  `jsec3id` varchar(10) NOT NULL,
  `jsec3name` varchar(50) NOT NULL,
  `jsec3mob` varchar(15) NOT NULL,
  `counid` varchar(10) NOT NULL,
  `counname` varchar(50) NOT NULL,
  `counmob` varchar(15) NOT NULL,
  PRIMARY KEY (`range`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rtadetails`
--

CREATE TABLE IF NOT EXISTS `rtadetails` (
  `zone` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `rno` varchar(3) NOT NULL,
  `remail` varchar(50) NOT NULL,
  `remailpw` varchar(8) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(8) NOT NULL,
  `chairman` varchar(50) NOT NULL,
  `chairmanads` varchar(150) NOT NULL,
  `chairmanmob` varchar(15) NOT NULL,
  `convenor` varchar(50) NOT NULL,
  `convenorads` varchar(150) NOT NULL,
  `convenormob` varchar(15) NOT NULL,
  `skjmrsec` varchar(50) NOT NULL,
  `skjmrsecads` varchar(150) NOT NULL,
  `skjmrsecmob` varchar(15) NOT NULL,
  `taid` varchar(10) NOT NULL,
  `taname` varchar(50) DEFAULT NULL,
  `taads` varchar(150) DEFAULT NULL,
  `tamob` varchar(15) DEFAULT NULL,
  `taemail` varchar(150) DEFAULT NULL,
  `unno` varchar(10) DEFAULT NULL,
  `oads` varchar(150) NOT NULL,
  `activesbv` varchar(10) NOT NULL,
  UNIQUE KEY `rno` (`rno`,`remail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ucdetails`
--

CREATE TABLE IF NOT EXISTS `ucdetails` (
  `zone` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `uno` varchar(4) NOT NULL,
  `preid` varchar(10) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `preads` varchar(150) NOT NULL,
  `premob` varchar(15) NOT NULL,
  `secid` varchar(10) NOT NULL,
  `secname` varchar(50) NOT NULL,
  `secads` varchar(150) NOT NULL,
  `secmob` varchar(15) NOT NULL,
  `tresid` varchar(10) NOT NULL,
  `tresname` varchar(50) NOT NULL,
  `tresads` varchar(150) NOT NULL,
  `tresmob` varchar(15) NOT NULL,
  `vpre1id` varchar(10) NOT NULL,
  `vpre1name` varchar(50) NOT NULL,
  `vpre1mob` varchar(15) NOT NULL,
  `vpre2id` varchar(10) NOT NULL,
  `vpre2name` varchar(50) NOT NULL,
  `vpre2mob` varchar(15) NOT NULL,
  `vpre3id` varchar(10) NOT NULL,
  `vpre3name` varchar(50) NOT NULL,
  `vpre3mob` varchar(15) NOT NULL,
  `jsec1id` varchar(10) NOT NULL,
  `jsec1name` varchar(50) NOT NULL,
  `jsec1mob` varchar(15) NOT NULL,
  `jsec2id` varchar(10) NOT NULL,
  `jsec2name` varchar(50) NOT NULL,
  `jsec2mob` varchar(15) NOT NULL,
  `jsec3id` varchar(10) NOT NULL,
  `jsec3name` varchar(50) NOT NULL,
  `jsec3mob` varchar(15) NOT NULL,
  `counid` varchar(10) NOT NULL,
  `counname` varchar(50) NOT NULL,
  `counmob` varchar(15) NOT NULL,
  PRIMARY KEY (`uno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `zone` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `uno` varchar(4) NOT NULL,
  `username` varchar(4) NOT NULL,
  `password` varchar(8) NOT NULL,
  `chairman` varchar(50) NOT NULL,
  `chairmanads` varchar(150) NOT NULL,
  `chairmanmob` varchar(15) NOT NULL,
  `convenor` varchar(50) NOT NULL,
  `convenorads` varchar(150) NOT NULL,
  `convenormob` varchar(15) NOT NULL,
  `skssfusec` varchar(50) NOT NULL,
  `skssfusecmob` varchar(15) NOT NULL,
  `stno` varchar(10) NOT NULL,
  `mads` varchar(150) NOT NULL,
  `activesbv` varchar(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zcdetails`
--

CREATE TABLE IF NOT EXISTS `zcdetails` (
  `zone` varchar(50) NOT NULL,
  `preid` varchar(10) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `preads` varchar(255) NOT NULL,
  `premob` varchar(15) NOT NULL,
  `secid` varchar(10) NOT NULL,
  `secname` varchar(50) NOT NULL,
  `secads` varchar(255) NOT NULL,
  `secmob` varchar(15) NOT NULL,
  `tresid` varchar(10) NOT NULL,
  `tresname` varchar(50) NOT NULL,
  `tresads` varchar(150) NOT NULL,
  `tresmob` varchar(15) NOT NULL,
  `vpre1id` varchar(10) NOT NULL,
  `vpre1name` varchar(50) NOT NULL,
  `vpre1mob` varchar(15) NOT NULL,
  `vpre2id` varchar(10) NOT NULL,
  `vpre2name` varchar(50) NOT NULL,
  `vpre2mob` varchar(15) NOT NULL,
  `vpre3id` varchar(10) NOT NULL,
  `vpre3name` varchar(50) NOT NULL,
  `vpre3mob` varchar(15) NOT NULL,
  `jsec1id` varchar(10) NOT NULL,
  `jsec1name` varchar(50) NOT NULL,
  `jsec1mob` varchar(15) NOT NULL,
  `jsec2id` varchar(10) NOT NULL,
  `jsec2name` varchar(50) NOT NULL,
  `jsec2mob` varchar(15) NOT NULL,
  `jsec3id` varchar(10) NOT NULL,
  `jsec3name` varchar(50) NOT NULL,
  `jsec3mob` varchar(15) NOT NULL,
  `counid` varchar(10) NOT NULL,
  `counname` varchar(50) NOT NULL,
  `counmob` varchar(1015) NOT NULL,
  PRIMARY KEY (`zone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ztadetails`
--

CREATE TABLE IF NOT EXISTS `ztadetails` (
  `username` varchar(7) NOT NULL,
  `zemail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `zone` varchar(30) NOT NULL,
  `zabr` varchar(3) NOT NULL,
  `zno` int(2) NOT NULL,
  `chairman` varchar(50) DEFAULT NULL,
  `chairmanads` varchar(150) DEFAULT NULL,
  `chairmanmob` varchar(15) DEFAULT NULL,
  `convenor` varchar(50) DEFAULT NULL,
  `convenorads` varchar(150) DEFAULT NULL,
  `convenormob` varchar(10) DEFAULT NULL,
  `taid` varchar(10) NOT NULL,
  `taname` varchar(50) DEFAULT NULL,
  `taads` varchar(150) NOT NULL,
  `taunit` varchar(30) NOT NULL,
  `tarange` varchar(30) NOT NULL,
  `tamob` varchar(10) NOT NULL,
  `taemail` varchar(50) NOT NULL,
  `tadesig` varchar(30) NOT NULL,
  `taphoto` varchar(1000) NOT NULL,
  `nor` int(2) NOT NULL DEFAULT '10',
  PRIMARY KEY (`zone`),
  UNIQUE KEY `zemailpw` (`password`,`tamob`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztadetails`
--

INSERT INTO `ztadetails` (`username`, `zemail`, `password`, `zone`, `zabr`, `zno`, `chairman`, `chairmanads`, `chairmanmob`, `convenor`, `convenorads`, `convenormob`, `taid`, `taname`, `taads`, `taunit`, `tarange`, `tamob`, `taemail`, `tadesig`, `taphoto`, `nor`) VALUES
('kydzc01', 'sksbvkydzc01@gmail.com', 'Koyilandyzonal', 'KOYILANDY', 'KYD', 1, NULL, NULL, NULL, 'CPA Salam Musliar', NULL, '9947701180', '1', 'Ajwad Juman', 'Parachalil, Elettil PO,Koduvally VIA,673572', 'Muchukkunnu south', 'Parappally', '7025033413', 'ajwadjumanpc@gmail.com', 'Vice President', 'https://drive.google.com/file/d/1tZBctUZscsbUB_D_TkLY6Pi9Ba6sQ7b0/view?usp=sharing', 10),
('kkdzc02', 'sksbvkkdzc02@gmail.com', 'Kozhikodezonal', 'KOZHIKODE', 'KKD', 2, NULL, NULL, NULL, 'Zainul Abideen Thangal', NULL, '9947188188', '1', 'Ajwad Juman', 'Parachalil, Elettil PO,Koduvally VIA,673572', 'mannarppadam', 'Feroke', '7025033413', 'ajwadjumanpc@gmail.com', 'Member', '', 10),
('ktdzc03', 'sksbvktdzc03@gmail.com', 'Kuttiadyzonal', 'KUTTIADY', 'KTD', 3, NULL, NULL, NULL, 'Kunjayin Musliar', NULL, '9946060829', '1', 'Ajwad Juman', 'Parachalil, Elettil PO,Koduvally VIA,673572', '', '', '7025033413', 'ajwadjumanpc@gmail.com', '', '', 9),
('mvrzc04', 'sksbvmvrzc04@gmail.com', 'Mavoorzonal', 'MAVOOR', 'MVR', 4, NULL, NULL, NULL, 'Amjad Khan Rasheedi', NULL, '9744603035', '1', 'Ajwad Juman', 'Parachalil, Elettil PO,Koduvally VIA,673572', 'Vellayikode', 'perumanna', '7025033413', 'ajwadjumanpc@gmail.com', 'Secretary', '', 9),
('tsyzc05', 'sksbvtsyzc05@gmail.com', 'Thamarasseryzonal', 'THAMARASSERY', 'TSY', 5, NULL, NULL, NULL, 'Abdulla Faisy', NULL, '9446732452', '2', 'trial', 'aaaaaaaaaaaa', 'KAREETTIPARAMBU', 'KODUVALLY', '7025033413', 'afres211@gmail.com', 'Secretary', '', 10),
('vkrzc06', 'sksbvvkrzc06@gmail.com', 'Vadakarazonal', 'VADAKARA', 'VKR', 6, NULL, NULL, NULL, 'APM Jabbar Musliar', NULL, '9388822322', '1', 'Ajwad Juman', 'Parachalil, Elettil PO,Koduvally VIA,673572', 'Kanjirattu thara', 'Thiruvallur', '7025033413', 'ajwadjumanpc@gmail.com', 'President', '', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
