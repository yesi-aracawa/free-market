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
        $query = mysqli_query($conexion,"SELECT nombre,precio,cantidad,foto FROM productos WHERE nombre LIKE '%$search%'");
        if($query){
            while($info=mysqli_fetch_array($query)){
                echo "<hr>";
                echo "<img src='".$info['foto']."' style='width:150px;'><br>";
                echo "Nombre:".$info['nombre']."<br>";
                echo "Precio:".$info['precio']."<br>";
                echo "Cantidad:".$info['cantidad']."<br>";
                echo "<hr>";
            }
        }else{
            echo "No se pudo hacer la consulta";
        }
        
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
        header("location:../HTML/index.html");
    }
?>