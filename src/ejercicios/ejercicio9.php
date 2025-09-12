
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de multiplicar</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
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
        input[type="number"] {
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
        <h1>Ejercicio 9 <br> Tabla de multiplicar</h1>
        <form method="post">
            <label for="numero">Introduce un número:</label>
            <input type="number" name="numero" id="numero" required>
            <input type="submit" value="Mostrar tabla">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"])) {
            $numero = intval($_POST["numero"]);
            echo '<div class="resultado">';
            echo "Tabla de multiplicar del <strong>$numero</strong>:";
            echo '<table>';
            echo '<tr><th>Multiplicación</th><th>Resultado</th></tr>';
            for ($i = 1; $i <= 10; $i++) {
                echo "<tr><td>$numero × $i</td><td>" . ($numero * $i) . "</td></tr>";
            }
            echo '</table>';
            echo '<div class="detalle">';
            
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