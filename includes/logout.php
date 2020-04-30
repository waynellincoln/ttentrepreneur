
<?php session_start(); ?>
    
<?php

    //we shall cancel session for user every time they come to this page
    $_SESSION['username']   = null;
    $_SESSION['firstname']  = null;  
    $_SESSION['lastname']   = null;  
    $_SESSION['email']      = null; 
    $_SESSION['role']       = null;  
            
    header ("Location: ../index.php");

?>