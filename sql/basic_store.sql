-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 21, 2024 at 07:25 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Zapatillas de mujer'),
(2, 'Zapatillas de hombre'),
(3, 'Zapatillas de niños');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `cart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `cart`) VALUES
(2, 'antonio@outbook.es', '$2y$10$EL18ODhAPhfWMaAID0SJ0.hxadOQMyC4dl2//SNVb4luh8eQ2SxNe', '{}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` text,
  `description` text,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Zapatillas de montaña de hombre Softshell II Mountain PRO', 'Zapatillas outdoor para hombre con forro y plantilla textil, tejido superior softshell y sujeción de PU. Presenta puntera reforzada, mediasuela de EVA que aporta amortiguación, estabilizador intermedio. Con tejido softshell waterproof para mayor protección del pie.\r\nReferencia: 001035420700367', 50, '00135420700367____1__1200x1200.webp', 2),
(2, 'Zapatillas de mujer Hedgehog Futurelight™ The North Face', 'Las zapatillas FUTURELIGHT™ Hedgehog están diseñadas para ofrecer versatilidad y confort, gracias a las plantillas acolchadas Ortholite® y a la tecnología transpirable e impermeable.\r\n\r\nMalla resistente a la abrasión. Membrana impermeable y transpirable FUTURELIGHT™. Revestimiento soldado de alta frecuencia en la parte navicular. Detalles de metal inoxidable. Plantilla OrthoLite® X35™ Hybrid™, fabricada con un 5 % de goma reciclada. CRADLE™ tecnología para la estabilidad del talón. Placa ESS en la parte media del pie. Suela exterior Vibram® XS Trek.', 135, 'www-0194902434435-01.jpg', 1),
(3, 'Zapatillas de hombre VECTIV FASTPACK FUTURELIGHT The North Face', 'Las zapatillas de senderismo FUTURELIGHT™ Fastpack VECTIV™ son ligeras, resistentes e impermeables para ofrecer protección y confort en la ruta durante todo el día.\r\n\r\nEMPEINE: tejido de malla resistente al desgaste por abrasión. Membrana impermeable y transpirable FUTURELIGHT™. Hilera de ojales de doble perforado para un atado preciso. Cuello en tejido moldeado de Lycra®. Puntera de TPU moldeada de protección y pala sin costuras. Lengüeta reforzada. Plantilla OrthoLite® X55™, fabricada con un 5 % de goma reciclada. UNIDAD DE LA SUELA: tecnología VECTIV™ diseñada para potenciar la energía a cada paso de la ruta. Placa tridimensional de densidad única fabricada de TPU que aporta más estabilidad en cualquier dirección que se mueva el pie. Geometría de media suela rocker diseñada para una propulsión duradera. Media suela de densidad única en EVA de alto rebote. Suela de goma SurfaceCTRL™ optimizada para trail running. Tacos de 4 mm para un agarre superior.', 145, 'www-0196247648386-04.jpg', 2),
(4, 'Zapatillas de montaña de niños Titan Low Mountain PRO', 'Transpirabilidad. Impermeabilidad. Resistencia. Función cortavientos.\r\n\r\nZapatillas de montaña para niños, confortables y resistentes, perfectas para las jornadas de outdoor y sus actividades diarias al arire libre. Parte superior de PU y malla, interior textil y suela sintética TPR + Phylon. Membrana waterproof para mantenerte seco y cómodo durante tus jornadas de outdoor.\r\n\r\nCalzado compuesto por una membrana de 3 capas. Su impermeabilidad y transpirabilidad lo convierte en la elección perfecta para la práctica de múltiples actividades bajo cualquier climatología.\r\nReferencia: 001035420900264', 30, '00135420900264____7__1200x1200.avif', 3),
(5, 'Zapatillas de montaña de mujer Tigor 2 W +8000', 'Resaltar su suela, que proporciona una gran amortiguacion y mayor traccion en terrenos montañosos. Su corte combina un nylon con termo sellados que dota a esta de una mayor ligereza.Nuestro pie estará protegido en el empeine por la lengueta tipo \"fuelle\". Además, cada pieza va recubierta interiormente por la película SKINTEX, que nos proporciona una protección ligera frente al agua además de restar peso a la zapatilla.\r\n\r\nTermosellado en corte para evitar costuras y favorecer ligereza. Montado \"Strobel\" que favorece la ligereza, flexibilidad\r\n\r\nPlantilla termoformada de Eva de alta densidad.\r\n\r\nTermo sellado para una mayor protección\r\nReferencia: 001065413203384', 78, '00165413203384____4__1200x1200.avif', 1),
(6, 'Zapatillas de hombre VECTIV EXPLORIS 2 FUTURELIGHT The North Face', 'Estas zapatillas de senderismo, con tecnología de placa propulsora de VECTIV™ 2.0 y membrana impermeable y transpirable FUTURELIGHT™, están hechas para la montaña.\r\n\r\nEMPEINE: membrana impermeable y transpirable FUTURELIGHT™. Fabricadas en una horma actualizada de ancho D que se adapta a una amplia variedad de contornos de pie. UNIDAD DE LA SUELA: Entresuela con rocker VECTIV™ 2.0, con un diseño bifurcado en el talón y la parte delantera y placa de TPU para brindar más estabilidad y desplazamiento lateral. Geometría de media suela rocker diseñada para una propulsión duradera. La entresuela está fabricada con espuma EVA de calidad suprema y es 2 mm más ancha que la versión de la temporada verano 2021/otoño 2021. Plataforma más ancha bajo el pie para brindar una estabilidad inherente. Suela exterior de goma Surface CTRL™ con tacos prominentes de 4 mm para brindar más resistencia en zonas más expuestas al desgaste.', 78, 'www-0196247622270-01.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id_product` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
