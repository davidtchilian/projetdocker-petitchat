<?php
require_once("modele/redis.php");
$coRedis=$redis->connect('redis');
$result = $coRedis->ping();
var_dump($result);
die;