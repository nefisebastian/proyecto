<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project - Nefi</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">System (Lo que sea)</div>
    <div class="address-bar">Made by (lo que sea)</div>

    <!-- Navigation INI-->
    <?php
    include("Barra_Navegador.html");
    ?>
    <!-- Navigation FIN-->
    

    <div class="container">

        <div class="row">
            <div class="box" style="background-color: white;">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" >
                    <h2 class="brand-before">
                        <small>Historial de Inventario</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                    $sql2="SELECT * FROM registros_nefi order by Fecha_Registro asc ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    // Boton Ver Historial //
                                    echo "<div class='form-group col-lg-12'>";
                                        echo "<form name='form2' method='POST' action='ver_inventario.php'>";
                                            echo "<button type='submit' class='form-control btn btn-primary'>Volver al Inventario</button>";
                                        echo "</form>";
                                    echo "</div>";
                                    // Boton Ver Historial //
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Historial";
                                        echo "<hr>";
                                            echo "<strong></strong>";
                                        echo "</h2>";
                                            echo "<div class='row'>";
                                                echo "<div class='form-group col-lg-0'>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Nombre del Insumo </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<label>Tipo de Movimiento </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Cantidad </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Fecha </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidRegisto= stripslashes($row["idRegistro"]);
                            $dbidInsumo= stripslashes($row["Insumo_Registro"]);
                            $dbidMovimiento= stripcslashes($row["Movimiento_Registro"]);
                            $dbCantidad= stripcslashes($row["Cantidad_Registro"]);
                            $dbFecha= stripcslashes($row["Fecha_Registro"]);
                            
                            $sqlj="SELECT * FROM insumos_nefi WHERE idInsumo = '$dbidInsumo' ";
                            if(!$resultj = $db->query($sqlj))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultj -> fetch_assoc())
                            {
                                $dbNombre_Insumo= stripslashes($row["Nombre_Insumo"]);
                            }

                            $sqlnefi="SELECT * FROM movimientos_nefi WHERE idMovimiento = '$dbidMovimiento' ";
                            if(!$resultnefi = $db->query($sqlnefi))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultnefi -> fetch_assoc())
                            {
                                $dbNombre_Movimiento= stripslashes($row["Nombre_Movimiento"]);
                            }

                                                echo "<div class='clearfix'></div>";
                                                echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidRegisto' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Insumo' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Movimiento' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbCantidad'  readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbFecha'  readonly>";
                                                echo "</div>";
                        }
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";       
                    ?>
                        <!-- Aqui van las consultas a la base de datos  --> 
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; System (lo que sea)</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })    </script>

</body>

</html>
