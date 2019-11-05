<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$ventana->validar_sesion();
$ventana->venNombre="Ventana Salir";
$ventana->iniciar_ventana();
$ventana->incluir_menu();
?>
<div class="w3-section w3-container">
    <div class="w3-content">
        <div class="w3-container w3-padding-16 w3-card-4">
            <div class="w3-section w3-center w3-xlarge">Confirma que desea salir?</div>
            <div class="w3-section">
                <a href="../exe/logout_exe.php" class="w3-button w3-theme-l2 w3-right">Sí, salir</a>
            </div>
        </div>
    </div>  
</div>

<script>
var app = angular.module('Sistema', []);
app.controller('Ventana', function($scope) {    
        
});
</script>
<?php
$ventana->finalizar_ventana();