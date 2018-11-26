<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Project - Nefi</title>
</head>

<body><?php
    include("header/header.html");
    ?>  
    <div class="container">
        <div class="row">
            <div class="box" style="background-color: white;">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" >
                    <h2 class="brand-before">
                        <small>Productos Registrados</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                    $sql2="SELECT * FROM productos_nefi order by Nombre_Producto asc ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    // Boton Registrar //
                                    echo "<div class='form-group col-lg-12'>";
                                        echo "<form name='form2' method='POST' action='registrar_productos.php'>";
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
                                                    echo "<label>Nombre Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<label>Categoria Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";
                                                    echo "<label>Descripcion Producto</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidProducto= stripslashes($row["idProducto"]);
                            $dbNombreProducto= stripslashes($row["Nombre_Producto"]);
                            $dbidCategoria= stripslashes($row["Categoria_Producto"]);
                            $dbDescripcion=stripslashes($row["Descripcion_Producto"]);

                        $sqlj="SELECT * FROM categorias_nefi WHERE idCategoria = '$dbidCategoria' ";
                            if(!$resultj = $db->query($sqlj))
                            {
                                die('NO conecta [' . $db->error .']');  
                            }
                            while($row = $resultj -> fetch_assoc())
                            {
                                
                                $dbidCategoria= stripslashes($row["idCategoria"]);
                                $dbNombre_categoria= stripslashes($row["Nombre_Categoria"]);
                            }

                                                echo "<div class='clearfix'></div>";
                                                echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidProducto' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";

                                                    echo "<input type='text' class='form-control' value='$dbNombreProducto' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-2'>";

                                                    echo "<input type='text' class='form-control' value='$dbNombre_categoria' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-3'>";

                                                    echo "<input type='text' class='form-control' value='$dbDescripcion' readonly>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form1' method='POST' action='editar_producto.php'>";
                                                    echo "<input type='hidden' name='idProducto' value='$dbidProducto'>";
                                                    echo "<button type='submit' class='form-control btn btn-primary'>Actualizar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                // Boton borrar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form2' method='POST' action='clase_eliminar_producto.php'>";
                                                    echo "<input type='hidden' name='idProducto' value='$dbidProducto'>";
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
