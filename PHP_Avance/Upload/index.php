<?php
require_once 'upload.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <!-- maximum-scale=1.0 is now deprecated -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <title>Upload</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <section>
        <?php
        if (isset($errors)) {
            foreach ($errors as $error){
                ?>
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="alert">
                            <?= $error ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="row mt-5">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Sélectionnez l'image à télécharger</label>
                    <input id='upload' name="upload[]" type="file" multiple="multiple" class="form-control-file">
                    <div class="mt-3">
                        <input type="submit" value="Envoyer" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section>
        <p>Liste des images</p>
        <div class="row">
            <?php foreach ($images as $image) {
                if ($image != "." && $image != "..") {
                    ?>
                    <div class="col-4">
                        <div class="card mx-2 my-2">
                            <img src="photo/<?= $image ?>" alt="image" class="card-img-top rounded mx-auto img-thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?= $image ?></h5>
                                <a href="index.php?delete=<?= $image ?>"><button>Supprimer</button></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </section>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>
</html>