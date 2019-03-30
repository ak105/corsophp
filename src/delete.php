<?php

$id = $_GET['id'];

$db = new mysqli("localhost", "root", "", "test");
$data = $db->query("DELETE FROM cols WHERE id = $id");
header("Location: /index.php");