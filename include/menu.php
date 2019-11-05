<!-- Sidebar -->
<div class="w3-top">
    <div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5" id="mySidebar">
        <button class="w3-bar-item w3-button w3-theme" onclick="w3Sidebar.cerrar()">Cerrar &times;</button>
        <a href="inicio.php" class="w3-bar-item w3-button">Inicio</a>
        <a href="formulario.php" class="w3-bar-item w3-button">Formulario</a>
        <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
        <hr>
        <a href="logout.php" class="w3-bar-item w3-button">Salir</a>
    </div>

    <!-- Page Content -->
    <div class="w3-overlay w3-animate-opacity" onclick="w3Sidebar.cerrar()" style="cursor:pointer" id="myOverlay"></div>

    <!-- Menu horizontal pantallas pequeñas -->
    <div class="w3-theme w3-card-4 w3-hide-large w3-hide-medium">
        <button class="w3-button" onclick="w3Sidebar.abrir()">&#9776;</button>
        <span class="w3-padding"><?php echo $this->venNombre?></span>
    </div>    
    
    <!-- Menu horizontal pantallas grandes -->
    <div class="w3-card-4 w3-hide-small">
        <div class="w3-theme w3-padding"><?php echo $this->venNombre?></div>        
        <div class="w3-bar w3-theme-l1">
            <a href="inicio.php" class="w3-bar-item w3-button">Inicio</a>
            <div class="w3-dropdown-hover">
                <button class="w3-button">Ventanas</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="formulario.php" class="w3-bar-item w3-button">Formulario</a>
                    <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>                    
                </div>
            </div>
            <a href="logout.php" class="w3-bar-item w3-button w3-right">Salir</a>
        </div>
    </div>
    
</div>
<div class="w3-hide-large w3-hide-medium"><br><br></div>
<div class="w3-hide-small"><br><br><br><br></div>
<script src="../js/w3Sidebar.js"></script>