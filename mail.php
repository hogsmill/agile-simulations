<?php

$date = date("D M j G:i:s T Y");
$action = $_GET["action"];
$email = urldecode($_GET["email"]);
$comments = urldecode($_GET["comments"]);

$message = "----------------------------\ndate: $date\naction: $action\nemail: $email\ncomments: $comments\n";

$f = fopen("mail.txt", "a") or die("Unable to open file!");

fwrite($f, $message);

$to      = "info@agilesimulations.co.uk";
$subject = "$action from agilesimulations.co.uk";
$headers = array(
    "Reply-To" => "info@agilesimulations.co.uk",
    "X-Mailer" => "PHP/" . phpversion()
);

$email_from = "info@agilesimulations.co.uk";
ini_set("SMTP", "websmtp.livemail.co.uk");
ini_set("sendmail_from", "$email_from");

if (!empty($comments)) {
  mail($to, $subject, $message, $headers, '-f'.$email_from);
}

?>
