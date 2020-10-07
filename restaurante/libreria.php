<?php
session_start();

/*
  1. Obtener la lista de reservas de la sesion SI EXISTE. Sino Existe crear una vacia. OK
  2. De lista obtenida agrega la nueva reserva OK
  3. Guarda la nueva lista que incluye la nueva reserva en la sesión. OK
 */

function guardarReserva($reserva){
  $reservas = array();
  if(isset($_SESSION["reservas"])){
    $reservas = $_SESSION["reservas"];
  }
  $reservas[] = $reserva;
  $_SESSION["reservas"] = $reservas;
}

function obtenerReservas(){
  $reservas = array();
  if (isset($_SESSION["reservas"])) {
    $reservas = $_SESSION["reservas"];
  }
  return $reservas;
}

function obtenerMesasDisponibles(){
  return array(
  array("id" => "001", "mesa" => "Mesa Balcón Redonda 1", "precio" => 1000),
  array("id" => "002", "mesa" => "Mesa Balcón Cuadrada 2", "precio" => 900),
  array("id" => "003", "mesa" => "Mesa Sala Redonda 1", "precio" => 800),
  array("id" => "004", "mesa" => "Mesa Sala Redonda 2", "precio" => 800),
  array("id" => "005", "mesa" => "Mesa VIP Salón", "precio" => 5000)
  );
}

function obetenerMesaPorID($id){
  $mesa = array();
  foreach(obtenerMesasDisponibles() as $mesaI){
    if($mesaI["id"] == $id){
      $mesa = $mesaI;
      break;
    }
  }
  return $mesa;
}

function obtenerfechasDisponibles()
{
  return array(

    array("id" => "Lns", "descipcion" => "Lunes"),
    array("id" => "Mrt", "descipcion" => "Martes"),
    array("id" => "Mrc", "descipcion" => "Miercoles"),
    array("id" => "Jvs", "descipcion" => "Jueves"),
    array("id" => "Vrn", "descipcion" => "Viernes"),
    array("id" => "Sbd", "descipcion" => "Sábado"),
    array("id" => "Dmg", "descipcion" => "Domingo")

  );
}

function obetenerFechaPorID($id)
{
  $fecha = array();
  foreach (obtenerfechasDisponibles() as $fechaI) {
    if ($fechaI["id"] == $id) {
      $fecha = $fechaI;
      break;
    }
  }
  return $fecha;
}

/**
 * Una función BIEN ABSTRACTA, que devuelve una cadena html corespondiente
 * a los elemento OPTION html de un combobox.
 *
 * @param [array]  $arreglo       Es una lista de diccionarios que represntan una tabla
 * @param [string] $valueCol      Es la llave que identifica el valor identificativo de la lista de diccionarios
 * @param [string] $textCol       Es la llave que identifica el valor descriptivo de la lista de dicceionarios
 * @param [any]    $selectedValue Es el valor del registro que se desea dejar como seleccionado
 * @return void
 */
function createComboOptions($arreglo, $valueCol, $textCol, $selectedValue){
  $htmlBuffer = "";
  foreach($arreglo as $element){
    $htmlBuffer .= '<option value="'.$element[$valueCol].'" '.(($element[$valueCol]==$selectedValue)? "selected":"").'>'.$element[$textCol].'</option>';
  }
  return $htmlBuffer;
}

?>
