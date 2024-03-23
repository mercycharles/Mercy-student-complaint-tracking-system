<?php
use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once "vendor/autoload.php";
function findEmail($user)
{
	$conn=mysqli_connect("localhost","root","","project");
	if(!$conn)
	{
		echo "No connection";
	}
	$sqlStmt="select * from userregistration ";
	$query=mysqli_query($conn,$sqlStmt);
	while($row=mysqli_fetch_assoc($query))
	{
		if($row['username']==$user)
		{
			return $row['email'];
		}

	}
	
}
function sendMailLocal($email,$progress)
{
try {
	$mail = new PHPMailer(true);
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true,
		)
	  );
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'mercyakoth356@gmail.com';				
	$mail->Password = 'qcpj rmup elbk abnr';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("student@gmail.com", "Complaints System");		
	$mail->addAddress($email);	
	$mail->isHTML(true);								
	$mail->Subject = 'Complaint Progress Updates';
	$mail->Body="The progress of your complaint set to:$progress";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "<script>alert('Progress updated successfully');</script>";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
