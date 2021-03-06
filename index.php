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
                
                <?php
                //pagination code starts here; pagination code starts here; pagination code starts here
                //Pagination - 3rd thing - collect get request and process it
                
                $per_page   = 10;           //code to indicate how much posts you want on the page
                
                if(isset($_GET['page'])) {
                    
                    
                    
                    $page = $_GET['page'];
                    
                }else {
                    
                    $page = "";
                }
                
                if($page == "" || $page == 1) {
                    
                    $page_1 = 0;
                    
                }else {
                    
                    $page_1 = ($page * $per_page) - $per_page;
                }
                
                
                
                 
                //Pagination - First thing - find out how many posts we have 
                $query = "SELECT * 
                          FROM posts";    
                
                $total_posts = mysqli_query($con, $query);
                
                $rows_counted = mysqli_num_rows($total_posts);
                
                //To find out how much pages we want if 5 posts to a page
                $pages_needed = ceil($rows_counted / $per_page);
                    
                
                
                
                
                
                
                
                
                ?>
                
                
                
                
                
                
                
                <!-- To allow posts to get their information from the post table in the database -->
                <?php 
                
                    $query = "SELECT *
                              FROM posts
                              WHERE post_status = 'published' 
                              LIMIT $page_1, $per_page ";               //5 is the amount on posts on each page
                
                    $select_all_posts_query = mysqli_query($con, $query);
                
                    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        
                        $post_id            = $row['post_id'];
                        $post_title         = $row['post_title'];
                        $post_author        = $row['post_author'];
                        $post_date          = $row['post_date'];
                        $post_image         = $row['post_image'];
                        $post_content       = substr($row['post_content'], 0, 100);
                        $post_status        = $row['post_status'];

                        
                     //Break out PHP to accommodate looping through all the posts in database 
                    ?>
                           <h2><?php echo $pages_needed; ?></h2> 
                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="900">
                        </a>
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr> 
                    
                 <?php 
                    
                  }  
                                    
                 ?>
                
            </div>
            

        <!-- Blog Sidebar Widgets Column -->
  <?php include "includes/sidebar.php" ; ?>            
            
        </div>
        <!-- /.row -->
        <hr>
         
        <!-- code to start dynamic pagination links using ul and a loop-->
        <ul class="pager">
        <?php
            
            //Pagination - 2nd thing - put in the page numbers and let each number send get request to index page
            for($i = 1; $i <= $pages_needed; $i++) {
                
                if($i == $page) {
                    
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                    
                }else {
                    
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
                
                
            }
            
           
        ?>   
            
            
        </ul>
        

        <!-- Footer -->
   <?php include "includes/footer.php" ; ?>     