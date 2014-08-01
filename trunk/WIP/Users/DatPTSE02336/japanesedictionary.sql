-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2014 at 12:42 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `japanesedictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `answer_content` varchar(200) NOT NULL,
  `answer_correct` int NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `answer`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_email` varchar(100) NOT NULL,
  `contact_content` varchar(5000) NOT NULL,
  `contact_type` varchar(10) DEFAULT NULL,
  `contact_reply` varchar(5000) DEFAULT NULL,
  `contact_status` int DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` varchar(10) NOT NULL,
  `c_level` varchar(10) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversationcontent`
--

CREATE TABLE IF NOT EXISTS `conversationcontent` (
  `con_id` int NOT NULL AUTO_INCREMENT,
  `c_id` varchar(10) NOT NULL,
  `con_title` varchar(200) NOT NULL,
  `con_hiragana` varchar(5000) NOT NULL,
  `con_romaji` varchar(5000) NOT NULL,
  `con_meaning` varchar(5000) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `conversationcontent`
--


-- --------------------------------------------------------

--
-- Table structure for table `grammar`
--

CREATE TABLE IF NOT EXISTS `grammar` (
  `g_id` int NOT NULL AUTO_INCREMENT,
  `g_hiragana` varchar(200) NOT NULL,
  `g_romaji` varchar(200) NOT NULL,
  `g_level` varchar(10) NOT NULL,
  `g_meaning` varchar(200) NOT NULL,
  `g_use` varchar(1000) NOT NULL,
  `g_status` int DEFAULT NULL,
  `reading_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `grammar`
--

-- --------------------------------------------------------

--
-- Table structure for table `grammarsentence`
--

CREATE TABLE IF NOT EXISTS `grammarsentence` (
  `g_id` int NOT NULL,
  `s_id` int NOT NULL,
  PRIMARY KEY (`g_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grammarsentence`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanji`
--

CREATE TABLE IF NOT EXISTS `kanji` (
  `k_id` int NOT NULL AUTO_INCREMENT,
  `k_kanji` varchar(10) NOT NULL,
  `k_hanviet` varchar(50) NOT NULL,
  `k_onyomi` varchar(100) DEFAULT NULL,
  `k_kunyomi` varchar(100) DEFAULT NULL,
  `k_meaning` varchar(200) DEFAULT NULL,
  `k_level` varchar(10) DEFAULT NULL,
  `k_status` int DEFAULT NULL,
  `reading_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`k_id`),
  UNIQUE KEY `k_kanji` (`k_kanji`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kanji`
--

-- --------------------------------------------------------

--
-- Table structure for table `meaning`
--

CREATE TABLE IF NOT EXISTS `meaning` (
  `m_id` int NOT NULL AUTO_INCREMENT,
  `v_id` int NOT NULL,
  `m_meaningvn` varchar(500) DEFAULT NULL,
  `m_category` varchar(10) DEFAULT NULL,
  `m_kanji` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `v_id` (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `meaning`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `test_id` varchar(20) DEFAULT NULL,
  `question_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `question`
--

-- --------------------------------------------------------

--
-- Table structure for table `readingarticle`
--

CREATE TABLE IF NOT EXISTS `readingarticle` (
  `readingarticle_id` int NOT NULL AUTO_INCREMENT,
  `reading_id` varchar(20) DEFAULT NULL,
  `readingarticle_content` varchar(5000) DEFAULT NULL,
  `readingarticle_question` varchar(5000) DEFAULT NULL,
  `readingarticle_answer` varchar(10) DEFAULT NULL,
  `reading_type` varchar(50) NOT NULL,
  PRIMARY KEY (`readingarticle_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `readingarticle`
--



-- --------------------------------------------------------

--
-- Table structure for table `readingdocument`
--

CREATE TABLE IF NOT EXISTS `readingdocument` (
  `reading_id` varchar(20) NOT NULL,
  `reading_title` varchar(100) NOT NULL,
  `reading_level` varchar(10) NOT NULL,
  PRIMARY KEY (`reading_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `readingdocument`
--
-- --------------------------------------------------------

--
-- Table structure for table `readingvocabulary`
--

CREATE TABLE IF NOT EXISTS `readingvocabulary` (
  `readingvocabulary_id` int NOT NULL AUTO_INCREMENT,
  `reading_id` varchar(20) DEFAULT NULL,
  `readingvocabulary_hiragana` varchar(100) DEFAULT NULL,
  `readingvocabulary_meaning` varchar(100) DEFAULT NULL,
  `readingvocabulary_kanji` varchar(10) DEFAULT NULL,
  `reading_type` varchar(50) NOT NULL,
  PRIMARY KEY (`readingvocabulary_id`),
  KEY `reading_id` (`reading_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `readingvocabulary`
--
-- --------------------------------------------------------

--
-- Table structure for table `sentence`
--

CREATE TABLE IF NOT EXISTS `sentence` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_hiragana` varchar(1000) NOT NULL,
  `s_romaji` varchar(1000) NOT NULL,
  `s_meaning` varchar(1000) NOT NULL,
  `s_kanji` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sentence`
--
-- --------------------------------------------------------

--
-- Table structure for table `sourcefile`
--

CREATE TABLE IF NOT EXISTS `sourcefile` (
  `sourcefile_id` varchar(100) NOT NULL,
  `lis_id` int DEFAULT NULL,
  `sourcefile_question` varchar(5000) NOT NULL,
  `sourcefile_script` varchar(5000) NOT NULL,
  `sourcefile_meaning` varchar(5000) NOT NULL,
  `sourcefile_answer` varchar(100) NOT NULL,
  PRIMARY KEY (`sourcefile_id`),
  KEY `lis_id` (`lis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sourcefile`
--



-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` varchar(20) NOT NULL,
  `test_category` varchar(50) NOT NULL,
  `test_level` varchar(10) NOT NULL,
  `test_content` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--



-- --------------------------------------------------------

--
-- Table structure for table `trackingmark`
--

CREATE TABLE IF NOT EXISTS `trackingmark` (
  `tm_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int DEFAULT NULL,
  `test_id` varchar(20) DEFAULT NULL,
  `tm_mark` int DEFAULT NULL,
  `tm_date` date DEFAULT NULL,
  PRIMARY KEY (`tm_id`),
  KEY `u_id` (`u_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trackingmark`
--
-- --------------------------------------------------------

--
-- Table structure for table `traininglistening`
--

CREATE TABLE IF NOT EXISTS `traininglistening` (
  `lis_id` int NOT NULL AUTO_INCREMENT,
  `lis_title` varchar(500) NOT NULL,
  `lis_level` varchar(10) NOT NULL,
  PRIMARY KEY (`lis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `traininglistening`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_username` varchar(32) NOT NULL,
  `u_password` varchar(32) NOT NULL,
  `u_role` int DEFAULT NULL,
  `u_fullname` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_registerdate` date DEFAULT NULL,
  `u_status` int DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_username` (`u_username`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `vi_id` int NOT NULL AUTO_INCREMENT,
  `vi_title` varchar(200) NOT NULL,
  `vi_link` varchar(200) NOT NULL,
  PRIMARY KEY (`vi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video`
--


-- --------------------------------------------------------

--
-- Table structure for table `vocabulary`
--

CREATE TABLE IF NOT EXISTS `vocabulary` (
  `v_id` int NOT NULL AUTO_INCREMENT,
  `v_hiragana` varchar(200) NOT NULL,
  `v_romaji` varchar(200) NOT NULL,
  `v_specialized` varchar(200) DEFAULT NULL,
  `v_status` int DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `vocabulary`
--


-- --------------------------------------------------------

--
-- Table structure for table `vocabularysentence`
--

CREATE TABLE IF NOT EXISTS `vocabularysentence` (
  `m_id` int NOT NULL,
  `s_id` int NOT NULL,
  PRIMARY KEY (`m_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vocabularysentence`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversationcontent`
--
ALTER TABLE `conversationcontent`
  ADD CONSTRAINT `conversationcontent_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `conversation` (`c_id`);

--
-- Constraints for table `grammarsentence`
--
ALTER TABLE `grammarsentence`
  ADD CONSTRAINT `grammarsentence_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `grammar` (`g_id`),
  ADD CONSTRAINT `grammarsentence_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sentence` (`s_id`);

--
-- Constraints for table `meaning`
--
ALTER TABLE `meaning`
  ADD CONSTRAINT `meaning_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vocabulary` (`v_id`);

--
-- Constraints for table `sourcefile`
--
ALTER TABLE `sourcefile`
  ADD CONSTRAINT `sourcefile_ibfk_1` FOREIGN KEY (`lis_id`) REFERENCES `traininglistening` (`lis_id`);

--
-- Constraints for table `trackingmark`
--
ALTER TABLE `trackingmark`
  ADD CONSTRAINT `trackingmark_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `trackingmark_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `vocabularysentence`
--
ALTER TABLE `vocabularysentence`
  ADD CONSTRAINT `vocabularysentence_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `meaning` (`m_id`),
  ADD CONSTRAINT `vocabularysentence_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sentence` (`s_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
