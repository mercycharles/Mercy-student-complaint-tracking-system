<?php
include("mail.php");
$compnum=$_POST["complaintnum"];
$user=$_POST['user'];
$remark=$_POST['remark'];
$status=$_POST['status'];
$zero="0";

$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	$qwerty="SELECT * FROM `complaints`";
	$res=mysqli_query($conn,$qwerty);
	{
		 while($row=mysqli_fetch_assoc($res))
		 {
			 $rid=$row['id'];
			 if($rid==$compnum)
			 {
				$seepend="UPDATE `complaints` SET `pending`='$zero' WHERE `complaints`.`id`='$compnum'";
				$res2=mysqli_query($conn,$seepend);
				if($res2)
				{
				$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($status=='in-progress')
					{
						$email_address=findEmail($user);
						echo $email_address;
						sendMailLocal($email_address,"in progress");
						$inpro="INSERT INTO `inprogresscomp`( `user`, `remarks`, `compnum`) VALUES ('$user','$remark','$compnum')";
						mysqli_query($conn,$inpro);
						echo "<script>window.location.assign('afteradminlogin.php');</script>";
					}
					else if($status=="completed")
					{
						$email_address=findEmail($user);
						echo $email_address;
						sendMailLocal($email_address,"completed");
						$comp="INSERT INTO `completedcomp`(`user`, `remark`, `compnum`) VALUES ('$user','$remark','$compnum')";
						mysqli_query($conn,$comp);
						echo "<script>window.location.assign('afteradminlogin.php');</script>";
					}
			
				}
			}
		 }
	}
}
else
{
	echo "Connection error";
}
?>