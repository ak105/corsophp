<?php

$name = $_GET['name'];
$id = $_GET['id'];

$db = new mysqli("localhost", "root", "", "test");
$data = $db->query("UPDATE cols SET name='$name' WHERE id=$id");
var_dump($data);
header("Location: /index.php");