-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 May 2019, 13:51:09
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurumsal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `content`, `image`) VALUES
(1, 'What is computer graphics society?', 'Computer graphics are pictures and films created using computers. Usually, the term refers to computer-generated image data created with the help of specialized graphical hardware and software. It is a vast and recently developed area of computer science', 'img/hakkimizda/about-us.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminpanel`
--

CREATE TABLE `adminpanel` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adminpanel`
--

INSERT INTO `adminpanel` (`id`, `kullaniciadi`, `sifre`, `aktif`) VALUES
(1, 'Alper', '26b245dcf94bb37fbb7abb7dbeb64615', 0),
(14, 'Mustafacan', 'c6d04a90628eaed1c138942d4d589d32', 0),
(15, 'Mehmet Cengiz', 'c4d392f0741181046d4648d53a84d13d', 0),
(16, 'Merve', 'dcc3e41b9f4021e838d29d4146e80e73', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`id`, `content`, `name`) VALUES
(1, 'Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme Deneme \r\nDeneme Deneme Deneme Deneme Deneme\r\nDeneme Deneme Deneme Deneme Deneme\r\n \r\n', 'Alper Çalışkan'),
(2, 'Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş Boş\r\nBoş Boş Boş Boş Boş Boş Boş Boş Boş Boş\r\nBoş  ', 'User1'),
(3, 'Bilgisayarla ilgilenen ve ilgilenmek isteyenleri aynı çatı altında toplamak, profesyonel bakış açısını ve öğrenci bakış açısını, tecrübe ve isteği bir araya getirmek amacıyla kurulan güzel bir topluluk, umarım daha iyi yerlere gelirler..', 'Alper'),
(4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elitLorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elitadipilas', 'Kullanıcı'),
(5, 'Aydın Adnan Menderes Üniversitesi Mühendislik Fakültesi Merkez Kampüs PK:09010 Aydın - TürkiyeAydın Adnan Menderes Üniversitesi Mühendislik Fakültesi Merkez Kampüs PK:09010 Aydın - Türkiye', 'New User');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `incomingmail`
--

CREATE TABLE `incomingmail` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailaddress` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `time` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `incomingmail`
--

INSERT INTO `incomingmail` (`id`, `name`, `mailaddress`, `subject`, `content`, `time`, `status`) VALUES
(5, 'Alper Çalışkan', 'alpercaliskan96@gmail.com', 'Deneme', 'Test Test Test Test Test ', '17.04.2019/00:24', 2),
(8, 'TEST', 'test@gmail.com', 'Deneme', 'sadsadasda', '20.04.2019/01:30', 1),
(15, 'Alperr', 'alper@gmail.com', 'dsd', 'dsdfsfsgfgdgdgd', '25.04.2019/17:17', 2),
(16, 'Örnek', 'deneme@gmail.com', 'Test', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '27.04.2019/18:40', 1),
(18, 'Deneme1', 'asdsad', 'asdasdsad', 'asdasdasdas', '27.04.2019/18:50', 1),
(19, 'Deneme2', 'sadasdadsa', 'qwkfqwklğfkq', 'aslfkpaodsfpoasdğf', '27.04.2019/18:50', 1),
(20, 'Alper', 'alpercaliskan96@gmail.com', 'MobileTest', 'Deneme', '28.04.2019/23:43', 0),
(21, 'Alper', '151805005@stu.adu.edu.tr', 'Üyelik', 'Üye olmak istiyorum', '12.05.2019/00:44', 1),
(22, 'Merve Yıldırım', 'yldrmmerrve@gmail.com', 'TEST', 'DENEMEDENEMEDENEME', '12.05.2019/21:51', 1),
(23, 'alper', 'alper@gmail.com', 'denemöe', 'testtest', '17.05.2019/13:15', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `incomingmailsetting`
--

CREATE TABLE `incomingmailsetting` (
  `id` int(11) NOT NULL,
  `host` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailaddress` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `port` int(11) NOT NULL,
  `receiverAddress` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `incomingmailsetting`
--

INSERT INTO `incomingmailsetting` (`id`, `host`, `mailaddress`, `password`, `port`, `receiverAddress`) VALUES
(1, 'aasd', 'ahmet@gmail.com', '12345', 8080, 'alpercaliskan96@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `imageadr` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `intro`
--

INSERT INTO `intro` (`id`, `imageadr`) VALUES
(8, 'img/intro/1.jpg'),
(9, 'img/intro/3.jpg'),
(10, 'img/intro/4.jpg'),
(11, 'img/intro/aaa.jpg'),
(12, 'img/intro/6.jpg'),
(13, 'img/intro/nasa-53884-unsplash.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `url` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `notice`
--

INSERT INTO `notice` (`id`, `content`, `image`, `title`, `url`) VALUES
(1, '8-9-10 Mart 2019 tarihinde Hacettepe Üniversitesi Beytepe Yerleşkesi’nde gerçekleşecek olan CSCON’ 19 uluslararası düzeyde bir etkinlik olacak şekilde, ilk günü konferans, ikinci ve üçüncü günleri teknik eğitimlerle devam etmesi planlanmıştır. Etkinliğe yabancı konuşmacılar davet edilecektir.\r\n\r\n', 'img/notice1.jpg', 'CSCON\' 19', 'http://cscon.ieeeturkeycs.org/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ourworks`
--

CREATE TABLE `ourworks` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ourworks`
--

INSERT INTO `ourworks` (`id`, `title`, `content`) VALUES
(1, 'Programming', 'Programming is the process of taking an algorithm and encoding it into a notation, a programming language, so that it can be executed by a computer. Although many programming languages and many different types of computers exist, the important first step is the need to have the solution. Without an algorithm there can be no program.'),
(2, 'Mobile Dev', 'Mobile application development is the set of processes and procedures involved in writing software for small, wireless computing devices such as smartphones or tablets.'),
(3, 'Robotic', 'Robot software is the set of coded commands or instructions that tell a mechanical device and electronic system, known together as a robot, what tasks to perform. Robot software is used to perform autonomous tasks. Many software systems and frameworks have been proposed to make programming robots easier.'),
(4, 'For graduation', 'To be a step ahead in recruitment after graduation; you will be working with experts in the business with the different programming languages and software.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referanslar`
--

CREATE TABLE `referanslar` (
  `id` int(11) NOT NULL,
  `image` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referanslar`
--

INSERT INTO `referanslar` (`id`, `image`) VALUES
(9, 'img/referanslar/ref1.jpg'),
(10, 'img/referanslar/ref2.jpg'),
(11, 'img/referanslar/ref3.png'),
(12, 'img/referanslar/ref4.png'),
(13, 'img/referanslar/ref5.jpg'),
(14, 'img/referanslar/ref6.png'),
(15, 'img/referanslar/ref7.png'),
(16, 'img/referanslar/ref8.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metatitle` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metadesc` text COLLATE utf8_turkish_ci NOT NULL,
  `metakey` text COLLATE utf8_turkish_ci NOT NULL,
  `metaauthor` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `metaowner` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `metacopy` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `logoyazisi` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `linkedin` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `telefonno` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `slogan` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `referanscontent` text COLLATE utf8_turkish_ci NOT NULL,
  `notice` text COLLATE utf8_turkish_ci NOT NULL,
  `comment` text COLLATE utf8_turkish_ci NOT NULL,
  `contact` text COLLATE utf8_turkish_ci NOT NULL,
  `worktitle` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesajtercih` int(11) NOT NULL DEFAULT '1',
  `haritabilgi` text COLLATE utf8_turkish_ci NOT NULL,
  `footer` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `title`, `metatitle`, `metadesc`, `metakey`, `metaauthor`, `metaowner`, `metacopy`, `logoyazisi`, `facebook`, `twitter`, `instagram`, `linkedin`, `telefonno`, `adres`, `mail`, `slogan`, `referanscontent`, `notice`, `comment`, `contact`, `worktitle`, `mesajtercih`, `haritabilgi`, `footer`) VALUES
(1, 'ADU Computer Vision Graphics Society', 'ADU Computer Vision Graphics Society', 'Computer graphics are pictures and films created using computers. Usually, the term refers to computer-generated image data created with the help of specialized graphical hardware and software. It is a vast and recently developed area of computer science', 'Computer graphics are graphs created using the representation of image data by a computer with the help of computers and special graphics hardware and software', 'Computer Graphics Society ADMIN', 'Computer Graphics Society ADMIN', '2019', 'Computer Vision Graphics ', 'https://www.facebook.com/aduengineeringfaculty/', 'https://twitter.com/engineering_adu', 'https://www.instagram.com/adu_engineeringfaculty/', 'https://www.linkedin.com/school/adnan-menderes-university', '+90 (256) 213 75 03', 'Aydın Adnan Menderes ÜniversitesiMühendislik FakültesiMerkez Kampüs PK:09010 Aydın - Türkiye', 'muhendislikogr@adu.edu.tr', 'ADU &lt;br&gt; Computer Vision Graphics ', 'Our sponsors / references with support in the development of our community', 'Yakın zamanda gerçekleşecek etkinlikler', 'Some reviews about our community', 'We are one click away  for everything you want to ask', 'What do we purpose to do as a community?', 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d943.3275604980862!2d27.856075706088415!3d37.857110589080825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b92b0a96db22e5%3A0x6b93bfd7c815ef25!2sAD%C3%9C+Ayd%C4%B1n+Menderes+Deslikleri!5e0!3m2!1str!2str!4v1551259943576', '2019 © Copyright ADU');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasarim`
--

CREATE TABLE `tasarim` (
  `id` int(11) NOT NULL,
  `ourworkster` int(11) NOT NULL DEFAULT '0',
  `referanslarter` int(11) NOT NULL DEFAULT '0',
  `commentter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tasarim`
--

INSERT INTO `tasarim` (`id`, `ourworkster`, `referanslarter`, `commentter`) VALUES
(1, 0, 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `incomingmail`
--
ALTER TABLE `incomingmail`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `incomingmailsetting`
--
ALTER TABLE `incomingmailsetting`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ourworks`
--
ALTER TABLE `ourworks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referanslar`
--
ALTER TABLE `referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tasarim`
--
ALTER TABLE `tasarim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `adminpanel`
--
ALTER TABLE `adminpanel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `incomingmail`
--
ALTER TABLE `incomingmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `incomingmailsetting`
--
ALTER TABLE `incomingmailsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ourworks`
--
ALTER TABLE `ourworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `referanslar`
--
ALTER TABLE `referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `tasarim`
--
ALTER TABLE `tasarim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
