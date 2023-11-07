<?php

//check if form was sent
if ($_POST) {

  $to = 'some@email.com';
  $subject = 'Testing HoneyPot';
  $header = "From: $name <$name>";

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  //honey pot field
  $honeypot = $_POST['firstname'];

  //check if the honeypot field is filled out. If not, send a mail.
  if (!empty($honeypot)) {
    return; //you may add code here to echo an error etc.
  } else {
    mail($to, $subject, $message, $header);
  }
}

?>

<html>

<head>
  <style>
    .hide-robot {
      display: none;
    }
  </style>
</head>

<body>

  <form method="post" action="#my-form" id="my-form">
    <!-- Create fields for the honeypot -->
    <input name="firstname" type="text" id="firstname" class="hide-robot">
    <!-- honeypot fields end -->
  </form>

</body>

</html>