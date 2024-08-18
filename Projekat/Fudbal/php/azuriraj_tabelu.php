<?php
include 'konekcija.php';

$id = $_POST['id'];
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

if ($slika) {
    $target = "slike/".basename($slika);
    $sql = "UPDATE tabele SET pozicija='$pozicija', naziv='$naziv', grad='$grad', utakmice='$utakmice', pobede='$pobede', neresene='$neresene', porazi='$porazi', dati_golovi='$dati_golovi', primljeni_golovi='$primljeni_golovi', bodovi='$bodovi', slika='$slika' WHERE id='$id'";
    if (move_uploaded_file($_FILES['slika']['tmp_name'], $target)) {
        echo "Slika je uspešno uploadovana.";
    } else {
        echo "Greška pri uploadovanju slike.";
    }
} else {
    $sql = "UPDATE tabele SET pozicija='$pozicija', naziv='$naziv', grad='$grad', utakmice='$utakmice', pobede='$pobede', neresene='$neresene', porazi='$porazi', dati_golovi='$dati_golovi', primljeni_golovi='$primljeni_golovi', bodovi='$bodovi' WHERE id='$id'";
}

if ($conn->query($sql) === TRUE) {
    echo "Tim je uspešno ažuriran.";
    header('Location: ../tabele.php');
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
