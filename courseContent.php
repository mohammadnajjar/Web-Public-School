<?php

if (isset( $_GET['courseId'])) {
 
    $courseId = $_GET['courseId'];
}

require 'MyConnection.php';
$db = new DB_Connect();

$query_content = "SELECT `s_Id`, `Title`, `rank` FROM `session` WHERE `c_Id`=$courseId ORDER BY `rank`";
$result = mysqli_query($db->mycon,$query_content);
if ($result)
{
   	$response=array();
   	$i=0;
   	while ($row =mysqli_fetch_assoc($result))
   	{
  		$content=array();
   		$content["sessionId"] = $row["s_Id"];
   		$content["Title"] = $row["Title"];
      $content["rank"] = $row["rank"];
      $response[$i] = $content;
      $i++;
   	}

   	$htmlResponse='<div id="list-detail" class="list-group">';
   	for ($i=0; $i < count($response); $i++) { 
   		// $htmlResponse .= $response[$i]["sessionId"] . " " . $response[$i]["Title"] ."<br>";
		$htmlResponse .= '<a class="list-group-item list-group-item-action" sessionId="' . $response[$i]["sessionId"] .'" rank="'. $response[$i]["rank"] .'" >' . $response[$i]["Title"] ."</a>";   		
   	}
   	if(count($response) == 0){
   		$htmlResponse .= '<i class="text-muted">No session are defined for this course .</i>';
   	}
   	$htmlResponse .="</div>";
}

echo($htmlResponse);














?>