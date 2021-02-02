CREATE DATABASE `blog`;
USE `blog`;
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL DEFAULT '',
    `uri` varchar(255) NOT NULL DEFAULT '',
    `description` text,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
LOCK TABLES `categories` WRITE;
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `category` int(11) unsigned DEFAULT NULL,
    `title` varchar(255) NOT NULL DEFAULT '',
    `uri` varchar(255) NOT NULL,
    `subtitle` text NOT NULL,
    `content` text NOT NULL,
    `cover` varchar(255) DEFAULT NULL,
    `views` int(11) NOT NULL DEFAULT '0',
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `category_id` (`category`),
    FULLTEXT KEY `title` (`title`, `subtitle`),
    CONSTRAINT `category_id` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE
    SET NULL ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
LOCK TABLES `posts` WRITE;