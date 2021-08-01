<?php
//echo "Connect & Disconnect Page";

class DB_Connect {
    
 public  $mycon;
 
 function __construct() {
        $this->connect();
    }
   
 function __destruct() {
         
        $this->disconnect();
    }
    
 function connect() {
       
       require ("MyConfig.php");
       
       $this->mycon=new  mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
      
    }
   
 function  disconnect() {
     mysqli_close($this->mycon);
    }

 function getUsers() {
   
   	$query_users = "SELECT `id`, `name`, `lastname`, `mobile`, `address` FROM `user`";
   	$result = mysqli_query($this->mycon,$query_users);
   	if ($result)
   	{
   		$response=array();
   		while ($row =mysqli_fetch_assoc($result))
   		{
   			$user=array();
   			$user["id"] = $row["id"];
   			$user["name"] = $row["name"].' '.$row["lastname"];
        $user["mobile"] = $row["mobile"];
        $user["address"] = $row["address"];
   			array_push($response,$user);
   		}
   	}
   	return $response;
    }


 function getCourses() {
   
    $query_courses = "SELECT `id`, `courseName`, `sessionCount` FROM `course`";
    $result = mysqli_query($this->mycon,$query_courses);
    if ($result)
    {
      $response=array();
      while ($row =mysqli_fetch_assoc($result))
      {
        $course=array();
        $course["id"] = $row["id"];
        $course["courseName"] = $row["courseName"];
        $course["sessionCount"] = $row["sessionCount"];
        array_push($response,$course);
      }
    }
    return $response;
    }
}
?>