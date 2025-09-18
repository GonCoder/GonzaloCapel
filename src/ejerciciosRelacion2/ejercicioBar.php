
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido Comida Vegetariana</title>
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
        table {
            width: 100%;
            margin-bottom: 20px;
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
        label {
            color: #ff9800;
            font-weight: bold;
        }
        input[type="number"] {
            width: 60px;
            padding: 6px;
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
            margin-top: 10px;
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
        <h1>Pedido de Comida Vegetariana</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Comida</th>
                    <th>Precio (€)</th>
                    <th>Cantidad</th>
                </tr>
                <tr>
                    <td>Hamburguesa vegetariana</td>
                    <td>6.95</td>
                    <td><input type="number" name="hamburguesa" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Pasta al pesto</td>
                    <td>8.50</td>
                    <td><input type="number" name="pasta" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Pizza caprese</td>
                    <td>7.90</td>
                    <td><input type="number" name="pizza" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Quinoa con verdura</td>
                    <td>9.20</td>
                    <td><input type="number" name="quinoa" min="0" value="0"></td>
                </tr>
                <tr>
                    <th>Bebida</th>
                    <th>Precio (€)</th>
                    <th>Cantidad</th>
                </tr>
                <tr>
                    <td>Agua</td>
                    <td>1.20</td>
                    <td><input type="number" name="agua" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cerveza</td>
                    <td>1.80</td>
                    <td><input type="number" name="cerveza" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Refresco</td>
                    <td>1.80</td>
                    <td><input type="number" name="refresco" min="0" value="0"></td>
                </tr>
            </table>
            <input type="submit" value="Calcular pedido">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $precios = [
                "hamburguesa" => 6.95,
                "pasta" => 8.50,
                "pizza" => 7.90,
                "quinoa" => 9.20,
                "agua" => 1.20,
                "cerveza" => 1.80,
                "refresco" => 1.80
            ];
            $pedido = [];
            $total = 0;
            foreach ($precios as $item => $precio) {
                $cantidad = isset($_POST[$item]) ? intval($_POST[$item]) : 0;
                if ($cantidad > 0) {
                    $pedido[$item] = ["cantidad" => $cantidad, "precio" => $precio];
                    $total += $cantidad * $precio;
                }
            }
            echo '<div class="resultado">';
            if (count($pedido) > 0) {
                echo "Resumen del pedido:<br><table>";
                echo "<tr><th>Producto</th><th>Cantidad</th><th>Subtotal (€)</th></tr>";
                foreach ($pedido as $nombre => $info) {
                    $nombreMostrar = "";
                    switch ($nombre) {
                        case "hamburguesa": $nombreMostrar = "Hamburguesa vegetariana"; break;
                        case "pasta": $nombreMostrar = "Pasta al pesto"; break;
                        case "pizza": $nombreMostrar = "Pizza caprese"; break;
                        case "quinoa": $nombreMostrar = "Quinoa con verdura"; break;
                        case "agua": $nombreMostrar = "Agua"; break;
                        case "cerveza": $nombreMostrar = "Cerveza"; break;
                        case "refresco": $nombreMostrar = "Refresco"; break;
                    }
                    $subtotal = $info["cantidad"] * $info["precio"];
                    echo "<tr><td>$nombreMostrar</td><td>{$info["cantidad"]}</td><td>" . number_format($subtotal, 2) . "</td></tr>";
                }
                echo "<tr><th colspan='2'>Total</th><th>" . number_format($total, 2) . "</th></tr>";
                echo "</table>";
                echo '<div class="detalle">Gracias por tu pedido. Pronto lo recibirás en tu domicilio.</div>';
            } else {
                echo "No has seleccionado ningún producto.";
            }
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