<?php

echo "hash wachtwoord" . PHP_EOL;
$wachtwoord = readline();
echo password_hash($wachtwoord, PASSWORD_DEFAULT);