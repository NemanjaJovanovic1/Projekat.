<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Upravljanje Timovima</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.5);
        }
        .navbar-brand {
            font-family: 'Lalezar', cursive;
        }
        .container {
            margin-top: 100px;
        }
        .team-form, .team-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .team-form h2, .team-list h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="fudbal.php">Beton liga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="timovi.php">Timovi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="utakmice.php">Utakmice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabele.php">Tabele</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dodaj_transfer.php">Transferi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/logout.php">Odjavi se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="team-form">
            <h2>Dodaj Tim</h2>
            <form action="php/dodaj_tim.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv Tima</label>
                    <input type="text" class="form-control" id="naziv" name="naziv" required>
                </div>
                <div class="mb-3">
                    <label for="grad" class="form-label">Grad</label>
                    <input type="text" class="form-control" id="grad" name="grad" required>
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika</label>
                    <input type="file" class="form-control" id="slika" name="slika" required>
                </div>
                <div class="mb-3">
                    <label for="pozicija" class="form-label">Pozicija</label>
                    <input type="number" class="form-control" id="pozicija" name="pozicija" required>
                </div>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

        <div class="team-list">
            <h2>Timovi</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Grad</th>
                        <th>Slika</th>
                        <th>Pozicija</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'php/konekcija.php';

                    $sql = "SELECT * FROM timovi ORDER BY pozicija";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row["naziv"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["grad"]) . '</td>';
                            echo '<td><img src="slike/' . htmlspecialchars($row["slika"]) . '" alt="Slika tima" style="width:50px; height:50px;"></td>';
                            echo '<td>' . htmlspecialchars($row["pozicija"]) . '</td>';
                            echo '<td>';
                            echo '<a href="php/izmeni_tim.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Izmeni</a> ';
                            echo '<a href="php/obrisi_tim.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Obriši</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Trenutno nema timova.</td></tr>';
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
