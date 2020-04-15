<?php 

    //database connection
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "ttentrepreneur";

    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno()){   
        echo "Failed to connect: " . mysqli_connect_errno();
    }
    
  
?>