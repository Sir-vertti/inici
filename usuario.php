<?php
require 'includes/config/database.php';

$db = conectarDB();

// crear un email y un usuario
$email = "correo@correo.com";
$password = "123456";

// hashear el password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";

// agregarlo a la base de datos
mysqli_query($db, $query);
?>
