-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2012 a las 15:53:03
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `comics`
--
CREATE DATABASE `comics` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `comics`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(3, 'Europeo'),
(2, 'Dc'),
(1, 'Americano'),
(4, 'Manga'),
(5, 'Marvel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pedido`
--

CREATE TABLE IF NOT EXISTS `estados_pedido` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `estados_pedido`
--

INSERT INTO `estados_pedido` (`id_estado`, `estado`) VALUES
(1, 'En tramitacion'),
(2, 'Enviado'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text,
  KEY `id` (`id`),
  KEY `fecha` (`fecha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `link`, `fecha`, `descripcion`) VALUES
(1, 'The Sandman worlds'' end', 'http://www.thorcomic.com/europeo.php', '2012-01-15', 'Ya ha salido la magnifica reedicion: The Sandman worlds'' end'),
(2, 'Civil war Completa', 'http://www.thorcomics/marvel.php', '2012-01-16', 'Todos los numero de Civil war disponibles en el dia del vikingo'),
(3, 'Nuevos numeros de "La espada del inmortal"', 'http://www.thorcomics/manga.php', '2012-01-17', 'Numeros 26 y 27 de la espada del inmortal ya disponibles'),
(4, 'Dia del vikingo', 'http://www.thorcomics.com', '2012-01-18', 'Hoy por ser dia del vikingo gastos de envio gratiz.'),
(5, 'Nueva tienda', 'http://www.thorcomics.com', '2012-01-19', 'Apertura de la nueva tienda ''endicion limitada'' en sevilla, en la calle alfajor.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`fecha_pedido`,`id_usuario`,`id_producto`),
  KEY `FKproducto` (`id_producto`),
  KEY `FKestado` (`id_estado`),
  KEY `FKusuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_usuario`, `id_producto`, `fecha_pedido`, `cantidad`, `precio`, `id_estado`) VALUES
(21, 5, '2012-01-17', 1, 11.5, 1),
(21, 4, '2012-01-17', 1, 7.85, 1),
(21, 2, '2012-01-17', 3, 2.75, 1),
(1, 2, '2012-01-17', 2, 2.75, 1),
(1, 4, '2012-01-17', 1, 7.85, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FKcategoria` (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `autor`, `editorial`, `id_categoria`, `stock`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'The sandman worlds'' end', 'Neil Gaiman', 'Norma', 3, 50, 11, '1.jpg', 'El tomo entero consta de varios relatos enmarcados, contados por los huespedes de la Casa Libre El Fin de los Mundos, una posada interdimensional que segun su empleada principal "es una casa publica. No pertenece a ningun reino o imperio.1 " Los huespedes se encuentran varados por una tormenta de realidad en medio de un viaje, representada como una tormenta inusual en el lugar y el tiempo en que se encontrara el viajero. La historia comienza con dos viajeros, Brant Tucker y Charlene Money, quienes viajan en auto por una ruta en los Estados Unidos, y se ven atrapados por una tormenta de nieve que los hace tener un accidente. Llevando a Charlene herida, Brant llega a la posada, donde ella es atendida por el centauro Quiron.'),
(2, 'Civil war 1', 'Mark Millar y Steve McNiven', 'Marvel', 5, 20, 2.75, '2.jpg', 'La historia gira alrededor de un desastre, una explosion en la cual fallecen mas de 600 personas en Stamford, Connecticut, provocada por Nitro, cuando mantenia una pelea con Namorita afueras de una escuela, mientras un camarografo filma la batalla; el villano utiliza su superpoder para generar una explosion que destruye casi toda la ciudad. Como respuesta, el Gobierno de los Estados Unidos promulga la "Ley de Registro de Superhumanos" obligando a que todos aquellos que posean superpoderes desvelen su identidad secreta y trabajen para las autoridades. Los superheroes se dividen en dos facciones principales, a favor y en contra del Registro. Iron Man encabeza la postura favorable al registro, con el respaldo del Gobierno y la organizacion S.H.I.E.L.D., mientras que el Capitan America encabeza un movimiento de resistencia clandestino.'),
(3, 'Civil war 2', 'Mark Millar y Steve McNiven', 'Marvel', 5, 30, 2.75, '3.jpg', 'La historia gira alrededor de un desastre, una explosion en la cual fallecen mas de 600 personas en Stamford, Connecticut, provocada por Nitro, cuando mantenia una pelea con Namorita afueras de una escuela, mientras un camarografo filma la batalla; el villano utiliza su superpoder para generar una explosion que destruye casi toda la ciudad. Como respuesta, el Gobierno de los Estados Unidos promulga la "Ley de Registro de Superhumanos" obligando a que todos aquellos que posean superpoderes desvelen su identidad secreta y trabajen para las autoridades. Los superheroes se dividen en dos facciones principales, a favor y en contra del Registro. Iron Man encabeza la postura favorable al registro, con el respaldo del Gobierno y la organizacion S.H.I.E.L.D., mientras que el Capitan America encabeza un movimiento de resistencia clandestino.'),
(5, 'Lobezno Arma X', 'Barry Windsor Smith', 'Panini', 5, 40, 11.5, '5.jpg', 'La historia gira alrededor de un desastre, una explosion en la cual fallecen mas de 600 personas en Stamford, Connecticut, provocada por Nitro, cuando mantenia una pelea con Namorita afueras de una escuela, mientras un camarografo filma la batalla; el villano utiliza su superpoder para generar una explosion que destruye casi toda la ciudad. Como respuesta, el Gobierno de los Estados Unidos promulga la "Ley de Registro de Superhumanos" obligando a que todos aquellos que posean superpoderes desvelen su identidad secreta y trabajen para las autoridades. Los superheroes se dividen en dos facciones principales, a favor y en contra del Registro. Iron Man encabeza la postura favorable al registro, con el respaldo del Gobierno y la organizacion S.H.I.E.L.D., mientras que el Capitan America encabeza un movimiento de resistencia clandestino.'),
(4, 'Lobezno: Logan', 'Vaughan y Risso', 'Panini', 5, 10, 7.85, '4.jpg', 'Contiene logan 1-3 usa. El guionista Brian K. Vaughan (Perdidos, Runaways, Y El ultimo hombre) se une a la estrella de lapiz . Eduardo Risso (100 balas) para lanzar una mirada unica al hombre que es el mejor en lo que hace. Tras recuperar los recuerdos de su pasado perdidos durante muchos anos, Lobezno vuelve a Hiroshima, uno de sus primeros campos de batalla, donde luchara contra sus peores fantasmas. La revelacion llega para Logan en una novela grafica imprescindible que pronto figurara entre sus mas memorables historias. Guion de Brian K. Vaughan Dibujo de Eduardo Risso \r\n'),
(6, 'Tintin en el pais del oro negro', 'Herge', 'Editorial Juvenil', 3, 100, 5.5, '6.jpg', 'Esta aventura de Tintin trata de la lucha entre las grandes companias petroliferas. Todo empieza cuando la gasolina adulterada invade el mercado. Tintin viaja al pais de Khemed, donde una lucha de poderes enfrenta al Emir Ben Kalish Ezab contra Bab El Ehr, cada uno financiado por una compania de petroleo diferente. Entra en escena el terrible Abdalah, el hijo del emir. Herge se inspiro en una fotografia del verdadero rey Faisal II de cuando era nino. Este album ha pasado por numerosas versiones antes de conocer su forma definitiva. Empezo a aparecer el 25 de septiembre de 1939 en Le Petit Vingtieme, a continuacion de El cetro de Ottokar, pero estallo la guerra. El 9 de mayo de 1940, las fuerzas alemanas entran el Bruselas y se interrumpe la publicacion de Le Petit Vingtieme, y con el, Tintin en el pais del Oro Negro. La historia, se para en la actual pagina 26 del album, y no sera continuada hasta 6 anos mas tarde en la revista Tintin.'),
(8, 'Tintin y el centro de Ottokar', 'Herge', 'Editorial Juvenil', 3, 100, 5.5, '8.jpg', 'Cuando Tintin recoge una cartera olvidada en un banco no puede imaginarse que ello le va a llevar al pais de Syldavia, situado en el centro de los Balcanes. Alli se entera de que hay una conspiracion para robar el cetro del rey, Muskar XII, sin el cual este no puede seguir reinando. Y su pais vecino, Borduria, tiene claras intenciones de invasion. \r\nLa trama esta claramente influida por la epoca. La historia se publico en Le Petit Vingtieme del 4 de agosto de 1938 al 10 de agosto del ano siguiente. Los signos que anunciaban la Segunda Guerra Mundial eran numerosos y la Alemania de Hitler preparaba la invasion de Austria, que quedo anexionada convirtiendose en una provincia mas del tercer Reich. \r\nVemos en El cetro de Ottokar como Borduria intenta anexionarse al pais de Syldavia, con la ayuda de un tal Musstler, (cuyo nombre es una composicion de Hitler y Mussolini). Los bordurios pueden identificarse con los nazis en muchisimos aspectos: los nombres, los uniformes, los aviones y por su tactica de infiltracion en Syldavia. \r\nEn el ano 1947 el album fue redisenado a color.'),
(7, 'Tintin y los picaros', 'Herge', 'Editorial Juvenil', 3, 100, 5.5, '7.jpg', 'Los seguidores de las aventuras de Tintin tuvieron que esperar ocho anos despues de Vuelo 714 para Sydney, para poder leer Tintin y los Picaros, que comenzo a aparecer en el ano 1976. Herge ahora solo trabajaba por placer, y no tenia ninguna prisa. La idea tardo en tomar forma. Tenia claro el entorno: America del Sur. Para la historia se inspiro un poco en el asunto de Regis Debre y los Tupamaros. Pero estos sucesos no son mas que el cuadro de la aventura. Volvemos a ir a la imaginaria republica de San Teodoros, (ver La oreja rota), donde dos generales aspirantes a dictador se hacen una guerra continua para alcanzar el poder. Reencontramos al inefable general Alcazar (ver La oreja rota, Las siete bolas de cristal), al coronel Sponsz (El asunto Tornasol), ahora bajo el nombre de Esponja, que ha sido enviado por Borduria para respaldar al general Tapioca, y al explorador Ridgewell (ver La oreja rota).  Serafin Laton tambien anda por ahi con su apabullante personalidad, presidiendo al grupo de los alegres Turulones, y tambien  encontramos a la encantadora esposa de Tapioca: la terrible Peggy. \r\nLlama la atencion en este album el que Tintin va con tejanos, conduce una moto llevando un casco con el signo de la paz y hace yoga.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(20) NOT NULL,
  `cp` int(5) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `contrasena`, `dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `cp`) VALUES
(20, 'nelsondearcos@gmail.com', 'ascension', '30245817', 'Andrea', 'Cimmino arriaga', 'Ifni n10', 954610124, 41012),
(1, 'banse27@gmail.com', 'ascension', '30245817', 'Andrea', 'Cimmino arriaga', 'Ifni n10', 954610124, 41012);
