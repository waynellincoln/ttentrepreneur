<?php
    //query to display posts to be edited  //query to display posts to be edited  
    if (isset($_GET['edit'])) {
        
        $edit_user_id = $_GET['edit'];
        
        $query = "SELECT *
                  FROM users
                  WHERE user_id = $edit_user_id "; 
                  
        
        $display_user_to_edit = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($display_user_to_edit)) {
            
            $username                   = $row['username'];
            $user_firstname             = $row['user_firstname'];
            $user_lastname              = $row['user_lastname'];
            $user_email                 = $row['user_email'];
            $user_password              = $row['user_password'];
            $user_role                  = $row['user_role'];
            $user_date                  = $row['user_date'];
        
        }
    }


    //query to update user //query to update user //query to update user //query to update user 
    if (isset($_POST['update_user'])) {
        
        $username                   = $_POST['username'];
        $user_firstname             = $_POST['user_firstname'];
        $user_lastname              = $_POST['user_lastname'];
        $user_email                 = $_POST['user_email'];
        $user_password              = $_POST['user_password'];
        $user_role                  = $_POST['user_role'];
        $user_date                  = date('d-m-y');
        
        //Query to remove encryption from password
        $query = "SELECT randSalt
                  FROM users";
        
        $remove_encryption_query = mysqli_query($con, $query);
        
        if (!$remove_encryption_query) {
            
            die("Query Failed " . mysqli_error($con));
            
        }
        
        $row    = mysqli_fetch_array($remove_encryption_query); //1 result so no need to use while loop
        
        $salt   = $row['randSalt'];
        
        $hashed_password = crypt($user_password, $salt);
        
        
                    $query = "UPDATE users 
                              SET username            = '{$username}',
                                  user_firstname      = '{$user_firstname}',
                                  user_lastname       = '{$user_lastname}',
                                  user_email          = '{$user_email}',
                                  user_password       = '{$hashed_password}',
                                  user_role           = '{$user_role}',
                                  user_date           = '{$user_date}'
                              
                              WHERE user_id = {$edit_user_id}";
         
                    $update_user_query = mysqli_query($con, $query);
        
                    header("Location: users.php");
                    
                        if (!$update_user_query) {

                            die("QUERY FAILED " . mysqli_error($con));
                        }
        
                    
                    }
 
    

    
?>

<!--Form To Display User Data to be Edited--> <!--Form To Display User Data to be Edited-->

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
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
        <label for="user_email">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
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
        <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>
    
</form>