-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 06:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bipast`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(5) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'หนังฝรั่ง'),
(2, 'หนังไทย'),
(3, 'การ์ตูน'),
(4, 'หนังเกาหลี');

-- --------------------------------------------------------

--
-- Table structure for table `data_likes`
--

CREATE TABLE `data_likes` (
  `id` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_movie` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_likes`
--

INSERT INTO `data_likes` (`id`, `id_user`, `id_movie`) VALUES
(1, 1, 7),
(2, 2, 10),
(3, 2, 5),
(4, 2, 8),
(5, 2, 3),
(6, 4, 3),
(7, 4, 5),
(8, 4, 7),
(9, 4, 8),
(10, 4, 10),
(11, 5, 6),
(12, 5, 4),
(13, 5, 2),
(14, 6, 2),
(15, 6, 6),
(16, 6, 10),
(17, 7, 2),
(18, 7, 6),
(19, 8, 10),
(20, 9, 2),
(21, 10, 2),
(22, 23, 12);

-- --------------------------------------------------------

--
-- Table structure for table `data_movie`
--

CREATE TABLE `data_movie` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `id_categorym` int(5) NOT NULL,
  `year` int(4) NOT NULL,
  `minute` int(6) NOT NULL,
  `img` text NOT NULL,
  `vdo_ex` text NOT NULL,
  `vdo_main` text NOT NULL,
  `totallikes` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_movie`
--

