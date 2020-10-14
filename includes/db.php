<?php

$db_config = [
    "db_host" => "localhost",
    "db_name" => "sdde_composer",
    "db_user" => "sdde_composer",
    "db_pass" => "eGSaYSRz1YI6"
];

$Conn = new PDO("mysql:host=".$db_config['db_host'].";dbname=".$db_config['db_name'], $db_config['db_user'], $db_config['db_pass']);



