<?php

/* Check all form inputs using check_input function */

$name = check_input($_POST['inputName'], "Your Name is emty");

$contact = $_POST['inputContact'];

$email = check_input($_POST['inputEmail'], "Your E-mail Address is empty or needs to be in the right format");

$message = $_POST['inputMessage'];



/* If e-mail is not valid show error message */

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))

{

show_error("Invalid e-mail address");

}

/* Let's prepare the message for the e-mail */



$subject = $name;



// To send HTML mail, the Content-type header must be set.



$headers = 'MIME-Version: 1.0' . "\r\n";



$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



$headers .= 'From:' . $email. "\r\n"; // Sender's Email



$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender



$template = '<div style="padding:50px; color:white;">Hello Your Name, <br/><br/> You just got an email from: ' . $name . '<br/>'



. '<br/>Here are the details of the message:<br/><br/>'



. 'Name:' . $name . '<br/>'



. 'Email:' . $email . '<br/>'



. 'Contact No:' . $contact . '<br/>'



. 'Message:' . $message . '<br/><br/>'



. '<br/>'



. '</div>';



$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";



// Message lines should not exceed 70 characters (PHP rule), so wrap it.



$sendmessage = wordwrap($sendmessage, 70);



// Send mail by PHP Mail Function.

$to = array('youremail@example.com', 'youremail2@example.com');



mail(implode(',', $to), $subject, $sendmessage, $headers);





/* Redirect visitor to the thank you page */

header('Location: index.php?message=sent');

exit();



/* Functions we used */

function check_input($data, $problem='')

{

$data = trim($data);

$data = stripslashes($data);

$data = htmlspecialchars($data);

if ($problem && strlen($data) == 0)

{

show_error($problem);

}

return $data;

}



function show_error($myError)

{

?>

<html>

<head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

<meta name="robots" content="noindex" />



</head>

<body>



<p class="alert alert-danger">Please correct the following error:</p>

<strong><?php echo $myError; ?></strong>

<p>Hit the back button and try again</p>



</body>

</html>

<?php

exit();

}

?>