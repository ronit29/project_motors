<?php

require(__DIR__."/mailer/PHPMailerAutoload.php");
$request = file_get_contents("php://input");
if (!$request && empty($request)) {
header('Location: /'); 
} 


$POST_data = json_decode($request,true);
$admin_numbers = array(9896164444,9953929476);
$numbers = implode(',', $admin_numbers);
$admin_sms = "New Booking From \n" .$POST_data['name']. "\nPhone: ".$POST_data['phone'];
$user_sms  = "Hi ".$POST_data['name']."\nWe have Recieved your Query for ".$POST_data['model']."\nOur Executive will get back to you Shortly.";


$admin_mail = array();
$admin_mail['Info'] = "<h2>New Booking Notification</h2><br><br><ul> ";
foreach ($POST_data as $key => $value) {

    $admin_mail['Info'] .= '<li>'.$key .' -- '.$value.'</li>'; 
}
$admin_mail['Info'] .= "</ul>";
$user_mail = "";


$status  = array();


function send_sms($message = NULL, $number = NULL)
{
	$apiKey = '197727AG6ZZhJh5e5a8042de';
	$message = rawurlencode($message);
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=".$apiKey."&mobiles=".$number."&message=".$message."&sender=INMOTR&route=1&country=91&response=json"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);     
    return $output; 
}


function send_mail($body =NULL,$flag = NULL)
{
    $mail = new PHPMailer;
    $mail->isSMTP();                                
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                            
    $mail->Username = 'indianmotorsggn@gmail.com';              
    $mail->Password = 'airport123';                        
    $mail->SMTPSecure = 'tls';                         
    $mail->Port = 587;    
    $mail->setFrom('indianMotorsggn@gmail.com', 'IndianMotors');
    $mail->FromName = 'IndianMotors';
    $mail->addAddress('ronitdhingra@live.com', 'Ronit Dhingra');   
    $mail->addCC('ravikumarparjapat081@gmail.com');
    $mail->addBCC('indianMotorsggn@gmail.com'); 
    $mail->isHTML(true); 
    $mail->Subject = 'Booking Confirmed';
    $mail->Body = $body;
    if(!$mail->send()) {
       $status[$flag] = 'Mail not sent';
    } 
    $status[$flag] = 'Mail Sent';
}  

$status['admin_sms'] = send_sms($admin_sms,$numbers);
$status['user_sms'] =  send_sms($user_sms,$POST_data['phone']);
send_mail($admin_mail['Info'],'admin_mail');
$response['status'] =  (json_decode($status['user_sms'],true)['type'] == 'success') ? "success" : 'failure';
echo json_encode($response);

?>