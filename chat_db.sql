-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2023 г., 09:39
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dialogs`
--

CREATE TABLE `dialogs` (
  `id_d` int(11) NOT NULL,
  `u1_id` int(50) NOT NULL,
  `u2_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dialogs`
--

INSERT INTO `dialogs` (`id_d`, `u1_id`, `u2_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` time NOT NULL DEFAULT current_timestamp(),
  `us_id` int(11) NOT NULL,
  `id_diag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `us_id`, `id_diag`) VALUES
(87, 'Привет, как дела?', '17:21:42', 1, 1),
(90, 'Ку', '17:32:44', 2, 1),
(114, 'йй', '14:32:30', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id_p` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `p_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_title` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id_p`, `u_id`, `likes`, `p_image`, `p_title`) VALUES
(1, 1, 26, 'post.jpeg', 'Пока никто не знает, когда границы снова откроются после пандемии, но как только это случится, первым делом многим захочется свозить себя на море. Выбрать лучший курорт для долгожданного морского отдыха можно прямо сейчас!\r\n'),
(8, 2, 3, '56fa78a2c61df.jpg', 'dadadawdawdad'),
(54, 1, 11, '163374-valorant-vodolaz-cennye_luchi-mudrec-riot_games-2560x1440.png', 'jett'),
(56, 2, 6, 'Screenshot_20230517_110531_VK.jpg', 'Плмии'),
(57, 1, 6, '163374-valorant-vodolaz-cennye_luchi-mudrec-riot_games-2560x1440.png', 'АЫАаыа'),
(58, 1, 3, '62nnqh5nqy8slmwd.jpg', 'wadwadawd');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication` int(50) DEFAULT 0,
  `subscribers` int(50) NOT NULL DEFAULT 0,
  `subs` int(50) NOT NULL DEFAULT 0,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `family`, `publication`, `subscribers`, `subs`, `email`, `photo`, `verification`) VALUES
(1, 'Anton', '$2y$10$LqxXBfa/iSH/H5sXlOGH3.jtdZtngdgZFOrqtWlZj8HUqnxNytbhO', 'Xomyak', 0, 0, 0, '', 'prof.gif', 1),
(2, 'user2', '$2y$10$F2mJRLmoPp0h7HTz.KazLuPDBpRPPB2GbkGfpGr5h8GlgPeTC4xLy', '', 0, 0, 0, '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dialogs`
--
ALTER TABLE `dialogs`
  ADD PRIMARY KEY (`id_d`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_p`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dialogs`
--
ALTER TABLE `dialogs`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
