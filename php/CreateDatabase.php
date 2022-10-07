<?php

require 'vendor/autoload.php';
require 'Database.php';

$db = new Database();

$db->executeSql('CREATE DATABASE ' . getenv('DATABASE_NAME'));

$db->executeSql('CREATE TABLE ' . getenv('DATABASE_NAME') . '.user   (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
);');

$db->executeSql('CREATE TABLE ' . getenv('DATABASE_NAME') . '.article (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userId` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `text` varchar(1555) NOT NULL,
 FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
);');
