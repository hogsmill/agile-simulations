<?php

// Temp Solution: Write messages to a file
//
$data = urldecode($_GET["data"])

$date = date("D M j G:i:s T Y");
$action = $data["action"];
$email = $data["email"];
if ($action == "contact") {
  $comments = $data["conmments"];
}

$f = fopen("mail.txt", "a") or die("Unable to open file!");

fwrite($f, "-------------------------------\n");
fwrite($f, "date: $date\n");
fwrite($f, "action: $action\n");
fwrite($f, "email:  $email\n");
if ($action == "contact") {
  fwrite($f, "commecnts:  $email\n");
}

//$to      = "info@hogsmill.com";
//$subject = "the subject";
//$message = "hello";
//$headers = array(
//    "From" => "info@agilesimulations.co.uk",
//    "Reply-To" => "info@agilesimulations.co.uk",
//    "X-Mailer" => "PHP/" . phpversion()
//);
//
//mail($to, $subject, $message, $headers);
?>