INSERT INTO `data_movie` (`id`, `name`, `id_categorym`, `year`, `minute`, `img`, `vdo_ex`, `vdo_main`, `totallikes`, `detail`) VALUES
(1, 'JohnWick3', 1, 2019, 131, 'https://images3.alphacoders.com/103/thumb-1920-1033561.jpg', 'M7XM597XO94', 'M7XM597XO94', 1, 'ในภาคใหม่นี้ John Wick ต้องถูกคนทั้งโลกตามล่าด้วยค่าหัว $14 ล้านเหรียญ เนื่องจากเขาได้แหกกฎกลาง โดยการฆ่าคนในพื้นที่โรงแรมของ Continental และยิ่งคนที่เขาฆ่าคือสมาชิกระดับสูง เขาจึงต้องสู้และฆ่ากับศัตรูรอบด้านเพื่อหาทางหลบหนีออกจากเมืองนิวยอร์ก'),
(2, ' Who Am I', 1, 2014, 106, 'https://images3.alphacoders.com/831/831893.jpg', '5vnjheCqRIs', '5vnjheCqRIs', 5, 'Who Am I เป็นการเล่าเรื่องของผู้ชายคนนึงที่มีชื่อว่า เบนจมิน แฮกเกอร์อัจฉริยะ โดยเนื้อเรื่องย่อมีอยู่ว่า เบจมิน ได้แฮกข้อมูลกับเพื่อนของเขาเพื่อเจาะข้อมูล BND หน่วยข่าวกรองของเยอรมันที่เข้าถึงยากที่สุด'),
(3, 'Mission Impossible 6', 1, 2018, 148, 'https://cdn.wallpapersafari.com/65/29/vetnIW.jpg', 'wb49-oV0F78', 'wb49-oV0F78', 2, 'สองปีหลังจากจับตัวโซโลมอน เลน หัวหน้ากลุ่มก่อการร้ายซินดิเคต กลุ่มซินดิเคตได้กลายสภาพเป็นกลุ่มใหม่'),
(4, 'The Tomorrow War', 1, 2021, 140, 'https://images3.alphacoders.com/114/thumb-1920-1144783.jpeg', 'QPistcpGB8o', 'QPistcpGB8o', 1, 'เรื่องราวของมวลมนุษยชาติที่กำลังจะดับสูญเมื่อเอเลี่ยนเข้ามารุกราน ทำให้ทีมนักวิทยาศาสตร์กลุ่มหนึ่งต้องริเริ่มหาหนทางเพื่อที่จะต่อสู้กับการรุกรานครั้งนี้'),
(5, 'STAND BY ME DOREAMON', 3, 2014, 95, 'https://cdn.wallpapersafari.com/48/8/yY5Sop.jpg', 'oiK8ObSYRb8', 'oiK8ObSYRb8', 2, 'โดยเริ่มจากตอนแรกที่โดราเอมอนและเซวาชิเหลนของโนบิตะ เดินทางมาหาจากอนาคตเพื่อร่วมกันแก้ไขอดีตของโนบิตะ'),
(6, 'อาชญากลปล้นโลก', 1, 2013, 115, 'https://eskipaper.com/images/now-you-see-me-1.jpg', '4oDsPN7IejE', '4oDsPN7IejE', 3, 'นักมายากลผู้มีความสามารถสี่คนได้แก่ แดเนียล แอตลาส, แจ็ค ไวลเดอร์, เมอร์ริต แมคคินนีย์และเฮนลี รีฟส์ ถูกเรียกตัวมาพบกันโดยบุคคลลึกลับ'),
(7, 'ฟรีแลนซ์ ห้ามป่วย ห้ามพัก ห้ามรักหมอ', 2, 2015, 132, 'https://cms.dmpcdn.com/movie/2019/04/04/c49d083e-1bf7-4094-9700-c7d958eb606f_original.jpg', 'J1F9hMWnTHs', 'J1F9hMWnTHs', 2, 'ชายวัย 30 คือฟรีแลนซ์มือรีทัชรูป ที่งานยุ่งที่สุดในประเทศไทย ความสุขของฟรีแลนซ์อย่างยุ่น นอกจากการได้เห็นงานเต็มปฏิทิน ไม่เว้นวัน เสาร์ อาทิตย์ และวันหยุดราชการก็คือ งานเร่ง งานด่วน'),
(8, 'ไอฟาย แต้งกิ้ว เลิฟยู', 2, 2014, 121, 'https://uhuseries.com/wp-content/uploads/2019/12/I-FINE-THANK-YOU-LOVE-YOU.jpg', 'ELFL42u8mv8', 'ELFL42u8mv8', 2, ' ติวเตอร์ภาษาอังกฤษสาว ต้องพบกับเรื่องราวอันสุดแสนจะน่าปวดหัว เมื่อลูกศิษย์ชาวต่างชาติของเธอตัดสินใจทิ้ง ยิม แฟนหนุ่มคนไทยไปอเมริกา แต่ด้วยความที่ยิมฟังภาษาอังกฤษไม่ออก เธอจึงอัดวีดิโอบอกเลิกใส่ธัมป์ไดรว์'),
(9, 'The Bad Guys Reign of Chaos', 4, 2019, 115, 'https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABSgWVfS9SovYIOEduVvpBakpk6pmf_n7vOYQJvHzKZWWXFnrl4KdG2VA3v7YkSKRrWFWXFqxQDY9b3eTZSw4BKfMSlZk.jpg?r=866', 'ZXMY2qNupIw', 'ZXMY2qNupIw', 0, 'ตำรวจหัวหน้าหน่วยอาชญากรรมนามว่า โอกูทัก ผู้ไม่เคยปราณีอาชญากรหน้าใดๆ  ได้จัดทีมเฉพาะกิจสูตรหนามยอกต้องเอาหนามบ่ง คัดสามนักโทษวายร้ายสั่งตรงจากคุก ฝีมือคละสกิล'),
(10, 'น้อง.พี่.ที่รัก', 2, 2018, 124, 'https://cms.dmpcdn.com/movie/2020/02/28/00b8fdb0-59f3-11ea-89be-e98f1d469fec_original.jpg', '_7hMVZ25vQg', '_7hMVZ25vQg', 4, 'ตั้งแต่เด็ก ชัช คิดมาตลอดว่าน้องที่อยู่ในท้องแม่คือ น้องชาย พอถึงวันที่แม่คลอดแล้วกลายเป็นน้องสาว ชัชจึงเซ็งระดับสิบ ความฝันที่จะได้เล่นหุ่นยนต์และเตะบอลแมนๆกับน้องก็จบไป'),
(11, 'Winchester', 1, 2018, 99, 'https://image.tmdb.org/t/p/original/d4wnMDSrQonB9iArMzd90WqaoJ4.jpg', '0Juc2cL26mg', '0Juc2cL26mg', 0, 'เรื่องราวกล่าวถึงบ้านประหลาดที่มีชื่อเรียกว่า  ที่มีการออกแบบภายในจนดูเหมือนเขาวงกต  ซึ่งหลังจากที่ได้สร้างบ้านหลังนี้เสร็จสิ้น  เรื่องราวอันลึกลับและความน่ากลัวก็ได้ปรากฏขึ้นอย่างไม่ทราบสาเหตุ'),
(12, 'Aquaman', 1, 2018, 144, 'https://images5.alphacoders.com/973/thumb-1920-973279.jpg', 'WDkg3h8PCVU', 'WDkg3h8PCVU', 1, 'เรื่องราวต้นกำเนิดของ อาร์เธอร์ เคอร์รี่ ครึ่งมนุษย์และครึ่งแอตแลนเทียน ที่จะต้องพบกับการผจญภัยในชีวิตของเขา ซึ่งไม่ได้ทำให้เขาได้รู้ถึงตัวตนที่แท้จริงของตัวเองเท่านั้น แต่ยังได้พบอีกว่า เขามีเกียรติมากพอที่ได้เกิดมาเป็น \"กษัตริย์\" แต่หนทางก้าวสู่การเป็นใหญ่ไม่เคยโรยด้วยกลีบกุหลาบ'),
(13, 'ใหญ่ชนยักษ์ ซิ่งทะลุไมล์', 1, 2019, 152, 'https://fandomwire.com/wp-content/uploads/2020/07/2-16.jpg', 'zyYgDtY2AMY', 'zyYgDtY2AMY', 0, 'จากเรื่องจริงของการแข่งขันชิงความเป็นที่หนึ่งระหว่างสองยักษ์ใหญ่แห่งวงการรถยนต์ ฟอร์ด (Ford) และ เฟอร์รารี่ (Ferrari) ในการแข่งขันรถซิ่งระดับโลก เลอม็องส์ (Le Mans) เมื่อปี 1966 เมื่อนักออกแบบรถซิ่ง แคร์โรล เชลบี้ (แมตต์ เดมอน) และนักซิ่งหัวรั้นอย่าง เคน ไมล์ส (คริสเตียน เบล) ที่ต้องร่วมกันฝ่าฟันทั้งการแทรกแซงขององค์กรใหญ่และกฏของฟิสิกส์เพื่อปฏิวัติวงการเจ้าความเร็วกับสนามแข่งสุดหฤโหดอย่าง Le Mans 66'),
(14, 'Red Notice', 1, 2021, 118, 'https://images2.alphacoders.com/118/1186708.jpg', 'Pj0wz7zu3Ms', 'Pj0wz7zu3Ms', 0, 'Red Notice หรือ หมายแดง เป็นหมายที่ออกโดยตำรวจสากลหรืออินเตอร์โพล เพื่อออกไล่ล่าและจับกุมอาชญากรที่ทั่วโลกต่างต้องการตัว แต่เมื่อปฏิบัติการปล้นสุดระทึกทำให้นักวิเคราะห์พฤติกรรมอาชญากรมือฉมังของ FBI (ดเวย์น จอห์นสัน) ต้องโคจรมาพบกับสองมหาโจรที่เป็นคู่แค้นกัน (กัล กาโดท และ ไรอัน เรย์โนลด์ส) ก็รับรองได้ว่าจะต้องระห่ำแบบเหนือทุกความคาดหมาย'),
(15, 'Fast And Furious 7', 1, 2015, 140, 'https://images5.alphacoders.com/792/thumb-1920-792684.jpg', 'Skpu5HaVkOc', 'Skpu5HaVkOc', 0, 'เรื่องราวในภาคนี้เป็นช่วงเหตุการณ์หลังจากการได้รับอภัยโทษของบรรดาลูกทีมของดอม (วิน ดีเซล) และไบรอัน (พอล วอล์คเกอร์) ให้เดินทางกลับไปยังอเมริกาได้ แต่ละคนก็ได้กลับมาใช้ชีวิตแบบถูกกฎหมายเหมือนเดิม ชีวิตของแต่ละคนก็มีเส้นทางที่แตกต่างกัน'),
(16, 'The Boss Baby 2', 3, 2021, 107, 'https://image.tmdb.org/t/p/original/9W1B1TNc5yegSVstXqgITm7U5DJ.jpg', 'EWizz52lZvw', 'EWizz52lZvw', 0, 'ทิมแต่งงานและเป็นคุณพ่อที่อยู่กับบ้าน เท็ดเป็นซีอีโอเฮดจ์ฟันด์ แต่บอสเบบี้คนใหม่ที่มีวิธีการเฉียบคมและทัศนคติที่ดีกำลังจะนำพวกเขากลับมาอยู่ด้วยกันและสร้างแรงบันดาลใจสำหรับธุรกิจครอบครัว ทิมและภรรยา แครอล (เอวา ลองโกเรีย) ผู้หาเลี้ยงครอบครัว อาศัยอยู่ในย่านชานเมือง'),
(17, 'ด่วนนรก ซอมบี้คลั่ง', 4, 2016, 117, 'https://images.alphacoders.com/939/thumb-1920-939710.jpg', 'pyWuHv2-Abk', 'pyWuHv2-Abk', 0, 'ซอกวู เป็นผู้จัดการกองทุนที่มุ่งกอบโกยผลประโยชน์ส่วนตนเป็นสำคัญ และไม่มีเวลาให้ครอบครัว เขาอาศัยอยู่ในโซลกับลูกสาวชื่อซอซูอัน และคุณย่า ในวันเกิดของซูอัน เธอขอร้องให้ซอกวูพาไปหาแม่ที่เมืองปูซาน ซึ่งเป็นเวลาเดียวกันกับที่เชื้อโรคประหลาดได้แพร่ไปทั่วเมือง'),
(18, 'Friend Zone ระวัง..สิ้นสุดทางเพื่อน', 2, 2019, 119, 'https://cms.dmpcdn.com/movie/2020/08/06/e7f01db0-d79a-11ea-b0f5-6174f9a22306_original.png', '4S81gZQ68LE', '4S81gZQ68LE', 0, 'บนโลกใบนี้ คงมีชายหญิงอีกหลายคู่ที่กำลังไต่อยู่บนตะเข็บชายแดนแห่งความสัมพันธ์ของความเป็น “เพื่อน” กับ “แฟน” ซึ่งพื้นที่เล็กๆ ริมชายแดนตรงนี้มีชื่อเรียกแบบสากลว่า Friend Zone หรือเขตแดนพิเศษของคนที่อยู่ในสภาพ...กลับตัวไปเป็นเพื่อนก็ไม่ได้ ให้ไปเป็นแฟนก็ไปไม่ถึง... อ่านต่อที่ : https://d.dailynews.co.th/article/689515/'),
(19, 'โปเกมอน ยอดนักสืบพิคาชู', 3, 2019, 104, 'https://images3.alphacoders.com/100/thumb-1920-1009976.jpg', '1roy4o4tqQM', '1roy4o4tqQM', 0, 'เรื่องราวการผจญภัยครั้งนี้ เริ่มต้นเมื่อนักสืบมือฉมัง แฮร์รี่ กู้ดแมน (พอล คิทสัน) หายตัวไปอย่างลึกลับ เป็นเหตุให้ ทิม กู้ดแมน (จัสดิซ สมิธ) ลูกชายวัย 21 ปีของเขาต้องตามหาคำตอบให้ได้ว่าเกิดอะไรขึ้น ด้วยการผนึกกำลังกับอดีตโปเกม่อนคู่ซี้ของพ่อ “พิคาชู” โปเกม่อนยอดนักสืบฝีมือฉกาจ');

