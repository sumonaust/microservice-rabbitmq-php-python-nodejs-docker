<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;



$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();

for($i= 0 ; $i<100000; $i++){
    $channel->queue_declare('email_queue', false, true, false, false);
    $msg = new AMQPMessage("Email  no # $i");
    $channel->basic_publish($msg, '', 'email_queue');
     echo " [x] PHP Microservice :::: email no# $i  sent to Queue!'\n";
}

echo "Sent all emails....";

$channel->close();
$connection->close();
