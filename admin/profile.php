<?php include "includes/header.php"; ?>
      
<?php

    //Query to allow server to know which user is logged in and to display that user profile to be updated
    if (isset($_SESSION['username'])) {
        
      $username_s     = $_SESSION['username'];
        
      $query = "SELECT *
                FROM users
                WHERE username = '{$username_s}'";  
        
      $select_user_profile_query = mysqli_query($con, $query); 
        
      while ($row = mysqli_fetch_array($select_user_profile_query)) {
            
            $user_id                    = $row['user_id'];
            $username                   = $row['username'];
            $user_password              = $row['user_password'];
            $user_firstname             = $row['user_firstname'];
            $user_lastname              = $row['user_lastname'];
            $user_email                 = $row['user_email'];
            $user_role                  = $row['user_role'];
            $user_date                  = $row['user_date'];
                
      }    
        
    }

?>

<?php
    //Query to update user profile if the information is changed
    if (isset($_POST['update_user'])) {
        
        $username                   = $_POST['username'];
        $user_password              = $_POST['user_password'];
        $user_firstname             = $_POST['user_firstname'];
        $user_lastname              = $_POST['user_lastname'];
        $user_email                 = $_POST['user_email'];
        $user_role                  = $_POST['user_role'];
        $user_date                  = date('d-m-y');
        
        
                    $query = "UPDATE users 
                              SET username            = '{$username}',
                                  user_password       = '{$user_password}',
                                  user_firstname      = '{$user_firstname}',
                                  user_lastname       = '{$user_lastname}',
                                  user_email          = '{$user_email}',
                                  user_role           = '{$user_role}',
                                  user_date           = '{$user_date}'
                              
                              WHERE username = '{$username_s}' ";
         
                    $update_user_profile = mysqli_query($con, $query);
        
                    header("Location: profile.php");
                    
                        if (!$update_user_profile) {

                            die("QUERY FAILED " . mysqli_error($con));
                        }
        
                    
                    }
 

?>   

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
                            <small></small>
                        </h1>
                        
                <!-- Main Content Area Starts -->         
           
                
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input class="form-control" type="password" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" >
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    
     <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="user_role">
         
        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option> 
          
           <?php 
            
                if($user_role == 'admin'){
                
                    echo "<option value='subscriber'>subscriber</option>";
                
                }else{
                
                    echo "<option value='admin'>admin</option>";
                }
                
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="user_date">Date</label>
        <input type="date" class="form-control" name="user_date" value="<?php echo $user_date; ?>">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
    </div>
    
</form>
                
                
                        
                        
                    </div>            
                 
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include "includes/footer.php"; ?>