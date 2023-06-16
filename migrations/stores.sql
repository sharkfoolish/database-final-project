SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `is_online_store` tinyint(1) NOT NULL,
  `region` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;