<html lang=es>
<head>
    
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel=stylesheet href="../css/estyle.css">
    <link rel="shortcut icon" href="../img/icons/icon.ico.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel=stylesheet>
    <title>Resultados de busqueda</title>
</head>
<body>


<nav class="navbar navbar-light bg-light sticky-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.html">ArtePop</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Conoce un poco más</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="subpaginas/acercade.html">Acerca del arte Pop</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="subpaginas/obras.html">Obras</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="subpaginas/artistas.html">Artistas</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="#">Iniciar sesion</a>
                        </li>
                       
                      </ul>
                      <form action="resultados.php" method="post" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" value="Enviar">Buscar</button>
                      </form>
                    </div>
                  </div>
                </div>
</nav>


<?php
	include('conexion.php');

	$buscar = $_POST['buscar'];
	echo "Su consulta: <em>".$buscar."</em><br>";

	$consulta = mysqli_query($conexion, "SELECT * FROM artistas WHERE nombre LIKE '%$buscar%' OR apellido LIKE '%$buscar%' ");
?>
<article style="width:60%;margin:0 auto;border:solid;padding:10px">
	<p>Cantidad de Resultados: 
	<?php
		$nros=mysqli_num_rows($consulta);
		echo $nros;
	?>
	</p>
    
	<?php
		while($resultados=mysqli_fetch_array($consulta)) {
	?>
    <p>
    <?php	
			echo $resultados['nombre'] . " ";
			echo $resultados['apellido'];
			echo $resultados['bio'];
	?>
    </p>
    <img src="<?php echo $resultados['foto'] ?>">
    <hr/>
<?php
		}

		mysqli_free_result($consulta);
		mysqli_close($conexion);
?>

<div class=container-fluid> 
    <div class=separador>
        <figure>
          <img class="img-fluid trans1" src=../img/banner/banner6.png alt="">
        </figure>
    </div>
</div>


<div class="conteiner-fluid">
  <div class=row>
         <div class="col-md-6">
                  <div class=footer>
                    <a href="../subpaginas/suscribite.html" style="text-decoration: none;"> <h2>Suscribite</h2></a>
                  </div>
          </div>
          <div class="col-md-6">
                  <div class=footer>
                    <a href="../subpaginas/quienes.html" style="text-decoration: none;"><h2>Quienes Somos</h2></a>
                  </div>
          </div>
  </div>
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>