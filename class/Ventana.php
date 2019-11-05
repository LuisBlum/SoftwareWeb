<?php
class Ventana extends Sistema
{
    public $venNombre="";
    
    public function validar_sesion()
    {
        session_start();
        if($_SESSION["ssSoftware"]<>"ACTIVA")
        {
            header("Location: login.php", true, 301);
            exit();
        }        
    }
    
    public function iniciar_ventana()
    {
        include '../include/ventana_inicio.php';
    }
    
    public function finalizar_ventana()
    {
        include '../include/ventana_fin.php';
    }
    
    public function incluir_menu()
    {
        include '../include/menu.php';
    }
}