<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/citasStyles/styles_altaCita.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FLATPICKR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>AltaTatuador</title>
</head>

<body>

    <main class="body__main">
        <form class="main__form-plantilla" action="/tattooshop_php/tatuadores/alta" method="post">
            <div class="form-plantilla__container">
                <div class="form-group">
                    <label for="input_nombre">Nombre</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_nombre" name="input_nombre"
                        aria-describedby="nombre"
                        placeholder="Introduce el nombre"
                        style="border-color: <?= isset($errores) && isset($errores["error_nombre"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_nombre"])):?><small id="nombreError" class="form-text text-danger"><?= $errores["error_nombre"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_email">Email</label>
                    <input type="email"
                        class="shadow form-control "
                        id="input_email"
                        name="input_email"
                        aria-describedby="email"
                        placeholder="Introduce tu email"
                        style="border-color: <?= isset($errores) && isset($errores["error_email"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_email"])):?><small id="emailError" class="form-text text-danger"><?= $errores["error_email"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_password">Contraseña</label>
                    <input type="password"
                        class="shadow form-control "
                        id="input_password"
                        name="input_password"
                        aria-describedby="password"
                        placeholder="Introduce tu contraseña"
                        style="border-color: <?= isset($errores) && isset($errores["error_password"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_password"])):?><small id="passwordError" class="form-text text-danger"><?= $errores["error_password"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_foto">Foto</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_foto"
                        name="input_foto"
                        placeholder="Enlace foto (Opcional)"
                        style="border-color: <?= isset($errores) && isset($errores["error_foto"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_foto"])):?><small id="fotoError" class="form-text text-danger"><?= $errores["error_foto"]?></small> <?php endif;?>
                </div>
                <div class="container__btns-form">
                    <button type="submit" class="btn btn-primary btns-form__btn-enviar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </form>
        <?php if (isset($errores) && isset($errores["error_db"])):?>
            <p id="dbError" class="text-danger"><?= $errores["error_db"]?></p>
        <?php endif;?>
    </main>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../public/js/datepickerinitialzr.js"></script>