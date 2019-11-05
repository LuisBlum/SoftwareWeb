<?php
$target_dir = "../archivos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$msjError="";
$msjOk="";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msjError="El archivo no es una imagen.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $msjError="<br>Error: el archivo ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msjError="<br>Error: La imagen excede el límite de tamaño.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msjError="<br>Error: Solo son permitidas imágenes JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msjError="<br>Error: La imagen no pudo ser guardada.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msjOk="<br>La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha sido guardada.";
    } else {
        $msjError="<br>Error: La imagen no pudo ser almacenada.";
    }
}