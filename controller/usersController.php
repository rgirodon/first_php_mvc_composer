<?php
require '../vendor/autoload.php';

use \Dta\Firstmvc_composer\Model\UsersManager as UsersManager;

$usersManager = new UsersManager();

$users = $usersManager->getUsers();

require '../view/usersView.php';