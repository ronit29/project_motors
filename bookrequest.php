<?php
require(__DIR__."/mailer/PHPMailerAutoload.php");
$request = file_get_contents("php://input");
$POST_data = json_decode($request,true);
// print_r($POST_data); die;
$admin_numbers = array(9896164444,9953929476);
$numbers = implode(',', $admin_numbers);
$admin_sms = "New Booking From \n" .$POST_data['name']. "\nPhone: ".$POST_data['phone'];
$user_sms  = "Hi ".$POST_data['name']."\nWe have Recieved your Query for ".$POST_data['model']."\nOur Executive will get back to you Shortly.";


$admin_mail = "New Booking Notification<br> ";
foreach ($POST_data as $key => $value) {
    $admin_mail .= $key .' -- '.$value; 
}
$user_mail = "";

function send_sms($message = NULL, $number = NULL)
{
	$apiKey = '197727AG6ZZhJh5e5a8042de';
	$message = rawurlencode($message);
	// $message = rawurlencode("HI Ronit \n Your booking has been confirmed.");
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=".$apiKey."&mobiles=".$number."&message=".$message."&sender=INMOTR&route=1&country=91"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
}


function send_mail($post_data = NULL)
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

send_sms($admin_sms,$numbers);
send_sms($user_sms,$POST_data['phone']);
send_mail($admin_mail);
print "success";

?>