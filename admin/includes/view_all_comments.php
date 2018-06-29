    
                    <table class="table table-bordered table-hover">    
                           <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                <!--    <th>Post_Id</th>-->
                                    <th>Date</th>
                                    <th>Respones To</th>
                                    <th>Unapprove</th>
                                    <th>Approve</th>
                                    <th>Delete</th>
 
                                </tr>
                            </thead>
                       
                        <tbody>
                            
                               
    <?php 

                            

     $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);



    while($row = mysqli_fetch_assoc($select_comments)){

    $comment_id = $row['comment_id'];
    $comment_post_id= $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];   
    $comment_content = substr($row['comment_content'],0,19);   
    $comment_status = $row['comment_status'];   
    $comment_date = $row['comment_date'];
        
        echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td><a href='comments.php?action=view_all&comm=$comment_id'>{$comment_content}...Exapnd </a></td>";
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_date}</td>"; 

          
        
            $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
            $select_posts_id = mysqli_query($connection, $query);

            confirmQuery($select_posts_id);

            while($row = mysqli_fetch_assoc($select_posts_id)){

            $comment_response = $row['post_title'];
             $comment_post_id = $row['post_id'];

                echo "<td><a href='../post.php?p_id=$comment_post_id'>$comment_response</td>";

            }
            
     
               
            echo "<td>  <a href='comments.php?unapprove=$comment_id''>" ?> <input class="btn btn-warning btn-xs" type="submit" name="unapprove" value="Unapprove"> <?php " </a>";  
            echo "<td>  <a href='comments.php?approve=$comment_id''>" ?> <input class="btn btn-success btn-xs" type="submit" name="approve" value="Approve"> <?php " </a>"; 
            echo "<td>  <a href='comments.php?delete=$comment_id'>" ?> <input class="btn btn-danger btn-xs" type="submit" name="delete_com" value="Delete"> <?php " </a>";

              
                        
                      
                                
                      
            
                            
                            
                             
        
   
        
        
        
   
        
        echo "</tr>"; 
        
    }
                            ?>
        
                        </tbody>
                        
                         </table>
                         
                        
                       
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