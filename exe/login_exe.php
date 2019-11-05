<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$arrPost=$ventana->obtener_post();

$arrUsuarios=array(
    array("usuario"=>"admin", "password"=>"admin")
);

for($i=0;$i<count($arrUsuarios);$i++)
{
    if($arrUsuarios[$i]["usuario"]==$arrPost["txtUsuario"]
            && $arrUsuarios[$i]["password"]==$arrPost["txtPassword"])
    {
        session_start();
        $_SESSION["ssSoftware"]="ACTIVA";
        $_SESSION["sisUsuario"]=$arrPost["txtUsuario"];
        header("Location: ../ventanas/inicio.php", true, 301);
        exit();
    }
}

$msjError="Credenciales incorrectas.";
header("Location: ../ventanas/login.php?msjError=".$msjError, true, 301);
exit();