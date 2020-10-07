<?php
/*
1) Formulario con dos botones uno para registrar entrada de
  cliente, y el otro para registrar salida de cliente --- DONE
2) Pocesar la información capturada para determinar
  cuantos clientes entrar por minuto,
  cuantos clientes salen por minuto.
3) Toda la información capturada debe ser almacenada
  en un documento json.
 */

$clientes = 0;
$entradas = 0;
$salidas = 0;
$clientesXMinutos=0;
$stamps = array();

$arrDatos = array();
if (file_exists("clientscnt.json")) {
  $strFileJsonString = file_get_contents("clientscnt.json");
  $arrDatos = json_decode($strFileJsonString,"true");
  $clientes = $arrDatos["cliente"];
  $entradas = $arrDatos["entradas"];
  $salidas = $arrDatos["salidas"];
  $clientesXMinutos = $arrDatos["clientesXMinutos"];
  $stamps = $arrDatos["stamps"];
}

if( isset($_POST["btnEntrada"])) {
  $entradas += 1;
  $clientes ++;
  $stamps[] = array(
    "clientes" => $clientes,
    "time" => time()
  );

  $clientesXMinutos = saveToFile($clientes, $entradas,$salidas, $stamps);
}

if (isset($_POST["btnSalida"])) {
  $salidas += 1;
  $clientes --;
  $stamps[] = array(
    "clientes" => $clientes,
    "time" => time()
  );
  $clientesXMinutos = saveToFile($clientes, $entradas, $salidas, $stamps);
}


function saveToFile($cli, $ent, $sld, $arrTimes ) {
  $arrDatos["cliente"] = $cli;
  $arrDatos["entradas"] = $ent;
  $arrDatos["salidas"] = $sld;
  $arrDatos["stamps"] = $arrTimes;
  $clientesXMinutos = 0;

  // reccorrer el arreglo (lista) $arrTimes, sumar y contar todos los elementos que esten en un rango de 5 minutos
  $threshold = 5 * 60 * 1000;
  $start = time() - $threshold;

  $clientesSum = 0;
  $clientesCount = 0;
  foreach($arrTimes as $timeData) {
    if($timeData["time"] >= $start) {
        $clientesSum += $timeData["clientes"];
        $clientesCount ++;
    }
  }
  if ($clientesCount > 0){
    $clientesXMinutos = round($clientesSum / $clientesCount, 2);
  }
  $arrDatos["clientesXMinutos"] = $clientesXMinutos;

  //¿que es serializar? Es convetir una estructura binaria a un formato
  // legible que pueda ser almacenado.  JSON
  $strSerializedData = json_encode($arrDatos);
  file_put_contents("clientscnt.json", $strSerializedData);
  return $clientesXMinutos;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Door flow Dashboard</title>
</head>

<body>
  <h1>Contador de Entradas y Salidas de Cliente</h1>
  <form action="clientcounter.php" method="post">
    <button type="submit" name="btnEntrada" value="1">Entrada</button>
    <button type="submit" name="btnSalida" value="1">Salida</button>
  </form>
  <hr />
  <section>
    <table>
      <tbody>
        <tr>
          <th>Clientes en la tienda</th>
          <td><?php echo $clientes; ?></td>
        </tr>
        <tr>
          <th>Entradas hasta el momento</th>
          <td><?php echo $entradas; ?></td>
        </tr>
        <tr>
          <th>Salidas hasta el momento</th>
          <td><?php echo $salidas; ?></td>
        </tr>
        <tr>
          <th>Cliente por minuto</th>
          <td><?php echo $clientesXMinutos; ?></td>
        </tr>
      </tbody>
    </table>
  </section>
</body>

</html>
