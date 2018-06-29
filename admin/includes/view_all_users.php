    
                    <table class="table table-bordered table-hover">    
                           <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Chenge Role</th>
                                    <th>Chenge Role</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                       
                        <tbody>
                            
                               
    <?php 

                            

     $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);



    while($row = mysqli_fetch_assoc($select_users)){

    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_email = $row['user_email'];
        
        echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>"; 
            echo "<td>{$user_role}</td>";
//            echo "<td>{$user_date}</td>"; 

          
        
  /*          $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
            $select_posts_id = mysqli_query($connection, $query);

            confirmQuery($select_posts_id);

            while($row = mysqli_fetch_assoc($select_posts_id)){

            $comment_response = $row['post_title'];
             $comment_post_id = $row['post_id'];

                echo "<td><a href='../post.php?p_id=$comment_post_id'>$comment_response</td>";

            }
            */
     
               
            echo "<td>  <a href='users.php?to_sub=$user_id'>" ?> <input class="btn btn-warning btn-xs" type="submit" name="to_sub" value="Subscriber"> <?php " </a>";  
            echo "<td>  <a href='users.php?to_admin=$user_id'>" ?> <input class="btn btn-success btn-xs" type="submit" name="to_admin" value="Admin"> <?php " </a>"; 
            echo "<td>  <a href='users.php?source=edit_user&edit_user=$user_id'>" ?> <input class="btn btn-primary btn-xs" type="submit" name="edit_user" value="Edit"> <?php " </a>";

            echo "<td>  <a href='users.php?delete=$user_id'>" ?> <input class="btn btn-danger btn-xs" type="submit" name="delete_user" value="Delete"> <?php " </a>";

              
                        
                      
                                
                      
            
                            
                            
                             
        
   
        
        
        
   
        
        echo "</tr>"; 
        
    }
                            ?>
        
                        </tbody>
                        
                         </table>
                         
                        
                       
<?php 

if(isset($_GET['delete'])){
    
$the_user_id = $_GET['delete'];
    
$query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    
$delete_query = mysqli_query($connection, $query);
    
 
       header("Location: users.php");     
    
}


if(isset($_GET['to_sub'])){
    
$user_id = $_GET['to_sub'];
    
$query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id ";
$sub_query = mysqli_query($connection, $query);

    confirmQuery($sub_query);
    
       header("Location: users.php");     
    
}

if(isset($_GET['to_admin'])){
    
$user_id = $_GET['to_admin'];
    
$query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
    
$admin_query = mysqli_query($connection, $query);

       header("Location: users.php");     
    
}



?>