-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2018 a las 12:09:42
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendasocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `quantity`, `price`, `stock`, `date_add`, `date_update`, `category`) VALUES
(1, 'Lechugas', 'verdes', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 1.99, 12, '2018-12-02', '0000-00-00', 'verduras'),
(54, 'Malacatones', 'oiasdij', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 0.98, 299, '2018-12-02', '0000-00-00', 'fruta'),
(55, 'Fresas', 'Amarillas', '', 0, 1.12, 300, '2018-12-02', '0000-00-00', 'pescado'),
(56, 'Judias', 'Verdes', '', 0, 0.89, 500, '2018-12-02', '0000-00-00', 'pasta'),
(57, 'Spaghety', 'de arroz', 'http://localhost/curso-php/tiendasocial/view/image/productos/tester cookies.png', 0, 0.99, 1231, '2018-12-03', '0000-00-00', 'Pasta'),
(58, 'Maquinas de afeitar', 'Gillete', 'http://localhost/curso-php/tiendasocial/view/image/productos/hora de aventuras face.png', 0, 2.99, 14, '2018-12-03', '0000-00-00', 'Pasta'),
(59, 'asff', 'asdf', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 123, 123, '2018-12-05', '0000-00-00', 'pasta'),
(60, 'parapa', 'ajshd', 'http://localhost/curso-php/tiendasocial/view/image/productos/tester cookies.png', 0, 1313, 12, '2018-12-08', '0000-00-00', 'pescado'),
(61, 'asado', 'asff', 'http://localhost/curso-php/tiendasocial/view/image/productos/meow.png', 0, 213, 1231, '2018-12-08', '0000-00-00', 'Verduras'),
(67, 'Aguacate', 'Lorem ipsum lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum  lorem ipsum ', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 0.66, 15, '2018-12-09', '0000-00-00', 'Verduras'),
(69, 'manzanas verdes', 'manzanas verdes del sureste', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 1, 121, '2018-12-20', '0000-00-00', 'Verduras'),
(70, 'manzanas rojas y verdes', 'manzanas de dos colores', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 1, 123, '2018-12-20', '0000-00-00', 'fruta'),
(71, 'manzanas rojas', 'manzanas rojas de alta calisas', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 1, 123, '2018-12-20', '0000-00-00', 'fruta'),
(72, 'tarta de manzana', 'tarta de manzana sin fluten', 'http://localhost/curso-php/tiendasocial/view/image/productos/noimage.png', 0, 1.5, 12, '2018-12-20', '0000-00-00', 'Pasta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIS`
--

CREATE TABLE `USUARIS` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `place` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dateadd` date NOT NULL,
  `datebirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIS`
--

INSERT INTO `USUARIS` (`iduser`, `username`, `firstname`, `lastname`, `email`, `password`, `place`, `gender`, `dateadd`, `datebirth`) VALUES
(1, 'lleno', 'Enric', 'Vallribera Garcia', 'henryfull@gmail.com', '1234', 'Ripollet', 'hombre', '2018-11-06', '1981-10-21'),
(2, 'Maria', 'Maria', 'paca', 'asarae@iohsd.com', '1234', 'Barcelona', 'mujer', '2018-11-06', '1980-08-20'),
(3, 'paca', 'paca', 'oiajd', 'oaidh@oiasjdd.com', '1234', 'eipor', 'hombre', '2018-11-06', '1981-10-21'),
(4, 'llenopepo', 'Lleno', 'pepo', 'sijd@fij.dom', '1234', 'Eded', 'hombre', '2018-11-06', '0001-01-01'),
(5, 'manala', 'oaihd', 'oaishd', 'oaid@oiajd.com', '1234', 'soidj', 'hombre', '2018-11-24', '1212-12-12'),
(6, 'manala', 'oaihd', 'oaishd', 'oaid@oiajd.com', 'zfdsd', 'soidj', 'mujer', '2018-11-24', '1212-12-12'),
(7, 'caracas', 'aodh', 'asodh', 'oaihd@oiajd.com', 'aohud', 'isjd', 'hombre', '2018-11-24', '1212-12-12'),
(8, 'caracas', 'aodh', 'asodh', 'oaihd@oiajd.com', '', 'isjd', 'hombre', '2018-11-24', '1212-12-12'),
(9, 'ashdil', 'lglgy', 'lgyug', 'iugoyg@iuh.com', '', 'phpu', 'hombre', '2018-11-24', '1111-11-11'),
(10, 'sadashdil', 'lglgy', 'lgyug', 'iugoyg@iuh.com', 'asdas', 'phpu', 'hombre', '2018-11-24', '1111-11-11'),
(11, 'admin', 'admin', 'administrador', 'enricvallribera@gmail.com', '4321', 'Ripollet', 'hombre', '2018-12-09', '1981-10-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `USUARIS`
--
ALTER TABLE `USUARIS`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `USUARIS`
--
ALTER TABLE `USUARIS`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
