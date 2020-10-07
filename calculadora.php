<?php 

$intOperando1 = 0;
$intOperando2 = 0;
$intResultado = 0;

if (isset($_POST["btnProcesar"])){
  $intOperando1 = floatval($_POST["intOperando1"]);
  $intOperando2 = floatval($_POST["intOperando2"]);
  $operacion = $_POST["btnProcesar"];
  switch($operacion){
  case 'ADD':
    $intResultado = $intOperando1 + $intOperando2;
    break;
  case 'SUB':
    $intResultado = $intOperando1 - $intOperando2;
    break;
  case 'MUL':
    $intResultado = $intOperando1 * $intOperando2;
    break;
  case 'DIV':
    $intResultado = ($intOperando2 === 0) ? "Operación División por 0 no permitida" : $intOperando1 / $intOperando2;
    break;
  } // end switch
} // end if isset btnProcesar

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora Simple</title>
</head>

<body>
  <h1>Calculador Simple</h1>
  <form action="calculadora.php" method="post">
    <label for="intOperando1">Operador 1</label>
    <input type="number" name="intOperando1" id="intOperando1" value="<?php echo $intOperando1; ?>" placeholder="Primer Operando" />
    <br />
    <label for="intOperando2">Operador 2</label>
    <input type="number" name="intOperando2" id="intOperando2" value="<?php echo $intOperando2; ?>" placeholder="Segundo Operando" />
    <br />
    <button type="submit" name="btnProcesar" value="ADD">Sumar</button>
    <button type="submit" name="btnProcesar" value="SUB">Restar</button>
    <button type="submit" name="btnProcesar" value="MUL">Multiplicar</button>
    <button type="submit" name="btnProcesar" value="DIV">Dividir</button>

  </form>
  <div>
    <?php echo $intResultado; ?>
  </div>
</body>

</html>
