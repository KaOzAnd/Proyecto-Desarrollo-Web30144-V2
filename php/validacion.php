<?php 
require_once('conexion.php');
if ($mysqli->connect_error) {
  die('"Fallo la conexión hacia la Base datos MySQL:  (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
  exit;
}else {
  echo "Conexión hacia la BD $database fue exitosa...!"; 
}

if (isset($_POST['enviar_datos'])) {
  $nombres = $_POST['nombres'];
  $correo = $_POST['email'];
  $dominioWeb = $_POST['web'];
  $mensaje = $_POST['comentarios'];

  $insetarDatos = "INSERT INTO informacion VALUES('$nombres','$correo','$dominioWeb','$mensaje')";

  $ejecutarInsertar = mysqli_query($mysqli, $insetarDatos);
 
  if(!$ejecutarInsertar){
    echo"No se pudo ejecutar insertar los datos:";
    echo "Error: " . $ejecutarInsertar . "" . mysqli_error($mysqli);
  }
  echo "<br>Los datos fueron ingresados con exito";
  echo "<a href='../formulario.php'></br>Volver al formulario</a>";
}
$mysqli -> close();
?>
