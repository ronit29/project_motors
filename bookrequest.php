<?php

$request = file_get_contents("php://input");
$POST_data = json_decode($request);

$admin_sms = "New Booking From " .$POST_data['name']. ' Phone: '.$POST_data['phone'];
$user_sms  = "Hi ".$POST_data['name']." We have Recieved your Query.Our Executive will get back to you in 24 Hours.";

$admin_mail = "New Booking Notification<br> " .$POST_data;
$user_mail = "";

function send_sms($POST_data = NULL)
{
	$apiKey = '197727AG6ZZhJh5e5a8042de';
	$numbers = array(9896164444);
	// $message = rawurlencode($POST_data);
	$message = rawurlencode("HI Ronit \n Your booking has been confirmed.");
	$numbers = implode(',', $numbers);
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=".$apiKey."&mobiles=919896164444&message=".$message."&sender=INMOTR&route=1&country=91"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      

	echo $output;
}


function send_mail_admin($post_data = NULL)
{
    $body = $post_data;
    $mail = new PHPMailer;
    $mail->isSMTP();                                
    $mail->Host = 'email-smtp.us-east-1.amazonaws.com';
    $mail->SMTPAuth = true;                            
    $mail->Username = 'AKIAITLTAUVPICLE2K4Q';              
    $mail->Password = 'AozIDFFnSPZTxbWI/yBLLoaO4fCX7+7T4Vl6whsvtKaD';                        
    $mail->SMTPSecure = 'tls';                         
    $mail->Port = 25;    

    $mail->setFrom('indianMotors@gmail.com', 'IndianMotors');
    $mail->FromName = 'IndianMotors';
    $mail->addAddress('ronit.dhingra@ticketmaster.com', 'Ronit Dhingra');   
    $mail->addCC('ronitpcl@gmail.com');
    // $mail->addBCC('bcc@example.com'); 
    $mail->isHTML(true); 
    $mail->Subject = 'New Service Booking';
    $mail->Body = $body;
    if(!$mail->send()) {
    	return;
    } 
    return 'error';
}  

send_sms($admin_sms);

?>