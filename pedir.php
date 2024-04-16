<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 20vw;
            padding: 10vw;
        }
        input, textarea, select{
            width: 90%;
            margin-bottom: 2vh;
        }
    </style>
</head>
<body>
    <center>
        <?php
            if(!isset($_GET["num"])){
                header("Location: index.php");
                die();
            }
            echo "<h2>Turno n°".$_GET["num"]."</h2>";
        ?>
        <form action="pedir.php?">
            <input type="hidden" name="num" value="<?php echo $_GET["num"] ?>">
            <input type="text" name="Telefono" placeholder="Telefono" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <select name="Servicio">
                <option value="Corte/Corte y barba">Corte/Corte y barba</option>
                <option value="Color">Color</option>
            </select>
            <select name="metodo">
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
            </select>
            <input type="submit" name="submitted" value="Pedir turno">
        </form>
    </center>
    <?php
        if(isset($_GET["submitted"])){
            $file = fopen("pendientes.csv", "a");
            fwrite($file, "\n".$_GET["Telefono"]."|".$_GET["apellido"]."|".$_GET["nombre"]."|".$_GET["direccion"]."|".$_GET["motivo"]."|".$_GET["metodo"]);
            fclose($file);
            header("Location: index.php");
        }
    ?>
</body>
</html>