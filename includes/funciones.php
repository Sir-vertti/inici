<?php
function estaAutenticado(): bool
{
    session_start();

    $auth = $_SESSION['login'];

    if (!$auth) {
        header('Location: /');
    }

    return $auth;

}