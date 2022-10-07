<?php

require 'vendor/autoload.php';
require 'UserHandler.php';

$userHandler = new UserHandler();

$userId = 5;

echo $userHandler->getUsers();
echo PHP_EOL;
echo $userHandler->getUserArticles($userId);
