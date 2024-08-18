<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transfer_id = $_POST['transfer_id'];

    $sql = "DELETE FROM transferi WHERE transfer_id='$transfer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../dodaj_transfer.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
