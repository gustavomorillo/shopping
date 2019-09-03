-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2019 a las 07:10:38
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopping`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `lastname`, `address`, `city`, `state`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', '2019-08-24 20:54:19', '2019-08-24 20:54:19'),
(2, 1, 'Gustavo', 'Morillo', 'anzo', 'caracas', 'Miranda', '4241567774', '2019-08-24 21:02:42', '2019-08-24 21:02:42'),
(3, 1, 'Gustavo', 'Morillo', 'zulia', 'caracas', 'Zulia', '4241567774', '2019-08-24 21:09:48', '2019-08-24 21:09:48'),
(4, 1, 'Gustavo Morillo', 'Morillo', 'caracas miranda', 'ccs', 'Nueva Esparta', '4241567774', '2019-08-24 21:15:40', '2019-08-24 21:15:40'),
(5, 3, 'yraxy', 'marin', 'el marques', 'caracas', 'Distrito Capital', '2385489', '2019-08-25 01:58:58', '2019-08-25 01:58:58'),
(6, 5, 'yraxy', 'marin', 'esquina sur', 'caracas', 'Amazonas', '2385489', '2019-08-25 02:09:40', '2019-08-25 02:09:40'),
(7, 4, 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', '2019-08-25 21:46:44', '2019-08-25 21:46:44'),
(8, 10, 'Gustavo', 'Morillo', 'caracas', 'caracas', 'Miranda', '4241567774', '2019-09-02 19:53:06', '2019-09-02 19:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolars`
--

CREATE TABLE `dolars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dolars`
--

