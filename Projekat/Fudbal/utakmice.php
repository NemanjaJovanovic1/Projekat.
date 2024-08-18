<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Upravljanje Utakmicama</title>
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
        .match-form, .match-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .match-form h2, .match-list h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .match-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .match-item img {
            border-radius: 10px;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .match-info {
            flex-grow: 1;
        }
        .match-actions {
            display: flex;
            align-items: center;
        }
        .match-actions .btn {
            margin-right: 10px;
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
        <div class="match-form">
            <h2>Dodaj Utakmicu</h2>
            <form action="php/dodaj_utakmicu.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="tim1" class="form-label">Tim 1</label>
                    <input type="text" class="form-control" id="tim1" name="tim1" required>
                </div>
                <div class="mb-3">
                    <label for="tim2" class="form-label">Tim 2</label>
                    <input type="text" class="form-control" id="tim2" name="tim2" required>
                </div>
                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="date" class="form-control" id="datum" name="datum" required>
                </div>
                <div class="mb-3">
                    <label for="rezultat" class="form-label">Rezultat</label>
                    <input type="text" class="form-control" id="rezultat" name="rezultat">
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika</label>
                    <input type="file" class="form-control" id="slika" name="slika">
                </div>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

        <div class="match-list">
            <h2>Utakmice</h2>
            <div class="match-items">
                <?php
                include 'php/konekcija.php';

                $sql = "SELECT * FROM utakmice ORDER BY datum";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="match-item">';
                        echo '<img src="slike/' . htmlspecialchars($row["slika"]) . '" alt="Slika utakmice">';
                        echo '<div class="match-info">';
                        echo '<p><strong>' . htmlspecialchars($row["tim1"]) . ' vs ' . htmlspecialchars($row["tim2"]) . '</strong></p>';
                        echo '<p>Datum: ' . htmlspecialchars($row["datum"]) . '</p>';
                        echo '<p>Rezultat: ' . htmlspecialchars($row["rezultat"]) . '</p>';
                        echo '</div>';
                        echo '<div class="match-actions">';
                        echo '<a href="php/izmeni_utakmicu.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Izmeni</a> ';
                        echo '<a href="php/obrisi_utakmicu.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Obriši</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Trenutno nema utakmica.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