-- --------------------------------------------------------

--
-- Table structure for table `data_playlist`
--

CREATE TABLE `data_playlist` (
  `idplaylist` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_movie` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_playlist`
--

INSERT INTO `data_playlist` (`idplaylist`, `id_user`, `id_movie`) VALUES
(1, 2, 6),
(2, 2, 10),
(4, 4, 3),
(5, 7, 2),
(6, 8, 10),
(7, 1, 2),
(9, 23, 12);

-- --------------------------------------------------------

--
-- Table structure for table `nameandtype`
--

CREATE TABLE `nameandtype` (
  `id_movie` int(3) NOT NULL,
  `id_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nameandtype`
--

INSERT INTO `nameandtype` (`id_movie`, `id_type`) VALUES
(1, 1),
(1, 3),
(2, 3),
(2, 7),
(3, 1),
(3, 2),
(3, 6),
(4, 1),
(4, 8),
(5, 8),
(6, 1),
(6, 2),
(6, 7),
(7, 2),
(7, 6),
(8, 2),
(8, 6),
(9, 1),
(9, 7),
(10, 3),
(10, 6),
(10, 9),
(11, 3),
(11, 5),
(12, 1),
(12, 4),
(13, 9),
(14, 1),
(14, 2),
(15, 1),
(16, 2),
(17, 1),
(17, 5),
(18, 6),
(19, 4),
(19, 8);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(5) NOT NULL,
  `name_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `name_type`) VALUES
(1, 'แอ็คชั่น'),
(2, 'คอมเมดี้'),
(3, 'ดราม่า'),
(4, 'แฟนตาซี'),
(5, 'สยองขวัญ'),
(6, 'โรแมนซ์'),
(7, 'อาชญากรรม'),
(8, 'ไซไฟ'),
(9, 'กีฬา');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userlevel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `userlevel`) VALUES
(1, 'Ryan', 'Ryan@gmail.com', '1234', 'm'),
(2, 'Cat', 'Cat@gmail.com', '1234', 'a'),
(3, 'admin', 'admin@gmail.com', '1234', 'a'),
(4, 'john', 'john@gmail.com', '1234', 'm'),
(5, 'Marhez', 'marhez@gmail.com', '1234', 'm'),
(6, 'Foden', 'foden@gmail.com', '1234', 'm'),
(7, 'Kevin', 'kevin@gmail.com', '1234', 'm'),
(8, 'Rashford', 'rashford@gmail.com', '1234', 'm'),
(9, 'David', 'david@gmail.com', '1234', 'm'),
(10, 'Fred', 'fred@gmail.com', '1234', 'm'),
(11, 'Sancho', 'sancho@gmail.com', '1234', 'm'),
(12, 'greenwood', 'greenwood@gmail.com', '1234', 'm'),
(13, 'Bruno', 'bruno@gmail.com', '1234', 'm'),
(14, 'Scott', 'scott@gmail.com', '1234', 'm'),
(15, 'Pogba', 'pogba@gmail.com', '1234', 'm'),
(16, 'Varane', 'varane@gmail.com', '1234', 'm'),
(17, 'Telles', 'telles@gmail.com', '1234', 'm'),
(18, 'WanBissaka', 'wanbissaka@gmail.com', '1234', 'm'),
(19, 'Sterling', 'sterling@gmail.com', '1234', 'm'),
(20, 'BBB', 'aaa@gmail.com', '1234', 'm'),
(21, 'eiei', 'eiei@gmail.com', '1234', 'm'),
(22, 'eiei1', 'eiei1@gmail.com', '1234', 'm'),
(23, 'Milner', 'milner@gmail.com', '1234', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `data_likes`
--
ALTER TABLE `data_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test8` (`id_movie`),
  ADD KEY `test9` (`id_user`);

--
-- Indexes for table `data_movie`
--
ALTER TABLE `data_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test4` (`id_categorym`);

--
-- Indexes for table `data_playlist`
--
ALTER TABLE `data_playlist`
  ADD PRIMARY KEY (`idplaylist`),
  ADD KEY `test10` (`id_movie`),
  ADD KEY `test11` (`id_user`);

--
-- Indexes for table `nameandtype`
--
ALTER TABLE `nameandtype`
  ADD PRIMARY KEY (`id_movie`,`id_type`),
  ADD KEY `test7` (`id_type`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_likes`
--
ALTER TABLE `data_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_movie`
--
ALTER TABLE `data_movie`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `data_playlist`
--
ALTER TABLE `data_playlist`
  MODIFY `idplaylist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_likes`
--
ALTER TABLE `data_likes`
  ADD CONSTRAINT `test8` FOREIGN KEY (`id_movie`) REFERENCES `data_movie` (`id`),
  ADD CONSTRAINT `test9` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `data_movie`
--
ALTER TABLE `data_movie`
  ADD CONSTRAINT `test4` FOREIGN KEY (`id_categorym`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `data_playlist`
--
ALTER TABLE `data_playlist`
  ADD CONSTRAINT `test10` FOREIGN KEY (`id_movie`) REFERENCES `data_movie` (`id`),
  ADD CONSTRAINT `test11` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `nameandtype`
--
ALTER TABLE `nameandtype`
  ADD CONSTRAINT `test6` FOREIGN KEY (`id_movie`) REFERENCES `data_movie` (`id`),
  ADD CONSTRAINT `test7` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
