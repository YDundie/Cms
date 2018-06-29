<?php include "db.php"; ?>


<?php session_start(); ?>





<?php 

if(isset($_POST['login'])){
    
    
   $username = $_POST['username'];
   $passoword = $_POST['password'];
    
    
$username = mysqli_real_escape_string($connection, $username);
$passoword = mysqli_real_escape_string($connection, $passoword);

$query = "SELECT * FROM users WHERE username = '{$username}' ";

$select_user_query = mysqli_query($connection, $query);
    
if(!$select_user_query){
    
    
    die("QUERY failed" . mysqli_error($connection));
    
    
    
} 
    
    
    while($row = mysqli_fetch_array($select_user_query)){
        
        $id = $row ['user_id'];
        $the_username = $row ['username'];
        $the_password = $row ['user_password'];
        $firstname = $row ['user_firstname'];
        $lastname= $row ['user_lastname'];
        $role = $row ['user_role'];
        
        
        
        
    }
    
    
    if($username === $the_username && $passoword === $the_password){
        
        $_SESSION['username']= $the_username;
        $_SESSION['firstname']= $firstname;
        $_SESSION['lastname']= $lastname;
        $_SESSION['user_role']= $role;
        $_SESSION['fail'] = "";
        
 if($_SESSION['user_role'] != "admin"){
    
    
header("Location: ../index.php");
    
    
    
} 

else if($_SESSION['user_role'] === "admin"){
    
    header("Location: ../admin/index.php");
    
}

        
    }
    
    else{
        
        $_SESSION['fail'] = "Unsuccessful log in";
         header("Location: ../index.php");
        
    }


}




?>