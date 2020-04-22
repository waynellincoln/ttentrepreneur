<?php
    //query to display posts to be edited
    if (isset($_GET['edit'])) {
        
        $edit_post_id = $_GET['edit'];
        
        $query = "SELECT *
                  FROM posts
                  WHERE post_id = $edit_post_id "; 
                  
        
        $display_post_to_edit = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($display_post_to_edit)) {
            
            $post_title                 = $row['post_title'];
            $post_category_id           = $row['post_category_id'];
            $post_author                = $row['post_author'];
            $post_status                = $row['post_status'];
            $post_image                 = $row['post_image'];
            $post_tags                  = $row['post_tags'];
            $post_content               = $row['post_content'];
            $post_date                  = $row['post_date'];
            $post_comment_count         = $row['post_comment_count'];
        
        }
    }


    //query to update post
    if (isset($_POST['update_post'])) {
        
        $post_title                 = $_POST['post_title'];
        $post_category_id           = $_POST['post_category']; //sending in category id but displaying category title
        $post_author                = $_POST['post_author'];
        $post_status                = $_POST['post_status'];
        
        $post_image                 = $_FILES['post_image']['name'];
        $post_image_temp            = $_FILES['post_image']['tmp_name'];
        
        $post_tags                  = $_POST['post_tags'];
        $post_content               = $_POST['post_content'];
        $post_date                  = date('d-m-y');
        $post_comment_count         = $_POST['post_comment_count'];
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
                    $query = "UPDATE posts 
                              SET post_title          = '{$post_title}',
                                  post_category_id    = '{$post_category_id}',
                                  post_author         = '{$post_author}',
                                  post_status         = '{$post_status}',
                                  post_image          = '{$post_image}',
                                  post_tags           = '{$post_tags}',
                                  post_content        = '{$post_content}',
                                  post_date           = '{$post_date}',
                                  post_comment_count  = '{$post_comment_count}'
                                
                              
                              WHERE post_id = {$edit_post_id}";
         
                    $update_post_query = mysqli_query($con, $query);
                    
                        if (!$update_post_query) {

                            die("QUERY FAILED " . mysqli_error($con));
                        }
        
                    //code to manage image display
                    if (empty($post_image)) {
                        
                        $query = "SELECT *
                                  FROM posts
                                  WHERE post_id = $edit_post_id";
                        
                        $select_image  = mysqli_query($con, $query);
                        
                        while ($row = mysqli_fetch_array($select_image)) {
                            
                            $post_image = $row['post_image'];
                        }
                    }
 
    }

    
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input class="form-control" type="text" name="post_title" value="<?php echo $post_title; ?>">
    </div>
    
    <div class="form-group">
        <select name="post_category" id="post_category_id">      <!--Sending in post_category ....-->
            <?php
            
                $query = "SELECT *
                          FROM categories";
            
                $post_category_list_query = mysqli_query($con, $query);
            
                while ($row = mysqli_fetch_assoc($post_category_list_query)) {
                    
                    $cat_id         = $row['cat_id'];
                    $cat_title      = $row['cat_title'];
                        
                echo "<option value='$cat_id'>$cat_title</option>";   //but displaying the category name
                    
                }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_author">Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
    </div>
    
    <div class="form-group">
        <input class="form-control" type="file" name="post_image">
        <img src="../images/<?php echo $post_image;?>" width="100" alt="">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>" >
    </div>
    
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content; ?>
        </textarea>
    </div>
    
    <div class="form-group">
        <label for="post_comment_count">Comment Count</label>
        <input type="number" class="form-control" name="post_comment_count" value="<?php echo $post_comment_count; ?>">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
    
</form>