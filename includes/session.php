<?php
    $root = $_SERVER['DOCUMENT_ROOT']; //sets root relative to current file
    include($root.'/includes/connect.php'); //conects to database to check ids

    //Create Session using built in php function
    session_start();
    $_SESSION['expire_time'] = 60*60; //time to expire, in seconds (1 hour)

    //checks user
    if(isset($_SESSION['id']))//if loggedin
    {
        $id = $_SESSION['id'];
    }
    else
    {
        $id='';
    }

    //Check user exisits
    $check = mysqli_query($conn, "SELECT * FROM accounts WHERE id='$id'");
    $count2 = mysqli_num_rows($check);
    if(!$count2 == 1){ //if there isn't one result will ask to re-login (e.g. if doesn't exist)
        header("location: /account/login/");//CHANGE
    };

    if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //checks sesion hasn't expired
        //redirect to logout
        header("location: /account/logout/");
    } else{ //if hasn't expired:
        $_SESSION['last_activity'] = time(); //sets last activity to now
    }
?>
