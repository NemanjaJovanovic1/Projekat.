<?php
session_start();
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Proveri da li korisnik već postoji
    $sql = "SELECT * FROM korisnici WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Korisnik ne postoji, možemo ga registrovati
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO korisnici (email, lozinka) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password);

        if ($stmt->execute()) {
            // Uspešno registrovan, preusmeri na login stranicu
            header("Location: ../index.php");
            exit();
        } else {
            echo "Greška prilikom registracije.";
        }
    } else {
        echo "Korisnik sa ovim email-om već postoji.";
    }

    $stmt->close();
    $conn->close();
}
?>
