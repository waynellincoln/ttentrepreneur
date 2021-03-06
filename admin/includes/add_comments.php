<?php
    
    //query to add posts to the database
    if (isset($_POST['create_post'])) {
        
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
        
        
        //function for the images
        //file is first uploaded to temp location; it is nowbeing moved to the location of our images
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        //query to load data into the database
        $query = "INSERT INTO posts
                    (post_category_id, 
                    post_title, 
                    post_author, 
                    post_date, 
                    post_image, 
                    post_content, 
                    post_tags, 
                    post_status, 
                    post_comment_count) ";
        
        $query .= "VALUES
                    ({$post_category_id}, 
                    '{$post_title}', 
                    '{$post_author}', 
                      now(), 
                    '{$post_image}', 
                    '{$post_content}', 
                    '{$post_tags}', 
                    '{$post_status}',
                    '{$post_comment_count}' ) ";
        
        $insert_post_into_database = mysqli_query($con, $query);
        
        if (!$insert_post_into_database) {
            
            die("QUERY FAILED " . mysqli_error($con));
            
        }
           
    }


?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input class="form-control" type="text" name="post_title" >
    </div>
    
    
    
    <div class="form-group">
        <label for="post_category_id">Post Category</label><br>
        <select name="post_category" id="post_category_id">      <!--Sending in post_category ....-->
            <?php
                $query = "SELECT *
                          FROM categories";
            
                $post_category_id = mysqli_query($con, $query);
            
                while ($row = mysqli_fetch_assoc($post_category_id)) {
                    
                    $cat_id             = $row['cat_id'];
                    $cat_title          = $row['cat_title'];
                    
                echo "<option value='$cat_id'>$cat_title</option>";   //but displaying the category name
                    
              }
            
            ?>
            
        </select>
    </div>
    
    
    
    <div class="form-group">
        <label for="post_author">Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
    <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <label for="post_comment_count">Comment Count</label>
        <input type="number" class="form-control" name="post_comment_count">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
</form>