<?php
require_once "libreria.php";

$reservas = obtenerReservas();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas</title>
</head>

<body>
  <h1>Reservas</h1>
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>A Nombre de</th>
        <th>Dia</th>
        <th>Comensales</th>
        <th>Mesa</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $contador = 1;
    foreach ($reservas as $reserva){
      ?>
      <tr>
        <td><?php  echo $contador;?></td>
        <td> <?php echo $reserva["nombre"];?></td>
        <td><?php echo $reserva["fecha"]["descipcion"];?></td>
        <td><?php echo $reserva["comensales"];?></td>
        <td><?php echo $reserva["mesa"]["mesa"];?></td>
        <td><?php echo $reserva["total"];?></td>
      </tr>
      <?php
      $contador++;
    } // end foreach reserva
      ?>
    </tbody>
  </table>
</body>

</html>
