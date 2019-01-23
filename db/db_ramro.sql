-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 05:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ramro`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `towncity` varchar(200) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `mobile` int(100) NOT NULL,
  `website` varchar(200) NOT NULL,
  `businesstype` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `overview` varchar(10000) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `datetime`, `name`, `address1`, `address2`, `towncity`, `postcode`, `phone`, `mobile`, `website`, `businesstype`, `image`, `overview`, `user_id`) VALUES
(10, 'January/18/2019 21:30:24', 'Rup Law Solicitor', '166 Dawes Road', '', 'Uxbridge', 'UB10 0RA', 812121545, 2147483647, 'www.rupsolicitor.com', 'Driving Instructor', '5bc65e0232148.image.jpg', 'This is my law form please come for any legal advice.', 2),
(11, 'January/19/2019 18:38:37', 'Mero Suun Pasal', '473 High Road', 'Church End and Roundwood', 'London', 'NW10 9SL', 815646545, 754564566, 'www.merosunpasal.com', 'Gold Shop', 'gold-shop.png', 'This is my sun pasal come and buy sun Claim your free business advertising on ramro6 Local to display your business phone number to customers searching in your area. Upgrade to an Enhanced Listing to unlock more. Claim your free business advertising on ramro6 Local to display your business phone number to customers searching in your area. Upgrade to an Enhanced Listing to unlock more. rup', 3),
(12, 'January/12/2019 23:11:27', 'Mero Computer Hardware', '17 School Road', 'Feltham', 'Feltham', 'FE15 2FD', 2147483647, 2147483647, 'www.dipukohardware.com', 'Off-Licence', 'goals-for-your-business_512861902.jpg', 'Dipu dada ko computer solution', 4),
(13, 'January/18/2019 21:38:36', 'Rup Web Design and Development', '7 Gossage Road', '', 'Uxbridge', 'UB10 0RJ', 2147483647, 2147483647, 'www.rupitsolution.com', 'IT Solution', 'cover.png', 'We design develope web and for all IT solutions as well. The name of our restaurant is inspired by the Mt. Kailash, a Himalayan mountain peak in Tibet. The Tibetan name for the mountain is Khangri Rinpoche, Khangri means snowy mountain & Rinpoche is ', 2),
(17, 'January/19/2019 18:38:14', 'Myron Hospitality Service', '1 Durham', 'Rise', 'London', 'tw14 0ag', 2147483647, 2147483647, 'www.myronhospitality.com', 'Lawyer', 'gallery3.jpg', 'Eat imagine you chiefly few end ferrars compass. Be visitor females am ferrars inquiry. Latter law remark two lively thrown. Spot set they know rest its. Raptures law diverted believed jennings consider children the see. Had invited beloved carried the colonel. Occasional principles discretion it as he unpleasing boisterous. She bed sing dear now son half. \r\n\r\nPiqued favour stairs it enable exeter as seeing. Remainder met improving but engrossed sincerity age. Better but length gay denied abroad are. Attachment astonished to on appearance imprudence so collecting in excellence. Tiled way blind lived whose new. The for fully had she there leave merit enjoy forth. \r\nrup', 3),
(18, 'January/19/2019 18:39:12', 'Dipu Dada Ko IT Solution', '34 Sparrow Farm Dr', '', 'Feltham', 'TW14 0DP', 2147483647, 2147483647, 'www.diputkoitsolution.com', 'IT Solution', 'gallery2.png', 'The hospitality industry is a multibillion-dollar industry that depends on the availability of leisure time and disposable income. A hospitality unit such as a restaurant, hotel, or an amusement park consists of multiple groups such as facility maint Sportsman do offending supported extremity breakfast by listening. Decisively advantages nor expression unpleasing she led met. Estate was tended ten boy nearer seemed. As so seeing latter he should thirty whence. Steepest speaking up attended it as. Made neat an on be gave show snug tore. \r\n\r\nUnfeeling so rapturous discovery he exquisite. Reasonably so middletons or impression by terminated. Old pleasure required removing elegance him had. Down she bore sing saw calm high. Of an or game gate west face shed. ï»¿no great but music too old found arose. \r\n\r\nTravelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do warmly. Entered of cordial do on no hearted. Yet agreed whence and unable limits. Use off him gay abilities concluded immediate allowance. \r\n\r\nMr oh winding it enjoyed by between. The servants securing material goodness her. Saw principles themselves ten are possession. So endeavor to continue cheerful doubtful we to. Turned advice the set vanity why mutual. Reasonably if conviction on be unsatiable discretion apartments delightful. Are melancholy appearance stimulated occasional entreaties end. Shy ham had esteem happen active county. Winding morning am shyness evident to. Garrets because elderly new manners however one village she. \r\n\r\nProcuring education on consulted assurance in do. Is sympathize he expression mr no travelling. Preference he he at travelling in resolution. So striking at of to welcomed resolved. Northward by described up household therefore attention. Excellence decisively nay man yet impression for contrasted remarkably. There spoke happy for you are out. Fertile how old address did showing because sitting replied six. Had arose guest visit going off child she new. \r\n\r\nAffronting discretion as do is announcing. Now months esteem oppose nearer enable too six. She numerous unlocked you perceive speedily. Affixed offence spirits or ye of offices between. Real on shot it were four an as. Absolute bachelor rendered six nay you juvenile. Vanity entire an chatty to. \r\n\r\nAssure polite his really and others figure though. Day age advantages end sufficient eat expression travelling. Of on am father by agreed supply rather either. Own handsome delicate its property mistress her end appetite. Mean are sons too sold nor said. Son share three men power boy you. Now merits wonder effect garret own. \r\n\r\nAnd produce say the ten moments parties. Simple innate summer fat appear basket his desire joy. Outward clothes promise at gravity do excited. Sufficient particular impossible by reasonable oh expression is. Yet preference connection unpleasant yet melancholy but end appearance. And excellence partiality estimating terminated day everything. \r\n\r\nrup', 4),
(19, 'January/18/2019 21:11:31', 'Mero Restaurant', '34 Sparrow Farm Drive', '', 'Feltham', 'TW140DP', 85465456, 745564654, 'www.meropasal.com', 'Gold Shop', 'new-ng-500x349.jpg', 'The best vegan/vegetarian food in london center! I am vegetarian and I always go to Govinda''s because they have the most amazing variety of flavors. You can choose from pizzas, pastas, Indian food, salads, deserts... I meet non-vegetarians there ever', 4),
(20, 'January/18/2019 21:14:02', 'Mero Taxi ', '2 Pennethorne Rd', '', 'London', 'SE15 5TQ', 2147483647, 7465464, 'www.dfasdf.com', 'Taxi', 'cover.png', 'The best vegan/vegetarian food in london center! I am vegetarian and I always go to Govinda''s because they have the most amazing variety of flavors. You can choose from pizzas, pastas, Indian food, salads, deserts... I meet non-vegetarians there ever', 4),
(22, 'January/18/2019 21:15:14', 'Mero Mo:Mo', '12 Dawes Road', '', 'London', 'SE15 2SW', 804546565, 755645666, 'www.meromomo.com', 'Mo:Mo Distributor', 'dip_jewellers_aldershot.jpg', 'Momo is a type of South Asian dumpling, popular across the Indian subcontinent and the Himalayan regions of broader South Asia.[1] Momos are native to Tibet, Bhutan, Nepal, North Indian region of Ladakh,[1] Northeast Indian regions of Sikkim, Assam, and Arunachal Pradesh,[1] and Darjeeling, West Bengal, India.[1] It is similar to Chinese baozi and jiaozi, Mongolian buuz, Japanese gyoza and Korean mandu, but heavily influenced by cuisine of the Indian subcontinent with Indian spices and herbs.[1]', 4),
(24, 'January/23/2019 05:06:46', 'Ramesh Catering', '19 Heverham Road', '', 'London', 'SE18 1BT', 2147483647, 754546544, 'www.ramkocatering.com', 'Hospitality', 'Catering.jpg', '*The â€œaverageâ€ speed displayed in Mb represents the speed available to 50% of customers with this product during peak time (between 8pm and 10pm). The actual speed you will get depends on your cabling, your area and (with non-fibre optic products) time of day and how far you are from the telephone exchange. Most providers will tell you the likely speed you will receive when you begin your online sign up â€” this may differ from the average speed displayed on our table.', 14),
(25, 'January/20/2019 21:26:59', 'Chinu Ko Computer', '40 Leweston', 'Pl', 'London', 'N16 6RH', 2147483647, 2147483647, 'www.meraapna.com', 'IT Solution', 'cover.png', 'Established in 1950, The Village Barber in Ickenham has been opened since 1994. As reputable barbers in Ickenham, we provide you with excellent haircuts at great rates.\r\n\r\nOur friendly barbers have 10-30 yearsâ€™ experience in the industry so are read.\r\nrup', 15);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatorname`) VALUES
(1, 'January/11/2019 23:35:13', 'Restaurant', 'Rup'),
(2, 'January/11/2019 23:40:26', 'Off-Licence', 'Rup'),
(3, 'January/12/2019 13:44:49', 'Lawyer', 'Rup'),
(4, 'January/12/2019 22:10:55', 'IT Solution', 'Rup'),
(7, 'January/12/2019 22:31:54', 'Gold Shop', 'Rup Rai'),
(8, 'January/12/2019 22:33:38', 'Driving Instructor', 'Sundar Chamling'),
(9, 'January/13/2019 23:27:39', 'Hospitality', 'Sundar Chamling'),
(10, 'January/17/2019 01:35:00', 'Mo:Mo Distributor', 'Dipendra Rai'),
(11, 'January/17/2019 01:47:38', 'Taxi', 'Sundar Chamling');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `uploadedon` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `business_id` int(10) NOT NULL,
  `user_business_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `filename`, `uploadedon`, `type`, `business_id`, `user_business_id`) VALUES
(11, '5bc65e0232148.image.jpg', 'Upload/Gallery/5bc65e0232148.image.jpg', 'image/jpeg', 20, 4),
(12, 'B_Business_Studies_banner_template_01-copy.jpg', 'Upload/Gallery/B_Business_Studies_banner_template_01-copy.jpg', 'image/jpeg', 20, 4),
(13, 'beautiful-girl-2245532_960_720.jpg', 'Upload/Gallery/beautiful-girl-2245532_960_720.jpg', 'image/jpeg', 20, 4),
(14, 'cover.png', 'Upload/Gallery/cover.png', 'image/png', 20, 4),
(15, 'beautiful-girl-2245532_960_720.jpg', 'Upload/Gallery/beautiful-girl-2245532_960_720.jpg', 'image/jpeg', 19, 4),
(16, 'goals-for-your-business_512861902.jpg', 'Upload/Gallery/goals-for-your-business_512861902.jpg', 'image/jpeg', 18, 4),
(17, 'IT-solution.png', 'Upload/Gallery/IT-solution.png', 'image/png', 18, 4),
(18, 'web-develop.png', 'Upload/Gallery/web-develop.png', 'image/png', 10, 2),
(19, 'wesite-trends-2019.jpg', 'Upload/Gallery/wesite-trends-2019.jpg', 'image/jpeg', 10, 2),
(20, 'driving-instructor.png', 'Upload/Gallery/driving-instructor.png', 'image/png', 20, 4),
(21, 'Taxi.png', 'Upload/Gallery/Taxi.png', 'image/png', 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `addedby` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `firstname`, `lastname`, `username`, `email`, `password`, `addedby`, `image`) VALUES
(2, 'January/11/2019 13:58:05', 'Rup', 'Rai', '/fhSJApuiJAg8fwaiK90EnsjZN8Tny28IWTsIQ16ZlQ=', 'rup@gmail.com', '$1$cd6e81d2$43HfoTh1zdDhqDzOGW36a/', 'Rup', 'WhatsApp Image 2018-12-22 at 14.32.05.jpeg'),
(3, 'January/12/2019 21:37:27', 'Sundar', 'Chamling', 'CovbGGnnoHSc4Nd32ZO7epP61j5stUQxMWryOafigcg=', 'sundar@gmail.com', '$1$cd6e81d2$43HfoTh1zdDhqDzOGW36a/', 'Rup', '20181018_193606.jpg'),
(4, 'January/12/2019 22:09:32', 'Dipendra', 'Rai', 'DtCX6gpcHNwJhHII5eS++nmBvWyoQoDEKxmx4BemQuc=', 'dipu@gmail.com', '$1$cd6e81d2$43HfoTh1zdDhqDzOGW36a/', 'Rup', ''),
(14, 'January/20/2019 21:21:28', 'Ramesh', 'Gurung', 'zrqbxCrRgPbTeuT2eL1u8APbR3/qz95sqYtH4+RjGzE=', 'ram@gmail.com', '$1$cd6e81d2$43HfoTh1zdDhqDzOGW36a/', 'Rup', 'WhatsApp Image 2018-12-22 at 17.22.33 (1).jpeg'),
(15, 'January/20/2019 21:26:40', 'Amyukt', 'Nembang', 'kyzlJuFIaEDoTlqzdCG7aq5PmPJpdLt2RVwCyUzL97k=', 'amu@gmail.com', '$1$cd6e81d2$43HfoTh1zdDhqDzOGW36a/', 'Rup', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `business_id` int(10) NOT NULL,
  `user_business_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `datetime`, `name`, `rating`, `comment`, `status`, `business_id`, `user_business_id`) VALUES
