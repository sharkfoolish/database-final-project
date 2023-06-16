SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;