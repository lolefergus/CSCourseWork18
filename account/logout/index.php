<?php
$root = $_SERVER['DOCUMENT_ROOT'];
    //wipes session details, and loggsout user
    session_start();
    session_unset();
    session_destroy();
    header("location:/account/login/");
    exit();
?>
