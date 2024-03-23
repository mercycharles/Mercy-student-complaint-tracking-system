<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nature = $_POST['nature'];
    $comp = $_POST['comp'];
    $date = date("F j, Y, g:i a"); 
    $urgency = $_POST['urgency'];

echo "Processing";

$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	
	$query1="SELECT * FROM `userloginfo`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		
		while($row=mysqli_fetch_assoc($result))
		{
			$user=$row['user'];
		}
	}	
	
	$pend='1';
	$query2="INSERT INTO `complaints`(`user`, `nature`, `comp`, `pending`, `date`,`priority`) VALUES 
	('$user','$nature','$comp','$pend','$date','$urgency')";

	$result=mysqli_query($conn,$query2);
		
	if($result)
	{
		
		echo "success";
		
	}
	else{
		echo "error".mysqli_error($conn);
	}
}
}
?>
