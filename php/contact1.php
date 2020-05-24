<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Please enter your name';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Please enter your message';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;

	}



	$name = filter_input(INPUT_POST, 'name');
	$number = filter_input(INPUT_POST,'number');
	$service= filter_input(INPUT_POST,'service');
	$subject=$service;
	$item=filter_input(INPUT_POST,'item');
	$quant= filter_input(INPUT_POST,'quant');
	$dis=filter_input(INPUT_POST,'dis');
	$email = filter_input(INPUT_POST, 'email');
	$message = filter_input(INPUT_POST, 'message');

	$to = "studentarea43@gmail.com, $email";  // please change this email id
$subject = "Contact Details";
$txt = "Your order Details are:\n
Name: $name\n
email: $email\n
subject: $service\n
item: $item\n
quantity: $quant\n
discription: $dis\n
contact number:$number\n
Address: $message";
$headers = "From: studentarea43@gmail.com" . "\r\n" .
"CC: $email";



	//send the email
	$result = '';
	if (mail ($to, $subject, $txt, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Something bad happend during sending this message. Please try again later';
	$result .= '</div>';

	echo $result;
	?>
