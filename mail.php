<?php

$date = date("D M j G:i:s T Y");
$action = $_GET["action"];
$name = urldecode($_GET["name"]);
$email = urldecode($_GET["email"]);
$mobile = urldecode($_GET["mobile"]);
$company = urldecode($_GET["company"]);
$game = urldecode($_GET["game"]);
$comments = urldecode($_GET["comments"]);

$message = "----------------------------\ndate: $date\naction: $action\nname: $name\nemail: $email\nmobile: $mobile\ncompany: $company\ngame: $game\ncomments: $comments\n";

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
