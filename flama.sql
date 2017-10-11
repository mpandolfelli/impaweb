-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-09-2017 a las 18:12:52
-- Versión del servidor: 5.5.54-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `flama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `name`, `file`, `type`, `user_id`, `registered`) VALUES
(1, '1366-2000', '1366-2000_1503073771.jpg', 'jpg', 6, '2017-08-18 16:29:31'),
(2, '1366-2000', '1366-2000_1503073783.png', 'png', 6, '2017-08-18 16:29:43'),
(3, '1366-20010', '1366-20010_1503083514.jpg', 'jpg', 6, '2017-08-18 19:11:54'),
(4, '1366-2000', '1366-2000_1503083526.jpg', 'jpg', 6, '2017-08-18 19:12:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `default` tinyint(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `role`, `default`) VALUES
(1, 'admin', 0),
(2, 'user', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `template_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `name`, `url`, `template_id`, `text`, `description`, `user_id`, `status_id`, `category_id`, `image`, `registered`) VALUES
(1, 'Los 250 millones de usuarios de Reddit podrán subir vídeo directamente a la plataforma', 'los-250-millones-de-usuarios-de-reddit-podrn-subir-vdeo-directamente-a-la-plataforma', 1, '<p>Reddit <a href="https://redditblog.com/2017/08/17/video-is-coming-to-reddit/">anunciaba</a> hace unas horas que lanzaba un reproductor nativo de v&iacute;deo, una decisi&oacute;n que tiene mucho sentido (tras haber presentado su propio servicio para <a href="https://www.genbeta.com/redes-sociales-y-comunidades/reddit-lanza-su-propio-servicio-para-compartir-imagenes-que-pasara-con-imgur">compartir im&aacute;genes</a> el a&ntilde;o pasado).</p>\r\n<p>De esta manera, los usuarios de Reddit podr&aacute;n subir v&iacute;deos de <strong>hasta 15 minutos de duraci&oacute;n y que pesen menos de 1GB</strong>. Podr&aacute;n hacerlo tanto desde la versi&oacute;n de escritorio como desde aplicaciones m&oacute;viles.</p>\r\n<p>Al igual que en otras plataformas, el video permanecer&aacute; anclado en una esquina de tu pantalla, posibilitando que sigas navegando mientras se reproduce. Adem&aacute;s, <strong>han anunciado una herramienta para crear GIFs</strong>, uno de los formatos preferidos en esta plataforma.</p>\r\n<div class="article-asset-summary article-asset-normal">\r\n<div class="asset-content">\r\n<div class="sumario">Los moderadores podr&aacute;n elegir si en sus subreddits se pueden subir v&iacute;deos o no.</div>\r\n</div>\r\n</div>\r\n<p>Esto es una buena noticia para los usuarios que quieran subir videos a Reddit sin tener que utilizar servicios externos. De todos modos, esto tambi&eacute;n podr&iacute;a significar una cosa: publicidad.</p>\r\n<p><strong>De entrada, no estar&aacute; disponible para todo el mundo</strong>. Los moderadores podr&aacute;n elegir si en sus subreddits se pueden subir v&iacute;deos o no. Esto quiere decir que tendr&aacute;n m&aacute;s trabajo analizando el contenido de lo que se publica en cada comunidad.</p>\r\n<p>Por ahora est&aacute; en fase beta, y poco a poco se ir&aacute; implementando en todos los subreddits que quieran activarlo. Tendremos que esperar para ver qu&eacute; acogida tiene esta nueva e importante funcionalidad.</p>', 'Reddit anunciaba hace unas horas que lanzaba un reproductor nativo de vídeo, una decisión que tiene mucho sentido (tras haber presentado su propio servicio para compartir imágenes el año pasado). ', 6, 2, 1, 'http://flama.codicilabs.com/uploads/1366-2000_1503073771.jpg', '2017-08-18 16:30:28'),
(2, 'Probamos el nuevo Newton', 'probamos-el-nuevo-newton', 1, '<p>La aplicaci&oacute;n de correo <a href="https://newtonhq.com">Newton</a>, antes conocida como <a href="https://www.xatakandroid.com/comunicacion-y-mensajeria/cloudmagic-es-ahora-newton-mail-y-estrena-suscripcion-anual-para-desbloquear-todas-sus-funciones">CloudMagic</a> ha llegado hoy por primera vez a Windows 10. El gestor de correo que ya lleva alg&uacute;n tiempo en Android, iOS y macOS, recibi&oacute; bastantes halagos de parte de nuestros compa&ntilde;eros en <a href="https://www.applesfera.com/aplicaciones-ios-1/newton-para-ios-y-macos-un-gestor-de-correos-que-te-impresiona-de-principio-a-fin">Applesfera</a>.</p>\r\n<p><a href="https://blog.newtonhq.com/newton-for-windows-is-here-9fae31ddbe54">Newton para Windows</a> llevaba <strong>cuatro meses en beta privada</strong>, y finalmente ha llegado a la Tienda de Microsoft en su primera versi&oacute;n estable. En Genbeta la hemos estado probando desde hace poco m&aacute;s de un mes, y aprovechamos el lanzamiento para contarte qu&eacute; te puedes esperar.</p>\r\n<p>Una de las principales ventajas de una app de correo como Newton, es que ofrece una <strong>experiencia bastante unificada a trav&eacute;s de m&uacute;ltiples plataformas</strong>. Ya sea que lo uses en Windows 10, Mac, iOS o Android (tambi&eacute;n ofrece soporte para el Apple Watch, Android Wear, y se integra con Alexa) tendr&aacute;s las mismas opciones y b&aacute;sicamente la misma interfaz. Algo que no suele ser la norma cuando hablamos de apps de correo nativas para Windows.</p>', 'La aplicación de correo Newton, antes conocida como CloudMagic ha llegado hoy por primera vez a Windows 10. El gestor de correo que ya lleva algún tiempo en Android, iOS y macOS, recibió bastantes halagos de parte de nuestros compañeros en Applesfera. ', 6, 2, 1, 'http://flama.codicilabs.com/uploads/1366-2000_1503073783.png', '2017-08-18 16:31:05'),
(3, 'Descubre cuándo y dónde podrás ver el próximo eclipse', 'descubre-cundo-y-dnde-podrs-ver-el-prximo-eclipse', 1, '<p>Los eclipses son unos fen&oacute;menos que nos recuerdan lo peque&ntilde;os que somos en comparaci&oacute;n con el resto del Universo. Normalmente, debemos esperar varios a&ntilde;os para poder presenciarlos, y no en todas las zonas del planeta se ven de la misma manera.</p>\r\n<p>Time and Date ha creado <a href="https://www.timeanddate.com/eclipse/list.html">una genial herramienta</a> que nos permite conocer cu&aacute;ndo y d&oacute;nde podremos ver el pr&oacute;ximo eclipse. Nos ofrece datos hasta el 2190, as&iacute; podemos hacer planes con tiempo.</p>\r\n<p>En la parte superior aparece <strong>un mapa con los eclipses que suceder&aacute;n pr&oacute;ximamente</strong>, mostrando en qu&eacute; zonas se ver&aacute;n mejor. De todos modos, la parte m&aacute;s interesante es poder marcar qu&eacute; tipo de eclipses queremos ver, en qu&eacute; zona y en qu&eacute; periodo (tambi&eacute;n podemos consultar eclipses del pasado):</p>\r\n<p>De esta manera, podemos ver que <strong>el pr&oacute;ximo eclipse solar total ser&aacute; dentro de muy poco</strong>, el pr&oacute;ximo <a href="https://www.xataka.com/espacio/a-la-caza-del-eclipse-solar-total-dos-aviones-de-la-nasa-lo-perseguiran-para-capturar-imagenes-del-sol-y-mercurio">21 de agosto</a>. Podremos verlo desde Espa&ntilde;a, M&eacute;xico, Colombia, Argentina o Estados Unidos.</p>\r\n<p>Tambi&eacute;n nos aparece <strong>una cuenta regresiva</strong> que nos dice cu&aacute;nto falta para el pr&oacute;ximo eclipse. Justo debajo tambi&eacute;n nos da la opci&oacute;n para especificar en qu&eacute; pa&iacute;s o ciudad vivimos.</p>\r\n<p>Al introducir tu ciudad, te ofrecer&aacute; datos impresionantes sobre c&oacute;mo ver&aacute;s los pr&oacute;ximos eclipses. <strong>Crea unos videos s&uacute;per &uacute;tiles</strong>, en los que muestra c&oacute;mo ser&aacute; el eclipse desde tu posici&oacute;n: hora de inicio, punto m&aacute;ximo, cuando acaba, etc.</p>\r\n<p>Si seguimos bajando, veremos que <strong>aparece un calendario con los pr&oacute;ximos eclipses</strong> (de que tipo son y su grado). Como vemos, es una herramienta imprescindible para los amantes de la astronom&iacute;a, y es genial si quieres planear ir a ver una determinado eclipse a una parte del mundo.</p>', 'Los eclipses son unos fenómenos que nos recuerdan lo pequeños que somos en comparación con el resto del Universo. Normalmente, debemos esperar varios años para poder presenciarlos, y no en todas las zonas del planeta se ven de la misma manera. ', 6, 2, 1, 'http://flama.codicilabs.com/uploads/1366-2000_1503083526.jpg', '2017-08-18 19:12:55'),
(4, 'Piden investigar a Hotspot Shield VPN', 'piden-investigar-a-hotspot-shield-vpn', 1, '<p>El popular servicio de VPN, <strong>Hotspot Shield, ha sido acusado de espiar el tr&aacute;fico de sus usuarios</strong> a trav&eacute;s del almacenamiento de la actividad y del uso de mec&aacute;nismos de rastreo de terceros para mostrar publicidad personalizada.</p>\r\n<p>La queja ha sido presentada por la organizaci&oacute;n sin fines de lucro <a href="https://cdt.org/press/cdt-files-complaint-with-the-ftc-on-hotspot-shield-vpn/">CDT</a> ante la Comisi&oacute;n Federal de Comercio de los Estados Unidos. Ah&iacute; exponen c&oacute;mo Hotspot Shield promete proteger la privacidad de los usuarios, pero al mismo tiempo no ha revelado pr&aacute;citcas en las que <strong>comparte informaci&oacute;n y redirecciona el tr&aacute;fico</strong> de los usuarios violando esa promesa.</p>\r\n<p>CDT pide a la Comisi&oacute;n que investigue las pr&aacute;cticas para compartir informaci&oacute;n y asegurar los datos en Hotspot Shield, pues <strong>consideran que sin injustas y enga&ntilde;osas</strong>.</p>\r\n<p>El uso de servicios de VPN ha sufrido una explosi&oacute;n bastante significativa, en Estados Unidos esto se ha hecho especialmente relevante luego que se aprobara que <a href="https://www.genbeta.com/a-fondo/que-significa-que-las-isps-estadounidenses-puedan-comerciar-con-los-datos-del-usuario">los ISPs puedan comerciar con los datos del usuario</a>.</p>\r\n<p>M&aacute;s all&aacute; de aquellos que los usan para intentar acceder a otro cat&aacute;logo de Netflix o de restricciones similares, hay quienes acuden a ellos en busca de verdadera privacidad a la hora de navegar la web. El problema es que la oferta de servicios es abrumadora, y para el usuario com&uacute;n puede ser muy dif&iacute;cil entender o saber <strong>qu&eacute; hacen exactamente esos servicios de VPN con sus datos</strong>.</p>\r\n<p>Hotspot Shield al igual que muchos otros servicios de VPN, ofrecen un modelo de servicio gratuito adem&aacute;s de sus planes de pago. Podr&iacute;as pensar que tiene l&oacute;gica no esperar que te ofrezcan algo gratis sin dar nada a cambio, pero si lo que te ofrecen es literalmente un servicio para proteger tu privacidad y por otro lado est&aacute;n vendiendo tus datos a otro, no se puede escapar la iron&iacute;a.</p>\r\n<p>Tambi&eacute;n es importante destacar que en su queja, la CDT no discrimina entre un modelo y otro a la hora de acusar al servicio de fallar en cumplir las promesas que hace, de compartir informaci&oacute;n de los usuarios con terceros, y de exponer a los usuarios a filtraciones de datos. Aparentemten Hotspot Shield lo hace con todos sus usurios, paguen o no.</p>', 'El popular servicio de VPN, Hotspot Shield, ha sido acusado de espiar el tráfico de sus usuarios a través del almacenamiento de la actividad y del uso de mecánismos de rastreo de terceros para mostrar publicidad personalizada. ', 6, 2, 1, 'http://flama.codicilabs.com/uploads/1366-20010_1503083514.jpg', '2017-08-18 19:13:19'),
(5, 'un titulo lalala', 'un-titulo-lalala', 1, '<p>.h...hi.<br /><br />8&ntilde;98989&ntilde;8</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'grhrth rth rthrth rth rt h', 6, 1, 1, '', '2017-08-18 20:36:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections_status`
--

CREATE TABLE IF NOT EXISTS `sections_status` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sections_status`
--

INSERT INTO `sections_status` (`id`, `name`) VALUES
(1, 'Borrador'),
(2, 'Publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `templates`
--

INSERT INTO `templates` (`id`, `name`, `template`, `registered`) VALUES
(1, 'Full Width', 'full-width', '2016-05-10 17:55:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `role_id`) VALUES
(6, '', '', 'admin', '$2a$08$btQwPc39FkF91QhzkCNY3.dN/hiih1w6mdRXRJ0WlFI3OYez03GwC', 'martinpandolfelli@gmail.com', 1, 0, NULL, NULL, NULL, NULL, 'd0c7eac9c16dbe732c55e61011b56f36', '190.30.97.201', '2017-08-23 11:57:47', '2015-11-03 16:24:35', '2017-08-23 14:57:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `facebook_token` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`, `facebook_id`, `facebook_token`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL),
(3, 7, NULL, NULL, NULL, NULL),
(4, 8, NULL, NULL, NULL, NULL),
(5, 9, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections_status`
--
ALTER TABLE `sections_status`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `templates`
--
ALTER TABLE `templates`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_autologin`
--
ALTER TABLE `user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indices de la tabla `user_profiles`
--
ALTER TABLE `user_profiles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sections_status`
--
ALTER TABLE `sections_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `templates`
--
ALTER TABLE `templates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `user_profiles`
--
ALTER TABLE `user_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
