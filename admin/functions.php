<?php 


function insert_categories(){
    
    global $connection;
    
    
    if(isset($_POST['submit'])){
    
                    $cat_title = $_POST['cat_title'];
    
                    if($cat_title == "" || empty($cat_title)){
                        
                        echo "This field should not be empty";
                        
                    }
    else {
        
        
        $query ="INSERT INTO categories(cat_title) ";
        
        $query .= "VALUE('{$cat_title}') ";
        
        $create_category_query = mysqli_query($connection,$query);
        
        if(!$create_category_query){
            
            
            die('QUERY FAILED'. mysqli_error($connection));
            
        }
        
    }
                         
    
}
    
    
}
 

function FindAllCategories(){
    
     //Find All categories Query
    
                        global $connection;
    
                                     
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $query);



                        while($row = mysqli_fetch_assoc($select_categories)){

                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        ?>
                        
                        <tr><?php
                        echo "<td>{$cat_id}</td>";
                        echo "<td>{$cat_title} </td>";
                        echo "<td>  <a href='categories.php?delete={$cat_id} '>"?> <input class="btn btn-danger btn-xs" type="submit" name="submit" value="Delete"> <?php " </a>"; ?>
                       <?php  echo  "<a href='categories.php?edit={$cat_id} '>" ?> <input class="btn btn-primary btn-xs" type="submit" name="edit_categories" value="Update"><?php " </a></td>";    
                            
                        }
    
    
}

function DeletCategories(){
    
                 global $connection;
    
               
                if(isset($_GET['delete'])){


                $get_id =$_GET['delete'];
         

                $query = "DELETE FROM categories WHERE cat_id = {$get_id}";

                $delete_query = mysqli_query($connection, $query);
                
                                     
                                     
              header("Location: categories.php");           
    }
    
}


function confirmQuery($a){
    
    global $connection;

    
    if(!$a){
        
        
        die("Query FAILED". mysqli_error($connection));
        
        
    }
    
    
    
}

?>

