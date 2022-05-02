<?php ob_start(); ?>
<?php
    include "header.php";
    $_SESSION['loggedin'] = false;
    setcookie('username', $_COOKIE['username'], -4800); 
    header("Location: ./Machberos.php");
    include "footer.php"; 

 