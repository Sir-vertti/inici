<?php

require 'includes/config/database.php';

$db = conectarDB();

$errores = [];


//autentcar el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            //revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            //verificar si el password es correcto o no
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                //el usuario esta autenticado
                session_start();

                //llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}



include './includes/templates/header.php';
?>


<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>


            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu Contraseña" id="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">

    </form>

</main>
<?php
include '././includes/templates/footer.php';
?>