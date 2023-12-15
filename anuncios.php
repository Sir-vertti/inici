<?php
    include './includes/templates/header.php';
?>

    <main class="contenedor seccion">

        <h2>Casas y Depas en Venta</h2>
        <?php
            $limites = 10;
            include 'includes/templates/anuncio.php';
        ?>
        
    </main>

    <?php
    include '././includes/templates/footer.php';
?>
  