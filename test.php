<?php

$token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$token = str_shuffle($token);
$token = substr($token, 0, 8);

echo($token);

?>