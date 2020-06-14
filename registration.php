<?php  include "includes/db.php"; ?>

<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>
    
<?php
    if (isset($_POST['submit'])) {
        
        $username                       =   $_POST['username'];
        $user_email                     =   $_POST['user_email'];
        $user_password                  =   $_POST['user_password'];
        
        //validation starts here    //validation starts here //validation starts here
        if (!empty($username) && !empty($user_email) && !empty($user_password)) {
            
        //clean up values
        $username                       =   mysqli_real_escape_string($con, $username);
        $user_email                     =   mysqli_real_escape_string($con, $user_email);
        $user_password                  =   mysqli_real_escape_string($con, $user_password);
            
            
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        
        //managing password - first add cost to randSalt column in the users table
        //managing password - then add 22 chanracters random string to cost
        //now query to check for default values from above
//        $query = "SELECT randSalt
//                  FROM users";
//        
//        $get_randsalt_value = mysqli_query($con, $query);
//        
//        if (!$get_randsalt_value) {
//            
//            die("Query Failed " . mysqli_error($con));
//        }
//        
//        $row = mysqli_fetch_array($get_randsalt_value);
//        
//        //we now have the randSalt default value in a variable    
//         $salt = $row['randSalt'];
//         
//        //encryption of password
//        $user_password = crypt($user_password, $salt);
//            
        
        $query = "INSERT INTO users(username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$user_email}', '{$user_password}', 'subscriber')";
        
        $register_users_query = mysqli_query($con, $query);
        
        if (!$register_users_query) {
            
            die("Query Failed " . mysqli_error($con));
            
        }
            
            $message = "Your registration has been submitted";
            header("Location: registration.php");
        
        }else {
            
            $message = "Fields cannot be empty";
        }
            
    }else {
        
        $message = "";
    }

?>
 
 
<!-- Page Content -->
<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       <h5 class="text-center bg-danger"><?php echo $message; ?></h5>
                       
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="user_password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
