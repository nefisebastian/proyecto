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
                        <small>Insumos Registrados</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                    $sql2="SELECT * FROM insumos_nefi order by Nombre_Insumo asc ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    // Boton Registrar //
                                    echo "<div class='form-group col-lg-12'>";
                                        echo "<form name='form2' method='POST' action='registrar_insumos.php'>";
                                            echo "<button type='submit' class='form-control btn btn-success'>Añadir</button>";
                                        echo "</form>";
                                    echo "</div>";
                                    // Boton Registrar //
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Listado";
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
                                                    echo "<label>Medida del Insumo </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Categoria del Insumo </label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidInsumo= stripslashes($row["idInsumo"]);
                            $dbNombreInsumo= stripslashes($row["Nombre_Insumo"]);
                            $dbidMedida= stripcslashes($row["Medida_Insumo"]);
                            $dbidCategoria= stripcslashes($row["Categoria_Insumo"]);
                            
                            $sqlj="SELECT * FROM medidas_nefi WHERE idMedida = '$dbidMedida' ";
                            if(!$resultj = $db->query($sqlj))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultj -> fetch_assoc())
                            {
                                
                                $dbidMedida= stripslashes($row["idMedida"]);
                                $dbNombre_Medida= stripslashes($row["Nombre_Medida"]);
                            }

                            $sqlr="SELECT * FROM categorias_nefi WHERE idCategoria = '$dbidCategoria' ";
                            if(!$resultr = $db->query($sqlr))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultr -> fetch_assoc())
                            {
                                
                                $dbidCategoria= stripslashes($row["idCategoria"]);
                                $dbNombre_Categoria= stripslashes($row["Nombre_Categoria"]);
                            }

                                                echo "<div class='clearfix'></div>";
                                                echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidInsumo' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombreInsumo'  readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Medida'  readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombre_Categoria'  readonly>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form1' method='POST' action='editar_insumo.php'>";
                                                    echo "<input type='hidden' name='idInsumo' value='$dbidInsumo'>";
                                                    echo "<button type='submit' class='form-control btn btn-primary'>Actualizar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                // Boton borrar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form2' method='POST' action='clase_eliminar_insumo.php'>";
                                                    echo "<input type='hidden' name='idInsumo' value='$dbidInsumo'>";
                                                    echo "<button type='submit' class='form-control btn btn-danger'>Borrar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton borrar //
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
