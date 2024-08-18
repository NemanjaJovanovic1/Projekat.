<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transfer_id = $_POST['transfer_id'];
    $ime_igraca = $_POST['ime_igraca'];
    $stari_tim = $_POST['stari_tim'];
    $novi_tim = $_POST['novi_tim'];
    $datum = $_POST['datum'];
    $cena = $_POST['cena'];

    $sql = "UPDATE transferi SET ime_igraca='$ime_igraca', stari_tim='$stari_tim', novi_tim='$novi_tim', datum='$datum', cena='$cena' WHERE transfer_id='$transfer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../dodaj_transfer.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
