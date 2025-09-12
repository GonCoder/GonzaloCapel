
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Brisca: Suma de puntos de 10 cartas</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 430px;
            margin: 60px auto;
            background: #232323;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(255,140,0,0.15);
        }
        h1 {
            color: #ff9800;
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            color: #ff9800;
            font-weight: bold;
        }
        input[type="submit"] {
            background: #ff9800;
            color: #181818;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-bottom: 10px;
        }
        input[type="submit"]:hover {
            background: #ffa726;
        }
        .resultado {
            margin-top: 20px;
            background: #262626;
            padding: 15px;
            border-radius: 8px;
            color: #ff9800;
            font-size: 1.1em;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
            background: #232323;
            color: #ff9800;
        }
        th, td {
            border: 1px solid #ff9800;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #181818;
            color: #ffa726;
        }
        .detalle {
            color: #ffa726;
            font-size: 0.98em;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejercicio 14 <br> Brisca: Suma de puntos de 10 cartas</h1>
        <form method="post">
            <input type="submit" value="Sacar 10 cartas al azar">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $palos = ["Oros", "Copas", "Espadas", "Bastos"];
            $figuras = [1,2,3,4,5,6,7,"Sota","Caballo","Rey"];
            $puntos = [
                1 => 11,
                3 => 10,
                "Sota" => 2,
                "Caballo" => 3,
                "Rey" => 4,
                2 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0
            ];
            
            $baraja = [];
            foreach ($palos as $palo) {
                foreach ($figuras as $figura) {
                    $baraja[] = ["figura" => $figura, "palo" => $palo];
                }
            }
            
            shuffle($baraja);
            $cartas = array_slice($baraja, 0, 10);

            $total = 0;
            echo '<div class="resultado">';
            echo "Las 10 cartas sacadas al azar son:";
            echo '<table>';
            echo '<tr><th>Carta</th><th>Puntos</th></tr>';
            foreach ($cartas as $carta) {
                $figura = $carta["figura"];
                $palo = $carta["palo"];
                $puntosCarta = isset($puntos[$figura]) ? $puntos[$figura] : 0;
                $total += $puntosCarta;
                echo "<tr><td>$figura de $palo</td><td>$puntosCarta</td></tr>";
            }
            echo '<tr><th>Total</th><th>'.$total.'</th></tr>';
            echo '</table>';
            echo '<div class="detalle">';
            echo "En la brisca: As=11, 3=10, Sota=2, Caballo=3, Rey=4, el resto=0 puntos.<br>El programa hace que no se repita ninguna carta.";
            echo '</div>';
            echo '</div>';
        }
        ?>
        <a href="../index.php" style="
            display: block;
            margin: 30px auto 0 auto;
            text-align: center;
            background: #ff9800;
            color: #181818;
            padding: 12px 0;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(255,140,0,0.10);
            transition: background 0.2s;
            max-width: 200px;
        ">Volver al inicio</a>
    </div>
    </body>
</html>