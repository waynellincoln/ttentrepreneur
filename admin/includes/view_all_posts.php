<?php
    //we are sending in the values that have been checked when we click apply
    if (isset($_POST['checkBoxArray'])) {
        
        foreach($_POST['checkBoxArray'] as $post_id_checked) {    //sending in the id of each box checked
            
            $bulk_options = $_POST['bulk_options']; //we are sending in the options here - published, draft, delete
            
            switch($bulk_options) {
                case 'published':
                    
                    $query = "UPDATE posts
                              SET post_status = '{$bulk_options}'
                              WHERE post_id = {$post_id_checked} " ;
                    
                    $update_by_bulk_to_published = mysqli_query($con, $query);
                    
                 break;    
                    
                 case 'draft':
                    
                    $query = "UPDATE posts
                              SET post_status = '{$bulk_options}'
                              WHERE post_id = {$post_id_checked} " ;
                    
                    $update_by_bulk_to_draft = mysqli_query($con, $query);
                    
                 break;      
                
                 case 'delete':
                    
                    $query = "DELETE
                              FROM posts
                              WHERE post_id = {$post_id_checked} " ;
                    
                    $delete_by_bulk = mysqli_query($con, $query);
                    
                break;        
                    
            }
            
        }
    }

?>


<!--Table Wrapped in a form to help with bulk options-->
 <form action="" method="post"> 
  
<table class="table table-bordered table-hover">
   
   <div id="bulkOptionContainer" class="col-xs-4">
       <select class="form-control" name="bulk_options" id="">
           <option value="">Select Options</option>  
           <option value="published">Publish</option>  
           <option value="draft">Draft</option>  
           <option value="delete">Delete</option>    
       </select>
   </div>
   
   <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-success" value="Apply">
       <a class="btn btn-primary" href="./posts.php?source=add_post">Add New</a>
   </div>
   
   
   
    <thead>
        <tr><!--selectAllBoxes click on it to make all check boxes true or selected - managed by javascript code-->
            <th><input id="selectAllBoxes" type="checkbox"></th> <!--to add checkbox on header row-->
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
       <!-- Display Posts Code -->    
       <?php
            $query = "SELECT * 
                      FROM posts";

            $display_posts = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($display_posts)) {

                $post_id                = $row['post_id'];
                $post_title             = $row['post_title'];
                $post_author            = $row['post_author'];
                $post_category_id       = $row['post_category_id'];
                $post_status            = $row['post_status'];
                $post_image             = $row['post_image'];
                $post_content           = $row['post_content'];
                $post_tags              = $row['post_tags'];
                $post_comment_count     = $row['post_comment_count'];
                $post_date              = $row['post_date'];


                echo "<tr>";
                
                ?>
                  <!--to add checkbox on 1st column-->   <!--Array also added to collect info each time we click a check box--> <!--We send post ids to the array-->
        <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
                  
                <?php
                   
                   echo"<td>{$post_id}</td>";
                   echo"<td>{$post_title}</td>";
                   echo"<td>{$post_author}</td>";
                
                
                //to display chosen category in the post table.
                $query = "SELECT * 
                          FROM categories
                          WHERE cat_id = {$post_category_id}";
                
                $display_category_query = mysqli_query($con, $query);
                
                while ($row = mysqli_fetch_assoc($display_category_query)) {
                    
                    $cat_id     = $row['cat_id'];
                    $cat_title  = $row['cat_title'];
                    
                    echo"<td>{$cat_title}</td>";
                    
                }
                
                 
                   echo"<td>{$post_status}</td>";
                   echo"<td><img width='100' src='../images/$post_image'></td>";
                   echo"<td>{$post_content}</td>";
                   echo"<td>{$post_tags}</td>";
                   echo"<td>{$post_comment_count}</td>";
                   echo"<td>{$post_date}</td>";
                   echo"<td><a href='../post.php?p_id=$post_id'>View</a></td>"; 
                   echo"<td><a href='posts.php?source=edit_post&edit=$post_id'>Edit</a></td>"; 
                   echo"<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
                   
                   
                echo "</tr>";

              }

        ?>

    </tbody>
</table>
</form> 
               
<?php

    if (isset($_GET['delete'])) {
        
        $delete_id  = $_GET['delete'];
        
        $query = "DELETE 
                  FROM posts 
                  WHERE post_id = {$delete_id} ";
        
        $delete_post_query = mysqli_query($con, $query);
        
        header("Location: posts.php");
        
    }







?>
                