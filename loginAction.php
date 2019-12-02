<?php
require_once('inc/Dao.php');
require_once('inc/common.php');

if(array_key_exists('a', $_GET) && ($_GET['a'] == 'login')){
    $pdo = new Dao();
    $uname = $_POST['uname'];
    $pass = $_POST['psw'];

    $result = $pdo->check_user_credentials($uname, $pass);
    if(count($result) > 0){
        $_SESSION['loggedIn'] = true;
        $_SESSION['uname'] = $uname;
        header('Location: index.php');
        die();
    }
    else{
        header('Location: login.html');
        die();
    }
}
else if(array_key_exists('a', $_GET) && ($_GET['a'] == 'register')){
    $pdo = new Dao();
    $uname = $_POST['email'];
    $pass = $_POST['psw'];
    $pass_rpt = $_POST['psw-repeat'];

    if($pass != $pass_rpt){
        header('Location: signUp.html');
        die();
    }

    $pdo->add_user($uname, $pass);

    $_SESSION['loggedIn'] = true;
    $_SESSION['uname'] = $uname;

    header('Location: index.php');
    die();
}
else{
    header('Location: login.html');
    die();
}

