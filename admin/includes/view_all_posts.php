     
<table class="table table-bordered table-hover">
    <thead>
        <tr>
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
                   echo"<td><a href='posts.php?source=edit_post&edit=$post_id'>Edit</a></td>"; 
                   echo"<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
                   
                   
                echo "</tr>";

              }

        ?>

    </tbody>
</table>

               
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
                