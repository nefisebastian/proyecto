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
                        <small>Registrar Insumo</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    echo "<div class='col-lg-12'>";
                                        echo "<h2 class='intro-text text-center'>Llene los campos";
                                        echo "<hr>";
                                            echo "<strong></strong>";
                                        echo "</h2>";
                                            echo "<div class='row'>";
                                                echo "<div class='form-group col-lg-0'>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Nombre Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<label>Medida Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Categoria Insumo</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";

                                                //   Inicio del formulario  //
                                                echo "<form name='form1' method='POST' action='clase_registrar_insumo.php'>";
                                                echo "<div class='clearfix'></div>";
                                                echo "<br>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<input type='text' class='form-control' value='' name='nombre_insumo' required>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<select name='medida_insumo' class='form-control' required style='text-align: center;'>";
                                                        echo "<option>--Seleccione--</option>";
                                                        include('conexion.php');
                                                        $sqlnefi="SELECT * FROM medidas_nefi";
                                                        if(!$resultnefi = $db->query($sqlnefi))
                                                        {
                                                            die('NO conecta [' . $db->error .']');  
                                                        }
                                                        while($row = $resultnefi->fetch_assoc())
                                                        {
                                                            $dbidmedida=stripslashes($row["idMedida"]);
                                                            $dbnombremedida= stripslashes($row["Nombre_Medida"]);
                                                            echo "<option style='text-align:center;' value =$dbidmedida>$dbnombremedida</option>";
                                                        }
                                                    echo "</select>"; 
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<select name='categoria_insumo' class='form-control' required style='text-align: center;'>";
                                                        echo "<option>--Seleccione--</option>";
                                                        include('conexion.php');
                                                        $sqlnefi="SELECT * FROM categorias_nefi";
                                                        if(!$resultnefi = $db->query($sqlnefi))
                                                        {
                                                            die('NO conecta [' . $db->error .']');  
                                                        }
                                                        while($row = $resultnefi->fetch_assoc())
                                                        {
                                                            $dbidcategoria=stripslashes($row["idCategoria"]);
                                                            $dbnombrecategoria= stripslashes($row["Nombre_Categoria"]);
                                                            echo "<option style='text-align:center;' value =$dbidcategoria>$dbnombrecategoria</option>";
                                                        }
                                                    echo "</select>"; 
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "<div class='form-group col-lg-3'>";                                                   
                                                    echo "<button type='submit' class='form-control btn btn-success'>Registrar</button>";                                                    
                                                echo "</div>";
                                                // Boton registrar //
                                                echo "</form>";
                                                //   Fin del formulario  //
                                                
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
</body>
</html>
