<?php

$target_dir = "photo/";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    if (count($_FILES['fileToUpload']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
            $target_file = $target_dir . "image_" . basename($_FILES["fileToUpload"]["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $uploadOk[$i] = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
            if ($check !== false) {
                $uploadOk[$i] = 1;
            } else {
                echo "File is not an image.";
                $uploadOk[$i] = 0;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk[$i] = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk[$i] = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk[$i] = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk[$i] == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to photo file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"][$i]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}

if (isset($_GET)) {
    $suppr = $_GET['id'];
    delete($suppr);
}
function delete($file) {
    unlink($file);
}
$dir = 'photo/*.{jpg,jpeg,gif,png}';
$files = glob($dir,GLOB_BRACE);
$i = 0;

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
<section>
    <div class="container">
        <div class="row mt-5">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Select image to upload</label>
                    <input id='fileToUpload' name="fileToUpload[]" type="file" multiple="multiple" class="form-control-file">
                    <div class="mt-3">
                        <input type="submit" value="Upload" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <p>Listing des images du repertoire miniatures</p>
        <div class="row">

            <?php
            foreach($files as $image)
            {
                $i++;
                $f= str_replace($dir,'',$image);
                ?>
                <div class="col-4">
                    <div class="card mx-auto my-auto">
                        <img class="card-img-top rounded mx-auto d-block img-thumbnail" src="<?php echo $f ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $target_file ?></h5>
                            <a href="?id=<?php echo $f ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                        </div>
                    </div>
                </div>
                <?php
            } ?>

        </div>
    </div>
</section>

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