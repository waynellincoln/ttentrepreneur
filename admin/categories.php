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
                    <?php insert_category_into_database (); ?>
                         
                    
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
                        
                        // include - update form loads only when edit button clicked
                        include("includes/update_categories.php");
                    }
                 
                 ?>
   
             </form>
                  
                 </div>  
                   
                 <!-- Create Table Using 1/2 page to display data from database--> 
                  <div class="col-xs-6">
                    
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
                        <!-- Query to Display Categories in table -->      
                    
                          
                        <?php find_and_display_all_categories(); ?> 
                    
                         </tbody>
                     </table>
                  </div> 
                      
                      
                  <!-- Delete Query to Remove Categories -->
                  <?php delete_categories (); ?>
                  
    
                 </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/footer.php"; ?>