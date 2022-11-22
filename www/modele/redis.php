<?php
    $redis = new Redis() or die("Cannot load Redis module in PHP.");
    $redis->connect('redis', 6379);
    $redis->auth('redis');
