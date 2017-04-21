-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 10:01 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onebuck_examples`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` text NOT NULL,
  `category_description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `footer_html` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_description`, `type`, `parent_id`, `footer_html`) VALUES
(2, 'Men', '', 'post', 0, ''),
(3, 'Women', '', 'post', 0, ''),
(4, 'Kids', '', 'post', 0, ''),
(5, 'T-Shirts', '', 'post', 0, ''),
(6, 'Jeans', '', 'post', 3, ''),
(7, 'Red Fort', '', 'post', 3, ''),
(8, 'Administrative', '', 'job', 0, '<p>hello<br></p>'),
(9, 'Construction', '', 'job', 0, '<p>great it''s me<br></p>'),
(10, 'Education & Training', '', 'job', 0, ''),
(11, 'Healthcare', '', 'job', 0, ''),
(12, 'Office Manager ', '', 'job', 8, ''),
(13, 'Operations Manager ', '', 'job', 8, ''),
(14, 'Dual-Framed Outline', '', 'style', 0, ''),
(15, 'Appealing Design ', '', 'style', 0, ''),
(16, 'Sizeable Headline ', '', 'style', 0, ''),
(17, 'Well-Formed Header ', '', 'style', 0, ''),
(18, 'Belt', '', 'post', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

DROP TABLE IF EXISTS `category_post`;
CREATE TABLE IF NOT EXISTS `category_post` (
  `category_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`category_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`category_post_id`, `category_id`, `post_id`) VALUES
(1, 2, 44),
(2, 3, 44),
(6, 3, 46),
(7, 6, 46),
(10, 5, 46),
(11, 2, 9),
(12, 5, 9),
(13, 3, 25),
(14, 4, 25),
(15, 4, 26),
(16, 4, 46),
(17, 3, 47),
(18, 4, 47),
(19, 5, 48),
(20, 6, 48),
(21, 4, 9),
(22, 3, 47),
(23, 5, 47),
(24, 6, 47),
(25, 2, 26),
(26, 5, 26),
(27, 2, 48),
(28, 5, 48),
(29, 2, 48),
(30, 3, 48),
(31, 4, 48),
(32, 5, 48);

-- --------------------------------------------------------

--
-- Table structure for table `example_users`
--

DROP TABLE IF EXISTS `example_users`;
CREATE TABLE IF NOT EXISTS `example_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Salt` varchar(500) NOT NULL,
  `UserID` varchar(50) DEFAULT NULL,
  `Password` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `example_users`
--

INSERT INTO `example_users` (`ID`, `Salt`, `UserID`, `Password`, `Email`, `FirstName`, `LastName`, `Address`, `ZipCode`, `State`, `Phone`, `user_level`) VALUES
(11, 'db64aa3cd0', 'admin', 'mAhVsKNyNNN9dXggoWEREFXhW/tkYjY0YWEzY2Qw', 'naveen@test.com', 'naveen', 'kumar', NULL, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` text NOT NULL,
  `photo` text NOT NULL,
  `category` int(11) NOT NULL,
  `style` int(11) NOT NULL,
  `url` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `job_type` text NOT NULL,
  `create_date` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `job_status` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `job_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `photo`, `category`, `style`, `url`, `short_description`, `description`, `job_type`, `create_date`, `create_by`, `job_status`, `city`, `state`, `job_order`) VALUES
(4, 'Accountant', 'png', 8, 14, 'Url', ' facilitating action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', ' facilitating action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', '', '1900-12-05', 8, 'Reject', 'calcutta', 'W.B', 0),
(7, 'Senior Software Engineer', 'jpg', 12, 15, 'vofr/', 'action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', ' action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', '', '0000-00-00', 0, 'Approve', 'kolkata', 'W.B', 0),
(8, 'Web Designer', 'jpg', 9, 15, 'jhfjhfgjhfjh', 'facilitating action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', 'facilitating action in engineering teams to meet requirements. Reviews and/or analyzes and develops account requirements at domain level, aligning ', '', '2017-03-29', 2, 'Appealing', 'gopalnager', 'W.B', 0),
(9, 'Office Manager', 'png', 0, 0, 'v', 'Bachelorâ€™s Degree in Business Administration. 10 years of office administration experience. Oversaw the scanning/storage of files for oncoming properties and provided cost estimates....', 'Bachelorâ€™s Degree in Business Administration. 10 years of office administration experience. Oversaw the scanning/storage of files for oncoming properties and provided cost estimates....', 'full Time', '0000-00-00', 1, 'Dual-Framed Outline', 'calcutta', 'W.B', 0),
(10, 'Office Manager for CEO', 'png', 0, 0, 'kljhh/', 'Coordinate and monitor a variety of office projects for the Immediate Office of the Under Secretary of Economic Affairs. Prepare a variety of time sensitive reports concerning areas of interest to the Under Secretary for Economic Affairs....', 'Coordinate and monitor a variety of office projects for the Immediate Office of the Under Secretary of Economic Affairs. Prepare a variety of time sensitive reports concerning areas of interest to the Under Secretary for Economic Affairs....', 'part Time', '0000-00-00', 2, 'Appealing Design', 'media', 'W.B', 0),
(11, 'Operations Manager', 'png', 0, 0, 'kljhh/', 'Oversee the preparation, coordination, and control of incoming and outgoing correspondence, for the Under Secretary for Economic Affairs, on a day-to-day basis. Experienced training new hires....', 'Oversee the preparation, coordination, and control of incoming and outgoing correspondence, for the Under Secretary for Economic Affairs, on a day-to-day basis. Experienced training new hires....', 'full Time', '2017-04-12', 3, 'Appealing', 'gopalnager', 'W.B', 0),
(12, 'Operations Administrator', 'png', 0, 0, 'ljhjgty/', 'Communicate effectively orally and in writing with the Under Secretary for Economic Affairs, ESA top management, Departmental officials and the press, on various matters and issues....', 'Communicate effectively orally and in writing with the Under Secretary for Economic Affairs, ESA top management, Departmental officials and the press, on various matters and issues....', '', '0000-00-00', 4, 'Appealing', 'calcutta', 'W.B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `long_description` text NOT NULL,
  `create_user` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `short_description`, `meta_title`, `meta_description`, `long_description`, `create_user`, `photo`) VALUES
(9, 'prosanta', '12654', 'sujglryu ', ' which roasted parts of sentences fly into your mouth.', '<p>\r\nIt is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using ''Content here, content here'', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for ''lorem ipsum'' will uncover many web sites still in their \r\ninfancy. <b>Various versions have evolved over the years,</b> sometimes by \r\naccident, sometimes on purpose (injected humour and the like).&nbsp;</p><p>\r\nThere are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don''t look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn''t \r\nanything embarrassing hidden in the middle of text. All the Lorem Ipsum \r\ngenerators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.\r\n\r\n<br></p><br>', 'rteewsdtr', 'jpg'),
(25, 'ritam', 'poserer', 'just', ' in which roasted parts of sentences fly into your mouth.', '', 'oyurew bhuo', 'jpg'),
(26, 'jams', 'poserer', 'my meta', ' PHP is a widely-used, free, and efficient alternative to ...', '', 'ccccccccccc', 'jpg'),
(44, 'prosanta', 'modkr', 'my meta', 'A small river named Duden flows by their place and supplies it with the necessary', '<p>\r\n</p><h5><em><em>You just make a block level element with zero width and height, a \r\ncolored border on one side, and transparent borders on the two adjacent \r\nsides. They are fun for all kinds of things, like little arrow sticking \r\nout from speech bubbles, navigation pointers, and more. Often times \r\nthese are just visual flourishes, undeserving of dedicated markup. \r\nFortunately, pseduo elements are often a perfect fit. That is, using <code>::before</code>, <code>::after</code>,\r\n or both to create these block level elements and place the triangle. \r\nOne neat use that came to mind in this vein: breadcrumb navigation.</em></em></h5>\r\n\r\n<br><p></p>', 'bbbbbbbbbbbb', 'jpg'),
(46, 'avi', 'modkr', 'lob jjd gss', 'A small river named Duden flows by their place and supplies it with the necessary', '<p>\r\n</p><h5><em><em>You just make a block level element with zero width and height, a \r\ncolored border on one side, and transparent borders on the two adjacent \r\nsides. They are fun for all kinds of things, like little arrow sticking \r\nout from speech bubbles, navigation pointers, and more. Often times \r\nthese are just visual flourishes, undeserving of dedicated markup. \r\nFortunately, pseduo elements are often a perfect fit. That is, using <code>::before</code>, <code>::after</code>,\r\n or both to create these block level elements and place the triangle. \r\nOne neat use that came to mind in this vein: breadcrumb navigation.</em></em></h5>\r\n\r\n<br><p></p>', 'dddddddddd', 'jpg'),
(47, 'pepsi', 'you just make', 'sresd nhyuj jklhgf', 'A small river named Duden flows by their place and supplies it with the necessary', '<p>\r\n</p><h5><em><em>You just make a block level element with zero width and height, a \r\ncolored border on one side, and transparent borders on the two adjacent \r\nsides. They are fun for all kinds of things, like little arrow sticking \r\nout from speech bubbles, navigation pointers, and more. Often times \r\nthese are just visual flourishes, undeserving of dedicated markup. \r\nFortunately, pseduo elements are often a perfect fit. That is, using <code>::before</code>, <code>::after</code>,\r\n or both to create these block level elements and place the triangle. \r\nOne neat use that came to mind in this vein: breadcrumb navigation.\r\n</em></em></h5>\r\n\r\n<br><p></p>', 'stiv', 'jpg'),
(48, 'testing', 'small description', 'great', 'good', '<p>long description<br></p>', '11', '');

-- --------------------------------------------------------

--
-- Table structure for table `url_aliases`
--

DROP TABLE IF EXISTS `url_aliases`;
CREATE TABLE IF NOT EXISTS `url_aliases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` text NOT NULL,
  `object_type` text NOT NULL,
  `object_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_aliases`
--

INSERT INTO `url_aliases` (`id`, `alias`, `object_type`, `object_id`) VALUES
(1, 'men', 'category', 2),
(2, 'women', 'category', 3),
(3, 'kids', 'category', 4),
(4, 't-shirts', 'category', 5),
(5, 'jeans', 'category', 6),
(6, 'red-fort', 'category', 7),
(7, 'prosanta', 'post', 9),
(8, 'ritam', 'post', 25),
(9, 'belt', 'category', 18),
(10, 'testing', 'post', 48),
(11, 'administrative', 'category', 8);

-- --------------------------------------------------------

--
-- Table structure for table `url_manager`
--

DROP TABLE IF EXISTS `url_manager`;
CREATE TABLE IF NOT EXISTS `url_manager` (
  `url_manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `old_url` text NOT NULL,
  `new_url` text NOT NULL,
  PRIMARY KEY (`url_manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url_manager`
--

INSERT INTO `url_manager` (`url_manager_id`, `old_url`, `new_url`) VALUES
(2, 'lomfjdjh/mfdm/.com', 'www.blogs/admin/url_manager/.com'),
(3, 'ww.ho/yojdk.com', 'www.jhfd.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
