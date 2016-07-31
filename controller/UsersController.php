<?php
require_once '../models/users.php';

if(isset($_GET['s'])){
    $user = new User();
    switch ($_GET['s']){
        case 'newUser':
            echo $user->newUser($_GET['name'], $_GET['nickname'], $_GET['password']);
            break;
        case 'signIn':
            echo $user->signInUser($_GET['nickname'], $_GET['password']);
            break;
        case 'logOut':
            echo $user->logOut();
            break;
    }
}