<?php include "includes/admin_header.php" ?>
        
    <?php    
        if(isset($_SESSION['username'])){
            
            $username = $_SESSION['username'];
            
            $query = "SELECT * FROM users WHERE username = '{$username}'";
            
            $select_user_profile_query = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_array($select_user_profile_query)){
                
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                $user_email = $row['user_email'];
                
                
                
            }
            
            
        }
?>
       
<?php 

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
     $query .="WHERE username = '{$username}'";
    
    $update_user_query = mysqli_query($connection, $query);
    
    confirmQuery($update_user_query);
    
    header("Location: users.php");
 
}





?>
        
    <div id="wrapper">

       
       
       
        <!-- Navigation -->
        
<?php include "includes/admin_navigation.php" ?>
       
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                           <?php 
                        
                        include "includes/welcome_admin.php" 
                        
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

        <input class="btn btn-success" type="submit" name="edit_user" value="Update User">

        </div> 

</form>
                        
                        
                         </div>
                         
                         
                    
                     </div>
                     
                     
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
 <?php include "includes/admin_footer.php" ?>