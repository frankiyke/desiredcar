<?php
$caraval = @$_POST['caraval'];

if($caraval){
					$id = strip_tags($_POST['carid']);
					$brand = strip_tags($_POST['brand']);
					$model = strip_tags($_POST['model']);
					$price = strip_tags($_POST['price']);
					$name = strip_tags($_POST['name']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone']);
					$subject = strip_tags($_POST['status']);
					$message = strip_tags($_POST['discription']);
					$to = "enquiry@desiredcar.co.za";
					$from = "From: $name <$email>";
					$body = "Client"."'s"." Name: $name
					\nClient"."'s"." Phone: $phone
					\nClient"."'s"." Email: $email
					\r------------------------------------------------
					\rCar Link: https://www.desiredcar.co.za/Details?id=$id 
					\rBRAND: $brand
					\nMODEL: $model
					\nPRICE: R $price
					\r$message ";
					
					$body = wordwrap($body,70);
					if(mail($to, $subject, $body, $from)){
                    	header ("Location: Details?id=$id&msg2=Thank you. Your request has been received, we will contact you shortly");
						echo'<meta http-equiv="refresh" content="0;url=Details?id=$id&msg2=Thank you. Your request has been received, we will contact you shortly.>';
						exit();
	}
	else{
		header ("Location: Details?id=$id&msg2=Failed to sent!");
		echo'<meta http-equiv="refresh" content="0;url=Details?id=Details?id=$id&msg2=Failed to sent!>';
		exit();
	}
	}
?>