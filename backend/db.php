<?php

require_once "config.php";

$servername   = "212.144.99.247";
$username     = "ottuu_admin";
$password     = "Jdoy&460";
$dbName       = "web-rauschwitz";

$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
  printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
  exit();
}
