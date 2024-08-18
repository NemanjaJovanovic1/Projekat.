<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Fudbalska liga Beton</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .bg {
            background-image: url('slike/Stadion.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 70px;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.5);
        }
        .navbar-brand {
            font-family: 'Lalezar', cursive;
        }
        .hero-title {
            font-family: 'Lalezar', cursive;
            font-size: 3em;
            margin-bottom: 10px;
        }
        .hero-subtitle {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #fff;
            color: #228b22;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #ccc;
            color: #228b22;
        }
        .team-card {
            background-color: #228b22;
            padding: 90px 20px;
            border-radius: 10px;
            color: white;
            max-width: 1000px;
            width: 100%;
            text-align: center;
            margin: 0 auto;
            margin-top: 30px;
        }
        .team-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .team-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #181818;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .team-item img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .team-info {
            flex-grow: 1;
            margin-left: 10px;
            text-align: left;
        }
        .team-position {
            background-color: #fff;
            color: #228b22;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .match-card {
            background-color: #1D1D1D;
            padding: 90px 20px;
            border-radius: 10px;
            color: white;
            max-width: 1000px;
            width: 100%;
            text-align: center;
            margin: 30px auto;
        }
        .match-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .match-item {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .match-item img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .match-item .team-names {
            display: flex;
            justify-content: space-between;
            width: 100%;
            font-size: 1.2em;
        }
        .match-item .team-names span {
            flex: 1;
            text-align: center;
        }
        .match-item .result {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .match-item .date {
            font-size: 1em;
            color: #888;
        }
        .table-card {
            background-color: #228b22;
            padding: 20px;
            border-radius: 10px;
            color: white;
            max-width: 1000px;
            width: 100%;
            text-align: center;
            margin: 30px auto;
        }
        .table-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .table-card table {
            width: 100%;
            color: white;
            background-color: #181818;
            border-radius: 10px;
        }
        .table-card th, .table-card td {
            padding: 10px;
            border: 1px solid #333;
        }
        .table-card th {
            background-color: #555;
        }
        .table-card td img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
        .transfer-card {
            background-color: #228b22;
            padding: 20px;
            border-radius: 10px;
            color: white;
            max-width: 1000px;
            width: 100%;
            text-align: center;
            margin: 30px auto;
        }
        .transfer-card h2 {
            font-family: 'Lalezar', cursive;
            margin-bottom: 20px;
        }
        .transfer-card table {
            width: 100%;
            color: white;
            background-color: #181818;
            border-radius: 10px;
        }
        .transfer-card th, .transfer-card td {
            padding: 10px;
            border: 1px solid #333;
        }
        .transfer-card th {
            background-color: #555;
        }
        .transfer-card td {
            text-align: left;
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

    <div class="bg">
        <h1 class="hero-title">Fudbalska liga Beton</h1>
        <p class="hero-subtitle">Najkvalitetnija fudbalska liga</p>
        <a href="#timovi" class="btn btn-custom">Timovi</a>
    </div>

    <div id="timovi" class="team-card">
        <h2>Timovi</h2>
        <?php
        include 'php/konekcija.php';

        $sql = "SELECT * FROM timovi ORDER BY pozicija";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="team-item">';
                echo '<img src="slike/' . htmlspecialchars($row["slika"]) . '" alt="Slika tima">';
                echo '<div class="team-info">';
                echo '<p>' . htmlspecialchars($row["naziv"]) . '<br>' . htmlspecialchars($row["grad"]) . '</p>';
                echo '</div>';
                echo '<div class="team-position">' . htmlspecialchars($row["pozicija"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Trenutno nema timova.</p>';
        }

        $conn->close();
        ?>
    </div>

    <div id="utakmice" class="match-card">
        <h2>Utakmice</h2>
        <?php
        include 'php/konekcija.php';

        $sql = "SELECT * FROM utakmice";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="match-item">';
                echo '<img src="slike/' . htmlspecialchars($row["slika"]) . '" alt="Slika utakmice">';
                echo '<div class="team-names">';
                echo '<span>' . htmlspecialchars($row["tim1"]) . '</span>';
                echo '<span class="result">' . htmlspecialchars($row["rezultat"]) . '</span>';
                echo '<span>' . htmlspecialchars($row["tim2"]) . '</span>';
                echo '</div>';
                echo '<div class="date">' . htmlspecialchars($row["datum"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Trenutno nema utakmica.</p>';
        }

        $conn->close();
        ?>
    </div>

    <div id="tabele" class="table-card">
        <h2>Tabele</h2>
        <table>
            <thead>
                <tr>
                    <th>poz</th>
                    <th>Klub</th>
                    <th>Utak</th>
                    <th>Pob</th>
                    <th>Ner</th>
                    <th>Por</th>
                    <th>DG</th>
                    <th>PG</th>
                    <th>BODOVI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'php/konekcija.php';

                $sql = "SELECT * FROM tabele ORDER BY pozicija";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["pozicija"]) . '</td>';
                        echo '<td><img src="slike/' . htmlspecialchars($row["slika"]) . '" alt="Slika tima"> ' . htmlspecialchars($row["naziv"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["utakmice"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["pobede"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["neresene"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["porazi"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["dati_golovi"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["primljeni_golovi"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["bodovi"]) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="9">Trenutno nema podataka.</td></tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div id="transferi" class="transfer-card">
        <h2>Transferi</h2>
        <table>
            <thead>
                <tr>
                    <th>Ime igrača</th>
                    <th>Stari tim</th>
                    <th>Novi tim</th>
                    <th>Datum</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'php/konekcija.php';

                $sql = "SELECT * FROM transferi ORDER BY datum DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["ime_igraca"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["stari_tim"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["novi_tim"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["datum"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["cena"]) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Trenutno nema podataka.</td></tr>';
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
