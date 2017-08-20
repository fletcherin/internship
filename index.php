<?php
 include 'config.php';
 //database connect
 $connect =new mysqli(HOST,USERNAME,PASS,DATABASE);
 if($connect-> connect_error){
     //checking connection error
     die("connection failed:".$connect-> connect_error);
 }
 if (isset($_POST["submit"])){
    $firstname=$_POST["firstname"] ;
    $lastname=$_POST["lastname"];
    $username=$_POST["username"];
    $email=$_POST["email"];
     //insert to database
    $query="insert into tbl_user(firstname,lastname,username,email)values('$firstname','$lastname','$username','$email')";
    if($connect->query($query)===TRUE){
        echo 'New record created successfully';
    } else {
      echo 'error';    
    }
   
 
 }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>sample php code</title>
    </head>
    <body>
       <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
           <div class="forminput"><input type="text" name="firstname" placeholder="Enter your firstname"> </div></br>

           <div class="forminput"><input type="text" name="lastname" placeholder="Enter your lastname"> </div></br>

           <div class="forminput"> <input type="text" name="username" placeholder="Enter your username"> </div></br>

           <div class="forminput"> <input type="text" name="email" placeholder="Enter your email"> </div></br>
       <div class="forminput"> <input type="submit" name="submit" value="submit"></div>
       
   </form>
    </body>
</html>
<?php
     if(isset($_POST['submit'])){
         $select_query="select firstname,lastname from tbl_user where email='$email'";
         $result=$connect->query($select_query);
         if($result->num_rows >0){
             //output data
             $rows =$result->fetch_array();
                 echo "hi " .$rows['firstname'].$rows['lastname'];   
             
         }
     }
?>