INSERT INTO `dolars` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'dollarBuy', 17000, NULL, NULL),
(2, 'dollarSell', 15000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_23_120000_create_shoppingcart_table', 1),
(4, '2019_08_05_002252_create_products_table', 1),
(5, '2019_08_05_183028_create_modals_table', 1),
(6, '2019_08_10_231418_create_orders_table', 1),
(7, '2019_08_10_232006_create_order_items', 1),
(8, '2019_08_17_110623_create_addresses_table', 1),
(9, '2019_08_18_171219_create_shipping_methods_table', 1),
(10, '2019_08_18_212047_create_dolars_table', 1),
(11, '2019_08_21_172730_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modals`
--

CREATE TABLE `modals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modals`
--

INSERT INTO `modals` (`id`, `product_id`, `name`, `second_name`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(2, 2, 'js-modal2', 'js-hide-modal2', '156659976360474965_461_main.jpg', '156659976360474965_461_alt2.jpg', '156659976360474965_461_alt3.jpg', '2019-08-23 22:36:03', '2019-08-23 22:36:03'),
(3, 3, 'js-modal3', 'js-hide-modal3', '156745227180174163_145_alt2.jpg', '156745227180174163_145_alt3.jpg', '156745227180174163_145_alt1.jpg', '2019-08-23 22:47:16', '2019-08-23 22:47:16'),
(4, 4, 'js-modal4', 'js-hide-modal4', '1566601388guasa.jpg', '156660138880174163_553_alt1.jpg', '1566601388rakata3.jpg', '2019-08-23 23:03:08', '2019-08-23 23:03:08'),
(5, 5, 'js-modal5', 'js-hide-modal5', '156660167280174163_553_alt1.jpg', '1566601672rakata3.jpg', '1566601672guasa.jpg', '2019-08-23 23:07:52', '2019-08-23 23:07:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `name`, `lastname`, `address`, `city`, `state`, `phone`, `status`, `del_date`, `price`, `shipping`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-24 16:54:19', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-24 16:54:19', '540000.00', 'MRW', '2019-08-24 20:54:19', '2019-08-24 20:54:19'),
(2, 1, '2019-08-24 17:02:42', 'Gustavo', 'Morillo', 'anzo', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-24 17:02:42', '540000.00', 'MRW', '2019-08-24 21:02:42', '2019-08-24 21:02:42'),
(3, 1, '2019-08-24 17:09:48', 'Gustavo', 'Morillo', 'zulia', 'caracas', 'Zulia', '4241567774', 'on_hold', '2019-08-24 17:09:48', '540000.00', 'DOMESA', '2019-08-24 21:09:48', '2019-08-24 21:09:48'),
(4, 3, '2019-08-24 21:58:58', 'yraxy', 'marin', 'el marques', 'caracas', 'Distrito Capital', '2385489', 'on_hold', '2019-08-24 21:58:58', '1320000.00', 'DOMESA', '2019-08-25 01:58:58', '2019-08-25 01:58:58'),
(5, 5, '2019-08-24 22:09:40', 'yraxy', 'marin', 'esquina sur', 'caracas', 'Amazonas', '2385489', 'on_hold', '2019-08-24 22:09:40', '840000.00', 'DOMESA', '2019-08-25 02:09:41', '2019-08-25 02:09:41'),
(6, 4, '2019-08-25 16:56:04', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 16:56:04', '240000.00', 'MRW', '2019-08-25 20:56:04', '2019-08-25 20:56:04'),
(7, 4, '2019-08-25 16:56:20', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 16:56:20', '240000.00', 'MRW', '2019-08-25 20:56:20', '2019-08-25 20:56:20'),
(8, 4, '2019-08-25 17:08:39', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 17:08:39', '240000.00', 'MRW', '2019-08-25 21:08:39', '2019-08-25 21:08:39'),
(9, 4, '2019-08-25 17:12:56', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 17:12:56', '120000.00', 'MRW', '2019-08-25 21:12:56', '2019-08-25 21:12:56'),
(10, 4, '2019-08-25 17:31:14', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 17:31:14', '240000.00', 'MRW', '2019-08-25 21:31:14', '2019-08-25 21:31:14'),
(11, 4, '2019-08-25 17:46:44', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-08-25 17:46:44', '300000.00', 'MRW', '2019-08-25 21:46:44', '2019-08-25 21:46:44'),
(12, 1, '2019-09-02 15:41:48', 'Gustavo', 'Morillo', 'caracas miranda', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-09-02 15:41:48', '240000.00', 'MRW', '2019-09-02 19:41:48', '2019-09-02 19:41:48'),
(13, 10, '2019-09-02 15:53:06', 'Gustavo', 'Morillo', 'caracas', 'caracas', 'Miranda', '4241567774', 'on_hold', '2019-09-02 15:53:06', '390000.00', 'MRW', '2019-09-02 19:53:06', '2019-09-02 19:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `item_id`, `order_id`, `item_name`, `size`, `color`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Chemise', 'm', 'azul', 1, '300000.00', NULL, NULL),
(2, 4, 1, 'Chemise', 's', 'Fucsia', 1, '240000.00', NULL, NULL),
(3, 3, 2, 'Chemise', 'm', 'azul', 1, '300000.00', NULL, NULL),
(4, 4, 2, 'Chemise', 's', 'Fucsia', 1, '240000.00', NULL, NULL),
(5, 3, 3, 'Chemise', 'm', 'azul', 1, '300000.00', NULL, NULL),
(6, 4, 3, 'Chemise', 's', 'Fucsia', 1, '240000.00', NULL, NULL),
(7, 3, 4, 'Chemise', 'l', 'azul', 2, '600000.00', NULL, NULL),
(8, 4, 4, 'Chemise', 'm', 'Fucsia', 3, '720000.00', NULL, NULL),
(9, 4, 5, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(10, 3, 5, 'Chemise', 'l', 'azul', 2, '600000.00', NULL, NULL),
(11, 4, 6, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(12, 4, 7, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(13, 4, 8, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(14, 4, 9, 'Chemise', 'm', 'Fucsia', 1, '120000.00', NULL, NULL),
(15, 4, 10, 'Chemise', 'm', 'Fucsia', 2, '240000.00', NULL, NULL),
(16, 3, 11, 'Chemise', 'l', 'azul', 2, '300000.00', NULL, NULL),
(17, 4, 12, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(18, 4, 13, 'Chemise', 'm', 'Fucsia', 1, '240000.00', NULL, NULL),
(19, 3, 13, 'Chemise', 'l', 'azul', 1, '150000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gustavomorillo@gmail.com', '$2y$10$wfOF07axYXmP3/lui3QzHupn8A0FNMYfuwTN6kS0cZBiMSQUU6Ehi', '2019-08-25 00:38:37'),
('gustavomorillo1@gmail.com', '$2y$10$x8bvpHqIR5y9X87ksFrsa.RP89ZWSUxDxsbGuErDP0ouOQQqorkeC', '2019-08-25 00:51:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `paymentType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentMount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `paymentType`, `bank`, `paymentNumber`, `paymentDate`, `paymentMount`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'transferencia', 'banesco', '12345678', '08/24/2019', '1950000', 'pago', NULL, '2019-08-25 02:10:37', '2019-08-25 02:10:37'),
(2, 4, 'transferencia', 'banesco', '12345678', '08/25/2019', '+584241567774', 'hola', NULL, '2019-08-25 21:14:24', '2019-08-25 21:14:24'),
(3, 4, 'transferencia', 'na', 'dsa', '08/08/2019', 'dsa', 'ads', NULL, '2019-08-25 21:17:40', '2019-08-25 21:17:40'),
(4, 4, 'deposito', 'banesco', '12345678', '08/25/2019', '23123123123', '231213', NULL, '2019-08-25 21:26:57', '2019-08-25 21:26:57'),
(5, 4, 'deposito', 'mercantil', '213123', '08/25/2019', '1123123', '21123', NULL, '2019-08-25 21:37:55', '2019-08-25 21:37:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s` tinyint(1) NOT NULL DEFAULT '0',
  `sqty` int(11) NOT NULL DEFAULT '0',
  `m` tinyint(1) NOT NULL DEFAULT '0',
  `mqty` int(11) NOT NULL DEFAULT '0',
  `l` tinyint(1) NOT NULL DEFAULT '0',
  `lqty` int(11) NOT NULL DEFAULT '0',
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category`, `subcategory`, `s`, `sqty`, `m`, `mqty`, `l`, `lqty`, `color`, `modal_name`, `created_at`, `updated_at`) VALUES
(3, 'Chemise', 'azul', '156745227180174163_145_alt1.jpg', 10, 'men', 'chemise', 0, 0, 0, 0, 1, 1, 'azul', 'js-show-modal3', '2019-08-23 22:47:16', '2019-09-02 19:24:31'),
(4, 'Chemise', 'Polo fucsia', '1566601672guasa.jpg', 16, 'women', 'chemise', 1, 2, 1, 8, 1, 5, 'Fucsia', 'js-show-modal4', '2019-08-23 23:07:52', '2019-08-23 23:07:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'MRW', 34000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"8738e9e164236b64c21ca654e7d0ba2d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":10:{s:5:\"rowId\";s:32:\"8738e9e164236b64c21ca654e7d0ba2d\";s:2:\"id\";s:1:\"4\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:7:\"Chemise\";s:5:\"price\";d:240000;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:3:{s:4:\"size\";s:1:\"m\";s:5:\"color\";s:6:\"Fucsia\";s:5:\"image\";s:19:\"1566601672guasa.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:11:\"App\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;}}}', NULL, NULL),
('10', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"8738e9e164236b64c21ca654e7d0ba2d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":10:{s:5:\"rowId\";s:32:\"8738e9e164236b64c21ca654e7d0ba2d\";s:2:\"id\";s:1:\"4\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:7:\"Chemise\";s:5:\"price\";d:240000;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:3:{s:4:\"size\";s:1:\"m\";s:5:\"color\";s:6:\"Fucsia\";s:5:\"image\";s:19:\"1566601672guasa.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:11:\"App\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;}s:32:\"ac3b75735d06679860ac70e72f305b6b\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":10:{s:5:\"rowId\";s:32:\"ac3b75735d06679860ac70e72f305b6b\";s:2:\"id\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:7:\"Chemise\";s:5:\"price\";d:150000;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:3:{s:4:\"size\";s:1:\"l\";s:5:\"color\";s:4:\"azul\";s:5:\"image\";s:31:\"156745227180174163_145_alt1.jpg\";}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:11:\"App\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;}}}', NULL, NULL),
('1000001', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('1000007', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('1000008', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('1000009', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('1000010', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('7', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('8', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL),
('9', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `lastname`, `phone`, `gender`, `birthdate`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gustavo Morillo', 'Morillo', '4241567774', 'male', '27/02/1986', 'gustavomorillo@gmail.com', NULL, '$2y$10$ng0oSVqC3.VQZKEHvt/X9.LQBAdyC68nqVcHBYxk5LFVyxnuqSdM2', NULL, '2019-08-23 22:22:05', '2019-08-23 22:22:05'),
(7, 0, 'Gustavo Morillo Marin', 'Gustavo Morillo Marin', 'Gustavo Morillo Marin', 'Gustavo Morillo Marin', '27/01/1986', 'morillo_gustavo@hotmail.com', NULL, '$2y$10$Ev3Jx.fR11sjoyiyNxHo3uQc6L3Qn0q5Aqs4rirMZ4i7NMLrVQlZi', NULL, '2019-08-26 20:39:46', '2019-08-26 20:39:46'),
(8, 0, 'Gustavo', 'Morillo', '4241567774', 'female', '17/02/1986', 'gustavomorillowd@gmail.com', NULL, '$2y$10$pBHJMbRX0LvIDY2Fw4SamO6k6Far6Z39IKkDdOqsNk./hj0lVlOnu', NULL, '2019-08-27 01:04:00', '2019-08-27 01:04:00'),
(9, 0, 'Gustavo Morillo', 'awd', '4241567774', 'male', '17/02/1986', 'gustavomorillo12@gmail.com', NULL, '$2y$10$wMNUUMiEhxRIMUZMEnvYzu14E06lU7uGnBYjJSuCA2OKPYFfNFprq', NULL, '2019-08-27 01:05:26', '2019-08-27 01:05:26'),
(10, 0, 'Gus Click', 'Gus Click', 'Gus Click', 'Gus Click', '27/01/1986', 'gusclick1@gmail.com', NULL, '$2y$10$TRhk8OIAjaKC4LM8.6FckeHoiPge.A4PMe1nY1ZUXI0m70wBY5SdS', NULL, '2019-09-02 19:50:19', '2019-09-02 19:50:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dolars`
--
ALTER TABLE `dolars`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modals`
--
ALTER TABLE `modals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dolars`
--
ALTER TABLE `dolars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `modals`
--
ALTER TABLE `modals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
