<?php
session_start();
require('includes/connection_database.php');
if (isset($_GET['pattern'])){
    $_SESSION['pattern'] = $_GET['pattern'];
}
else{
    $_SESSION['pattern'] = 'includes/patterns/main.php';
}
$_SESSION['page'] = $_GET['page'];
$_SESSION['id'] = $_GET['id'];

if (isset($_POST['do_sign_in'])) {
    $query = 'SELECT * FROM users where username = \''.$_POST['username'].'\'';
    $result = mysqli_query($connection, $query);
    $user =  mysqli_fetch_assoc($result);
    if(password_verify($_POST['password'], $user['password'])){
        $_SESSION['logged_user'] = $user;
    }
    else{
        $error  = 'incorrect username or password';
    }
}
