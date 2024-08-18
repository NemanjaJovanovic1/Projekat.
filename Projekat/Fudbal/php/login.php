<?php
session_start();
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pronađi korisnika u bazi
    $sql = "SELECT * FROM korisnici WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Proveri da li se lozinka poklapa
        if (password_verify($password, $row['lozinka'])) {
            // Postavi sesiju i preusmeri na glavnu stranicu
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['ime'];
            header("Location: ../fudbal.php");
            exit();
        } else {
            echo "Pogrešna lozinka.";
        }
    } else {
        echo "Nema korisnika sa unetim email-om.";
    }

    $stmt->close();
    $conn->close();
}
?>
