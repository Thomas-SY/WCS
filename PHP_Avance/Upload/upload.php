<?php

if (!empty($_GET['delete'])){
    if(file_exists('photo/' . $_GET['delete'])){
        echo unlink('photo/' . $_GET['delete']);
    }
}

if (isset($_FILES) && !empty($_FILES)) {
    $nbfile = count($_FILES['upload']['name']);
    for ($i=0; $i<$nbfile; $i++){
        controlfile($_FILES['upload'],$i);
        recordfile($_FILES['upload'],$i);
    }
}

$images = allfiles();

function controlfile($file, $i){
    $error = [];
    $filetype = mime_content_type($file['tmp_name'][$i]);
    if ($filetype != "image/png" && $filetype != "image/jpeg" && $filetype != "image/gif")
        $error[] = "Seuls les fichiers images sont autorisés";
    if (filesize($file['tmp_name'][$i]) > 1048576)
        $error[] = "la taille de l'image est supérieur à 1Mo. Veuillez la réduire et réessayer.";
    return $error;
}
function recordfile($file, $i) {
    $uploadDir = 'photo/';
    $uploadExt = new SplFileInfo($file['name'][$i]);
    $uploadExt = $uploadExt->getExtension();
    $uploadFile = $uploadDir . uniqid('image') . "." . $uploadExt;
    return move_uploaded_file($file['tmp_name'][$i], $uploadFile);
}

function allfiles(){
    return scandir('photo');
}