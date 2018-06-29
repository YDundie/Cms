    
                    <table class="table table-bordered table-hover">    
                           <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Content</th> 
                                    <th>Unapprove</th>
                                    <th>Approve</th>
                                    <th>Delete</th>
 
                                </tr>
                            </thead>
                       
                        <tbody>
                            
                               
    <?php 

                            
        if(isset($_GET['comm'])){
            

         $the_comment_id = $_GET['comm'];
            
            
        }


     $query = "SELECT * FROM comments WHERE comment_id= $the_comment_id";
    $view_all = mysqli_query($connection, $query);



    while($row = mysqli_fetch_assoc($view_all)){

    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];   


        
        echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>"; 
            echo "<td>{$comment_content}</td>";       
            echo "<td>  <a href='comments.php?unapprove=$comment_id''>" ?> <input class="btn btn-warning btn-xs" type="submit" name="unapprove" value="Unapprove"> <?php " </a>";  
            echo "<td>  <a href='comments.php?approve=$comment_id''>" ?> <input class="btn btn-success btn-xs" type="submit" name="approve" value="Approve"> <?php " </a>"; 
            echo "<td>  <a href='comments.php?delete=$comment_id'>" ?> <input class="btn btn-danger btn-xs" type="submit" name="delete_com" value="Delete"> <?php " </a>";

   
        echo "</tr>"; 
        
        
  
        
    }
                            ?>
        
                        </tbody>
                        
                         </table>
                         
             <a href='comments.php'> <input class="btn btn-primary btn-m" type="submit" name="return" value="Return">  </a>           
                       
<?php 

if(isset($_GET['delete'])){
    
$the_comment_id = $_GET['delete'];
    
$query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
$delete_query = mysqli_query($connection, $query);
    
    $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
$query .="WHERE post_id = $comment_post_id";
    
    $delete_com_query = mysqli_query($connection, $query);
    

       header("Location: comments.php");     
    
}


if(isset($_GET['unapprove'])){
    
$the_comment_id = $_GET['unapprove'];
    
$query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id = {$the_comment_id}  ";
$unapprove_query = mysqli_query($connection, $query);

       header("Location: comments.php");     
    
}

if(isset($_GET['approve'])){
    
$the_comment_id = $_GET['approve'];
    
$query = "UPDATE comments SET comment_status='Approved' WHERE comment_id = {$the_comment_id}";
$approve_query = mysqli_query($connection, $query);

       header("Location: comments.php");     
    
}


?>