--
-- Database: `db_dja`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `number` tinyint(3) unsigned NOT NULL,
  `cs` enum('A','B','C','D','E') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `number`, `cs`, `created`) VALUES
(1, 1, 'A', '2011-11-28 22:23:31'),
(2, 1, 'B', '2011-11-28 22:23:31'),
(3, 2, 'B', '2011-11-28 22:23:54'),
(4, 1, 'D', '2011-11-28 22:23:54'),
(5, 1, 'E', '2011-11-28 22:24:16'),
(6, 2, 'A', '2011-11-28 22:24:30'),
(7, 3, 'A', '2011-11-28 22:24:44'),
(8, 1, 'C', '2011-11-30 02:52:31'),
(9, 2, 'C', '2011-11-30 02:52:31'),
(10, 3, 'C', '2011-11-30 02:52:42'),
(11, 4, 'C', '2011-11-30 02:52:42'),
(12, 5, 'C', '2011-11-30 02:52:49'),
(13, 6, 'C', '2011-11-30 02:52:49');
