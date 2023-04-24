<?php
$contact = @$_POST['contact'];
$recaptcha = @$_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if(!$res['success']){
    $alert = '<span style="color:red; font-size:18px">Sorry, your reCAPTCHA was not solved.</span>';
	header("location: Contact?C=$alert");
	exit();
}
function reCaptcha($recaptcha){
  $secret = "6LcVN9YaAAAAADl3eO-oIi_Bzci0gYYav0L8B0SM";
  $ip = $_SERVER['REMOTE_ADDR'];

  $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
  $url = "https://www.google.com/recaptcha/api/siteverify";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
  $data = curl_exec($ch);
  curl_close($ch);

  return json_decode($data, true);
}
					$name = strip_tags($_POST['fname']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone']);
					$subject = strip_tags($_POST['subject']);
					$message = strip_tags($_POST['message']);
					$ip = $_SERVER['REMOTE_ADDR'];
					$to = "enquiry@desiredcar.co.za";
					$from = "From: $name <$email>";
					$body1 = "Client's Name: $name \rClient's Email: $email \rClient's Phone: $phone \rIP: $ip \rSource: Contact Page \n\n$message";
					$body = wordwrap($body1,70);
					if(mail($to, $subject, $body, $from)){
					$alert = '<span style="color:green; font-size:18px">Thank you, your message has been received.</span>';
					header("location: Contact?A=$alert");
	}
	else{
		$alert = '<span style="color:red; font-size:18px">Sorry, Message Failed to send </span>';
		header("location: Contact?A=$alert");
	}
?>