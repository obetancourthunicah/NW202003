<?php

session_start();
$txtNombre = "";
$txtCorreo = "";
$dttFecha = time();
$registros = array();
if (isset($_SESSION["registros"])) {
  $registros = $_SESSION["registros"];
}
if (isset($_POST["btnEnviar"])) {
  $txtNombre = $_POST["txtNombre"];
  $txtCorreo = $_POST["txtCorreo"];

  $item = array(
    "nombre" => $txtNombre,
    "correo" => $txtCorreo,
    "fecha" => $dttFecha
  );

  $registros[] = $item;
  $_SESSION["registros"] = $registros;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pauta Examen</title>
</head>

<body>
  <h1>Pauta</h1>
  <form action="pauta.php" method="post">
    <label for="txtNombre">Nombre Completo</labe>
      <input type="text" id="txtNombre" name="txtNombre" value="" placeholder="Nombre Completo" />
      <br />
      <label for="txtCorreo">Correo</labe>
        <input type="email" id="txtCorreo" name="txtCorreo" value="" placeholder="Correo Electrónico" />
        <br />
        <button type="submit" name="btnEnviar">Enviar</button>
  </form>
  <?php if (count($registros) > 0) { ?>
    <section>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $number = 0;
          foreach ($registros as $item) {
            $number++;
          ?>
            <tr>
              <td><?php echo $number; ?></td>
              <td><?php echo $item["nombre"]; ?></td>
              <td><?php echo $item["correo"]; ?></td>
              <td><?php echo $item["fecha"]; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  <?php } ?>
</body>

</html>
