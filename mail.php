<?php

$date = date("D M j G:i:s T Y");
$action = $_GET["action"];
$email = urldecode($_GET["email"]);
$comments = "";
if ($action == "contact") {
  $comments = urldecode($_GET["comments"]);
}

$message = "date: $date\naction: $action\nemail: $email\ncomments: $comments\n";
$f = fopen("mail.txt", "a") or die("Unable to open file!");

fwrite($f, $message);

$to      = "info@hogsmill.com";
$subject = "$action from agilesimulations.co.uk";
$headers = array(
    "From" => "info@agilesimulations.co.uk",
    "Reply-To" => "info@agilesimulations.co.uk",
    "X-Mailer" => "PHP/" . phpversion()
);

mail($to, $subject, $message, $headers);
?>
