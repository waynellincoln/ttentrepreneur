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
                        
                        $p_id    = $_GET['p_id'];
                            
                
                    $query = "SELECT *
                              FROM posts
                              WHERE post_id = $p_id";
                
                    $single_post_id_query = mysqli_query($con, $query);
                
                    while ($row = mysqli_fetch_assoc($single_post_id_query)) {
                        
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
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr> 
                  <?php  
                    }
                  }
                 ?>
                 
                 
                <!-- Blog Comments --> 

                <!-- Query to Inssert Contents from Comment into Table named comments --> 
                <?php

                if (isset($_POST['create_comment'])) {

                $p_id                   = $_GET['p_id']; //p_id comes in when we clicked the Title in index page

                $comment_author         = $_POST['comment_author'];
                $comment_email          = $_POST['comment_email'];
                $comment_content        = $_POST['comment_content'];


                $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content,    
                            comment_status, comment_date) 
                          VALUES({$p_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved',  
                            now())";

                $insert_comment_query = mysqli_query($con, $query);

                if (!$insert_comment_query) {
                    
                    die("QUERY FAILED " . mysqli_error($con));
                }

                    }

                ?>
   
               
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       <div class="form-group">
                           <label for="comment_author">Name</label>
                            <input class="form-control" type="text" name="comment_author">
                        </div>
                        <div class="form-group">
                           <label for="comment_email">Email</label>
                            <input class="form-control" type="email" name="comment_email">
                        </div>
                        <div class="form-group">
                           <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

               
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>
 
                 
                 
                 
                 
                 
                 
                 
                 
                
            </div>
            

        <!-- Blog Sidebar Widgets Column -->
  <?php include "includes/sidebar.php" ; ?>            
            

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
   <?php include "includes/footer.php" ; ?>     