
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Movimientos del alfil en ajedrez</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 480px;
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
        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ff9800;
            border-radius: 6px;
            background: #181818;
            color: #f5f5f5;
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
        table.ajedrez {
            border-collapse: collapse;
            margin: 0 auto;
            margin-top: 18px;
            box-shadow: 0 2px 8px rgba(255,140,0,0.10);
        }
        table.ajedrez td, table.ajedrez th {
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            font-size: 1.2em;
            border: 1px solid #444;
        }
        .casilla-blanca {
            background: #f5f5f5;
            color: #181818;
        }
        .casilla-negra {
            background: #232323;
            color: #f5f5f5;
        }
        .casilla-alfil {
            background: #ff9800 !important;
            color: #181818 !important;
            font-weight: bold;
        }
        .casilla-mov {
            background: #ffa726 !important;
            color: #181818 !important;
            font-weight: bold;
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
        <h1>Ejercicio 15 <br> Movimientos del alfil en ajedrez</h1>
        <form method="post">
            <label for="col">Columna (a-h):</label>
            <select name="col" id="col" required>
                <?php
                $letras = range('a', 'h');
                foreach ($letras as $letra) {
                    echo "<option value='$letra'>$letra</option>";
                }
                ?>
            </select>
            <label for="fila">Fila (1-8):</label>
            <select name="fila" id="fila" required>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <input type="submit" value="Mostrar movimientos">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["col"]) && isset($_POST["fila"])) {
            $col = $_POST["col"];
            $fila = intval($_POST["fila"]);
            $colNum = ord($col) - ord('a'); // 0-7
            $filaNum = 8 - $fila; // 0 arriba, 7 abajo
            //Esta parte la he hecho con ayuda de IA, porque aunque entendí la explicación, no sabía cómo implementarla.
            // Calcular movimientos posibles del alfil
            $movimientos = [];
            for ($i = 1; $i < 8; $i++) {
                // Diagonal arriba-izquierda
                if ($colNum - $i >= 0 && $filaNum - $i >= 0)
                    $movimientos[] = [$colNum - $i, $filaNum - $i];
                // Diagonal arriba-derecha
                if ($colNum + $i <= 7 && $filaNum - $i >= 0)
                    $movimientos[] = [$colNum + $i, $filaNum - $i];
                // Diagonal abajo-izquierda
                if ($colNum - $i >= 0 && $filaNum + $i <= 7)
                    $movimientos[] = [$colNum - $i, $filaNum + $i];
                // Diagonal abajo-derecha
                if ($colNum + $i <= 7 && $filaNum + $i <= 7)
                    $movimientos[] = [$colNum + $i, $filaNum + $i];
            }

            // Mostrar tablero
            echo '<div class="resultado">';
            echo "El alfil está en <strong>$col$fila</strong>. Puede saltar a las casillas marcadas en naranja.";
            echo '<table class="ajedrez">';
            // Fila de letras
            echo '<tr><th></th>';
            foreach ($letras as $letra) {
                echo "<th>$letra</th>";
            }
            echo '</tr>';
            for ($f = 0; $f < 8; $f++) {
                echo '<tr>';
                echo '<th>' . (8 - $f) . '</th>';
                for ($c = 0; $c < 8; $c++) {
                    $clase = (($f + $c) % 2 == 0) ? 'casilla-blanca' : 'casilla-negra';
                    if ($c == $colNum && $f == $filaNum) {
                        $clase = 'casilla-alfil';
                        $contenido = '♗';
                    } elseif (in_array([$c, $f], $movimientos)) {
                        $clase = 'casilla-mov';
                        $contenido = '';
                    } else {
                        $contenido = '';
                    }
                    echo "<td class='$clase'>$contenido</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<div class="detalle">';
            echo "El alfil se mueve en diagonal tantas casillas como quiera, sin salirse del tablero.";
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