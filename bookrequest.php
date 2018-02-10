<?php

$request = file_get_contents("php://input");
$POST_data = json_decode($request);

$admin_sms = "New Booking From " .$POST_data['name']. ' Phone: '.$POST_data['phone'];
$user_sms  = "Hi ".$POST_data['name']." We have Recieved your Query.Our Executive will get back to you in 24 Hours.";

$admin_mail = "New Booking Notification<br> " .$POST_data;
$user_mail = "";

function send_sms($POST_data = NULL)
{
	$apiKey = urlencode('FZ5EKlFprhk-nB5DQqkVQHMeUB9HRNP3MEVBiQLPAW	');
	$numbers = array(9896164444);
	$sender = urlencode('TXTLCL');
	$body = $POST_data;
	$message = rawurlencode($body);
	// $numbers = implode(',', $numbers);
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "message" => $message);
 
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);

	// echo $response;
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

// send_sms();

?>