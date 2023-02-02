-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Oca 2023, 12:35:53
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otopark_otomasyonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac_kayit`
--

CREATE TABLE `arac_kayit` (
  `arac_id` int(11) NOT NULL,
  `arac_plaka` varchar(30) NOT NULL,
  `arac_kat` varchar(30) NOT NULL,
  `arac_blok` varchar(15) NOT NULL,
  `arac_giris_tarih` datetime DEFAULT current_timestamp(),
  `arac_cikis_tarih` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `arac_kayit`
--

INSERT INTO `arac_kayit` (`arac_id`, `arac_plaka`, `arac_kat`, `arac_blok`, `arac_giris_tarih`, `arac_cikis_tarih`) VALUES
(11, '34 AAY 745', 'Kat 3', 'A Blok', '2022-12-29 10:02:39', '2022-12-29 10:02:39'),
(12, '06 FP 8256', 'Kat 1', 'B Blok', '2022-12-29 15:33:26', '2022-12-29 15:33:26'),
(13, '06 VA 466', 'Kat 1', 'B Blok', '2022-12-29 15:48:53', '2022-12-29 15:48:53'),
(14, '06 NCN 71', 'Kat 1', 'B Blok', '2022-12-29 15:52:02', '2022-12-29 15:52:02'),
(15, '35 YK 871 ', 'Kat 3', 'D Blok', '2022-12-29 16:06:01', '2022-12-29 16:06:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_giris`
--

CREATE TABLE `kullanici_giris` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `sifre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici_giris`
--

INSERT INTO `kullanici_giris` (`id`, `adsoyad`, `mail`, `sifre`) VALUES
(1, 'stolass', 'erkal321@gmail.com', '123');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac_kayit`
--
ALTER TABLE `arac_kayit`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `kullanici_giris`
--
ALTER TABLE `kullanici_giris`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac_kayit`
--
ALTER TABLE `arac_kayit`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_giris`
--
ALTER TABLE `kullanici_giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
