<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime_igraca = $_POST['ime_igraca'];
    $stari_tim = $_POST['stari_tim'];
    $novi_tim = $_POST['novi_tim'];
    $datum = $_POST['datum'];
    $cena = $_POST['cena'];

    $sql = "INSERT INTO transferi (ime_igraca, stari_tim, novi_tim, datum, cena) VALUES ('$ime_igraca', '$stari_tim', '$novi_tim', '$datum', '$cena')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../dodaj_transfer.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
