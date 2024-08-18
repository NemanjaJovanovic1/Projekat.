<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM utakmice WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: ../utakmice.php");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tim1 = $_POST["tim1"];
    $tim2 = $_POST["tim2"];
    $datum = $_POST["datum"];
    $rezultat = $_POST["rezultat"];
    $slika = $_FILES["slika"]["name"];

    if ($slika) {
        $target_dir = "../slike/";
        $target_file = $target_dir . basename($slika);
        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);
        $sql = "UPDATE utakmice SET tim1='$tim1', tim2='$tim2', datum='$datum', rezultat='$rezultat', slika='$slika' WHERE id='$id'";
    } else {
        $sql = "UPDATE utakmice SET tim1='$tim1', tim2='$tim2', datum='$datum', rezultat='$rezultat' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: ../utakmice.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: ../utakmice.php");
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Izmeni Utakmicu</title>
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
        .match-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .match-form h2 {
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
                        <a class="nav-link" href="../utakmice.php">Utakmicama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Timovima</a>
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
        <div class="match-form">
            <h2>Izmeni Utakmicu</h2>
            <form action="izmeni_utakmicu.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="tim1" class="form-label">Tim 1</label>
                    <input type="text" class="form-control" id="tim1" name="tim1" value="<?php echo htmlspecialchars($row['tim1']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tim2" class="form-label">Tim 2</label>
                    <input type="text" class="form-control" id="tim2" name="tim2" value="<?php echo htmlspecialchars($row['tim2']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="date" class="form-control" id="datum" name="datum" value="<?php echo htmlspecialchars($row['datum']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rezultat" class="form-label">Rezultat</label>
                    <input type="text" class="form-control" id="rezultat" name="rezultat" value="<?php echo htmlspecialchars($row['rezultat']); ?>">
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika</label>
                    <input type="file" class="form-control" id="slika" name="slika">
                </div>
                <button type="submit" class="btn btn-primary">Izmeni</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
