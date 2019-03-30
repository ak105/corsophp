<?php

$name = $_GET['name'];

$db = new mysqli("localhost", "root", "", "test");
$data = $db->query("INSERT INTO cols (name) VALUES ('$name')");
var_dump($data);
header("Location: /index.php");