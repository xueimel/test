<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

function print_header(){
    if(isset($_SESSION['uname'])){
        echo 'Welcome, ' . $_SESSION['uname'];
    }
}