<?php
require '../vendor/autoload.php';

use \Dta\Firstmvc_composer\Model\UsersManager as UsersManager;

$usersManager = new UsersManager();

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $user = $usersManager->getUser($id);

    require '../view/userView.php';
}