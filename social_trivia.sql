-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2021 a las 23:14:51
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `social_trivia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_12_06_204127_create_trivia_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trivia`
--

CREATE TABLE `trivia` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opcion_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opcion_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opcion_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trivia`
--

INSERT INTO `trivia` (`id`, `pregunta`, `respuesta`, `opcion_1`, `opcion_2`, `opcion_3`, `categoria`, `created_at`, `updated_at`) VALUES
(1, '¿Cuál es la velocidad del sonido', '1.200 kilómetros por hora', '120 kilómetros por hora', '400 kilómetros por hora', '700 kilómetros por hora', '0', NULL, NULL),
(2, '¿Cuál es la mejor manera de saber los años de un árbol?', 'Contando sus anillos internos', 'Midiendo el ancho del árbol según su especie', 'Contando la cantidade de ramas y hojas', 'Midiendo su altura', '0', NULL, NULL),
(3, '¿De qué está compuesto mayormente el Sol?', 'Gas', 'Lava líquida', 'Hierro derretido', 'Roca', '0', NULL, NULL),
(4, 'El Goulash es un tipo de sopa con carne de res ¿de qué país proviene?', 'Hungría', 'República Checa', 'Eslovaquia', 'Irlanda', '2', NULL, NULL),
(5, '¿Cuál de los siguientes animales puede correr más rápido?', 'Chita', 'Leopardo', 'Tigre', 'Leon', '0', NULL, NULL),
(6, '¿En qué país se encuentra Transilvania?', 'Rumania', 'Bulgaria', 'Croacia', 'Serbia', '1', NULL, NULL),
(7, 'La frase -Pienso, luego existo- fue acuñada por: ', 'Descartes', 'Platón', 'Sócrates', 'Hegel', '0', NULL, NULL),
(8, '¿Qué significan las siglas en inglés: S.O.S', 'Save Our Souls', 'Save Our Ship', 'Save Our Seal', 'Save Our Saints', '2', NULL, NULL),
(9, '¿Cuál fue la primera película en color producida por Disney?', 'Blanca Nieves y los 7 enanos', 'Toy Story', 'La bella durmiente', 'Cenicienta', '2', NULL, NULL),
(10, '¿Qué tipo sanguíneo es el menos común en el cuerpo humano?', 'AB negativo', '0 positivo', 'B negativo', 'A positivo', '0', NULL, NULL),
(11, '¿Cuál es el peso promedio de un cerebro humano adulto?', '4 kilogramos', '12 kilogramos', '1200 gramos', '400 gramos', '0', NULL, NULL),
(12, '¿Cuál es la capital de Pakistán?', 'Islamabad', 'Lahore', 'Karachi', 'Afganistán', '1', NULL, NULL),
(13, '¿Cuántos planetas hay en nuestra galaxia?', 'Por lo menos 50 mil millones de planetas', 'Hay 9 planetas', 'Hay 10 planetas', 'Hay 50 millones de planetas', '0', NULL, NULL),
(14, '¿De dónde sacan nutrientes las plantas?', 'Desechos de animales', 'Oxígeno', 'Agua', 'De las abejas', '0', NULL, NULL),
(15, '¿De cuáles de estos productos Brasil es el mayor productor?', 'Café', 'Arroz', 'Aceite', 'Azúcar', '1', NULL, NULL),
(16, '¿Las luneas Titania y Oberon corresponden a qué planeta de nuestro sistema solar?', 'Urano', 'Neptuno', 'Saturno', 'Marte', '0', NULL, NULL),
(17, '¿En qué país se originó la tradición del árbol de navidad?', 'Alemania', 'Estados Unidos', 'Irlanda', 'Bélgica', '2', NULL, NULL),
(18, '¿Cuál es el país más pequeño en el mundo?', 'El Vaticano', 'Mónaco', 'San Marino', 'Israel', '1', NULL, NULL),
(19, '¿Qué vitaminas no se encuentra en un huevo de gallina?', 'Vitamina C', 'Vitamina A', 'Vitamina B', 'Vitamina D', '0', NULL, NULL),
(20, '¿Qué fruto seco se utiliza para preparar mazapán?', 'Almendras', 'Castañas de cajú', 'Nueces', 'Maní', '2', NULL, NULL),
(21, '¿Cuántos anillos tiene el logo de las olimpiadas?', '5', '6', '7', '8', '3', NULL, NULL),
(22, '¿Cuál de estos instrumentos puede producir las notas más alta?', 'Piccolo', 'Corno Francés', 'Flauta Traversa', 'Violín', '3', NULL, NULL),
(23, '¿Qué movimiento de expresión artística surgió durante el Imperio Romano de Oriente?', 'Bizantino', 'Helénico', 'Barroco', 'Levantina', '3', NULL, NULL),
(24, '¿Quién es conocido por descubrir que los gérmenes producen enfermedades?', 'Louis Pasteur', 'Gregor Mendel', 'Alfred Wallace', 'Charles Darwin', '0', NULL, NULL),
(25, '¿Cuán rápido puede correr un avestruz?', '65 kilómetros por hora', '50 kilómetros por hora', '80 kilómetros por hora', '35 kilómetros por hora', '0', NULL, NULL),
(26, '¿Cuál de los siguientes lenguajes no es un lenguaje de programación?', 'Panda', 'Ruby', 'Python', 'C++', '2', NULL, NULL),
(27, '¿Qué isla caribeña tiene la mayor superficie?', 'Cuba', 'Puerto Rico', 'Jamaica', 'La Española', '1', NULL, NULL),
(28, '_Zulia es una provincia, ¿de qué país?', 'Venezuela', 'Brasil', 'Ecuador', 'Colombia', '1', NULL, NULL),
(29, '¿Quién pintó el jardín de las delicias?', 'El Bosco', 'Salvador Dali', 'Francisco Goya', 'Rembrandt', '3', NULL, NULL),
(30, 'La sustancia que forma la mayor parte de una célula se llama:', 'Citoplasma', 'Cloroplasma', 'Citofilia', 'Núcleo', '0', NULL, NULL),
(31, '¿Qué tipo de galaxia es la vía láctea?', 'Espiral', 'Elíptica', 'Circular', 'Irregular', '0', NULL, NULL),
(32, '¿Qué porcentaje de tu visión perderías si quedas ciego de un ojo?', '20%', '50%', '35%', '60%', '0', NULL, NULL),
(33, '¿La muerte de quién desató la primera guerra mundial?', 'Archiduque Francisco Fernando', 'Guillermo II', 'James Ussher', 'La reina Victoria', '1', NULL, NULL),
(34, '¿Cuál de los siguientes paises fue neutral en la primera guerra mundial?', 'Noruega', 'Alemania', 'Italia', 'Inglaterra', '1', NULL, NULL),
(35, '¿Cuál de los siguientes libros fue escrito por Niccolo Machiavelli?', 'El príncipe', 'El arte de la guerra', 'Guerra y Paz', 'En tiempos de guerra', '0', NULL, NULL),
(36, '¿Simón Bolivar fue presidente de qué país?', 'Perú', 'Argentina', 'Chile', 'Bolivia', '1', NULL, NULL),
(37, '¿Quién fue teórico político y compañero de Karl Marx?', 'Friedrich Engels', 'Friedrich Reich', 'Friedrich Nietzsche', 'Mijaíl Bakunin', '0', NULL, NULL),
(38, '¿Dónde se ubicaban las civilizaciones de la Era de Bronce Egeo?', 'Grecia', 'España', 'Algeria', 'Turquía', '1', NULL, NULL),
(39, 'Todas las células tienen:', 'Membrana celular', 'Tanto membrana como paredes celulares', 'Paredes celulares', 'Citofilia', '0', NULL, NULL),
(40, '¿Qué astrónomo tomó medidas precisas del sistema solar y cientos de estrellas previamente a la invención del telescopio?', 'Tycho Brahe', 'Johannes Kepler', 'Galileo Galilei', 'Claudius Ptolemaeus', '0', NULL, NULL),
(41, '¿Cuál de las siguientes no es una teoría científica obsoleta?', 'Selección Natural', 'Lamarckismo', 'Generación espontánea', 'Teoría del Flogisto', '0', NULL, NULL),
(42, '¿En qué año se alcanzó la cima del monte Everest?', '1953', '1944', '1961', '1973', '2', NULL, NULL),
(43, '¿Quién es el padrino de la música Soul?', 'James Brown', 'Curtis Mayfield', 'Michael Jackson', 'Labi Siffre', '3', NULL, NULL),
(44, '¿Cuántas estrellas hay en el sistema solar?', '1', '437.352 contadas hasta ahora', '3', '8', '0', NULL, NULL),
(45, 'Según Sigmund Freud, el yo, el super yo y ¿qué otra instancia estructuran el psiquismo?', 'Ello', 'Irracionalidad', 'Inconsciente', 'Líbido', '0', NULL, NULL),
(46, '¿A quién pertenece la locución: Veni, vidi, vici?', 'Julio Cesar', 'César Augusto', 'Tiberio', 'Marco Antonio', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `trivia`
--
ALTER TABLE `trivia`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trivia`
--
ALTER TABLE `trivia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
