-- DROP USER IF EXISTS `web_user`;
-- CREATE USER 'web_user'@'%' IDENTIFIED BY 'MzM0NmEzNWM4N2JhMWM4YTc0NGVi';

SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci';

DROP DATABASE IF EXISTS `web`;
CREATE DATABASE IF NOT EXISTS `web` CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE `web`;

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `guid` char(36) not null,
    `physical_path` varchar(256) not null,
    `filename` varchar(128) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

REVOKE ALL ON *.* FROM web_user;
REVOKE ALL ON web.* FROM web_user;
GRANT SELECT ON web.* TO web_user;
GRANT INSERT ON web.files TO web_user;
