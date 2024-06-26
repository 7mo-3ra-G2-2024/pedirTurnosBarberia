<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos Barberia - Disponibilidad Horaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <h1>Turnos Barberia - Disponibilidad Horaria</h1>
        <table>
            <tr>
                <th>Horario</th>
                <?php
                $date = 1;
                $month = 4;
                for ($i = 0; $i < 6; $i++) {
                    echo "<th>".$date."/".$month."</th>";
                    $date++;
                }
                ?>
            </tr>
            <?php
            $file = fopen("turnos.csv", "r");
            while (!feof($file)) {
                $data[] = explode("|", fgets($file));
            }
            fclose($file);

            $hourCount = 10;
            $turnCount = 1;
            for ($i = 0; $i < count($data); $i++) {
                echo "<tr>";
                echo "<td>".$hourCount.":00</td>";
                $currentTurnCount = $turnCount;
                $hourCount = $hourCount + 2;
                for ($j = 0; $j < 6; $j++) {
                    if ($data[$i][$j] == "disponible") {
                        echo "<td class='verde'><a href='pedir.php?num=".$currentTurnCount."'>Solicitar</a></td>";
                    } elseif ($data[$i][$j] == "porasignar") {
                        echo "<td class='naranja'></td>";
                    } elseif ($data[$i][$j] == "nodisponible") {
                        echo "<td class='rojo'></td>";
                    }
                    $currentTurnCount++;
                }
                echo "</tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>