<?php
include 'konekcija.php';

$pozicija = $_POST['pozicija'];
$naziv = $_POST['naziv'];
$grad = $_POST['grad'];
$utakmice = $_POST['utakmice'];
$pobede = $_POST['pobede'];
$neresene = $_POST['neresene'];
$porazi = $_POST['porazi'];
$dati_golovi = $_POST['dati_golovi'];
$primljeni_golovi = $_POST['primljeni_golovi'];
$bodovi = $_POST['bodovi'];
$slika = $_FILES['slika']['name'];
$target = "slike/".basename($slika);

$sql = "INSERT INTO tabele (pozicija, naziv, grad, utakmice, pobede, neresene, porazi, dati_golovi, primljeni_golovi, bodovi, slika)
VALUES ('$pozicija', '$naziv', '$grad', '$utakmice', '$pobede', '$neresene', '$porazi', '$dati_golovi', '$primljeni_golovi', '$bodovi', '$slika')";

if ($conn->query($sql) === TRUE) {
    if (move_uploaded_file($_FILES['slika']['tmp_name'], $target)) {
        echo "Tim je uspešno dodat.";
    } else {
        echo "Greška pri uploadovanju slike.";
    }
    header('Location: ../tabele.php');
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
