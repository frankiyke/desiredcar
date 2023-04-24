<?php
$quote = @$_POST['quote'];
$diagnostic = @$_POST['diagnostic'];

if($quote){
					
					$name = strip_tags($_POST['name']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone']);
					$subject = strip_tags($_POST['subject']);
					$message = strip_tags($_POST['message']);
					$to = "enquiry@desiredcar.co.za";
					$from = "From: $name <$email>";
					$body = "Client Name: $name
					\nClient Phone: $phone
					\nClient Email: $email
					\r------------------------------------------------
					\rMessage: 
					\n$message ";
					
					$body = wordwrap($body,70);
					if(mail($to, $subject, $body, $from)){
                   	header ("Location: Webservice?id=$id&msg2=Your quote request has been successfully sent!");
					echo'<meta http-equiv="refresh" content="0;url=Webservice?id=$id&msg2=Your quote request has been successfully sent!>';
					exit();
	}
	else{
		header ("Location: Webservice?id=$id&msg1=Error: Unable to request a quote!   Please try again!");
		echo'<meta http-equiv="refresh" content="0;url=Webservice?id=Webservice?id=$id&msg1=Error: Unable to request a quote!   Please try again.!>';
		exit();
	}
	}
	
if($diagnostic){
					
					$name = strip_tags($_POST['name']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone']);
					$cyear = strip_tags($_POST['cyear']);
					$model = strip_tags($_POST['model']);
					$brand = strip_tags($_POST['brand']);
					$message = strip_tags($_POST['message']);
					$to = "enquiry@desiredcar.co.za";
                    $from = "From: $name <$email>";
					$subject = $brand." ".$model." ".$cyear;
					$body = "Client Name: $name
					\nClient Phone: $phone
					\nClient Email: $email
					\r------------------------------------------------
					\r-----------   CAR DETAILS  ---------------------
					\r------------------------------------------------
					\rMake : $brand
					\rModel : $model
					\rYear : $cyear
					\rMessage: 
					\n$message ";
					
					$body = wordwrap($body,70);
					if(mail($to, $subject, $body, $from)){
                   	header ("Location: Car-diagnostic?id=$id&msg3=Your request has been successfully sent!");
					echo'<meta http-equiv="refresh" content="0;url=Car-diagnostic?id=$id&msg3=Your request has been successfully sent!>';
					exit();
	}
	else{
		header ("Location: Car-diagnostic?id=$id&msg4=Error: Unable to send request!   Please try again!");
		echo'<meta http-equiv="refresh" content="0;url=Car-diagnostic?id=Car-diagnostic?id=$id&msg4=Error: Unable to send request!   Please try again.!>';
		exit();
	}
	}
	
?>