(6, 'January/14/2019 14:33:35', 'Lina', 5, 'Best Off Licence', 'ON', 20, 4),
(7, 'January/14/2019 14:34:14', 'Nembang', 3, 'Average', 'ON', 20, 4),
(9, 'January/14/2019 14:44:23', 'Hari', 4, 'Nice one', 'ON', 21, 3),
(10, 'January/14/2019 21:47:00', 'Satru Gan', 5, 'Good business', 'ON', 21, 3),
(11, 'January/14/2019 22:29:25', 'Amyukt', 2, 'Not good\r\n', 'ON', 20, 4),
(12, 'January/14/2019 22:36:40', 'Surya', 2, 'Same not good', 'ON', 20, 4),
(13, 'January/14/2019 23:21:44', 'Kapil', 1, 'Not Good', 'ON', 21, 3),
(14, 'January/14/2019 23:22:23', 'rup', 5, 'Ma dildar 5 star', 'ON', 18, 4),
(29, 'January/22/2019 13:42:58', 'rup', 5, '5 Star Catering. The Best', 'ON', 24, 14),
(30, 'January/22/2019 13:43:27', 'Mario', 2, 'bad', 'ON', 24, 14),
(31, 'January/22/2019 13:44:36', 'Chamling', 4, 'One of the best.but only give 4 Star', 'ON', 25, 15),
(32, 'January/22/2019 13:46:57', 'Lina', 2, 'not good', 'ON', 25, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
