<?php
include('inc/head.php');

// POST des Modifications du fichier
if (isset($_POST["content"]) || isset($_POST["file"])) {
    $fichier = $_POST["file"];
    $file = fopen($fichier, "w");
    fwrite ($file, $_POST["content"]);
    fclose ($file);
}

// POST de Suppresssion du fichier
if (isset($_POST["rm"])){
    if (is_dir($_POST["rm"]))
        rrmdir($_POST["rm"]);
    else
        unlink ($_POST["rm"]);
}

// Function de Suppresssion
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object);
                else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

// Function d'Affichage du dossier "Files"
function affichageListe($source = "./files")
{
    $dir = scandir($source);
    foreach ($dir as $file) {
        $info = new SplFileInfo($file);
        if ($info->getExtension()=="html" || $info->getExtension()=="txt") {
            echo '<div style="float:left; margin:0 10px; text-align:center;"><a href="?f=' . $source . "/" . $file . '"><img src="/assets/images/FBI-LOGO2.png" width="60"/><br>';
            echo $file;
            echo '</a><br>';?>
            <form method="POST" action="index.php">
            <input type="hidden" name="rm" value="<?php echo $source . "/" . $file;?>">
            <input type="submit" value="Supprimer">
            </form></div><?php
        } elseif ($info->getExtension()!="jpg" && $file!= "." && $file != "..") {
            echo '<div style="float:left; margin:0 10px; text-align:center;"><a href="?d=' . $source . "/" . $file . '"><img src="/assets/images/dossier.png" width="60"/><br>';
            echo $file;
            echo '</a><br>';?>
            <form method="POST" action="index.php">
            <input type="hidden" name="rm" value="<?php echo $source . "/" . $file;?>">
            <input type="submit" value="Supprimer*">
            </form></div><?php
        }
    }
}

?>

<p>* Merci de supprimer le ou les sous-dossier(s) avant de supprimer le dossier source.</p>

<?php
// Affichage du dossier "Files"
if (isset($_GET["d"]))
    affichageListe($_GET["d"]);
else
    affichageListe();

?>
<br>
<?php

// Affichage du contenu d'un fichier
if(isset($_GET["f"])) {
    $files = $_GET["f"];
    $file = basename($files, '.php');
    echo "<h3>{$file}</h3>";
    $content = file_get_contents($files);
    ?>
    <form action="/" method="POST">
        <div class="row">
            <br>
            <label for="content"></label>
            <textarea name="content" style="width: 100%;" rows="20"><?= $content; ?></textarea>
        </div>
        <div class="row">
            <input type="hidden" name="file" value="<?php echo $_GET["f"]; ?>">
            <input type="submit" style="width: 100%;" value="Enregistrer les modifications">
        </div>
    </form>
    <?php
}
?>

<?php include('inc/foot.php'); ?>