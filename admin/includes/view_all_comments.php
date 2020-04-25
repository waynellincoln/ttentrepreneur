     
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
                   echo"<td>{$comment_email}</td>";
                   echo"<td>{$comment_content}</td>";
                   echo"<td>{$comment_status}</td>";
                
                
                //to display chosen post title in the comment table.
                $query = "SELECT * 
                          FROM posts
                          WHERE post_id = {$comment_post_id}";
                
                $display_post_query = mysqli_query($con, $query);
                
                while ($row = mysqli_fetch_assoc($display_post_query)) {
                    
                    $post_id     = $row['post_id'];
                    $post_title  = $row['post_title'];
                    
                    echo"<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                    
                }
                
                   echo"<td>{$comment_date}</td>";
                   echo"<td><a href='comments.php?approve=$comment_id'>Approve</a></td>"; 
                   echo"<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";   
                   echo"<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                echo "</tr>";

              }

        ?>

    </tbody>
</table>
 
 

 <!-- Management of approvals --> <!-- Management of approvals --><!-- Management of approvals --> 
 
 <?php

    if (isset($_GET['unapprove'])) {
        
        $comment_id_to_unapprove  = $_GET['unapprove'];
        
        $query = "UPDATE comments
                  SET comment_status = 'Unapproved' 
                  WHERE comment_id = $comment_id_to_unapprove";
        
        $unapprove_comment_query = mysqli_query($con, $query);
        
        header("Location: comments.php");
        
    }

            

    if (isset($_GET['approve'])) {
        
        $comment_id_to_approve  = $_GET['approve'];
        
        $query = "UPDATE comments
                  SET comment_status = 'Approved' 
                  WHERE comment_id = $comment_id_to_approve";
        
        $approve_comment_query = mysqli_query($con, $query);
        
        header("Location: comments.php");
    }

?>                                      
                                        
                                                         
                                                                       
                                                                                     
 <!-- Delete Query --> <!-- Delete Query --><!-- Delete Query -->  <!-- Delete Query --> <!-- Delete Query --> 
                                                                                                               
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
               

                
               
               
               
               
               
               
               
                