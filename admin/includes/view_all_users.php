     
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th> 
            <th>Delete</th> 
        </tr>
    </thead>

    <tbody>
       <!-- Display users Code -->    
       <?php
            $query = "SELECT * 
                      FROM users";

            $display_users_from_database = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($display_users_from_database)) {

                $user_id                    = $row['user_id'];
                $username                   = $row['username'];
                $user_password              = $row['user_password'];
                $user_firstname             = $row['user_firstname'];
                $user_lastname              = $row['user_lastname'];
                $user_email                 = $row['user_email'];
                $user_role                  = $row['user_role'];
                $user_date                  = $row['user_date'];
                


                echo "<tr>";
                   echo"<td>{$user_id}</td>";
                   echo"<td>{$username}</td>";
                   echo"<td>{$user_firstname}</td>";
                   echo"<td>{$user_lastname}</td>";
                
                
//                //to display chosen post title in the comment table.
//                $query = "SELECT * 
//                          FROM posts
//                          WHERE post_id = {$comment_post_id}";
//                
//                $display_post_query = mysqli_query($con, $query);
//                
//                while ($row = mysqli_fetch_assoc($display_post_query)) {
//                    
//                    $post_id     = $row['post_id'];
//                    $post_title  = $row['post_title'];
//                    
//                    echo"<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
//                    
//                }
                
                   echo"<td>{$user_email}</td>";
                   echo"<td>{$user_role}</td>";
                   echo"<td>{$user_date}</td>";
                
//                   echo"<td><a href='comments.php?approve=$comment_id'>Approve</a></td>"; 
//                   echo"<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";   
                   echo"<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                echo "</tr>";

              }

        ?>

    </tbody>
</table>
 
 

 <!-- Management of approvals --> <!-- Management of approvals --><!-- Management of approvals --> 
 
<!--
 <?php

//    if (isset($_GET['unapprove'])) {
//        
//        $comment_id_to_unapprove  = $_GET['unapprove'];
//        
//        $query = "UPDATE comments
//                  SET comment_status = 'Unapproved' 
//                  WHERE comment_id = $comment_id_to_unapprove";
//        
//        $unapprove_comment_query = mysqli_query($con, $query);
//        
//        header("Location: comments.php");
        
//    }

            

//    if (isset($_GET['approve'])) {
//        
//        $comment_id_to_approve  = $_GET['approve'];
//        
//        $query = "UPDATE comments
//                  SET comment_status = 'Approved' 
//                  WHERE comment_id = $comment_id_to_approve";
//        
//        $approve_comment_query = mysqli_query($con, $query);
//        
//        header("Location: comments.php");
//    }

?>                                      
-->
                                        
                                                         
                                                                       
                                                                                     
 <!-- Delete Query --> <!-- Delete Query --><!-- Delete Query -->  <!-- Delete Query --> <!-- Delete Query --> 
                                                                                                               

<?php

    if (isset($_GET['delete'])) {
        
        $delete_user_id  = $_GET['delete'];
        
        $query = "DELETE 
                  FROM users 
                  WHERE user_id = {$delete_user_id} ";
        
        $delete_user_query = mysqli_query($con, $query);
        
        header("Location: users.php");
        
    }

?>

               

                
               
               
               
               
               
               
               
                