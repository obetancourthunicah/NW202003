<?php

$txtNombre = "";
$txtEmail = "";
$txtResult = "";
if ( isset($_POST["btnProcesar"]) ) {
   $txtNombre = $_POST["txtNombre"];
   $txtEmail = $_POST["txtEmail"];
   $txtResult = "Buenas estimad@ " . $txtNombre .
      " se enviará a su correo " .
      $txtEmail .
      " la confirmación de suscripción.";
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captura de Datos Demográficos</title>
</head>

<body>
  <h1>Datos Generales</h1>
  <form action="variables.php" method="post">
    <input type="text" id="txtNombre" name="txtNombre"
    value="<?php echo $txtNombre; ?>" placeholder="Nombre Completo" />
    <br />
    <input type="email" id="txtEmail" name="txtEmail" placeholder="corre@electro.nico" 
    value="<?php echo $txtEmail; ?>" />
    <br />
    <button type="submit" name="btnProcesar">Enviar</button>
  </form>
  <p>
    <?php echo $txtResult; ?>
  </p>
</body>

</html>
