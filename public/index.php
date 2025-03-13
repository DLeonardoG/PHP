<!DOCTYPE html>
<html>
    <head>
        <title>LAMP con Docker</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo '<h1>Usuarios del sistema</h1>';
                
                // Conexión a PostgreSQL
                $conn = pg_connect("
                    host=db 
                    dbname=db_ejm1 
                    user=user1 
                    password=user1.pa55
                ");

                if (!$conn) {
                    die("Error de conexión: " . pg_last_error());
                }

                $query = 'SELECT * FROM Usuarios';
                $result = pg_query($conn, $query);

                if (!$result) {
                    die("Error en la consulta: " . pg_last_error());
                }

                echo '<table class="table table-striped">';
                echo '<thead><tr><th>ID</th><th>Nombre del Usuario</th></tr></thead>';
                
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '</tr>';
                }
                
                echo '</table>';
                pg_free_result($result);
                pg_close($conn);
            ?>
        </div>
    </body>
</html>