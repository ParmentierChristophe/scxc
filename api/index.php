<?php

require __DIR__ . '/vendor/autoload.php';
use \Ovh\Api;

$applicationKey = 'IH9YNXYqHraxJmH6';
$applicationSecret = 'G2tXR4f2M24bK7OC1X9PRjtzfoHiBeSO';
$consumer_key = 'COpHY4TYkoVNxtsadeNjSOgrWSHNNJdj';
$endpoint = 'ovh-eu';

$conn = new Api( $applicationKey,
                $applicationSecret,
                $endpoint,
                $consumer_key);

$smsServices = $conn->get('/sms/');

$message = "Message de test";
if (isset($_GET["message"])) {
  $message = $_GET["message"];
}

$phone = "+33677719143";
if (isset($_GET["phone"])) {
  $phone = '+'.$_GET["phone"];
}

$content = (object) array(
  "charset"=> "UTF-8",
  "class"=> "phoneDisplay",
  "coding"=> "7bit",
  "message"=> $message,
  "noStopClause"=> false,
  "priority"=> "high",
  "receivers"=> [ $phone ],
  "senderForResponse"=> true,
  "validityPeriod"=> 2880
);

$resultPostJob = $conn->post('/sms/'. $smsServices[0] . '/jobs/', $content);
print_r($resultPostJob);

$smsJobs = $conn->get('/sms/'. $smsServices[0] . '/jobs/');
print_r($smsJobs);