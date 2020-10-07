<?php

require_once "libreria.php";
// Le Totsuki  | Guerra de Comida | Shokugueki no souma

$txtNombre = "";
$telefono = "";
$correo = "";
$fecha = "Vrn";
$mesa = "005";
$comensales = "";

$fechasDisponibles = obtenerfechasDisponibles();
$mesasDisponibles = obtenerMesasDisponibles();

if(isset($_POST["btnReservar"])){
  $txtNombre = $_POST["txtNombre"];
  $telefono = $_POST["telefono"];
  $correo = $_POST["correo"];
  $fecha = $_POST["fecha"];
  $mesa = $_POST["mesa"];
  $comensales = intval($_POST["comensales"]);
  $total = 0;
  $reserva = array(
    "nombre" =>$txtNombre,
    "telefono" => $telefono,
    "correo" => $correo,
    "fecha" => obetenerFechaPorID($fecha),
    "mesa" => obetenerMesaPorID($mesa),
    "comensales" => $comensales,
    "total" => $total,
  );
  $reserva["total"] = $reserva["mesa"]["precio"] * $reserva["comensales"];
  guardarReserva($reserva);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva de Mesa de Totsuki</title>
</head>

<body>
  <h1>Reservas de Mesa</h1>
  <a href="reservas_posteadas.php" taget="_blank">Ir a ver reservaciones</a><br/>
  <form action="reservas.php" method="post">
    <label for="txtNombre">Nombre Completo</label>
    <input id="txtNombre" name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre Completo" type="text" />
    <br />
    <label for="telefono">Teléfono</label>
    <input id="telefono" name="telefono" value="<?php echo $telefono ?>" placeholder="Teléfono" type="text" />
    <br />
    <label for="correo">Correo Electrónico</label>
    <input id="correo" name="correo" value="<?php echo $correo ?>" placeholder="correo electrónico" type="email" />
    <br />
    <label for="fecha">Seleccione una Fecha</label>
    <select id="fecha" name="fecha">
      <?php echo createComboOptions($fechasDisponibles, "id", "descipcion", $fecha); ?>
    </select>
    <br />
    <label for="mesa">Seleccione una Mesa</label>
    <select id="mesa" name="mesa">
      <?php echo createComboOptions($mesasDisponibles, "id", "mesa", $mesa); ?>
    </select>
    <br />
    <label for="comensales">Número de Comensales</label>
    <select id="comensales" name="comensales">
      <?php
      for ($i = 1; $i <= 15; $i++) {
        echo '<option value="' . $i . '" ' . (($i == $comensales) ? "selected" : "") . '>' . $i . ' Comensales</option>';
      }
      ?>
    </select>
    <br />
    <button type="submit" name="btnReservar">Establecer Reserva</button>
  </form>
</body>

</html>
