<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Upravljanje Tabelama</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #3E4E62;
        }
        .container {
            margin-top: 100px;
        }
        .form-card {
            background-color: #228b22;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .form-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #fff;
            color: #228b22;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
        }
        .btn-custom:hover {
            background-color: #ccc;
            color: #228b22;
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
        <div class="form-card">
            <h2>Dodaj Tim u Tabelu</h2>
            <form action="php/dodaj_tabelu.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="pozicija" class="form-label">Pozicija</label>
                    <input type="number" class="form-control" id="pozicija" name="pozicija" required>
                </div>
                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv Tima</label>
                    <input type="text" class="form-control" id="naziv" name="naziv" required>
                </div>
                <div class="mb-3">
                    <label for="grad" class="form-label">Grad</label>
                    <input type="text" class="form-control" id="grad" name="grad" required>
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika Tima</label>
                    <input type="file" class="form-control" id="slika" name="slika" required>
                </div>
                <div class="mb-3">
                    <label for="utakmice" class="form-label">Utakmice</label>
                    <input type="number" class="form-control" id="utakmice" name="utakmice" required>
                </div>
                <div class="mb-3">
                    <label for="pobede" class="form-label">Pobede</label>
                    <input type="number" class="form-control" id="pobede" name="pobede" required>
                </div>
                <div class="mb-3">
                    <label for="neresene" class="form-label">Nerešene</label>
                    <input type="number" class="form-control" id="neresene" name="neresene" required>
                </div>
                <div class="mb-3">
                    <label for="porazi" class="form-label">Porazi</label>
                    <input type="number" class="form-control" id="porazi" name="porazi" required>
                </div>
                <div class="mb-3">
                    <label for="dati_golovi" class="form-label">Dati Golovi</label>
                    <input type="number" class="form-control" id="dati_golovi" name="dati_golovi" required>
                </div>
                <div class="mb-3">
                    <label for="primljeni_golovi" class="form-label">Primljeni Golovi</label>
                    <input type="number" class="form-control" id="primljeni_golovi" name="primljeni_golovi" required>
                </div>
                <div class="mb-3">
                    <label for="bodovi" class="form-label">Bodovi</label>
                    <input type="number" class="form-control" id="bodovi" name="bodovi" required>
                </div>
                <button type="submit" class="btn btn-custom">Dodaj</button>
            </form>
        </div>
        <div class="form-card mt-4">
            <h2>Azuriraj/Obriši Tim u Tabeli</h2>
            <?php
            include 'php/konekcija.php';

            $sql = "SELECT * FROM tabele ORDER BY pozicija";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<form action="php/azuriraj_tabelu.php" method="POST" enctype="multipart/form-data" class="mb-3">';
                    echo '<div class="row">';
                    echo '<div class="col-md-2">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($row["id"]) . '">';
                    echo '<input type="number" class="form-control" name="pozicija" value="' . htmlspecialchars($row["pozicija"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo '<input type="text" class="form-control" name="naziv" value="' . htmlspecialchars($row["naziv"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo '<input type="text" class="form-control" name="grad" value="' . htmlspecialchars($row["grad"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-2">';
                    echo '<input type="file" class="form-control" name="slika">';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="utakmice" value="' . htmlspecialchars($row["utakmice"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="pobede" value="' . htmlspecialchars($row["pobede"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="neresene" value="' . htmlspecialchars($row["neresene"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="porazi" value="' . htmlspecialchars($row["porazi"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="dati_golovi" value="' . htmlspecialchars($row["dati_golovi"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="primljeni_golovi" value="' . htmlspecialchars($row["primljeni_golovi"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<input type="number" class="form-control" name="bodovi" value="' . htmlspecialchars($row["bodovi"]) . '" required>';
                    echo '</div>';
                    echo '<div class="col-md-1">';
                    echo '<button type="submit" class="btn btn-custom">Ažuriraj</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                    echo '<form action="php/obrisi_tabelu.php" method="POST">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($row["id"]) . '">';
                    echo '<button type="submit" class="btn btn-danger w-100">Obriši</button>';
                    echo '</form>';
                }
            } else {
                echo '<p>Trenutno nema timova u tabeli.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
