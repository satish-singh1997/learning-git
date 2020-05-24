<?php

$id = "ACcb0867a04c2e6495238c9dd06fe4c7ad";
$token = "851d549df7e76ee1080d18d61eda640d";
//$url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
$url = "https://api.twilio.com/2010-04-01/Accounts/$id/Messages.json";

$from = "whatsapp:+918360879939  ";
//$to = "+".$_POST['action'];; // twilio trial verified number
$to = "whatsapp:+918360879939"; // twilio trial verified number
$body = "Hi, I'm a test developer thanks!!";
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);
/* echo '<pre>';
print_r($data);
echo '</pre>'; */
$post = http_build_query($data);
$ch = curl_init($url );
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$id:$token");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$output = curl_exec($ch);
curl_close($ch);
echo "<pre>";
print_r($output);
echo "</pre>";

?>