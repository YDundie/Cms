<?php 

if(isset($_GET['edit_user'])){
    
   $the_user_id = $_GET['edit_user'];
    
    
}


$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
    $select_users_by_id = mysqli_query($connection, $query);



    while($row = mysqli_fetch_assoc($select_users_by_id)){

    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
 
    }







if(isset($_POST['edit_user'])){
    
   

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $username = $_POST['username'];
    
/*    
        $post_image = $_FILES ['post_image'] ['name'];
        $post_image_tem = $_FILES ['post_image'] ['tmp_name'];
    */
    
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
    
//        $post_date = date('d-m-y');
 
     
//    move_uploaded_file($post_image_tem, "../images/$post_image");
    
    
     $query ="UPDATE users SET ";
     $query .="user_firstname = '$user_firstname' , ";
     $query .="user_lastname = '$user_lastname' , ";
     $query .="user_email = '$user_email' , ";
     $query .="username = '$username' , ";
     $query .="user_password = '$user_password' , ";
     $query .="user_role = '$user_role' ";
     $query .="WHERE user_id = $the_user_id";
    
    $update_user_query = mysqli_query($connection, $query);
    
    confirmQuery($update_user_query);
    
    header("Location: users.php");
 
}

?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
          <div class="form-group">

        <label for="user_firstname">Firstname</label>
        <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="user_firstname">
        
        </div>
        
          <div class="form-group">

        <label for="user_lastname">Lastname</label>
        <input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="user_lastname">
        
        </div>
   
         <div class="form-group">

        <label for="user_email">Email</label>
        <input value="<?php echo $user_email ?>" type="email" class="form-control" name="user_email">
        
        </div>
          
          
          
          
          
           
        <div class="form-group">
        
        
      
    

        <label for="user_role"> User Role</label>

   

        

        
        <select class="form-control" name="user_role" >
                        
                        <?php 
            
                                if($user_role == 'admin'){
                                    
                                   
                                     echo   "<option value='admin'> Admin </option>";
                                     echo   "<option value='subscriber'> Subscriber </option> ";  
                                    
                                }
                                
                                else{
                                    
                                    echo   "<option value='subscriber'> Subscriber </option> ";  
                                    echo   "<option value='admin'> Admin </option>";
                                    
                                    
                                }
    
                            
            
            
            
                        ?>
             </select> 

        </div>
       
       
       
       
     
        
            

        <div class="form-group">

        <label for="username">Username</label>
        <input value="<?php echo $username ?>" type="text" class="form-control" name="username">
        
        </div>
        
        
        
           <div class="form-group">

       <label for="user_password">Password </label>
       
             <input value="<?php echo $user_password ?>" class="form-control" type="password" name="user_password">
        
        </div>
 

    
      
        
        
  <!--      <div class="form-group">

        <label for="post_image">Post Image</label>
        <input type="file"   name="post_image" >
        
        </div>-->

    
    
        <div class="form-group">

        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">

        </div> 

</form>