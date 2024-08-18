<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dodaj Transfer</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #3E4E62;
            color: white;
        }
        .transfer-form-card {
            background-color: #181818;
            padding: 20px;
            border-radius: 10px;
            color: white;
            max-width: 800px;
            width: 100%;
            margin: 50px auto;
        }
        .transfer-form-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-label {
            margin-bottom: 5px;
        }
        .form-control {
            background-color: #333;
            color: #ccc;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn-primary, .btn-danger {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .btn-danger {
            background-color: #dc3545;
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

    <div class="transfer-form-card">
        <h2>Dodaj Transfer</h2>
        <form action="php/dodaj_transfer.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="ime_igraca" class="form-label">Ime igrača</label>
                <input type="text" class="form-control" id="ime_igraca" name="ime_igraca" required>
            </div>
            <div class="mb-3">
                <label for="stari_tim" class="form-label">Stari tim</label>
                <input type="text" class="form-control" id="stari_tim" name="stari_tim" required>
            </div>
            <div class="mb-3">
                <label for="novi_tim" class="form-label">Novi tim</label>
                <input type="text" class="form-control" id="novi_tim" name="novi_tim" required>
            </div>
            <div class="mb-3">
                <label for="datum" class="form-label">Datum</label>
                <input type="date" class="form-control" id="datum" name="datum" required>
            </div>
            <div class="mb-3">
                <label for="cena" class="form-label">Cena</label>
                <input type="number" class="form-control" id="cena" name="cena" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Dodaj</button>
        </form>
        <hr>
        <h2>Izmeni ili Obriši Transfer</h2>
        <?php
        include 'php/konekcija.php';

        $sql = "SELECT * FROM transferi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="transfer-item">';
                echo '<form action="php/izmeni_transfer.php" method="POST" class="d-flex align-items-center">';
                echo '<input type="hidden" name="transfer_id" value="' . htmlspecialchars($row["transfer_id"]) . '">';
                echo '<input type="text" class="form-control me-2" name="ime_igraca" value="' . htmlspecialchars($row["ime_igraca"]) . '" required>';
                echo '<input type="text" class="form-control me-2" name="stari_tim" value="' . htmlspecialchars($row["stari_tim"]) . '" required>';
                echo '<input type="text" class="form-control me-2" name="novi_tim" value="' . htmlspecialchars($row["novi_tim"]) . '" required>';
                echo '<input type="date" class="form-control me-2" name="datum" value="' . htmlspecialchars($row["datum"]) . '" required>';
                echo '<input type="number" class="form-control me-2" name="cena" value="' . htmlspecialchars($row["cena"]) . '" required>';
                echo '<button type="submit" class="btn btn-primary me-2">Izmeni</button>';
                echo '</form>';
                echo '<form action="php/obrisi_transfer.php" method="POST">';
                echo '<input type="hidden" name="transfer_id" value="' . htmlspecialchars($row["transfer_id"]) . '">';
                echo '<button type="submit" class="btn btn-danger">Obriši</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>Trenutno nema transfera.</p>';
        }

        $conn->close();
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
