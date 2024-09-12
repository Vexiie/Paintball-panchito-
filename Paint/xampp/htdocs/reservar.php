<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "sistema_reservas";  



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pack = $_POST['pack'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $localizacion = $_POST['localizacion'];
    $metodo_pago = $_POST['metodo_pago'];

    
    $detalles = "Pack: $pack, Localización: $localizacion, Pago: $metodo_pago";
    $sql = "INSERT INTO reservas (cliente, fecha, hora, detalles)
            VALUES ('$nombre', '$fecha', '$hora', '$detalles')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
