<?php
    /*
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    $conn = new mysqli("localhost", "root", "", "mercado");
    
    $result = $conn->query("SELECT * FROM productos");
    
    $outp = "";
    
    // Formateamos nuestro JSON
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"Nombre":"'  . $rs["nombre"] . '",';
        $outp .= '"Precio":"'   . $rs["precio"]        . '",';
        $outp .= '"Cantidad":"'. $rs["cantidad"]     . '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();
    echo($outp);
    */
    include("conexion.php");
    if($_POST['ml_search']!="" || $_POST['ml_search']!=null){
        $search = $_POST['ml_search'];
        $query = mysqli_query($conexion,"SELECT * FROM productos WHERE nombre LIKE '%$search%'");
        if($query){
            if(mysqli_num_rows($query)>=3){
            /*while($info=mysqli_fetch_array($query)){
                echo "<hr>";
                echo "<img src='".$info['foto']."' style='width:150px;'><br>";
                echo "Nombre:".$info['nombre']."<br>";
                echo "Precio:".$info['precio']."<br>";
                echo "Cantidad:".$info['cantidad']."<br>";
                echo "<hr>";
            }*/
                echo "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                    <link rel='shortcut icon' href='https://http2.mlstatic.com/ui/navigation/5.3.5/mercadolibre/favicon.ico'
                        type='image/x-icon'>
                    <title>Mercado Libre</title>
                    <link rel='stylesheet' href='../CSS/headerContent.css'>
                    <link rel='stylesheet' href='../CSS/consultaImagenes.css'>
                </head>
                <body>
                    <header class='nav-header'>
                        <div class='nav-bounds'>
                            <a href='https://www.mercadolibre.com.mx/'><img class='nav-logo'></a>
                            <form class='nav-search' action='' method='GET' role='search'>
                                <input type='text' class='nav-input-search' name='ml_search' id=''
                                    placeholder='Buscar productos, marcas y más...' maxlength='120' autofocus autocapitalize='off'
                                    autocomplete='off' spellcheck='false' tabindex='2'>
                                <button type='submit' class='nav-search-btn' tabindex='3'>
                                    <div role='img' aria-label='Buscar' class='nav-icon-search'></div>
                                </button>
                            </form>
                            <a tabindex='5' href='https://www.mercadolibre.com.mx/ofertas'>
                                <img class='oferta-imagen'
                                    src='https://http2.mlstatic.com/resources/deals/exhibitors_resources/mlm-menu-desktop-notification-picture-90709a6e-7fce-4f3b-b184-9920bdb37d10.png'
                                    title='Nuevas ofertas'>
                            </a>
                        </div>
                
                        <div class='nav-menu'>
                            <ul class='nav-menu-list'>
                                <li class='nav-manu-item'>
                                    <a class='nav-none'
                                        href='https://www.mercadolibre.com.mx/navigation/addresses-hub?go=https%3A%2F%2Fwww.mercadolibre.com.mx%2F'>
                                        <img class='nav-img-loc' src='../IMAGES/location.png'>
                                        <span class='nav-menu-cp-send'>Ingresa tu</span>
                                        <span class='nav-menu-link-cp'>código postal</span>
                                    </a>
                                </li>
                                <li class='nav-manu-item dropdown'>
                                    <a href='https://www.mercadolibre.com.mx/categorias#nav-header'
                                        class=' dropbtn nav-menu-categories'>Categorías</a>
                                    <div class='dropdown-content'>
                                        <a href=#>Vehículos</a>
                                        <a href=#>Tecnonogía</a>
                                        <a href=#>Accesorios para Vehículos</a>
                                        <a href=#>Hogar y Electrodomésticos</a>
                                        <a href=#>Joyas y Relojes</a>
                                        <a href=#>Herramienstas e Industrias</a>
                                        <a href=#>Libros, Juguetes y Bébes</a>
                                        <a href=#>Inmuebles</a>
                                        <a href=#>Deportes y Aire Libre</a>
                                        <a href=#>Moda</a>
                                        <a href=#>Belleza y Cuidado Personal</a>
                                    </div>
                                </li>
                                <li class='nav-manu-item'><a class='nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ofertas</a></li>
                                <li class='nav-manu-item'><a class='nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Historial</a></li>
                                <li class='nav-manu-item'><a class='nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Tiendas Oficiales</a></li>
                                <li class='nav-manu-item'><a class='nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Vender</a></li>
                                <li class='nav-manu-item'><a class='nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ayuda</a></li>
                            </ul>
                
                        </div>
                        <div class='nav-menu'>
                            <ul class='nav-menu-list'>
                                <li class='nav-manu-item'><a class='nav-menu-link-cp-cuenta nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Crea tu cuenta</a></li>
                                <li class='nav-manu-item'><a class=' nav-menu-link-cp-cuenta nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ingresa</a></li>
                                <li class='nav-manu-item'><a class='nav-menu-link-cp-cuenta nav-menu-item-link'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Mis compras</a></li>
                                <li class='nav-manu-item'><a class='nav-none'
                                        href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>
                                        <img class='nav-img-shop' src='../IMAGES/shop.png'>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <section class='descubre'>
                        <div class='descubre-content descubre-row'>
                            <div class='items-search'>
                                <div class='main-item'>
                                    <!-- primero -->
                                    ";
                                    $cont=0;
                                    while($info=mysqli_fetch_array($query)){
                                        if($cont==3){
                                            $cont=0;
                                        }
                                        if($cont==1){
                                            echo "<div class='separacion-items'>";
                                        }else{
                                            echo "<div>";
                                        }
                                        echo"
                                            <a href='' class='card-item large-item'>
                                                <img class='lazyload-item'
                                                    src='".$info['foto']."'
                                                    alt=''>
                                                <div class='card-item foot-item div-info-item'>
                                                    <div class='precio-item'>
                                                        <span id='simbolo'>$</span>
                                                        <span id='cantidad'>".$info['precio']."</span>
                                                    </div>
                                                    <h2 class='titulo-item'>
                                                        <span class='titulo-princ'>".$info['nombre']."</span>
                                                        <span class='marca-item'>".$info['marca']."</span>
                                                        <span class='marca-item'>".$info['cantidad']."</span>
                                                        <span class='marca-item'>".$info['condicion'].$cont."</span>
                                                    </h2>
                                                </div>
                                            </a>
                                        </div>";
                                        $cont+=1;
                                    }
                                    echo"
                                </div>
                            </div>
                        </div>
                    </section>
                
                </body>
                </html>
                ";
            }else{
                if(mysqli_num_rows($query)>0){
                echo "
                <!DOCTYPE html>
                <html lang='en'>

                <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <link rel='shortcut icon' href='https://http2.mlstatic.com/ui/navigation/5.3.5/mercadolibre/favicon.ico'
                    type='image/x-icon'>
                <title>Mercado Libre</title>
                <link rel='stylesheet' href='../CSS/headerContent.css'>
                <link rel='stylesheet' href='../CSS/consultaImagenes.css'>
                </head>

                <body>
                <div></div>
                <header class='nav-header'>
                    <div class='nav-bounds'>
                        <a href='https://www.mercadolibre.com.mx/'><img class='nav-logo'></a>
                        <form class='nav-search' action='' method='GET' role='search'>
                            <input type='text' class='nav-input-search' name='ml_search' id=''
                                placeholder='Buscar productos, marcas y más...' maxlength='120' autofocus autocapitalize='off'
                                autocomplete='off' spellcheck='false' tabindex='2'>
                            <button type='submit' class='nav-search-btn' tabindex='3'>
                                <div role='img' aria-label='Buscar' class='nav-icon-search'></div>
                            </button>
                        </form>
                        <a tabindex='5' href='https://www.mercadolibre.com.mx/ofertas'>
                            <img class='oferta-imagen'
                                src='https://http2.mlstatic.com/resources/deals/exhibitors_resources/mlm-menu-desktop-notification-picture-90709a6e-7fce-4f3b-b184-9920bdb37d10.png'
                                title='Nuevas ofertas'>
                        </a>
                    </div>

                    <div class='nav-menu'>
                        <ul class='nav-menu-list'>
                            <li class='nav-manu-item'>
                                <a class='nav-none'
                                    href='https://www.mercadolibre.com.mx/navigation/addresses-hub?go=https%3A%2F%2Fwww.mercadolibre.com.mx%2F'>
                                    <img class='nav-img-loc' src='../IMAGES/location.png'>
                                    <span class='nav-menu-cp-send'>Ingresa tu</span>
                                    <span class='nav-menu-link-cp'>código postal</span>
                                </a>
                            </li>
                            <li class='nav-manu-item dropdown'>
                                <a href='https://www.mercadolibre.com.mx/categorias#nav-header'
                                    class=' dropbtn nav-menu-categories'>Categorías</a>
                                <div class='dropdown-content'>
                                    <a href=#>Vehículos</a>
                                    <a href=#>Tecnonogía</a>
                                    <a href=#>Accesorios para Vehículos</a>
                                    <a href=#>Hogar y Electrodomésticos</a>
                                    <a href=#>Joyas y Relojes</a>
                                    <a href=#>Herramienstas e Industrias</a>
                                    <a href=#>Libros, Juguetes y Bébes</a>
                                    <a href=#>Inmuebles</a>
                                    <a href=#>Deportes y Aire Libre</a>
                                    <a href=#>Moda</a>
                                    <a href=#>Belleza y Cuidado Personal</a>
                                </div>
                            </li>
                            <li class='nav-manu-item'><a class='nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ofertas</a></li>
                            <li class='nav-manu-item'><a class='nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Historial</a></li>
                            <li class='nav-manu-item'><a class='nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Tiendas Oficiales</a></li>
                            <li class='nav-manu-item'><a class='nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Vender</a></li>
                            <li class='nav-manu-item'><a class='nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ayuda</a></li>
                        </ul>

                    </div>
                    <div class='nav-menu'>
                        <ul class='nav-menu-list'>
                            <li class='nav-manu-item'><a class='nav-menu-link-cp-cuenta nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Crea tu cuenta</a></li>
                            <li class='nav-manu-item'><a class=' nav-menu-link-cp-cuenta nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Ingresa</a></li>
                            <li class='nav-manu-item'><a class='nav-menu-link-cp-cuenta nav-menu-item-link'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>Mis compras</a></li>
                            <li class='nav-manu-item'><a class='nav-none'
                                    href='https://www.mercadolibre.com.mx/gz/home/navigation#nav-header'>
                                    <img class='nav-img-shop' src='../IMAGES/shop.png'>
                                </a>
                            </li>
                        </ul>
                    </div>
                </header>

                <section class='consulta-item'>
                    <!-- primero -->
                    ";
                    while($info=mysqli_fetch_array($query)){
                    echo "
                    <div class='consulta-div-content'>
                        <div class='div-consulta-info'>
                            <div class='consulta-data-grupo'>
                                <div class='ver-consulta-item'>
                                    <div class='contenido-imagen'>
                                        <a href=# class='figura-imagen'>
                                            <img class='figura-imagen'
                                                src='".$info['foto']."'
                                                alt=''>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class='consulta-data-grupo consulta-data-grupo-carac'>
                                <div class='consulta-data-section consulta-data-section-carac'>
                                    <h2 class='tipo-letras-carac'>".$info['nombre']."</h2>
                                    <div class='precio-contenedor-item'>
                                        <span class='precio-item'>$</span>
                                        <span class='precio-fraccion'>".$info['precio']."</span>
                                    </div>
                                    <div class='marca-cant-caract'>
                                        <div class='caracteristicas'>
                                            <div class='carac-marca-status'>
                                                <span class='marca-item'>".$info['marca']."</span>
                                                <span class='marca-item'>".$info['cantidad']."</span>
                                                <span class='marca-item'>".$info['condicion']."</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                    echo "
                </section>

                </body>

                </html>
                ";
            }
        }
        }else{
            echo "No se pudo hacer la consulta";
        }
        
    }else{    
        if($_POST['cambiarCantidad']!="" || $_POST['cambiarCantidad']!=null){
            $cantidad=$_POST['cambiarCantidad'];
            $query=mysqli_query($conexion,"UPDATE productos SET cantidad='$cantidad'");
        }else{
            if($_POST['eliminarProducto']!="" || $_POST['eliminarProducto']!=null){
                $eliminar=$_POST['eliminarProducto'];
                $query=mysqli_query($conexion,"DELETE FROM productos WHERE nombre='$eliminar'");
                if($query){ echo "PRODUCTO ELIMINADO";}
            }else{
                $uploadedfileload=true;
                $path = $_FILES['foto']['name']; 
                $ext = pathinfo($path, PATHINFO_EXTENSION); 
                if ($_FILES['foto']["error"] > 0 || $_FILES['foto']['size']>200000 || $ext=="" || ($ext!="jpeg" && $ext!="JPEG" && $ext!="jpg" && $ext!="JPG")){
                    $uploadedfileload=false;
                }
                if($uploadedfileload){
                    $path="../IMAGES/".$path;
                    if(move_uploaded_file ($_FILES['foto']['tmp_name'], $path)){
                        $nombre=$_POST['nombre'];
                        $marca=$_POST['marca'];
                        $modelo=$_POST['modelo'];
                        $condicion=$_POST['condicion'];
                        $cantidad=$_POST['cantidad'];
                        $precio=$_POST['precio'];
                        $insert = mysqli_query($conexion,"INSERT INTO productos (nombre,marca,modelo,condicion,foto,cantidad,precio) 
                        VALUES('$nombre','$marca','$modelo','$condicion','$path','$cantidad','$precio')");
                        echo "El archivo se subio con éxito";
                    }
                }
            }
        }
        header("location:../HTML/index.html");
    }
?>
