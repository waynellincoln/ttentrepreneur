<?php

function insert_category_into_database () {

      global $con;

      if (isset($_POST['submit'])){

           $cat_title = $_POST['cat_title'];

           if ($cat_title == " " || empty($cat_title)) {

              echo "<h4>This field can't be empty</h4>";

           } else {     //if user was there before

               $query = "INSERT INTO categories (cat_title)
                         VALUES('{$cat_title}')";

               $insert_category_query = mysqli_query($con, $query);

               if (!$insert_category_query) {

                   die ('QUERY FAILED' . mysqli_error($con));
               }

           }

    }
}

//===========================================================================================\\

function find_and_display_all_categories () {
    
    global $con;
    
    $query = "SELECT * 
              FROM categories";
                                  
    $display_categories = mysqli_query($con, $query);

     while ($row = mysqli_fetch_assoc($display_categories)) {

        $cat_id         = $row['cat_id'];
        $cat_title      = $row['cat_title'];

        echo "<tr>";    
           echo "<td>{$cat_id}</td>";
           echo "<td>{$cat_title}</td>";
           echo "<td><a href='categories.php?delete=$cat_id'>Delete<a/></td>"; 
           echo "<td><a href='categories.php?edit=$cat_id'>Edit<a/></td>"; 
         echo "</tr>";

     }
}

//===========================================================================================\\

function delete_categories () {
    
    global $con;
    
   if (isset($_GET['delete'])) {

        $delete_cat = $_GET['delete'];

   $query = "DELETE FROM categories
              WHERE cat_id = {$delete_cat}"; 

   $delete_category_query = mysqli_query($con, $query);

   header("Location: categories.php");

  }
}

//===========================================================================================\\
    
 function users_online() {
     
     if(isset($_GET['onlineusers'])){
     
        global $con;
         
        if(!$con) {
            
            session_start();
            
            include("../includes/db.php");
            
             //the function holds the value of the session
            $session = session_id();        //every time a new user logs on, a session id will be assigned. the function is built in

            $time    = time();

            $time_out_in_seconds = 60;       //amount of time before user declared offline     

            $time_out = $time - $time_out_in_seconds;    

            $query = "SELECT *
                      FROM users_online
                      WHERE session = '$session' ";

            $session_online_query = mysqli_query($con, $query);

            $count_users_online = mysqli_num_rows($session_online_query);

            if($count_users_online == NULL) {       //if new users just logged in and if there is no one logged in 

                mysqli_query($con, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
            }

                mysqli_query($con, "UPDATE users_online SET time = '$time' WHERE session = '$session')");


            $query = "SELECT * 
                      FROM users_online
                      WHERE time > '$time_out' "; 

            $users_online_query = mysqli_query($con, $query);

            echo $count_user = mysqli_num_rows($users_online_query);  
            
        }    
         

    } //get request ends     
     
 }   
users_online();




    
 //===========================================================================================\\   
     
     
?>