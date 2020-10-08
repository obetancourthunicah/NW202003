<?php 
  $db = new SQLite3("agenda.sqlite");
  $db->exec("CREATE TABLE IF NOT EXISTS agenda (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT, telefono TEXT, correo TEXT, observacion TEXT);");

  function addToAgenda($nombre, $telefono, $correo, $observacion){
      global $db;
      $insertSQL =  "INSERT INTO agenda(nombre, telefono, correo, observacion) values('%s', '%s', '%s', '%s');";
      $insertSQLFinal = sprintf($insertSQL, $nombre, $telefono, $correo, $observacion);
      $inserted = $db->exec($insertSQLFinal);
      return $inserted;
  }

  function getAllAgenda(){
    global $db;
    $crsAgendaRows = $db->query("select * from agenda;");
    $agendaRows = $crsAgendaRows->fetchArray();
    return $agendaRows;
  }

  function getAgendaByName($nombre){
    global $db;
    $crsAgendaRows = $db->query(
      sprintf(
        "select * from agenda where nombre like '%s'",
        $nombre . '%'
      )
    );
    $agendaRows = $crsAgendaRows->fetchArray();
    return $agendaRows;
  }

?>
