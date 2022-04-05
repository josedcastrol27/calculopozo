<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manómetros</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.plot.ly/plotly-2.6.3.min.js"></script>
</head>
<body>

    <!--HEADER-->

    <nav class="nav-wrapper light-blue darken-3">
        <div class="container">
            <a href="index.html" class="brand-logo">Medición de manómetros</a>

            <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>

            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="menu-responsive">
        <li><a href="index.php">Inicio</a></li>
    </ul>

    <!--BODY-->

    <?php

    include_once("conexion.php");

    $valor = $_GET['pozo'];

    $consulta = "SELECT medidas, fecha FROM propiedades WHERE nombrePozo='$valor' order by fecha"; 
    $resultado = mysqli_query($conexion, $consulta);

    $valoresX = array(); //Fechas
    $valoresY = array(); //mediciones

    while($ver = mysqli_fetch_array($resultado)) {
        $valoresX[] = $ver['fecha'];
        $valoresY[] = $ver['medidas'];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);
    
    ?>

    <div id="chart"></div>

    <script type="text/javascript">
        function crearGrafica(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }
            return arr;
        }
    </script>
    
    <script type="text/javascript">

        datosX = crearGrafica('<?php echo $datosX ?>');
        datosY = crearGrafica('<?php echo $datosY ?>');
    
        var trace1 = {
            x: datosX,
            y: datosY,
            type: 'lines',
            name:'Datos 1',
            line:{ width: 1},
            marker:{ size: 8}
        };

        var data = [trace1];

        Plotly.newPlot('chart', data,{title:'Gráfica del pozo'});

    </script>
    
    <div class="fondo-section">
        <div class="container section black-text">
            
            <div class="section">

                <a href="index.php" class="waves-effect waves-light btn light-blue darken-4">Inicio</a>
           
            </div>

            <div class="divider"></div>

        </div>
    </div>

    <!--FOOTER-->

    <footer class="page-footer light-blue darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">

                    <h5 class="white-text">Medición de manómetros</h5>
                    <p class="grey-text text-lighten-4">En esta aplicación se podrá crear un histórico
                        de las distintas mediciones manuales realizadas a los manómetros de los pozos 
                        petroleros en diferentes periodos de tiempos.
                    </p>
                
                </div>

                <div class="col l4 offset-l2 s12">

                    <h5 class="white-text">Menú</h5>

                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index.php">Inicio</a></li>
                    </ul>

                </div>
            </div>
        </div>

            <div class="footer-copyright">
                <div class="container">

                © 2022 Jose Castro - Programación Web
             
                </div>
            </div>

    </footer>

    <!--SCRIPT-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/d6ff169d2d.js" crossorigin="anonymous"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });

    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems,{
                duration: 500,
                indicators: true,
                fullWidth: true
            });
        });

    </script>
</body>
</html>