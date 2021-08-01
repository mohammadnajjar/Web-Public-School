<?php
$sessionId = 0;
$deleteFlag = 0;

if (!empty($_REQUEST)) {

    if(isset($_REQUEST['deleteFlag']))
    	$deleteFlag = $_REQUEST['deleteFlag'];
    if(isset($_REQUEST['courseId']))
    	$courseId = $_REQUEST['courseId'];
    if(isset($_REQUEST['sessionId']))
    	$sessionId = $_REQUEST['sessionId'];
	if(isset($_REQUEST['title']))
	    $title = $_REQUEST['title'];
	if(isset($_REQUEST['rank']))
    	$rank = $_REQUEST['rank'];
}

require 'MyConnection.php';
$db = new DB_Connect();

if($deleteFlag >0){
	$sessionCmd = "DELETE FROM `session` WHERE `s_Id`=$sessionId";
}
else if($sessionId>0){
	$sessionCmd = "UPDATE `session` SET `Title`='$title' ,`rank`=$rank WHERE `s_Id`=$sessionId";	
}
else {
	$sessionCmd = "INSERT INTO `session`( `Title`, `rank`, `c_Id`) VALUES ( '$title' , $rank , $courseId )";
}

$result=mysqli_query($db->mycon,$sessionCmd);
if ($result){


//select * from collage
	//fill same ul
	//replaceWith by js
	$query_content = "SELECT `s_Id`, `Title`,`rank` FROM `session` WHERE `c_Id`=$courseId ORDER BY `rank`";
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
			$htmlResponse .= '<a class="list-group-item list-group-item-action" sessionId="' . $response[$i]["sessionId"] .'" rank="'.$response[$i]["rank"].'">' . $response[$i]["Title"] ."</a>";   		
	   	}
	   	if(count($response) == 0){
	   		$htmlResponse .= '<i class="text-muted">No session are defined for this course .</i>';
	   	}
	   	$htmlResponse .="</div>";
	die($htmlResponse);
	}

}
