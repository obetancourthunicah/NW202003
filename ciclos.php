<?php
$txtNombre = '';
$htmlBuffer = '';

if (isset($_POST["btnProcesar"])) {
  $txtNombre = $_POST["txtNombre"];
  // Todo valor que viene de un formulario html es ¡¡¡TEXTO!!!
  $intIteraciones = intval($_POST["lstIteraciones"]);

  $k = 0;
  while ($k < $intIteraciones){
    $htmlBuffer .= 'Tu nombre es '.$txtNombre.'.<br/>';
    $k++;
    //$k = $k+1;
    //$k += 1;
  }
}

$intOpcion = "A";

switch($intOpcion){
  case "A":
    break;
  case "B":
    break;
  case "C":
    break;
  default:
    break;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ciclos</title>
</head>

<body>
  <h1>Ciclos</h1>
  <form action="ciclos.php" method="post">
    <label for="txtNombre">Nombre Completo</label>
    <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre a repetir" />
    <br />
    <label for="lstIteraciones">Número de Repeticiones</label>
    <select name="lstIteraciones" id="lstIteraciones">
      <?php
      echo '<option value="1">Una Iteración</option>';
      for ($i = 2; $i <= 100; $i++) {
        echo '<option value="' . $i . '">' . $i . ' Iteraciones</option>';
      }
      ?>
    </select>
    <br />
    <button name="btnProcesar" id="btnProcesar" type="submit" value="prc">Procesar</button>
  </form>
  <section>
    <?php echo $htmlBuffer; ?>
  </section>
</body>

</html>
