<?php
$txtAAnalizar = "";
$txtTopPalabra = "";
$txtTop10Palabras = "";
$txtNubePalabras = "";

if(isset($_POST["btnAnalizar"])) {

  $txtAAnalizar = $_POST["txtAAnalizar"];
  $txtAAnalizar = strtolower($txtAAnalizar);
  /*
  $txtAAnalizar = str_replace(".", "", $txtAAnalizar);
  $txtAAnalizar = str_replace(",", "", $txtAAnalizar);
  $txtAAnalizar = str_replace("¡", "", $txtAAnalizar);
  */
  $txtAAnalizar = preg_replace("/[^\w\s]/", "", $txtAAnalizar);
  $txtAAnalizar = preg_replace("/\s\s/", "", $txtAAnalizar);
  //Converto el texto en un arreglo tipo list -> su acceso es ordinal -> se usa indices 0-n
  $arrTexto = explode(" ", $txtAAnalizar);

  $dicFrecuencias = array();

  foreach($arrTexto as $palabra) {
    if(isset($dicFrecuencias[$palabra])){
      $dicFrecuencias[$palabra] ++;
    } else {
      $dicFrecuencias[$palabra] = 1;
    }
  }
  
// sort -> ordenar ascendente devuelve una lista
// rsort ->odenar descendente devualce una lista
// asort -> order ascendente devuelve un diccionario
// arsort -> ordena descendente devuelve un diccionario
  arsort($dicFrecuencias);

  $firstFound = false;
  $ifTop10 = 0;
  $maxEM = 5;
  $topfreq = 0;

  // foreach( $lista as $valor){}
  // foreach( $diccionario as $llave => $valor){}
  foreach ($dicFrecuencias as $palabra => $freq) {
    if (!$firstFound){
      $txtTopPalabra = $palabra . " (" . $freq . ")";
      $topfreq = $freq;
      $firstFound = true;
    }
    if ($ifTop10 < 10) {
      $txtTop10Palabras .=  "<span>" . $palabra . " (" . $freq .") </span>";
      $ifTop10++;
    }
    $txtNubePalabras .= '<span style="font-size:'. ( $freq / $topfreq * $maxEM ) .'em">'. $palabra . " (". $freq . ") </span>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keyword Cloud</title>
</head>

<body>
  <h1>Key word cloud</h1>
  <form action="contadorpalabras.php" method="post">
    <label for="txtAAnalizar">Texto a Analizar</label>
    <textarea name="txtAAnalizar" id="txtAAnalizar"><?php echo $txtAAnalizar; ?></textarea>
    <br />
    <button type="submit" name="btnAnalizar" value="PRC">Analizar</button>
  </form>
  <section>
    <h2>Palabra con mayor Frecuencia</h2>
    <?php echo $txtTopPalabra; ?>
    <h2>Top 10 palabras</h2>
    <?php echo $txtTop10Palabras; ?>
    <h2>Nube de Palabras</h2>
    <?php echo $txtNubePalabras; ?>
  </section>
</body>

</html>
