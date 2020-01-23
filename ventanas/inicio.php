<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$ventana->validar_sesion();
$ventana->venNombre="Ventana inicio";
$ventana->iniciar_ventana();
$ventana->incluir_menu();
?>
<div class="w3-section">
    <div class="w3-container" style="overflow:auto">
        <input type="text" class="w3-input w3-border" ng-model="filtro" placeholder="Filtrar...">
        <table class="w3-table-all w3-hoverable">
            <tr class="w3-theme-dark">
                <th class="w3-button" ng-click="ordenarPor('id')">ID</th>                
                <th class="w3-button" ng-click="ordenarPor('nombre')">Nombre</th>
                <th class="w3-button" ng-click="ordenarPor('fecha')">Fecha</th>
            </tr>
            <tr ng-repeat="evento in arrEventos | filter:filtro | orderBy:ordenadoPor">
                <td>{{evento.id}}</td>
                <td>{{evento.nombre}}</td>
                <td>{{evento.fecha}}</td>
            </tr>
        </table>        
    </div>    
</div>


<div class="w3-section w3-container">
    <!-- Tabs -->
    <div class="w3-theme-dark w3-padding w3-border"><b>Pestañas</b></div>
    <div class="w3-bar w3-theme-light w3-border">
        <button id="btnPest1" class="w3-bar-item w3-button grpBotones" onclick="w3Tabs.abrir('grpTabs','pest1','grpBotones',this.id)">Pestaña 1</button>
        <button id="btnPest2" class="w3-bar-item w3-button grpBotones" onclick="w3Tabs.abrir('grpTabs','pest2','grpBotones',this.id)">Pestaña 2</button>
        <button id="btnPest3" class="w3-bar-item w3-button grpBotones" onclick="w3Tabs.abrir('grpTabs','pest3','grpBotones',this.id)">Pestaña 3</button>
    </div>            
    <div id="pest1" class="w3-container w3-border w3-animate-opacity grpTabs">
        <h2>Pestaña 1</h2>
        <p>Este es el contenido de la pestaña 1.</p>
    </div>
    <div id="pest2" class="w3-container w3-border w3-animate-opacity grpTabs">
        <h2>Pestaña 2</h2>
        <p class="w3-xxlarge">Contenido de la pestaña 2.</p>                 
    </div>
    <div id="pest3" class="w3-container w3-border w3-animate-opacity grpTabs">
        <h2>Pestaña 3</h2>
        <p>Contenido de la pestaña 3.</p>
    </div>           
    <!-- -->
</div>

<div class="w3-section w3-container">
    <!-- Acordeon -->
    <div class="w3-theme-dark w3-padding w3-border"><b>Acordeón</b></div>
    <div class="w3-button w3-block w3-theme-l2" onclick="w3Accordion.abrir('acor1')">Acordeón 1</div>
    <div id="acor1" class="w3-container w3-border" style="display:none">
        <h2>Acordeón 1</h2>
        <p>Este es el contenido de la Acordeón 1.</p>
    </div>
    <div class="w3-button w3-block w3-theme-l2" onclick="w3Accordion.abrir('acor2')">Acordeón 2</div>
    <div id="acor2" class="w3-container w3-border" style="display:none">
        <h2>Acordeón 2</h2>
        <p class="w3-xxlarge">Contenido de la Acordeón 2.</p>                 
    </div>
    <div class="w3-button w3-block w3-theme-l2" onclick="w3Accordion.abrir('acor3')">Acordeón 3</div>
    <div id="acor3" class="w3-container w3-border" style="display:none">
        <h2>Acordeón 3</h2>
        <p>Contenido de la Acordeón 3.</p>
    </div>           
    <!-- -->
</div>

<div id="w3Modal" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-bar w3-black">
            <button class="w3-button w3-theme-l2 w3-right" onclick="document.getElementById('w3Modal').style.display='none'">&times;</button>
        </div>
        <div class="w3-section w3-container w3-center">            
            <h1>{{msjModal}}</h1>
        </div>
    </div>
</div>
<div class="w3-section w3-container">
    <div class="w3-theme-dark w3-padding w3-border"><b>Modal</b></div>
    <div class="w3-container w3-padding-16 w3-border">
        <div class="w3-row">
            <div class="w3-col s4">
                <input type="text" class="w3-input w3-border" ng-model="msjModal">
            </div>
            <div class="w3-rest">
                <input type="button" class="w3-button w3-theme-l2" value="Mostrar" onclick="document.getElementById('w3Modal').style.display='block'">
            </div>
        </div>
    </div>
    
    
    
</div>


<script src="../js/w3Tabs.js"></script>
<script src="../js/w3Accordion.js"></script>
<script>
var app = angular.module('Sistema', []);
app.controller('Ventana', function($scope,$http) {
    
    $http.get("../data/eventos.php").then(function (response) { $scope.arrEventos = response.data; });
    
    $scope.ordenarPor = function(x) {
        $scope.ordenadoPor = x;
    };
    
    w3Tabs.abrir('grpTabs','pest1','grpBotones','btnPest1');
    
});
</script>
<?php
$ventana->finalizar_ventana();