<?php

function insert_category_into_database () {

      global $con;

      if (isset($_POST['submit'])){

           $cat_title = $_POST['cat_title'];

           if ($cat_title == " " || empty($cat_title)) {

              echo "<h4>This field can't be empty</h4>";

           } else {

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
    
    
    
    
    
?>