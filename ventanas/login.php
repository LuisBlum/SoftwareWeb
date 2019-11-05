<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$arrGet=$ventana->obtener_get();
if(isset($arrGet["msjError"])){ $msjError=$arrGet["msjError"]; } else { $msjError=""; }
$ventana->iniciar_ventana();
?>
<div class="w3-section">
    <div class="w3-container">
        <div class="w3-content w3-card-4">
            <div class="w3-theme w3-padding"><b>Login</b></div>
            <div class="w3-section w3-container">
                <form id="frm1" name="frm1" method="post" action="../exe/login_exe.php">
                    <div><b>Usuario:</b></div>
                    <input type="text" class="w3-input w3-border" id="txtUsuario" name="txtUsuario" ng-model="usuario" ng-change="mensaje=''">
                    <div><b>Contrase&ntilde;a:</b></div>
                    <input type="password" class="w3-input w3-border" id="txtPassword" name="txtPassword" ng-model="password" ng-change="mensaje=''">
                    <span class="w3-section w3-padding w3-text-red w3-left">{{mensaje}}</span>
                    <input type="button" class="w3-section w3-button w3-card w3-dark-grey w3-right" value="Ingresar" ng-click="frmSubmit()">
                </form>
            </div>
        </div>
    </div>    
</div>
<script>
var app = angular.module('Sistema', []);
app.controller('Ventana', function($scope) {
    $scope.usuario="";
    $scope.password="";
    $scope.mensaje="<?php echo $msjError?>";
    
    $scope.frmSubmit=function(){
        $scope.mensaje="";
        if($scope.usuario===""){
            $scope.mensaje="Debe ingresar su usuario";
        }
        else if($scope.password===""){
            $scope.mensaje="Debe ingresar su contraseña";
        }
        else {
            frm1.submit();
        }
    };    
});
</script>
<?php
$ventana->finalizar_ventana();