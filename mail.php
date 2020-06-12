<?php

// Temp Solution: Write messages to a file
//
$date = date("D M j G:i:s T Y");
$action = $_GET["action"];
$email = urldecode($_GET["email"]);
$comments = "";
if ($action == "contact") {
  $comments = urldecode($_GET["comments"]);
}

$f = fopen("mail.txt", "a") or die("Unable to open file!");

fwrite($f, "-------------------------------\n");
fwrite($f, "date: $date\n");
fwrite($f, "action: $action\n");
fwrite($f, "email:  $email\n");
if ($action == "contact") {
  fwrite($f, "comments:  $comments\n");
}

$to      = "info@hogsmill.com";
$subject = "$action from agilesimulations.co.uk";
$message = $comments;
$headers = array(
    "From" => "info@agilesimulations.co.uk",
    "Reply-To" => "info@agilesimulations.co.uk",
    "X-Mailer" => "PHP/" . phpversion()
);

mail($to, $subject, $message, $headers);
?>
