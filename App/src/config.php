<?php

// linux local
define('DB_HOST', 'localhost');
define('DB_USER', 'daniela');
define('DB_PASS', '2850');
define('DB_NAME', 'notes');

// hosting
// define('DB_HOST', 'localhost');
// define('DB_USER', 'id21927207_daniela');
// define('DB_PASS', 'Danielaswebsite1!');
// define('DB_NAME', 'id21927207_danielasdatabase');

// CREATE TABLE `users` (
//     `id` int NOT NULL AUTO_INCREMENT,
//     `name` varchar(255) NOT NULL,
//     `email` varchar(255) NOT NULL,
//     `password` varchar(255) NOT NULL,
//     PRIMARY KEY (`id`),
//     UNIQUE KEY `email_UNIQUE` (`email`)
// );

// CREATE TABLE `notes` (
//     `id` int NOT NULL AUTO_INCREMENT,
//     `title` varchar(45) NOT NULL,
//     `body` varchar(255) NOT NULL,
//     `user_id` int NOT NULL,
//     PRIMARY KEY (`id`),
//     KEY `userid_fk_idx` (`user_id`),
//     CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
//   )