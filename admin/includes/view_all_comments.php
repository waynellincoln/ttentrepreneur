     
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
       <!-- Display Posts Code -->    
       <?php
            $query = "SELECT * 
                      FROM comments";

            $display_comments = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($display_comments)) {

                $comment_id                 = $row['comment_id'];
                $comment_author             = $row['comment_author'];
                $comment_email              = $row['comment_email'];
                $comment_content            = $row['comment_content'];
                $comment_status             = $row['comment_status'];
                $comment_post_id            = $row['comment_post_id'];
                $comment_date               = $row['comment_date'];


                echo "<tr>";
                   echo"<td>{$comment_id}</td>";
                   echo"<td>{$comment_author}</td>";
                
                //to display chosen category in the post table.
//                $query = "SELECT * 
//                          FROM categories
//                          WHERE cat_id = {$post_category_id}";
//                
//                $display_category_query = mysqli_query($con, $query);
//                
//                while ($row = mysqli_fetch_assoc($display_category_query)) {
//                    
//                    $cat_id     = $row['cat_id'];
//                    $cat_title  = $row['cat_title'];
//                    
//                    echo"<td>{$cat_title}</td>";
//                    
//                }
                
                   echo"<td>{$comment_email}</td>";
                   echo"<td>{$comment_content}</td>";
                   echo"<td>{$comment_status}</td>";
                   echo"<td>Some Title</td>"; 
                   echo"<td>{$comment_date}</td>";
                   echo"<td><a href='comments.php?source=edit_comment&edit='>Approve</a></td>"; 
                   echo"<td><a href='comments.php?source=edit_comment&edit='>Unapprove</a></td>";   
                   echo"<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                   
                   
                echo "</tr>";

              }

        ?>

    </tbody>
</table>

               
<?php

    if (isset($_GET['delete'])) {
        
        $delete_id  = $_GET['delete'];
        
        $query = "DELETE 
                  FROM comments 
                  WHERE comment_id = {$delete_id} ";
        
        $delete_comment_query = mysqli_query($con, $query);
        
        header("Location: comments.php");
        
    }







?>
                