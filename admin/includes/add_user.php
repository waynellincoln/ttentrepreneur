<?php
    
    //query to add posts to the database
    if (isset($_POST['create_user'])) {
        
        $username                   = $_POST['username'];
        $user_password              = $_POST['user_password']; 
        $user_firstname             = $_POST['user_firstname']; 
        $user_lastname              = $_POST['user_lastname']; 
        $user_email                 = $_POST['user_email']; 
        $user_role                  = $_POST['user_role']; 
        $user_date                  = date('d-m-y');
      
        
        //query to load users from form into the database  //query to load users from form into the database
        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role, user_date) ";
        
        $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '{$user_date}') ";
        
        $insert_user_into_database = mysqli_query($con, $query);
        
        echo "<p class=alert alert-primary role='alert'>New User Created: "  . " "  . "<a href='users.php'>View Users</a></p>";
        
        if (!$insert_user_into_database) {
            
            die("QUERY FAILED " . mysqli_error($con));
            
          }
           
        }


?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" >
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
     <div class="form-group">
        <label for="user_role">Role</label><br>
        <select name="user_role" id="user_role">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="user_date">Date</label>
        <input type="date" class="form-control" name="user_date">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
</form>