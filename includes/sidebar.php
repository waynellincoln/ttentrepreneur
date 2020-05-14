
            
<div class="col-md-4">
    
    
    

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        
       
       <!-- Blog Form Needed to Submit Post Data to Database --> 
       <form action="search.php" method="post">
        
        <div class="input-group"> 
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        
       </form> <!-- Search bar form -->
        
    </div>

<!-- Login Form --><!-- Login Form --><!-- Login Form --><!-- Login Form --><!-- Login Form --><!-- Login Form -->
    <div class="well">
        <h4>Login</h4>
         
       <!-- Blog Form Needed to Submit Login Data to Database --> 
       <form action="includes/login.php" method="post">
        
            <div class="form-group"> 
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            
            <div class="input-group"> 
                <input type="password" name="user_password" class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
            </div>
            
        
       </form> <!-- Login form -->
        
    </div>








  
    <!-- Blog Categories Well -->
    <div class="well">
       
        <h4>Blog Categories</h4>
        
         <!-- To Display Categories List in the Sidebar -->
        <?php
        
            $query = "SELECT *
                      FROM categories";
        
            $select_categories_sidebar = mysqli_query($con, $query);
        
       ?> 
        
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  
                   <?php 
                        while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                            
                            $cat_id     = $row['cat_id'];
                            $cat_title  = $row['cat_title'];
                
                        echo "<li><a href='posts_by_category.php?category=$cat_id'>{$cat_title}</a></li>";
                    
                        }
                        
                    ?>
                    
                </ul>
            </div>
            
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "includes/widget.php"; ?>

</div>