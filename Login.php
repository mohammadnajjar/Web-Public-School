<?php
//echo "Login Page";

$response = array();

if (isset( $_POST['username']) && isset( $_POST['password']))  {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
}
    require 'MyConnection.php';
    
    $db = new DB_CONNECT();
    $conn=$db->mycon;
    
    $query="SELECT `id`, `name`, `password` FROM `user`";
    $result=mysqli_query($conn,$query);
    //mysqli_result
     if (!$result)
     {
         $response["message"] = "The webpage might be down.";
         die ($response["message"]." "."error".mysqli_error($conn));
     }
     else {
         // if not found in while !
            
        while ($row =mysqli_fetch_assoc($result)) 
          {
           //row from db so col-name as db-col-name   
            if ($row["name"]==$username&&$row["password"]==$password)
            {    
               $response["id"]=$row["id"];
               $response["message"] = "login successfully.";
               die ($response["message"]);
                
            }
          }
          $response["message"] = "login failed .Incorrect username or password.";
          // echo "fail to connect server";
          die ($response["message"]);
      }        
     
?>