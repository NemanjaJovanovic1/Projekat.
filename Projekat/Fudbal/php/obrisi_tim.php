<?php
include 'konekcija.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM timovi WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../timovi.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
