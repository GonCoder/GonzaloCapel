<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Ejercicios Gonzalo Capel</title>
    <style>
        body {
            background: #181a20;
            color: #e0e0e0;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            background: #23272f;
            padding: 1rem 2rem;
            display: flex;
            gap: 2rem;
            align-items: center;
            box-shadow: 0 2px 8px #0002;
        }
        nav a {
            color: #a3e635;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        nav a:hover {
            color: #facc15;
        }
        .container {
            flex: 1;
            padding: 2rem;
            max-width: 700px;
            margin: auto;
        }
        h1 {
            color: #facc15;
            margin-bottom: 1rem;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 2rem 0;
        }
        ul li {
            background: #23272f;
            margin: 1.2rem;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 1px 4px #0002;
            display: inline-block;
            align-items: center;
            justify-content: space-between;
        }
        li:hover {
            background: #6d4e00;
        }
        ul li a {
            color: #a3e635;
            text-decoration: none;
            font-weight: 500;
            
        }
        ul li a:hover {
            text-decoration: underline;
            color: #ffcc00;
        }
        footer {
            background: #23272f;
            color: #888;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.95rem;
            margin-top: auto;
            box-shadow: 0 -2px 8px #0002;
        }
    </style>
</head>
<body>
    <nav>
        <a href="https://chat.openai.com/" target="_blank">ChatGPT</a>
        <a href="https://www.w3schools.com/" target="_blank">W3Schools</a>
        <a href="https://moodle.fpalanturing.es/" target="_blank">Moodle Alan Turing</a>
    </nav>
    <div class="container">
        <h1>Mis Ejercicios</h1>
        <ul>
            
            <li><a href="ejercicios/ejercicio1.php" target="_blank">Ejercicio 1</a></li>
            <li><a href="ejercicios/ejercicio2.php" target="_blank">Ejercicio 2</a></li>
            <li><a href="ejercicios/ejercicio3.php" target="_blank">Ejercicio 3</a></li>
            <li><a href="ejercicios/ejercicio4.php" target="_blank">Ejercicio 4</a></li>
            <li><a href="ejercicios/ejercicio5.php" target="_blank">Ejercicio 5</a></li>
            <li><a href="ejercicios/ejercicio6.php" target="_blank">Ejercicio 6</a></li>
            <li><a href="ejercicios/ejercicio7.php" target="_blank">Ejercicio 7</a></li>
            <li><a href="ejercicios/ejercicio8.php" target="_blank">Ejercicio 8</a></li>
            <li><a href="ejercicios/ejercicio9.php" target="_blank">Ejercicio 9</a></li>
            <li><a href="ejercicios/ejercicio10.php" target="_blank">Ejercicio 10</a></li>
            <li><a href="ejercicios/ejercicio11.php" target="_blank">Ejercicio 11</a></li>
            <li><a href="ejercicios/ejercicio12.php" target="_blank">Ejercicio 12</a></li>
            <li><a href="ejercicios/ejercicio13.php" target="_blank">Ejercicio 13</a></li>
            <li><a href="ejercicios/ejercicio14.php" target="_blank">Ejercicio 14</a></li>
            <li><a href="ejercicios/ejercicio15.php" target="_blank">Ejercicio 15</a></li>
        </ul>
    </div>
    <footer>
        &copy; 2025 Gonzalo Capel
    </footer>
</body>
</html>