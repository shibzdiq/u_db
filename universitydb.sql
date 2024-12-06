-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 05 2024 р., 21:04
-- Версія сервера: 10.4.32-MariaDB
-- Версія PHP: 8.2.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `universitydb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `courses`
--

CREATE TABLE `courses`
(
  `id` int
(11) NOT NULL,
  `title` varchar
(255) NOT NULL,
  `professor_id` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `courses`
--

INSERT INTO `courses` (`
id`,
`title
`, `professor_id`) VALUES
(1, 'Програмування на Python', 1),
(2, 'Бази даних', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `enrollments`
--

CREATE TABLE `enrollments`
(
  `id` int
(11) NOT NULL,
  `student_id` int
(11) DEFAULT NULL,
  `course_id` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `enrollments`
--

INSERT INTO `enrollments` (`
id`,
`student_id
`, `course_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `professors`
--

CREATE TABLE `professors`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(255) NOT NULL,
  `department` varchar
(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `professors`
--

INSERT INTO `professors` (`
id`,
`name
`, `department`) VALUES
(1, 'Іван Гончаренко', 'Компʼютерні науки'),
(2, 'Олена Ткаченко', 'Прикладна математика');

-- --------------------------------------------------------

--
-- Структура таблиці `rooms`
--

CREATE TABLE `rooms`
(
  `id` int
(11) NOT NULL,
  `room_number` varchar
(20) NOT NULL,
  `capacity` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `rooms`
--

INSERT INTO `rooms` (`
id`,
`room_number
`, `capacity`) VALUES
(1, '101', 30),
(2, '102', 25);

-- --------------------------------------------------------

--
-- Структура таблиці `schedule`
--

CREATE TABLE `schedule`
(
  `id` int
(11) NOT NULL,
  `course_id` int
(11) DEFAULT NULL,
  `room_id` int
(11) DEFAULT NULL,
  `lesson_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `schedule`
--

INSERT INTO `schedule` (`
id`,
`course_id
`, `room_id`, `lesson_date`) VALUES
(1, 1, 1, '2024-12-01'),
(2, 2, 2, '2024-12-02');

-- --------------------------------------------------------

--
-- Структура таблиці `students`
--

CREATE TABLE `students`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(255) NOT NULL,
  `group_name` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `students`
--

INSERT INTO `students` (`
id`,
`name
`, `group_name`) VALUES
(1, 'Олександр Петров', 'КН-202'),
(2, 'Марія Іваненко', 'КН-203'),
(3, 'Антон Коваленко', 'КН-202');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `courses`
--
ALTER TABLE `courses`
ADD PRIMARY KEY
(`id`),
ADD KEY `professor_id`
(`professor_id`);

--
-- Індекси таблиці `enrollments`
--
ALTER TABLE `enrollments`
ADD PRIMARY KEY
(`id`),
ADD KEY `student_id`
(`student_id`),
ADD KEY `course_id`
(`course_id`);

--
-- Індекси таблиці `professors`
--
ALTER TABLE `professors`
ADD PRIMARY KEY
(`id`);

--
-- Індекси таблиці `rooms`
--
ALTER TABLE `rooms`
ADD PRIMARY KEY
(`id`);

--
-- Індекси таблиці `schedule`
--
ALTER TABLE `schedule`
ADD PRIMARY KEY
(`id`),
ADD KEY `course_id`
(`course_id`),
ADD KEY `room_id`
(`room_id`);

--
-- Індекси таблиці `students`
--
ALTER TABLE `students`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `students`
--
ALTER TABLE `students`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `courses`
--
ALTER TABLE `courses`
ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY
(`professor_id`) REFERENCES `professors`
(`id`) ON
DELETE
SET NULL
ON
UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `enrollments`
--
ALTER TABLE `enrollments`
ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY
(`student_id`) REFERENCES `students`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY
(`course_id`) REFERENCES `courses`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `schedule`
--
ALTER TABLE `schedule`
ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY
(`course_id`) REFERENCES `courses`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE,
ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY
(`room_id`) REFERENCES `rooms`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
