<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$ventana->validar_sesion();
$ventana->venNombre="Ventana formulario";
$ventana->iniciar_ventana();
$ventana->incluir_menu();
?>

<div class="w3-section w3-container">
    
    <div class="w3-content w3-border w3-card-4">
        
        <div class="w3-padding w3-theme-dark"><b>Formulario 1</b></div>
        <div class="w3-container w3-padding-16">
            <form id="frm1">
                <div class="w3-row-padding">
                    <div class="w3-col m4 s12">
                        <div><b>Texto 1:</b></div>
                        <input type="text" class="w3-input w3-border" ng-model="texto1">
                    </div>
                    <div class="w3-col m4 s12">
                        <div><b>Texto 2:</b></div>
                        <input type="text" class="w3-input w3-border w3-disabled" value="{{texto1}}">
                    </div>
                    <div class="w3-col m4 s12">
                        <div><b>Select:</b></div>
                        <select class="w3-select w3-border">
                            <option  ng-repeat="evento in arrEventos" value="{{evento.id}}">{{evento.nombre}}</option>                            
                        </select>
                    </div>
                </div>
                <div class="w3-row-padding w3-section">
                    <div class="w3-col m2 s12 w3-padding"><b>Radio:</b></div>
                    <div class="w3-col m2 s12"><input type="radio" class="w3-radio" name="rdoOpcion">Opcion 1</div>
                    <div class="w3-col m2 s12"><input type="radio" class="w3-radio" name="rdoOpcion">Opcion 2</div>
                </div>
                <div class="w3-row-padding w3-section">
                    <div class="w3-col m2 s12 w3-padding"><b>Check:</b></div>
                    <div class="w3-col m2 s12"><input type="checkbox" class="w3-check">Opcion 1</div>
                    <div class="w3-col m2 s12"><input type="checkbox" class="w3-check">Opcion 2</div>
                </div>
                <div class="w3-row-padding w3-section">
                    <div class="w3-col m2 s12 w3-padding"><b>Fecha:</b></div>
                    <div class="w3-col m3 s12">
                        <input type="text" class="w3-input w3-border" id="datepicker" value="<?php echo date("Y-m-d")?>">                        
                    </div>                    
                </div>
                <div class="w3-section w3-padding">
                    <div><b>Textarea:</b></div>
                    <textarea class="w3-block" rows="6"></textarea>
                </div>
                <div class="w3-section w3-padding">
                    <input type="button" class="w3-button w3-section w3-black w3-card w3-right" value="Aceptar">
                </div>
            </form>
        </div>
    </div>
    
    <br>
    
    <div class="w3-content w3-border w3-card-4">
        
        <div class="w3-padding w3-theme-dark"><b>Cargar imagen</b></div>
        <div class="w3-section w3-container">
            <form id="frm2" action="../exe/cargar_archivo_exe.php" method="post" enctype="multipart/form-data" class="w3-padding">
                <div>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="w3-button w3-block w3-border w3-light-grey w3-card-4">
                </div>
                <div class="w3-padding-16">
                    <table class="w3-right">
                        <tr>
                            <td>
                                <input type="button" class="w3-button w3-border w3-black w3-card" value="Cargar" ng-click="cargar_archivo()">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
    
</div>
<link rel="stylesheet" href="../css/foopicker.css">
<script src="../js/foopicker.js"></script>
<script>
var app = angular.module('Sistema', []);
app.controller('Ventana', function($scope,$http) {
    
    $http.get("../data/eventos.php").then(function (response) { $scope.arrEventos = response.data; });
    
    var foopicker = new FooPicker({
        id: 'datepicker'
    });

    
    $scope.cargar_archivo = function() {
        frm2.submit();
    };
    
    
});
</script>
<?php
$ventana->finalizar_ventana();