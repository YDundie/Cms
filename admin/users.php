<?php include "includes/admin_header.php" ?>

        
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
    
                        
<?php 

     if(isset($_GET['source'])){
         
         $action = $_GET['source'];
         
         
     }else {
         
         $action = "";
         
     }

    switch($action){
        
    case 'add_user':        
    include "includes/add_user.php";
    break;
            
    case 'edit_user':        
    include "includes/edit_user.php";
    break;
            
        
    default:
    include "includes/view_all_users.php";
        
}

?>
                        
                        
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