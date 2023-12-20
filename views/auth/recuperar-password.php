<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuación</p>

<?php include_once __DIR__ . '/../templates/alertas.php' ?>

<?php if ($error) { return; } ?>

<form method="POST" class="formularion">

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu Nuevo Password">
    </div>

    <input type="submit" value="Guardar Nuevo Password" class="boton">

</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Ya tienes cuenta? Iniciar Sesión</a>
    <a href="/olvide">¿Aún no tienes una cuenta? Crear una</a>
</div>