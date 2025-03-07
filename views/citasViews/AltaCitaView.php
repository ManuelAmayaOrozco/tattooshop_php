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
    <title>AltaCita</title>
</head>

<body>

    <main class="body__main">
        <form class="main__form-plantilla" action="/tattooshop_php/citas/alta" method="post">
            <div class="form-plantilla__container">
                <div class="form-group">
                    <label for="input_id">Id</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_id" name="input_id"
                        aria-describedby="id"
                        placeholder="Introduce el id"
                        style="border-color: <?= isset($errores) && isset($errores["error_id"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_id"])):?><small id="idError" class="form-text text-danger"><?= $errores["error_id"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_descripcion">Descripcion</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_descripcion"
                        name="input_descripcion"
                        aria-describedby="descripcion"
                        placeholder="Introduce tu idea"
                        style="border-color: <?= isset($errores) && isset($errores["error_descripcion"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_descripcion"])):?><small id="descripcionError" class="form-text text-danger"><?= $errores["error_descripcion"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_fecha_cita">Fecha y hora para la cita</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_fecha_cita"
                        name="input_fecha_cita"
                        aria-describedby="fechacita"
                        placeholder="Introduce la fecha y hora"
                        style="border-color: <?= isset($errores) && isset($errores["error_fecha_cita"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_fecha_cita"])):?><small id="fechaCitaError" class="form-text text-danger"><?= $errores["error_fecha_cita"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_cliente">Nombre cliente</label>
                    <input type="text"
                        class="shadow form-control "
                        id="input_cliente"
                        name="input_cliente"
                        placeholder="Nombre cliente"
                        style="border-color: <?= isset($errores) && isset($errores["error_cliente"]) ? "red" : "" ?>">
                    <?php if (isset($errores) && isset($errores["error_cliente"])):?><small id="clienteError" class="form-text text-danger"><?= $errores["error_cliente"]?></small> <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="input_tatuador">Nombre tatuador</label>
                    <select type="text"
                        class="shadow form-control "
                        id="input_tatuador"
                        name="input_tatuador"
                        style="border-color: <?= isset($errores) && isset($errores["error_tatuador"]) ? "red" : "" ?>">
                        <option value="" selected>-Elige tatuador-</option>
                        <?php if(isset($tatuadores)): ?>
                            <?php foreach ($tatuadores as $tatuador): ?>
                                <option value="<?= $tatuador["nombre"] ?>"><?= $tatuador["nombre"] ?></option>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </select>
                    <?php if (isset($errores) && isset($errores["error_tatuador"])):?><small id="tatuadorError" class="form-text text-danger"><?= $errores["error_tatuador"]?></small> <?php endif;?>
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