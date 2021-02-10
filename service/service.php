<?php
include('ServiceEvaluator.php');
use Datto\JsonRpc\Server;
use Service\ServiceEvaluator;

require_once __DIR__ . '/../vendor/autoload.php';

$server = new Server(new ServiceEvaluator());
header('Content-Type: application/json');
$message = file_get_contents('php://input');
$reply = $server->reply($message);

echo $reply;
$filecontent = date("j.n.Y").' Message received :'.$message.PHP_EOL;
$filecontent .= date("j.n.Y").' Message reply :'.$reply.PHP_EOL;
file_put_contents(__DIR__ . '/../logs/log_'.date("j.n.Y").'.log',$filecontent, FILE_APPEND);