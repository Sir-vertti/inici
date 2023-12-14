<?php

    $resultado = $_GET['resultado'] ?? null;
    include '../includes/templates/header.php';
?>


    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($resultado) === 1): ?> 
             <p class="alerta exito"> Anuncio Creado correctamente </p>
         <?php endif; ?>

        <a href="../../admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Casa en la playa</td>
                        <td><img src="/Imagenes/e5a26d70a91b59542747922eda1234fe.jpg" alt="imagen-tabla" class="imagen-tabla"></td>
                        <td>$1500</td>
                        <td>
                            <a href="#" class="boton-rojo-block">Eliminar</a>
                            <a href="#" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                </tbody>

            </table>

    </main>

    <?php
    include '../includes/templates/footer.php';
?>
  