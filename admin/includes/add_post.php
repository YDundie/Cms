<?php 

if(isset($_POST['create_post'])){
    
   

        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
    
    
        $post_image = $_FILES ['post_image'] ['name'];
        $post_image_tem = $_FILES ['post_image'] ['tmp_name'];
    
    
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
/*        $post_commecnt_count = 4;*/
     
    move_uploaded_file($post_image_tem, "../images/$post_image");
    
    
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
    
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}')";
    
    
    $create_post_query = mysqli_query($connection, $query);
    
    
    confirmQuery($create_post_query);
    
}

?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
        <div class="form-group">

        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
        
        </div>
    
    

           <div class="form-group">

       <label for="post_category_id">Post Category &nbsp </label>
       
        <select class="form-control" name="post_category_id">
            
             
            <?php //Find All categories Query
                        
                      
                                
                        $query = "SELECT * FROM categories ";
                        $select_categories = mysqli_query($connection, $query);

                        confirmQuery($select_categories);

                        while($row = mysqli_fetch_assoc($select_categories)){

                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                            
                        echo "<option value='{$cat_id}'> {$cat_title} </option>";
                            
                            
                        }
            
            
                            
                            
                            ?>
            
         
            
            
        </select>
        
        
        </div>
 
   
   

        <div class="form-group">

        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
        
        </div>

    
      <div class="form-group">

        <label for="post_status">Post Stats</label>

       
        <select class="form-control" name="post_status">

                         <option value="Published"> Published </option>
                          <option value="Draft"> Draft </option>   
                         <option value="Canceled"> Canceled </option>
             </select> 
        </div>
        
        
        
        <div class="form-group">

        <label for="post_image">Post Image</label>
        <hr>
        <label for="files" class="btn btn-primary btn-file" >Select Image</label>
        <span>Choose File</span>
        <input  type="file" name="post_image" id="files" style="visibility:hidden;">



        
        </div>
        
        
        
        <div class="form-group">

        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
        
        </div>
        
        
        <div class="form-group">

        <label for="post_content">Post Concent</label>
        
        <textarea name="post_content" class="form-control" id="summernote" cols="30" rows="25"></textarea>
          
           <script>
         $(document).ready(function() {
         $('#summernote').summernote();
         });
         </script>
        
        </div>
    
    
        <div class="form-group">

        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">

        </div> 

</form>