<?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
  <?php include "includes/navigation.php";?>

       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ttEntrepreneur Admin
                            <small>Subheading</small>
                        </h1>
                        
                <!-- Main Content Area Starts -->         
                
                 <!-- Create Form Using 1/2 page to enter data in database-->       
                 <div class="col-xs-6">
                    
                    <!-- Inserting Categories into Database -->
                    <?php
                            
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
                         
                    ?>
                    
                    <!-- Form for Adding Category -->
                     <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title"> 
                        </div>
                        
                        <div class="form-group"> 
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category"> 
                        </div>
                     </form>
                     
                     
                     
                     <!-- Form for Editing Category - send in an include - update form loads only when edit clicked-->
             <form action="" method="post">
             
                 <?php
                    
                    if (isset($_GET['edit'])) {
                        
                        include("includes/update_categories.php");
                    }
                 
                 ?>
   
             </form>
                     
                     
                  
                     
                     
                 </div>  
                      
                      
                       
                 <!-- Create Table Using 1/2 page to display data from database--> 
                  <div class="col-xs-6">
                    <!-- Query to Display Categories in table -->   
                    <?php
                        $query = "SELECT * 
                                  FROM categories";
                                  
                        $display_categories = mysqli_query($con, $query);
                                       
                     ?>  
                    
                 <table class="table table-bordered table-hover">
                     <thead>
                         <tr>
                             <th>ID</th>
                             <th>Category</th>    
                             <th>Delete</th>    
                             <th>Edit</th>    
                         </tr>
                     </thead>
                         
                      <tbody>
                             
                          <?php
                         
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
                             
                          ?>      
                    
                         </tbody>
                     </table>
                  </div> 
                      
                  <!-- Delete Query to Remove Categories -->
                  <?php
                      
                        if (isset($_GET['delete'])) {
                        
                            $delete_cat = $_GET['delete'];
                            
                        $query = "DELETE FROM categories
                                  WHERE cat_id = {$delete_cat}"; 
                        
                        $delete_category_query = mysqli_query($con, $query);
                            
                        header("Location: categories.php");
                            
                      }
                      
                  ?> 
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/footer.php"; ?>