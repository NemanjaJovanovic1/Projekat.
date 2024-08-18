<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM timovi WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: ../timovi.php");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $naziv = $_POST["naziv"];
    $grad = $_POST["grad"];
    $pozicija = $_POST["pozicija"];

    if ($_FILES["slika"]["name"]) {
        $slika = $_FILES["slika"]["name"];
        $target_dir = "../slike/";
        $target_file = $target_dir . basename($slika);
        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

        $sql = "UPDATE timovi SET naziv='$naziv', grad='$grad', slika='$slika', pozicija='$pozicija' WHERE id='$id'";
    } else {
        $sql = "UPDATE timovi SET naziv='$naziv', grad='$grad', pozicija='$pozicija' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: ../timovi.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Izmeni Tim</title>
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
        .team-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .team-form h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Beton liga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../timovi.php">Timovima</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Utakmicama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tabele</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transferi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Odjavi se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="team-form">
            <h2>Izmeni Tim</h2>
            <form action="izmeni_tim.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv Tima</label>
                    <input type="text" class="form-control" id="naziv" name="naziv" value="<?php echo htmlspecialchars($row['naziv']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="grad" class="form-label">Grad</label>
                    <input type="text" class="form-control" id="grad" name="grad" value="<?php echo htmlspecialchars($row['grad']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika</label>
                    <input type="file" class="form-control" id="slika" name="slika">
                </div>
                <div class="mb-3">
                    <label for="pozicija" class="form-label">Pozicija</label>
                    <input type="number" class="form-control" id="pozicija" name="pozicija" value="<?php echo htmlspecialchars($row['pozicija']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Izmeni</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
