<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'FinalsDB';

    $Connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($Connection->connect_error) {
        die("Connection failed: " . $Connection->connect_error);
    }

