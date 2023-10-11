<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Elabora l'immagine caricata
    if ($_FILES['image']['error'] === 0) {
        $image = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($image);
        $imageBase64 = base64_encode($imageData);
    } else {
        $imageBase64 = '';
    }
   
    $db = new mysqli($db_host, $db_username, $db_password, $db_name, $port);
    // Esegui l'inserimento nel database
    $sql = "INSERT INTO chat_messages (username, message, image) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $username, $message, $imageBase64);

    if ($stmt->execute()) {
        echo "Messaggio inviato con successo!";
    } else {
        echo "Errore nell'invio del messaggio.";
    }

    $stmt->close();
    $db->close();
}
?>
