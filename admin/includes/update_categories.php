      <div class="form-group">
            <label for="cat_title"> Edit Category</label>
            
      <!-- Editing Categories  Query-->   
      <?php

         if (isset($_GET['edit'])) {

             $edit_category_id = $_GET['edit'];

             $query = "SELECT *
                       FROM categories
                       WHERE cat_id = {$edit_category_id}";

             $edit_category = mysqli_query($con, $query);

             while ($row = mysqli_fetch_assoc($edit_category)) {

                 $cat_id    = $row['cat_id'];
                 $cat_title = $row['cat_title'];

     ?>

            <input value="<?php if(isset($cat_title)) echo $cat_title ; ?>" class="form-control" type="text" name="cat_title" >

        <?php             
             }

         }

     ?>   




      <!-- Updating Categories  Query (changing entries in the category record to something else)--> 
      <?php
           if (isset($_POST['update'])) {

              $cat_title     = $_POST['cat_title'];

              $query = "UPDATE categories
                        SET cat_title = '{$cat_title}'
                        WHERE cat_id = $cat_id";

              $update_query = mysqli_query($con, $query);

              header("Location: categories.php");

                if (!$update_query) {

                    die("QUERY FAILED" . mysqli_error($con));
                }
           } 

      ?>      


        </div>

        <div class="form-group"> 
            <input class="btn btn-primary" type="submit" name="update" value="Update Category"> 
        </div>