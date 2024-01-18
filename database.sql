-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2024, 13:05:27
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ürünler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `features` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `features`) VALUES
(1, 'Vip', 90.00, '- chatte size özel VİP etiketi\n- Kozmetiklere erişim\n- haftalık ve günlük ödül\n- 1 Ay geçerli'),
(2, 'Vip+', 170.00, '- chatte size özel VİP+ etiketi\n- Lobide uçuş izni\n- Kozmetiklere erişim\n- Kişiye Özel Pelerin\n- haftalık ve günlük ödül\n- 1 Ay geçerli'),
(3, 'Elite Vip', 260.00, '- chatte size özel Elite Vip etiketi\n- Lobide uçuş izni\n- Kozmetiklere erişim\n- Kişiye Özel Pelerin\n- haftalık ve günlük ödül\n- Lobi Eşyaları\n- 1 Ay geçerli'),
(4, 'Ultra Vip', 350.00, '- chatte size özel Ultra Vip etiketi\n- Lobide uçuş izni\n- Kozmetiklere erişim\n- Kişiye Özel Pelerin\n- haftalık ve günlük ödül\n- istediğiniz 3 kişinin koordinatını görme\n- Lobi Eşyaları\n- 3 Ay geçerli');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
