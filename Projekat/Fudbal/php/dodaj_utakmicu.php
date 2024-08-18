<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tim1 = $_POST["tim1"];
    $tim2 = $_POST["tim2"];
    $datum = $_POST["datum"];
    $rezultat = $_POST["rezultat"];
    $slika = $_FILES["slika"]["name"];
    $target_dir = "../slike/";
    $target_file = $target_dir . basename($slika);
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

    $sql = "INSERT INTO utakmice (tim1, tim2, datum, rezultat, slika) VALUES ('$tim1', '$tim2', '$datum', '$rezultat', '$slika')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../utakmice.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
