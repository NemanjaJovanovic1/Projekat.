<?php
include 'konekcija.php';

$id = $_POST['id'];

$sql = "DELETE FROM tabele WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Tim je uspešno obrisan.";
    header('Location: ../tabele.php');
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
