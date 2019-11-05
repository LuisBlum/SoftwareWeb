<?php
include '../class/Sistema.php';
include '../class/Ventana.php';

$ventana=new Ventana();
$ventana->validar_sesion();
$ventana->venNombre="Ventana dashboard";

/* OBTENER DATA */
$arrEventos=include '../data/eventos.php';
/**/

$ventana->iniciar_ventana();
$ventana->incluir_menu();
?>
<div class="w3-section">
    
    <div class="w3-section">
        
        <div class="w3-row-padding">
            <div class="w3-quarter w3-margin-top">
                <input type="text" class="w3-input w3-border" ng-model="filtro" placeholder="Filtrar...">
                <div style="height:300px;overflow:scroll">
                    <table class="w3-table-all w3-hoverable">
                        <tr class="w3-theme-dark">
                            <th class="w3-button" ng-click="ordenarPor('id')">ID</th>                
                            <th class="w3-button" ng-click="ordenarPor('nombre')">Nombre</th>
                            <th></th>
                        </tr>
                        <tr ng-repeat="evento in arrEventos | filter:filtro | orderBy:ordenadoPor">
                            <td>{{evento.id}}</td>
                            <td>{{evento.nombre}}</td>
                            <td><a href="" ng-click="ver(evento.nombre)">Ver</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="w3-threequarter w3-margin-top">
                <input type="text" class="w3-input w3-border" ng-model="filtro2" placeholder="Filtrar...">
                <div style="height:300px;overflow:scroll">
                    <table class="w3-table-all w3-hoverable">
                        <tr class="w3-theme-dark">
                            <th class="w3-button" ng-click="ordenarPor('id')">ID</th>                
                            <th class="w3-button" ng-click="ordenarPor('nombre')">Nombre</th>
                        </tr>
                        <tr ng-repeat="evento in arrEventos | filter:filtro2 | orderBy:ordenadoPor">
                            <td>{{evento.id}}</td>
                            <td>{{evento.nombre}}</td>
                        </tr>
                    </table>
                </div>                
            </div>            
        </div>
    </div>

    <div class="w3-section w3-container">
        <div id="grdEventos" class="ag-theme-balham" style="height:250px;"></div>        
    </div>
        
    <div class="w3-section"><!-- Graficos -->
        <div class="w3-row-padding">
            <div class="w3-third w3-margin-top">
                <canvas id="myChart" class="w3-block w3-border w3-card-4"></canvas>
            </div>
            <div class="w3-third w3-margin-top">
                <canvas id="myChart2" class="w3-block w3-border w3-card-4"></canvas>
            </div>
            <div class="w3-third w3-margin-top">
                <canvas id="myChart3" class="w3-block w3-border w3-card-4"></canvas>
            </div>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half w3-margin-top">
                <canvas id="myChart4" class="w3-block w3-border w3-card-4"></canvas>
            </div>        
            <div class="w3-half w3-margin-top">
                <canvas id="myChart5" class="w3-block w3-border w3-card-4"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="../js/ag-grid-community.min.js"></script>
<script src="../js/Chart.min.js"></script>
<script>
var dashboard={
    
    generar_grid1:function(data){
        var gridDiv = document.querySelector('#grdEventos');
        var columnDefs = [
            {headerName: "ID", field: "id"},
            {headerName: "Nombre", field: "nombre"},
            {headerName: "Fecha", field: "fecha"}
        ];
        var gridOptions = {
            debug: true,
            columnDefs: columnDefs,
            rowData: data,
            rowSelection: 'multiple',
            enableColResize: true,
            enableSorting: true,
            animateRows: true,
            rowHeight: 25,
            enableFilter: true
        };
        new agGrid.Grid(gridDiv, gridOptions);
    },
    
    mostrar_grafico1:function(){
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['LBL01', 'LBL02', 'LBL03', 'LBL04', 'LBL05', 'LBL06'],
                datasets: [{label: 'Labels',data: [12,19,3,5,2,3],borderWidth: 1}]
            },
            options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}
        });        
    },
    
    mostrar_grafico2:function(){
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['LBL01', 'LBL02', 'LBL03', 'LBL04', 'LBL05', 'LBL06'],
                datasets: [{label: 'Labels',data: [3,5,2,12,19,3],borderWidth: 1}]
            },
            options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}
        });        
    },
    
    mostrar_grafico3:function(){
        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [
                    {label: 'Barras',data: [10, 20, 30, 40]}, 
                    {label: 'Líneas',data: [25, 5, 17, 23],type: 'line',fill:false}
                ],
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril']
            },
            options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}
        });        
    },
    
    mostrar_grafico4:function(){
        var ctx = document.getElementById('myChart4').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['UNO', 'DOS', 'TRES'],
                datasets: [{data: [40,25,35],backgroundColor:['rgba(200, 0, 0)','rgba(0, 200, 0)','rgba(0, 0, 200)']}]
            },
            options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}
        });       
    },
    
    mostrar_grafico5:function(){
        var ctx = document.getElementById('myChart5').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['UNO', 'DOS', 'TRES'],
                datasets: [{data: [40,25,35],backgroundColor:['rgba(200, 0, 0, 0.2)','rgba(0, 200, 0, 0.2)','rgba(0, 0, 200, 0.2)']}]
            },
            options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}
        });       
    }
};




</script>
<script>
var app = angular.module('Sistema', []);
app.controller('Ventana', function($scope) {
    
    $scope.arrEventos=<?php $ventana->mostrar_arrJS($arrEventos)?>;        
    
    $scope.ordenarPor = function(x) {
        $scope.ordenadoPor = x;
    };
    
    $scope.ver=function(id){
        $scope.filtro2=id;
    };
    
    dashboard.generar_grid1($scope.arrEventos);
    
    dashboard.mostrar_grafico1();    
    dashboard.mostrar_grafico2();
    dashboard.mostrar_grafico3();
    dashboard.mostrar_grafico4();
    dashboard.mostrar_grafico5();
    
});
</script>
<?php
$ventana->finalizar_ventana();