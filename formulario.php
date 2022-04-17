<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="stylesheet" href="./css/estilos_formulario.css">
  <title>MUNDO BIKERS</title>
</head>

<body>
  <!-- Menu -->
  <header>
    <div class="contenedor">
      <h1 class="fa fa-bicycle fa-3x"> MUNDO BIKERS</h1>
      <input type="checkbox" id="menu-bar">
      <label for="menu-bar" class="fa fa-bars fa-3x"></label>
      <nav class="menu">
        <a href="./index.html">Inicio</a>
        <a href="./paginas_secundarias/quienes_somos.html">Quienes somos</a>
        <a href="./paginas_secundarias/galeria.html">Galeria</a>
        <a href="./paginas_secundarias/galeria2.html">Galeria #2</a>
        <a href="./paginas_secundarias/galeria_slider.html">Galeria Silder</a>
        <a href="./paginas_secundarias/calculadora.html">Calculadora</a>
        <a href="">Blog</a>
        <a href="./formulario.php">Contacto</a>
      </nav>
    </div>
  </header>
  <!-- Banner -->
  <section id="banner">
    <img src="./imagenes/contessa_signature_mtb_2 (2).jpg" alt="">
    <div class="contenedor">
      <h2>Tu sueños estan en el proximo puesto de montaña!!</h2>
      <p>¿Cual es tu lugar favorito?</p>
      <a href="#">Leer mas...</a>
    </div>
  </section>
  <!--Formulario -->
  <section class="formulario">
    <form action="./php/validacion.php" class="contact_form" method="post">
      <ul>
        <li>
          <h1>ENVIE SUS QUEJAS O COMENTARIOS</h1>
        </li>
        <li>
          <label for="name">Nombre</label>
          <input type="text" name="nombres" placeholder="ej. juan jose cruz" required>
        </li>
        <li>
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="ej. jricardo@ejemplo.com" required>
        </li>
        <li>
          <label for="website">Sitio web</label>
          <input type="url" name="web" placeholder="ej. https//yahoo.com" required>
        </li>
        <li>
          <label for="Mensaje">Mensaje</label>
          <textarea name="comentarios" cols="40" rows="6" required></textarea>
        </li>
        <li>
          <button type="submit" class="submit" name="enviar_datos">Enviar Datos</button>
        </li>
      </ul>
    </form>
  </section>
  <section class="consulta">
    <div class="tabla">
      <br>
      <h2>Consulta de los datos alamacenados en la BD</h2>
      <table border = 1>
        <tr>
          <th>Nombres</th>
          <th>Email</th>
          <th>URL</th>
          <th>Comentarios</th>
        </tr>
        <?php
        require_once './php/conexion.php';
        $consulta = "SELECT * FROM informacion";
        $ejecutarConsulta = mysqli_query($mysqli, $consulta);
        $verFilas = mysqli_num_rows($ejecutarConsulta);
        $fila = mysqli_fetch_array($ejecutarConsulta);

        if (!$ejecutarConsulta) {
          echo "Error en la consulta";
        }else {
          if ($verFilas<1){
            echo "<tr><td>Sin registros</td></tr>";
          }else{

            for ($i=0; $i<=$fila; $i++){
            echo '
            <tr>
            <td>'.$fila[0].'</td>
            <td>'.$fila[1].'</td>
            <td>'.$fila[2].'</td>
            <td>'.$fila[3].'</td>
            
            </tr>
            ';
            $fila = mysqli_fetch_array($ejecutarConsulta);
            }
          }
        }
        ?>
      </table>
    </div>
  </section>
  <!-- Pie de Pagina-->
  <footer>
    <div class="footer-info">
      <div class="redes-sociales"><br>
        <a href="#" class="fa fa-twitter">&nbspTwitter</a>
        <a href="#" class="fa fa-facebook">&nbspFacebook</a>
        <a href="#" class="fa fa-instagram">&nbspInstagram</a>
        <a href="#" class="fa fa-github">&nbspGitHub</a>
        <p class="derechos-footer">DERECHOS RESERVADOS &copy; 2022 <br>Henry Andres Jurgensen Alzate <br>DESARROLLO
          WEB/30144</p>
      </div>
    </div>
  </footer>
</body>

</html>