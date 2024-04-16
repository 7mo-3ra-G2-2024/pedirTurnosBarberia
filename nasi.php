<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            width: 5vw;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h1>Turnos Barberia - Disponibilidad Horaria</h1>
        <?php
            $file = fopen("turnos.csv", "r");
            while (!feof($file)) {
                $data[] = explode("|", fgets($file));
            }
            fclose($file);

            $hourCount = 10;
            $turnCount = 1;
            $date = 1;
            $month = 4;
            echo "<table border=1 style='min-height:30vh; width:60vw;'><tr><th>Horario</th>";
            for ($i = 0; $i < 6; $i++) {
                echo "<th>".$date."/".$month."</th>";
                $date++;
            }
            echo "</tr>";
            for ($i = 0; $i < count($data); $i++) {
                echo "<tr>";
                echo "<td>".$hourCount.":00</td>";
                $currentTurnCount = $turnCount; // Guardar el número de turno actual
                $hourCount = $hourCount + 2;
                for ($j = 0; $j < 6; $j++) {
                    if ($data[$i][$j] == "disponible") {
                        echo "<td style='background-color:green;'><a href='pedir.php?num=".$currentTurnCount."'>Solicitar</a></td>";
                    } elseif ($data[$i][$j] == "porasignar") {
                        echo "<td style='background-color:orange'></td>";
                    } elseif ($data[$i][$j] == "nodisponible") {
                        echo "<td style='background-color:red'></td>";
                    }
                    $currentTurnCount++; // Incrementar el número de turno actual
                }
                echo "</tr>";
            }
        ?>
    </center>
</body>
</html>