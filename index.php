<?php
    session_start();
    if($_SESSION["ssSoftware"]<>"ACTIVA")
    {
        header("Location: ventanas/login.php", true, 301);
        exit();
    }
    else 
    {
        header("Location: ventanas/inicio.php", true, 301);
        exit();
    }