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

-- --------------------------------------------------------

--
-- Dumping data for table `levelid`
--

INSERT INTO `levelid` (`levelid`, `levelname`) VALUES
(1, 'admin'),
(2, 'dirjen'),
(3, 'direktur'),
(4, 'kasubdit'),
(5, 'pelaksana'),
(6, 'supervisor'),
(7, 'cs');

-- --------------------------------------------------------

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `user`, `pass`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin'),
(2, 'Nama CS A', 'csa', 'csa', 'cs'),
(3, 'Nama CS B', 'csb', 'csb', 'cs'),
(4, 'Nama CS C', 'csc', 'csc', 'cs'),
(5, 'Nama CS D', 'csd', 'csd', 'cs'),
(6, 'Nama CS E', 'cse', 'cse', 'cs'),
(7, 'Nama Halo DJA', 'halodja', 'halodja', 'cs'),
(8, 'Nama Supervisor', 'supervisor', 'supervisor', 'supervisor'),
(9, 'Nama Pelaksana', 'pelaksana', 'pelaksana', 'pelaksana'),
(10, 'Nama Kasubdit', 'subdit', 'subdit', 'kasubdit'),
(11, 'Nama Direktur', 'direktur', 'direktur', 'direktur'),
(12, 'Nama Dirjen', 'dirjen', 'dirjen', 'dirjen');

-- --------------------------------------------------------

