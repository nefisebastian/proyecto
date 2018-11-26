<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Categorias</title>
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
                        <small>Categorias Registrados</small>
                    </h2>
                    <hr class="tagline-divider">
                       <!-- Aqui van las consultas a la base de datos  --> 
                    <?php
                    include('conexion.php');

                    $sql2="SELECT * FROM categorias_nefi order by Nombre_Categoria asc ";
                        if(!$result2 = $db->query($sql2))
                        {
                            die('NO conecta [' . $db->error .']');  
                        }
                         echo "<div class='row'>";
                                echo "<div class='box'>";
                                    // Boton Registrar //
                                    echo "<div class='form-group col-lg-12'>";
                                        echo "<form name='form2' method='POST' action='registrar_categorias.php'>";
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
                                                echo "<div class='form-group col-lg-8'>";
                                                    echo "<label>Nombre de la Categoria</label>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-4'>";
                                                    echo "<label>Acciones </label>";
                                                echo "</div>";
                                            
                        while($row = $result2->fetch_assoc())
                        {
                        
                            $dbidCategoria= stripslashes($row["idCategoria"]);
                            $dbNombreCategoria= stripslashes($row["Nombre_Categoria"]);
                            
                                                echo "<div class='clearfix'></div>";
                                                echo "<div class='form-group col-lg-0'>";
                                                    echo "<input type='hidden' class='form-control' value='$dbidCategoria' readonly>";
                                                echo "</div>";
                                                echo "<div class='form-group col-lg-8' >";
                                                    echo "<input type='text' class='form-control' value='$dbNombreCategoria'  readonly>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form1' method='POST' action='editar_categoria.php'>";
                                                    echo "<input type='hidden' name='idCategoria' value='$dbidCategoria'>";
                                                    echo "<button type='submit' class='form-control btn btn-primary'>Actualizar</button>";
                                                    echo "</form>";
                                                echo "</div>";
                                                // Boton Actualizar //
                                                // Boton borrar //
                                                echo "<div class='form-group col-lg-2'>";
                                                    echo "<form name='form2' method='POST' action='clase_eliminar_categoria.php'>";
                                                    echo "<input type='hidden' name='idCategoria' value='$dbidCategoria'>";
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