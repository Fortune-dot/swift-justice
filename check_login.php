<?php 

//check_login.php

include 'database_connection.php';

session_start();

$query = "
	SELECT user_session_id FROM user_login 
	WHERE user_id = '".$_SESSION['user_id']."'
";

$result = $connect->query($query);

foreach($result as $row)
{
	if($_SESSION['user_session_id'] != $row['user_session_id'])
	{
		$data['output'] = 'logout';
	}
	else
	{
		$data['output'] = 'login';
	}
}

echo json_encode($data);

?>