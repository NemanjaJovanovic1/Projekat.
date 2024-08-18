<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naziv = $_POST["naziv"];
    $grad = $_POST["grad"];
    $pozicija = $_POST["pozicija"];
    
    // Upload slika
    $slika = $_FILES["slika"]["name"];
    $target_dir = "../slike/";
    $target_file = $target_dir . basename($slika);
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

    $sql = "INSERT INTO timovi (naziv, grad, slika, pozicija) VALUES ('$naziv', '$grad', '$slika', '$pozicija')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../timovi.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
