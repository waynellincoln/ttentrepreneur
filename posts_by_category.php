<?php include "includes/db.php" ; ?>

<?php include "includes/header.php" ; ?>    

    <!-- Navigation -->
    
<?php include "includes/navigation.php" ; ?>
        

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    ttEntrepreneur
                    <small></small>
                </h1>
                
                
                <!-- To display single post from  -->
                <?php 
                
                    if (isset($_GET['category'])) {
                        
                        $c_id    = $_GET['category'];
                            
                
                    $query = "SELECT *
                              FROM posts
                              WHERE post_category_id = $c_id";
                
                    $single_post_id_query = mysqli_query($con, $query);
                
                    while ($row = mysqli_fetch_assoc($single_post_id_query)) {
                        
                        $post_title         = $row['post_title'];
                        $post_author        = $row['post_author'];
                        $post_date          = $row['post_date'];
                        $post_image         = $row['post_image'];
                        $post_content       = substr($row['post_content'], 0, 100);
                        
                   
                   ?> 
                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="900">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr> 
                  <?php  
                    }
                  }
                 ?>
                 
                
            </div>
            

        <!-- Blog Sidebar Widgets Column -->
  <?php include "includes/sidebar.php" ; ?>            
            

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
   <?php include "includes/footer.php" ; ?>     