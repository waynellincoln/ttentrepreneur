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
                
                    if (isset($_GET['p_id'])) {
                        
                        $p_id               = $_GET['p_id'];
                        $p_author           = $_GET['author'];
                            
                
                    $query = "SELECT *
                              FROM posts
                              WHERE post_author = '{$p_author}' ";
                
                    $post_by_author = mysqli_query($con, $query);
                
                    while ($row = mysqli_fetch_assoc($post_by_author)) {
                        
                        $post_title         = $row['post_title'];
                        $post_author        = $row['post_author'];
                        $post_date          = $row['post_date'];
                        $post_image         = $row['post_image'];
                        $post_content       = $row['post_content'];
                        
                   
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
<!--                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                        <hr> 
                  <?php  
                    }
                  }
                 ?>
                 
               
   
               
                <!-- Comments Form - Comments Going to Database--><!-- Comments Form - Comments Going to Database-->
                
                
               
                <hr>
                

                <!-- Posted Comments From Database --><!-- Posted Comments From Database -->
                
                
                <?php
                    $query = "SELECT * 
                              FROM comments 
                              WHERE comment_post_id = $p_id 
                              AND comment_status = 'Approved' 
                              ORDER BY comment_id DESC ";
                
                    $approved_comments_query = mysqli_query($con, $query);
                
                    while ($row = mysqli_fetch_assoc($approved_comments_query)) {
                        
                        $comment_id                 = $row['comment_id'];
                        $comment_author             = $row['comment_author'];
                        $comment_content            = $row['comment_content'];
                        $comment_status             = $row['comment_status'];
                        $comment_post_id            = $row['comment_post_id'];
                        $comment_date               = $row['comment_date'];
                           
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>
 
              <?php } ?>
          
                 
           
            </div>
            

            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php" ; ?>            
            

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
   <?php include "includes/footer.php" ; ?>     