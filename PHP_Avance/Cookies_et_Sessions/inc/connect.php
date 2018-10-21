<?php
if (!empty($_POST)){
    session_start();
    $_SESSION['username'] = $_POST['loginname'];
    header('Location: ../index.php');
}