<?php include ("db.php"); ?>

<?php session_start(); ?>
    
<?php

    if (isset($_POST['login'])) {
        
        $username       = $_POST['username'];
        $user_password  = $_POST['user_password'];
    
        
        $username       = mysqli_escape_string($con, $username);
        $user_password  = mysqli_escape_string($con, $user_password);
        
        $query = "SELECT *
                  FROM users
                  WHERE username = '{$username}'";
        
        $login_user_query = mysqli_query($con, $query);
        
        if (!$login_user_query) {
            
            die ("Query Failed " . mysqli_error($con));
            
        }
        
        while ($row = mysqli_fetch_array($login_user_query)) {
            
            $db_user_id             = $row['user_id'];
            $db_username            = $row['username'];
            $db_user_password       = $row['user_password'];
            $db_user_firstname      = $row['user_firstname'];
            $db_user_lastname       = $row['user_lastname'];
            $db_user_email          = $row['user_email'];
            $db_user_image          = $row['user_image'];
            $db_user_role           = $row['user_role'];
            $db_user_date           = $row['user_date'];
        }
        
            //to turn password back to a non-encrypted password
//            $user_password = crypt($user_password, $db_user_password);
        
        //validation starts here    //validation starts here    //validation starts here
        //is username being typed by user the same as the one in the database
        if (password_verify($user_password, $db_user_password)) {
            
            //setting session here
            $_SESSION['username']   = $db_username;    //username from database is assigned a session called username
            $_SESSION['firstname']  = $db_user_firstname;  
            $_SESSION['lastname']   = $db_user_lastname;  
            $_SESSION['email']      = $db_user_email;  
            $_SESSION['role']       = $db_user_role;  
            
            header ("Location: ../admin"); 
            
        } else {
            
             header ("Location: ../index.php");
        }
        
         
        
    }











?>