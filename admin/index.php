<?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
  <?php include "includes/navigation.php";?>

       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ttEntrepreneur Admin
                            
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                               
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT *
                                                  FROM posts";
                                        
                                        $to_count_posts_for_dashboard = mysqli_query($con, $query);
                                        
                                        $posts_count = mysqli_num_rows($to_count_posts_for_dashboard);
                                        
                                        echo "<div class='huge'>{$posts_count}</div>";
                                        
                                    ?>
                                    
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT *
                                                  FROM comments";
                                        
                                        $to_count_comments_for_dashboard = mysqli_query($con, $query);
                                        
                                        $comments_count = mysqli_num_rows($to_count_comments_for_dashboard);
                                        
                                        echo "<div class='huge'>{$comments_count}</div>";
                                        
                                    ?>
                                    
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT *
                                                  FROM users";
                                        
                                        $to_count_users_for_dashboard = mysqli_query($con, $query);
                                        
                                        $users_count = mysqli_num_rows($to_count_users_for_dashboard);
                                        
                                        echo "<div class='huge'>{$users_count}</div>";
                                        
                                    ?>
                                    
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT *
                                                  FROM categories";
                                        
                                        $to_count_categories_for_dashboard = mysqli_query($con, $query);
                                        
                                        $categories_count = mysqli_num_rows($to_count_categories_for_dashboard);
                                        
                                        echo "<div class='huge'>{$categories_count}</div>";
                                        
                                    ?>
                                    
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
            </div><!-- /.row -->
            
            <!-- Code to count draft posts, unapproved comments, and subscribers to add to graph  -->
            <?php
               
                $query = "SELECT *
                          FROM users
                          WHERE user_role = 'subscriber'";

                $to_count_subscribers = mysqli_query($con, $query);

                $subscribers_count = mysqli_num_rows($to_count_subscribers);
                
                
            ?>
            
            <?php
               
                $query = "SELECT *
                          FROM comments
                          WHERE comment_status = 'unapproved'";

                $to_count_unapproved_comments = mysqli_query($con, $query);

                $unapproved_comments_count = mysqli_num_rows($to_count_unapproved_comments);
                
                
            ?>
            
            <?php
               
                $query = "SELECT *
                          FROM posts
                          WHERE post_status = 'draft'";

                $to_count_draft_posts = mysqli_query($con, $query);

                $draft_posts_count = mysqli_num_rows($to_count_draft_posts);
                
                
            ?>
            
            
            
            
            
            
            
            
            
            <div class="row">
                <!-- /Script for the chart. Script comes from google charts  -->
                <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Data', 'Count'],
                            
                            <?php
                                
                                $element_areas = ['Posts', 'Draft Posts', 'Comments', 'Unapporved Comments', 'Users', 'Subscribers', 'Categories'];
                                $element_count = [$posts_count, $draft_posts_count, $comments_count, $unapproved_comments_count, $users_count, $subscribers_count, $categories_count];
                            
                                for ($i = 0; $i < 7; $i++) {
                                    
                                    echo "['{$element_areas[$i]}'" . ", " . "{$element_count[$i]}],";
                                }
                            
                            ?>
                        
//                          ['Posts', 1000],
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
              </script>
                
               <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>  
    
                
            </div><!-- /.row -->
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/footer.php"; ?>