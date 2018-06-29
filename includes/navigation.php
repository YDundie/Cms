<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
           
            
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
             
              
            <!-- Collect the nav links, forms, and other content for toggling -->
        
            
            
            
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   
                    <?php 
            
            $query = "SELECT * FROM categories";
            $select_all_categories_query = mysqli_query($connection, $query);
            
            
            while($row = mysqli_fetch_assoc($select_all_categories_query)){
                
                $cat_title = $row['cat_title'];
                
                echo "<li><a href='#'> {$cat_title} </a></li>";
                
            }
                    
                    
            
            ?>
            

                    
<!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                    
                    
                </ul>
                
                 <?php  
                
                if(isset($_SESSION['user_role'])){
                
                echo "<ul class='nav navbar-nav  navbar-right'>";
             
                
                
                 
               echo "<li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>" ;
                    
                    
                    echo "{$_SESSION['firstname']} {$_SESSION['lastname']} <b class='caret'></b></a>";
                  
                    echo "<ul class='dropdown-menu'>"; 
                      
    
                        if($_SESSION['user_role'] === 'admin'){
                            
                        
                        
                         echo " <li>
                            <a href='admin/index.php'><i class='fa fa-fw fa-user'></i> Admin Page </a>
                        </li>";
                            
                              if(isset($_GET['p_id'])){
                            
                        echo " <li>
                            <a href='admin/posts.php?source=edit_post&p_id={$_GET['p_id']}'><i class='fa fa-fw fa-user'></i> Edit post </a>
                        </li>";
                              
                            }
                      
                       echo "<li class='divider'></li>";
                        }    
                            
                      echo  "<li>";
                         
                        echo   "<a href='includes/logout.php'> <i class='fa fa-fw fa-power-off'> </i> Log Out</a>";
                       
                    
                    echo "</li>
                    </ul>
                </li>
            </ul>";
           } ?> 
            </div>
            
            
            
            <!-- /.navbar-collapse -->
        </div>
         
            
        
        <!-- /.container -->
    </nav>